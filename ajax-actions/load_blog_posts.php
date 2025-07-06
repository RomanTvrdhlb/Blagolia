<?php
	add_action( 'wp_ajax_get_blog_posts', 'ajax_get_blog_posts' );
	add_action( 'wp_ajax_nopriv_get_blog_posts', 'ajax_get_blog_posts' );

	function ajax_get_blog_posts() {
		if ( empty( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'ajax_global' ) ) {
			wp_send_json_error( [ 'message' => 'Invalid nonce' ] );
		}

		$order_by = $_POST['orderby'] ?? 'date';
		$order    = $_POST['order'] ?? 'DESC';
		$search   = $_POST['search'] ?? '';
		$page     = $_POST['page'] ?? 1;
		$category = $_POST['category'] ?? '';

		$tags = $_POST['tags'] ?? [];

		if ( is_string( $tags ) ) {
			$tags = array_filter(array_map( 'trim', explode( ',', $tags )));
		}

		if ( is_array( $tags ) && ! empty( $tags ) ) {
			$tax_query[] = [
				'taxonomy' => 'blog_tag',
				'field'    => 'slug',
				'terms'    => $tags,
				'operator' => 'IN',
			];
		}

		$args = [
			'post_type'      => 'blog',
			'posts_per_page' => 8,
			'paged'          => $page,
			'orderby'        => $order_by,
			'order'          => $order,
			's'              => $search,
		];

		$tax_query = [];

		if ( ! empty( $tags ) ) {
			$tax_query[] = [
				'taxonomy' => 'blog_tag',
				'field'    => 'slug',
				'terms'    => is_array( $tags ) ? $tags : [ $tags ],
				'operator' => 'IN',
			];
		}

		if ( ! empty( $category ) ) {
			$tax_query[] = [
				'taxonomy' => 'blog_category',
				'field'    => 'slug',
				'terms'    => [ $category ],
			];
		}

		if ( ! empty( $tax_query ) ) {
			$args['tax_query'] = [
				'relation' => 'AND',
				...$tax_query,
			];
		}

		$query = new WP_Query( $args );

		ob_start();
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				display_post_card( get_the_ID() );
			}
		} else {
			echo '<p>No posts found.</p>';
		}
		$html = ob_get_clean();

		wp_send_json_success( [
			'html' => $html,
			'max'  => $query->max_num_pages,
		] );

		wp_die();
	}
