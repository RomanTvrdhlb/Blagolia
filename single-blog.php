<?php
get_header();

$post_id = get_the_ID();

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
		<section <?php post_class('section-single'); ?>>
			<div class="section-single__hero">
				<div class="section-single__thumb">
					<?php
					if (has_post_thumbnail()) {
						the_post_thumbnail('full', array('loading' => 'lazy'));
					}
					?>
				</div>

				<h1 class="section-single__title"><?php the_title(); ?></h1>
			</div>

			<div class="container">
				<?php get_breadcrumbs(); ?>
			</div>

			<div class="container">
				<div class="section-single__inner">
					<div class="section-single__content editor">
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
if (have_rows('post_builder', $post_id)) {
	while (have_rows('post_builder', $post_id)) {
		the_row();
		get_template_part('template_parts/' . str_replace('_', '-', get_row_layout()));
	}
}
?>

<section class="section-related">
	<div class="container">
		<div class="section-related__wrapp">
			<div class="section-related__top">
				<span class="section-related__title">all products</span>

				<div class="product-controls slider-controls">
					<button class="slider-btn prev">
						<i class="sprite">
							<svg width="16" height="16" viewBox="0 0 6 10" fill="none">
								<path d="M2.06641 5.47329C2.00393 5.41132 1.95433 5.33758 1.92048 5.25634C1.88664 5.1751 1.86921 5.08797 1.86921 4.99996C1.86921 4.91195 1.88664 4.82481 1.92048 4.74357C1.95433 4.66233 2.00393 4.5886 2.06641 4.52663L5.12641 1.47329C5.1889 1.41132 5.23849 1.33758 5.27234 1.25634C5.30619 1.1751 5.32361 1.08797 5.32361 0.999959C5.32361 0.911951 5.30619 0.824814 5.27234 0.743574C5.23849 0.662335 5.1889 0.588601 5.12641 0.526625C5.0015 0.402458 4.83253 0.332764 4.65641 0.332764C4.48029 0.332764 4.31132 0.402458 4.18641 0.526625L1.12641 3.58663C0.751876 3.96163 0.541504 4.46996 0.541504 4.99996C0.541504 5.52996 0.751876 6.03829 1.12641 6.41329L4.18641 9.47329C4.31058 9.59645 4.47818 9.66589 4.65308 9.66663C4.74082 9.66713 4.82779 9.65032 4.90902 9.61714C4.99024 9.58396 5.06412 9.53508 5.12641 9.47329C5.1889 9.41132 5.23849 9.33758 5.27234 9.25634C5.30619 9.1751 5.32361 9.08797 5.32361 8.99996C5.32361 8.91195 5.30619 8.82481 5.27234 8.74357C5.23849 8.66233 5.1889 8.5886 5.12641 8.52663L2.06641 5.47329Z" fill="#313131" />
							</svg>
						</i>
					</button>
					<button class="slider-btn next">
						<i class="sprite">
							<svg width="16" height="16" viewBox="0 0 6 10" fill="none">
								<path d="M2.06641 5.47329C2.00393 5.41132 1.95433 5.33758 1.92048 5.25634C1.88664 5.1751 1.86921 5.08797 1.86921 4.99996C1.86921 4.91195 1.88664 4.82481 1.92048 4.74357C1.95433 4.66233 2.00393 4.5886 2.06641 4.52663L5.12641 1.47329C5.1889 1.41132 5.23849 1.33758 5.27234 1.25634C5.30619 1.1751 5.32361 1.08797 5.32361 0.999959C5.32361 0.911951 5.30619 0.824814 5.27234 0.743574C5.23849 0.662335 5.1889 0.588601 5.12641 0.526625C5.0015 0.402458 4.83253 0.332764 4.65641 0.332764C4.48029 0.332764 4.31132 0.402458 4.18641 0.526625L1.12641 3.58663C0.751876 3.96163 0.541504 4.46996 0.541504 4.99996C0.541504 5.52996 0.751876 6.03829 1.12641 6.41329L4.18641 9.47329C4.31058 9.59645 4.47818 9.66589 4.65308 9.66663C4.74082 9.66713 4.82779 9.65032 4.90902 9.61714C4.99024 9.58396 5.06412 9.53508 5.12641 9.47329C5.1889 9.41132 5.23849 9.33758 5.27234 9.25634C5.30619 9.1751 5.32361 9.08797 5.32361 8.99996C5.32361 8.91195 5.30619 8.82481 5.27234 8.74357C5.23849 8.66233 5.1889 8.5886 5.12641 8.52663L2.06641 5.47329Z" fill="#313131" />
							</svg>
						</i>
					</button>
				</div>
			</div>

			<div class="products-slider">
				<div class="swiper-container">
					<ul class="swiper-wrapper">
						<?php
						$related_query = new WP_Query(array(
							'post_type'      => 'blog',
							'posts_per_page' => -1,
							'post__not_in'   => array(get_the_ID()),
						));

						if ($related_query->have_posts()) :
							while ($related_query->have_posts()) : $related_query->the_post(); ?>
								<li class="swiper-slide">
									<?php display_post_card(get_the_ID()); ?>
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