<?php
	// ==== ПЕРЕМЕННЫЕ ====
	$post_type = 'blog';
	$taxonomy_category = 'blog_category';
	$taxonomy_tag = 'blog_tag';

	// Регистрируем CPT "Blog"
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
			'supports'           => ['title','thumbnail', 'excerpt', 'custom-fields','comments'],
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


	add_action('init', function() {
		remove_post_type_support('blog', 'editor');
	});




	// Формируем ссылки для постов Blog
	add_filter('post_type_link', function ($post_link, $post) {
		global $post_type, $taxonomy_category;
		if ($post->post_type !== $post_type) return $post_link;
		$terms = get_the_terms($post->ID, $taxonomy_category);
		if (!empty($terms) && !is_wp_error($terms)) {
			$term = $terms[0];
			$slugs = array_map(fn($id) => get_term($id, $taxonomy_category)->slug, array_reverse(get_ancestors($term->term_id, $taxonomy_category)));
			$slugs[] = $term->slug;
			return home_url(user_trailingslashit(implode('/', $slugs) . '/' . $post->post_name));
		}
		return home_url(user_trailingslashit($post->post_name));
	}, 10, 2);


	add_filter('term_link', function ($termlink, $term, $taxonomy) {
		global $taxonomy_category;
		if ($taxonomy !== $taxonomy_category) return $termlink;

		$slugs = array_map(fn($id) => get_term($id, $taxonomy)->slug, array_reverse(get_ancestors($term->term_id, $taxonomy)));
		$slugs[] = $term->slug;

		$archive_page = get_archive_by_post('blog');
		$prefix = $archive_page ? get_page_uri($archive_page) : 'blog';

		return home_url(user_trailingslashit($prefix . '/' . implode('/', $slugs)));
	}, 10, 3);


	add_action('init', function () {
		global $post_type;
		$posts = get_posts([
			'post_type'   => $post_type,
			'post_status' => 'publish',
			'numberposts' => -1,
			'fields'      => 'ids',
		]);
		if (empty($posts)) return;
		$post_slugs = array_map(fn($id) => get_post_field('post_name', $id), $posts);
		$post_regex = implode('|', array_map('preg_quote', $post_slugs));

		add_rewrite_rule('^((?:[^/]+/)*)(' . $post_regex . ')/?$', 'index.php?post_type=' . $post_type . '&name=$matches[2]', 'top');
		add_rewrite_rule('^(' . $post_regex . ')/?$', 'index.php?post_type=' . $post_type . '&name=$matches[1]', 'top');
	});


	add_action('init', function () {
		global $taxonomy_category;
		$terms = get_terms(['taxonomy' => $taxonomy_category, 'hide_empty' => false]);
		if (empty($terms)) return;

		$archive_page = get_archive_by_post('blog');
		$prefix = $archive_page ? get_page_uri($archive_page) : 'blog';

		$term_paths = [];
		foreach ($terms as $term) {
			$slugs = array_map(fn($id) => get_term($id, $taxonomy_category)->slug, array_reverse(get_ancestors($term->term_id, $taxonomy_category)));
			$slugs[] = $term->slug;
			$term_paths[] = implode('/', $slugs);
		}
		$term_regex = implode('|', array_map('preg_quote', $term_paths));

		add_rewrite_tag('%' . $taxonomy_category . '_path%', '([^&]+)');
		add_rewrite_rule('^' . $prefix . '/(' . $term_regex . ')/?$', 'index.php?' . $taxonomy_category . '_path=$matches[1]', 'top');
	});


	// Обрабатываем запросы для blog_category_path
	add_filter('request', function ($query_vars) {
		global $taxonomy_category;
		if (!empty($query_vars[$taxonomy_category . '_path']) && empty($query_vars[$taxonomy_category])) {
			$parts = explode('/', trim($query_vars[$taxonomy_category . '_path'], '/'));
			$slug = array_pop($parts);
			if (term_exists($slug, $taxonomy_category)) {
				$query_vars[$taxonomy_category] = $slug;
			}
			unset($query_vars[$taxonomy_category . '_path']);
		}
		return $query_vars;
	});

	add_filter('pre_comment_approved', function ($approved, $commentdata) {
		return 0;
	}, 99, 2);
