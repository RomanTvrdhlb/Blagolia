<?php
	class GoogleReviewsImporter {
		public function import_from_data(array $reviews): void {
			foreach ($reviews as $review) {
				$this->import_review([
					'author_name'       => $review['author_name'] ?? 'Anonymous',
					'rating'            => $review['rating'] ?? 0,
					'text'              => $review['text'] ?? '',
					'profile_photo_url' => $review['profile_photo_url'] ?? '',
				]);
			}
		}

		private function import_review(array $review): void {
			$hash = md5($review['author_name'] . $review['text']);
			$exists = get_posts([
				'post_type'   => 'review',
				'meta_key'    => 'review_hash',
				'meta_value'  => $hash,
				'fields'      => 'ids',
				'numberposts' => 1,
			]);

			if ($exists) {
				error_log("⏩ Пропущен дубликат: {$review['author_name']}");
				return;
			}

			$post_id = wp_insert_post([
				'post_type'    => 'review',
				'post_title'   => 'Google Review from ' . $review['author_name'],
				'post_content' => $review['text'],
				'post_status'  => 'publish',
			]);

			if (is_wp_error($post_id)) {
				error_log("❌ Ошибка создания поста: " . $post_id->get_error_message());
				return;
			}

			update_field('name', $review['author_name'], $post_id);
			update_field('position', 'Google Reviewer', $post_id);
			update_field('stars', (string)$review['rating'], $post_id);
			update_field('review_hash', $hash, $post_id);

			if (!empty($review['profile_photo_url'])) {
				$this->set_thumbnail($post_id, $review['profile_photo_url']);
			}

			error_log("✅ Импортирован отзыв от: {$review['author_name']}");
		}

		private function set_thumbnail(int $post_id, string $url): void {
			$tmp = download_url($url);
			if (is_wp_error($tmp)) {
				error_log('⚠️ Ошибка скачивания изображения: ' . $tmp->get_error_message());
				return;
			}

			$file_array = [
				'name'     => basename(parse_url($url, PHP_URL_PATH)) . '.jpg',
				'tmp_name' => $tmp,
			];

			$attachment_id = media_handle_sideload($file_array, $post_id);

			if (!is_wp_error($attachment_id)) {
				set_post_thumbnail($post_id, $attachment_id);
			}
		}
	}
