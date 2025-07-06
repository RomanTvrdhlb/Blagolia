<?php /* Template Name: Archive Blog */ ?>
<?php get_header();
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
	] );

	$categories = get_terms( [
		'taxonomy'   => 'blog_category',
		'hide_empty' => true,
	] );

	$tags = get_terms( [
		'taxonomy'   => 'blog_tag',
		'hide_empty' => true,
	] );


	global $wp_query;
	$temp_query = $wp_query;
	$wp_query   = $posts;

	$current = max( 1, get_query_var( 'paged' ) );
	$max     = $posts->max_num_pages;


	$postsSlider   = get_field( 'posts' );
	$editors   = get_field( 'editors' );
?>

    <section class="archive-blog">

        <div class="container">
			<?php get_breadcrumbs();  ?>
        </div>

        <div class="container">
			<div class="archive-blog__inner">
				<?php if ($editors) {
					display_editor_blocks( $editors );
                } ?>

				<div class="swiper-container">
					<?php if ( $postsSlider ) : ?>
						<div class="swiper-wrapper">
							<?php foreach ( $postsSlider as $post_id ) : ?>
								<div class="swiper-slide">
									<?= display_post_card( $post_id );?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
        </div>
    </section>



    <section class="blog-section">
        <div class="container">

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

				<?php get_template_part('components/side-bar', null, [
					'tags'   => $tags,
					'search' => $search
				]); ?>

				 <div class="pagination-wrapper">
					<?php if ( $max > 1 ): ?>
						<div class="pagination">

							<?php if ( $current > 1 ): ?>
								<button class="pagination__item pagination__prev" data-direction="prev">
									<span class="icon-prev"></span>
									<?= __('Prev', THEME_SLUG)?>
								</button>
							<?php endif; ?>

							<?php for ( $i = 1; $i <= $max; $i ++ ): ?>
								<button class="pagination__item <?= $i === $current ? 'active' : '' ?>"
										data-page="<?= $i ?>"><?= $i ?></button>
							<?php endfor; ?>

							<?php if ( $current < $max ): ?>
								<button class="pagination__item pagination__next" data-direction="next">
									<?= __('Next', THEME_SLUG)?>
									<span class="icon-next"></span>
								</button>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>

            </div>
        </div>
    </section>

    <?php


	$wp_query = $temp_query;
	wp_reset_postdata();

	get_footer();
