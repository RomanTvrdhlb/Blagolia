<?php

	function register_faq_post_type() {
		$labels = array(
			'name'                  => __('FAQs', THEME_SLUG),
			'singular_name'         => __('FAQ', THEME_SLUG),
			'menu_name'             => __('FAQ', THEME_SLUG),
			'all_items'             => __('All FAQs', THEME_SLUG),
			'add_new'               => __('Add New', THEME_SLUG),
			'add_new_item'          => __('Add New FAQ', THEME_SLUG),
			'edit_item'             => __('Edit FAQ', THEME_SLUG),
			'new_item'              => __('New FAQ', THEME_SLUG),
			'view_item'             => __('View FAQ', THEME_SLUG),
			'search_items'          => __('Search FAQs', THEME_SLUG),
			'not_found'             => __('No FAQs found', THEME_SLUG),
			'not_found_in_trash'    => __('No FAQs found in Trash', THEME_SLUG),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => false,
			'exclude_from_search'=> false,
			'publicly_queryable' => false,
			'show_in_nav_menus'  => false,
			'show_ui'            => true,
			'menu_icon'          => 'dashicons-editor-help',
			'has_archive'        => false,
			'rewrite'            => array('slug' => 'faq'),
			'supports'           => array('title', 'editor', 'revisions'),
			'show_in_rest'       => true,
		);

		register_post_type('faq', $args);
	}
	add_action('init', 'register_faq_post_type');

	function register_faq_category_taxonomy() {
		$labels = array(
			'name'              => __('FAQ Categories', THEME_SLUG),
			'singular_name'     => __('FAQ Category', THEME_SLUG),
			'search_items'      => __('Search FAQ Categories', THEME_SLUG),
			'all_items'         => __('All FAQ Categories', THEME_SLUG),
			'edit_item'         => __('Edit FAQ Category', THEME_SLUG),
			'update_item'       => __('Update FAQ Category', THEME_SLUG),
			'add_new_item'      => __('Add New FAQ Category', THEME_SLUG),
			'new_item_name'     => __('New FAQ Category Name', THEME_SLUG),
			'menu_name'         => __('FAQ Categories', THEME_SLUG),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'faq-category'),
		);

		register_taxonomy('faq_category', 'faq', $args);
	}
	add_action('init', 'register_faq_category_taxonomy');
