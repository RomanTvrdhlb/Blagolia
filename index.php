<?php
	get_header();
//	global $productsSlug;

	$post_id = get_the_ID();

//	if (is_post_type_archive('product')) {
//		$product_archive_page = get_page_by_path($productsSlug);
//		$post_id = $product_archive_page ? $product_archive_page->ID : 0;
//	} else {
//
//	}

	if (have_rows('builder', $post_id)) {
		while (have_rows('builder', $post_id)) { the_row();
			get_template_part('template_parts/' . str_replace('_', '-', get_row_layout()));
		}
	}




	get_footer();

