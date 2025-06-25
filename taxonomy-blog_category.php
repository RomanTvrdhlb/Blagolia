<?php get_header();

	$term = get_queried_object();
	$slug = $term->slug;
	$category = $term->term_id;

	$order    = 'DESC';
	$order_by = 'date';
	$sort     = $_GET['sort'] ?? '';
	$search   = $_GET['s'] ?? '';

	if ( $sort === 'oldest' ) {
		$order = 'ASC';
	} elseif ( $sort === 'title_asc' ) {
		$order    = 'ASC';
		$order_by = 'title';
	} elseif ( $sort === 'title_desc' ) {
		$order    = 'DESC';
		$order_by = 'title';
	}

	$posts = new WP_Query( [
		'post_type'      => 'blog',
		'posts_per_page' => 8,
		'paged'          => get_query_var( 'paged' ) ?: 1,
		'orderby'        => $order_by,
		'order'          => $order,
		's'              => $search,
		'tax_query'      => [
			[
				'taxonomy' => 'blog_category',
				'field'    => 'term_id',
				'terms'    => $category,
			],
		],
	] );

	$tag_ids = [];

	if ( $posts->have_posts() ) {
		while ( $posts->have_posts() ) {
			$posts->the_post();
			$post_tags = wp_get_post_terms( get_the_ID(), 'blog_tag', [ 'fields' => 'ids' ] );
			$tag_ids   = array_merge( $tag_ids, $post_tags );
		}
		wp_reset_postdata();
	}

	$tag_ids = array_unique( $tag_ids );

	$tags = ! empty( $tag_ids ) ? get_terms( [
		'taxonomy'   => 'blog_tag',
		'hide_empty' => true,
		'include'    => $tag_ids,
	] ) : [];


	global $wp_query;
	$temp_query = $wp_query;
	$wp_query   = $posts;

	$current = max( 1, get_query_var( 'paged' ) );
	$max     = $posts->max_num_pages;

?>

	<section class="blog-section" data-current-category="<?= esc_attr( $slug ) ?>">

        <div class="container">
			<?php get_breadcrumbs();  ?>
        </div>

		<div class="container">
			<h1 class='blog-section__title'><?=  $term->name?></h1>

			<div class="blog-section__inner">
				<?php get_template_part('components/sort-bar', null, [
					'search' => $search,
					'sort'   => $sort
				]); ?>

				<div class="blog-posts" data-loader="false">
					<?php if ( $posts->have_posts() ) : ?>
						<?php while ( $posts->have_posts() ) : $posts->the_post();
							display_post_card( get_the_ID() );
						endwhile; ?>
					<?php else : ?>
						<li>No posts found.</li>
					<?php endif; ?>
				</div>

				<div class="pagination-wrapper">
					<?php if ( $max > 1 ): ?>
						<div class="pagination">
							<?php if ( $current > 1 ): ?>
								<button class="pagination__item pagination__prev" data-direction="prev">
									<span class="icon-prev"></span>
									<?= __( 'Prev', THEME_SLUG ) ?>
								</button>
							<?php endif; ?>

							<?php for ( $i = 1; $i <= $max; $i++ ): ?>
								<button class="pagination__item <?= $i === $current ? 'active' : '' ?>" data-page="<?= $i ?>"><?= $i ?></button>
							<?php endfor; ?>

							<?php if ( $current < $max ): ?>
								<button class="pagination__item pagination__next" data-direction="next">
									<?= __( 'Next', THEME_SLUG ) ?>
									<span class="icon-next"></span>
								</button>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
				

				<?php get_template_part('components/side-bar', null, [
					'tags'   => $tags,
					'search' => $search
				]); ?>
			</div>
		</div>
	</section>

<?php
	$wp_query = $temp_query;
	wp_reset_postdata();
	get_footer();
