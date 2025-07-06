<?php
get_header();

$post_id = get_the_ID();

if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>
		<section <?php post_class( 'section-blog' ); ?>>
			<div class="section-blog__hero">
				<div class="section-blog__thumb">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'full', array( 'loading' => 'lazy' ) );
					}
					?>
				</div>

				<h1 class="section-blog__title"><?php the_title(); ?></h1>
			</div>

			<div class="container">
				<?php get_breadcrumbs(); ?>
			</div>

			<div class="container">
				<div class="section-blog__inner">
					<div class="section-blog__content editor">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile;
endif;
?>

<?php
// ACF Flexible Content: post_builder
if ( have_rows( 'post_builder', $post_id ) ) {
	while ( have_rows( 'post_builder', $post_id ) ) {
		the_row();
		get_template_part( 'template_parts/' . str_replace( '_', '-', get_row_layout() ) );
	}
}
?>

<section class="section-related">
	<div class="container">
		<div class="section-related__wrapp">
			<div class="section-related__top">
				<span>Read next</span>

				<div class="section-related__controls">
					<button class="slider-btn prev">
						<?php sprite(32, 32, 'ArrowLeft') ?>
					</button>
					<button class="slider-btn next">
						<?php sprite(32, 32, 'ArrowRight') ?>
					</button>
				</div>
			</div>

			<div class="section-related__slider">
				<div class="swiper-container">
					<ul class="swiper-wrapper">
						<?php
						$related_query = new WP_Query( array(
							'post_type'      => 'blog',
							'posts_per_page' => -1, 
							'post__not_in'   => array( get_the_ID() ), 
						) );

						if ( $related_query->have_posts() ) :
							while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
								<li class="swiper-slide">
									<?php display_post_card( get_the_ID() ); ?>
								</li>
							<?php endwhile;
							wp_reset_postdata();
						else : ?>
							<p>No related posts found.</p>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>
