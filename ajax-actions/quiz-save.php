<?php
	add_action('wp_ajax_quiz_save', 'handle_quiz_save');
	add_action('wp_ajax_nopriv_quiz_save', 'handle_quiz_save');

	function handle_quiz_save() {
		$id    = sanitize_key($_POST['id'] ?? '');
		$email = sanitize_email($_POST['email'] ?? '');
		$raw   = $_POST['data'] ?? '';

		if (!$id || !$email || !is_email($email) || !$raw) {
			wp_send_json_error(['message' => 'Invalid input']);
		}

		$data = json_decode(stripslashes($raw), true);
		if (!$data) {
			wp_send_json_error(['message' => 'Invalid JSON']);
		}

		// Сохраняем файл
		$dir = get_stylesheet_directory() . '/quiz_sessions/';
		if (!file_exists($dir)) {
			mkdir($dir, 0755, true);
		}
		$path = $dir . "quiz_{$id}.json";
		file_put_contents($path, json_encode([
			'id'         => $id,
			'email'      => $email,
			'data'       => $data,
			'created_at' => time(),
		], JSON_PRETTY_PRINT));


		$link = home_url("/quiz/?quiz-id={$id}");
		$template = get_field('table_editor', 'option');
		$subject = get_field('subject', 'option');

		$user_name = extract_user_name($data);

		$placeholders = [
			'[user-name]'  => $user_name ?: 'User',
			'[user-email]' => $email,
			'[magic-link]' => $link,
		];
		foreach ($placeholders as $key => $value) {
			$template = str_replace($key, $value, $template);
		}

		// Заголовки
		$headers = [
			'Content-Type: text/html; charset=UTF-8',
		];


//		$is_sent = wp_mail($email, 'Your Mortgage Magic Link', $template, $headers);
//
//// Логирование
//		error_log("📨 Magic link email sent to: {$email}");
//		error_log("▶ Subject: Your Mortgage Magic Link");
//		error_log("▶ Headers: " . print_r($headers, true));
//		error_log("▶ Success: " . var_export($is_sent, true));
//		error_log("▶ Template:\n" . strip_tags($template));


		wp_mail($email, $subject, $template, $headers);
		wp_send_json_success(['link' => $link]);
	}

	function extract_user_name(array $data): string {
		foreach ($data as $section) {
			if (!is_array($section)) continue;
			foreach ($section as $key => $value) {
				if (stripos($key, 'user-name') !== false && !empty($value)) {
					return $value;
				}
			}
		}
		return '';
	}
