<?php
	add_action('wp_ajax_submit_comment_ajax', 'handle_ajax_comment');
	add_action('wp_ajax_nopriv_submit_comment_ajax', 'handle_ajax_comment');

	function handle_ajax_comment() {
		if (
			empty($_POST['nonce']) ||
			!wp_verify_nonce($_POST['nonce'], 'ajax_global')
		) {
			wp_send_json_error(['message' => 'Invalid nonce']);
		}

		// Валидация
		if (
			empty($_POST['comment_post_ID']) ||
			empty($_POST['comment']) ||
			empty($_POST['author']) ||
			empty($_POST['email'])
		) {
			wp_send_json_error(['message' => 'All fields are required']);
		}

		$commentdata = [
			'comment_post_ID'      => absint($_POST['comment_post_ID']),
			'comment_content'      => sanitize_textarea_field($_POST['comment']),
			'comment_author'       => sanitize_text_field($_POST['author']),
			'comment_author_email' => sanitize_email($_POST['email']),
			'comment_type'         => '',
			'comment_parent'       => 0,
			'user_id'              => get_current_user_id(),
		];

		$comment_id = wp_new_comment($commentdata);

		if (is_wp_error($comment_id)) {
			wp_send_json_error(['message' => 'Comment not saved']);
		}

		wp_send_json_success(['message' => 'Comment added', 'comment_id' => $comment_id]);
	}
