<?php
	// ==== ПЕРЕМЕННЫЕ ====
	$post_type = 'blog';
	$taxonomy_category = 'blog_category';
	$taxonomy_tag = 'blog_tag';


	function register_blog_post_type() {
		global $post_type, $taxonomy_category, $taxonomy_tag;

		$labels = [
			'name'               => 'Blog',
			'singular_name'      => 'Post',
			'menu_name'          => 'Blog',
			'name_admin_bar'     => 'Post',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New Post',
			'new_item'           => 'New Post',
			'edit_item'          => 'Edit Post',
			'view_item'          => 'View Post',
			'all_items'          => 'All Posts',
			'not_found'          => 'No posts found.',
			'not_found_in_trash' => 'No posts found in Trash.'
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => true,
			'query_var'          => true,
			'rewrite' => [
				'slug' => 'blog',
				'with_front' => false,
			],
			'has_archive'        => false,
			'hierarchical'       => true,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-admin-post',
			'supports'           => ['title','thumbnail', 'editor', 'excerpt', 'custom-fields'],
			'taxonomies'         => [$taxonomy_category, $taxonomy_tag],
		];

		register_post_type($post_type, $args);
	}

	// Регистрируем таксономию "Blog Categories"
	function register_blog_category_taxonomy() {
		global $post_type, $taxonomy_category;

		$labels = [
			'name'              => 'Blog Categories',
			'singular_name'     => 'Blog Category',
			'edit_item'         => 'Edit Category',
			'update_item'       => 'Update Category',
			'add_new_item'      => 'Add New Category',
			'new_item_name'     => 'New Category Name',
			'all_items'         => 'All Categories',
			'parent_item'       => 'Parent Category',
			'parent_item_colon' => 'Parent Category:',
			'search_items'      => 'Search Categories',
			'menu_name'         => 'Categories',
		];

		$args = [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => false,
		];

		register_taxonomy($taxonomy_category, [$post_type], $args);
	}

	// Регистрируем таксономию "Blog Tags"
	function register_blog_tag_taxonomy() {
		global $post_type, $taxonomy_tag;

		$labels = [
			'name'                       => 'Blog Tags',
			'singular_name'              => 'Blog Tag',
			'search_items'               => 'Search Tags',
			'popular_items'              => 'Popular Tags',
			'all_items'                  => 'All Tags',
			'edit_item'                  => 'Edit Tag',
			'update_item'                => 'Update Tag',
			'add_new_item'               => 'Add New Tag',
			'new_item_name'              => 'New Tag Name',
			'separate_items_with_commas' => 'Separate tags with commas',
			'add_or_remove_items'        => 'Add or remove tags',
			'choose_from_most_used'      => 'Choose from the most used tags',
			'menu_name'                  => 'Tags',
		];

		$args = [
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => false,
		];

		register_taxonomy($taxonomy_tag, [$post_type], $args);
	}

	add_action('init', 'register_blog_post_type');
	add_action('init', 'register_blog_category_taxonomy');
	add_action('init', 'register_blog_tag_taxonomy');
