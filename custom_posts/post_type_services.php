<?php
	add_action('init', function () {
		$post_type = 'services';

		$labels = [
			'name'               => __('Services', THEME_SLUG),
			'singular_name'      => __('Service', THEME_SLUG),
			'menu_name'          => __('Services', THEME_SLUG),
			'name_admin_bar'     => __('Service', THEME_SLUG),
			'add_new'            => __('Add New', THEME_SLUG),
			'add_new_item'       => __('Add New Service', THEME_SLUG),
			'new_item'           => __('New Service', THEME_SLUG),
			'edit_item'          => __('Edit Service', THEME_SLUG),
			'view_item'          => __('View Service', THEME_SLUG),
			'all_items'          => __('All Services', THEME_SLUG),
			'not_found'          => __('No services found.', THEME_SLUG),
			'not_found_in_trash' => __('No services found in Trash.', THEME_SLUG),
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => true,
			'has_archive'        => false,
			'rewrite'            => ['slug' => 'services'],
			'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
			'taxonomies'         => ['services_category'],
			'menu_icon'          => 'dashicons-hammer',
		];

		register_post_type($post_type, $args);
	});

	add_action('init', function () {
		$taxonomy = 'services_category';

		$labels = [
			'name'              => __('Service Categories', THEME_SLUG),
			'singular_name'     => __('Service Category', THEME_SLUG),
			'search_items'      => __('Search Categories', THEME_SLUG),
			'all_items'         => __('All Categories', THEME_SLUG),
			'parent_item'       => __('Parent Category', THEME_SLUG),
			'parent_item_colon' => __('Parent Category:', THEME_SLUG),
			'edit_item'         => __('Edit Category', THEME_SLUG),
			'update_item'       => __('Update Category', THEME_SLUG),
			'add_new_item'      => __('Add New Category', THEME_SLUG),
			'new_item_name'     => __('New Category Name', THEME_SLUG),
			'menu_name'         => __('Categories', THEME_SLUG),
		];

		$args = [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'rewrite'           => ['slug' => 'services-category'],
		];

//		register_taxonomy($taxonomy, ['services'], $args);
	});

