<?php
	add_action('wp_ajax_quiz_load', 'handle_quiz_load');
	add_action('wp_ajax_nopriv_quiz_load', 'handle_quiz_load');

	function handle_quiz_load() {
		$id = sanitize_key($_POST['quiz-id'] ?? '');
		if (!$id) {
			wp_send_json_error(['message' => 'Missing quiz ID']);
		}

		$file = get_stylesheet_directory() . "/quiz_sessions/quiz_{$id}.json";
		if (!file_exists($file)) {
			wp_send_json_error(['message' => 'Quiz session not found']);
		}

		$content = json_decode(file_get_contents($file), true);
		$created = (int) ($content['created_at'] ?? 0);


		unlink($file);


		if ($created && (time() - $created > 14 * 86400)) {
			wp_send_json_error(['message' => 'Quiz session expired']);
		}

		wp_send_json_success($content['data']);
	}
