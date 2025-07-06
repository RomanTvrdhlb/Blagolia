<?php
get_header();

$post_id = get_the_ID();

if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>
		<section <?php post_class( 'section-product' ); ?>>
			<div class="container">
				<div class="section-product__inner">
					<?php get_breadcrumbs(); ?>

					<div class="section-product__box">
						<div class="section-blog__thumb">
							<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'full', array( 'loading' => 'lazy' ) );
								}
							?>
						</div>

						<div class="section-prdcuct__info">
							<h1 class="section-blog__title"><?php the_title(); ?></h1>

							<div class="section-blog__content editor">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile;
endif;
?>

<?php
	// ACF Flexible Content: builder
	if ( have_rows( 'builder', $post_id ) ) {
		while ( have_rows( 'builder', $post_id ) ) {
			the_row();
			get_template_part( 'template_parts/' . str_replace( '_', '-', get_row_layout() ) );
		}
	}
?>

<?php get_footer(); ?>