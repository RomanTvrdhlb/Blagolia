<?php
get_header();

$post_id = get_the_ID();

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
		<section <?php post_class('section-product'); ?>>
			<div class="container">
				<?php get_breadcrumbs(); ?>

				<div class="section-product__box">
					<div class="section-product__thumb">
						<?php
						if (has_post_thumbnail()) {
							the_post_thumbnail('full', array('loading' => 'lazy'));
						}
						?>
					</div>

					<div class="section-product__info editor">
						<?php
							$editor = get_field('editor', $post_id);
							if ($editor) {
								echo $editor;
							}
						?>
					</div>
				</div>
			</div>
		</section>
<?php endwhile;
endif;
?>

<?php
// ACF Flexible Content: builder
if (have_rows('builder', $post_id)) {
	while (have_rows('builder', $post_id)) {
		the_row();
		get_template_part('template_parts/' . str_replace('_', '-', get_row_layout()));
	}
}
?>

<?php get_footer(); ?>