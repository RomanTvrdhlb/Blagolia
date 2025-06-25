<?php





	class Service {
		public static function fetch_data(): array {
			$api_key = get_option('google_reviews_api_key');
			$place_id = get_option('google_reviews_place_id');

			$url = add_query_arg([
				'place_id' => $place_id,
				'key'      => $api_key,
				'fields'   => 'rating,user_ratings_total,reviews',
			], 'https://maps.googleapis.com/maps/api/place/details/json');

			$response = wp_remote_get($url);

			if (is_wp_error($response)) {
				error_log('Google API error: ' . $response->get_error_message());
				return [];
			}

			$body = wp_remote_retrieve_body($response);
			$data = json_decode($body, true);

			if (!isset($data['result'])) {
				error_log('Missing result from API. Body: ' . $body);
				return [];
			}

			$rating        = strval(sprintf('%.1f', $data['result']['rating'] ?? 0));
			$reviews_count = strval($data['result']['user_ratings_total'] ?? 0);
			$reviews       = $data['result']['reviews'] ?? [];

			update_option('google_reviews_rating', $rating);
			update_option('google_reviews_count', $reviews_count);
			update_option('google_reviews_raw', json_encode($reviews, JSON_UNESCAPED_UNICODE));

			return [
				'rating'        => $rating,
				'reviews_count' => $reviews_count,
				'reviews'       => $reviews,
			];
		}
	}



	add_action('admin_init', function () {
		if (isset($_GET['run_google_fetch']) && current_user_can('manage_options')) {
			$data = Service::fetch_data();
			wp_die('<pre>' . print_r($data, true) . '</pre>', 'Google Reviews Fetch');
		}
	});

