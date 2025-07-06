<?php

	require_once __DIR__ . '/Service.php';
	require_once __DIR__ . '/Options.php';
	require_once __DIR__ . '/Shortcode.php';
	require_once __DIR__ . '/Schema.php';
	require_once __DIR__ . '/GoogleReviewsImporter.php';

	use GoogleReviews\Service;

	add_action('google_reviews_daily_fetch', function () {
		if (class_exists(Service::class)) {
			Service::fetch_data();
		}
	});
