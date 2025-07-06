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
