<?php
	/**
	 * Plugin Name: Google Reviews Sync
	 */

	require_once __DIR__ . '/includes/GoogleReviews/init.php';

// Активировать крон
	register_activation_hook(__FILE__, function () {
		if (!wp_next_scheduled('google_reviews_daily_fetch')) {
			wp_schedule_event(time(), 'daily', 'google_reviews_daily_fetch');
		}
	});

	register_deactivation_hook(__FILE__, function () {
		wp_clear_scheduled_hook('google_reviews_daily_fetch');
	});
