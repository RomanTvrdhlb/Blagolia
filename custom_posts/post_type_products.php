<?php
	add_action( 'init', function () {
		$post_type = 'products';

		$labels = [
			'name'               => __( 'Products', THEME_SLUG ),
			'singular_name'      => __( 'Product', THEME_SLUG ),
			'menu_name'          => __( 'Products', THEME_SLUG ),
			'name_admin_bar'     => __( 'Product', THEME_SLUG ),
			'add_new'            => __( 'Add New', THEME_SLUG ),
			'add_new_item'       => __( 'Add New Product', THEME_SLUG ),
			'new_item'           => __( 'New Product', THEME_SLUG ),
			'edit_item'          => __( 'Edit Product', THEME_SLUG ),
			'view_item'          => __( 'View Product', THEME_SLUG ),
			'all_items'          => __( 'All Products', THEME_SLUG ),
			'not_found'          => __( 'No products found.', THEME_SLUG ),
			'not_found_in_trash' => __( 'No products found in Trash.', THEME_SLUG ),
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => true,
			'menu_position'      => 4,
			'has_archive'        => false,
			'rewrite'            => [ 'slug' => 'products' ],
			'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
			'taxonomies'         => [ 'services_category' ], // или замени на свою таксономию
			'menu_icon'          => 'dashicons-cart',
		];

		register_post_type( $post_type, $args );
	} );
