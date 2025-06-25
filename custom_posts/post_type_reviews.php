<?php

	function register_review_post_type() {
		$labels = array(
			'name'                  => __('Reviews', THEME_SLUG),
			'singular_name'         => __('Review', THEME_SLUG),
			'menu_name'             => __('Reviews', THEME_SLUG),
			'all_items'             => __('All Reviews', THEME_SLUG),
			'add_new'               => __('Add New', THEME_SLUG),
			'add_new_item'          => __('Add New Review', THEME_SLUG),
			'edit_item'             => __('Edit Review', THEME_SLUG),
			'new_item'              => __('New Review', THEME_SLUG),
			'view_item'             => __('View Review', THEME_SLUG),
			'search_items'          => __('Search Reviews', THEME_SLUG),
			'not_found'             => __('No Reviews found', THEME_SLUG),
			'not_found_in_trash'    => __('No Reviews found in Trash', THEME_SLUG),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => false,
			'exclude_from_search'=> true,
			'publicly_queryable' => false,
			'show_in_nav_menus'  => false,
			'show_ui'            => true,
			'menu_icon'          => 'dashicons-format-quote',
			'has_archive'        => false,
			'rewrite'            => false,
			'supports'           => array('title', 'editor', 'revisions','thumbnail'),
			'show_in_rest'       => true,
		);

		register_post_type('review', $args);
	}
	add_action('init', 'register_review_post_type');




	add_action('restrict_manage_posts', function () {
		global $typenow;

		if ($typenow === 'review' && current_user_can('manage_options')) {
			$url = add_query_arg([
				'import_google_reviews' => 1,
			], admin_url('edit.php?post_type=review'));

			echo '<a href="' . esc_url($url) . '" class="button button-primary" style="margin-right:6px;">Sync Google Reviews</a>';
		}
	});

	add_action('admin_init', function () {
		if (
			is_admin() &&
			isset($_GET['import_google_reviews']) &&
			current_user_can('manage_options')
		) {
			require_once THEME_DIR . '/includes/GoogleReviews/Service.php';
			require_once THEME_DIR . '/includes/GoogleReviews/GoogleReviewsImporter.php';

			$data = Service::fetch_data();

			if (!empty($data['reviews'])) {
				$importer = new GoogleReviewsImporter();
				$importer->import_from_data($data['reviews']);
			}

			wp_safe_redirect(remove_query_arg('import_google_reviews'));
			exit;
		}
	});
