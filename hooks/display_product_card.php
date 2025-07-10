<?php function display_product_card( $post_id ) {
	if ( ! $post_id ) {
		return;
	}

	$title   = get_the_title( $post_id );
	$excerpt = get_the_excerpt( $post_id );
	$thumb   = get_the_post_thumbnail( $post_id, 'full' ); ?>

	<div class="product-card">
		<?php if ( $thumb ) : ?>
			<div class="product-card__thumb">
				<?php echo $thumb; ?>
			</div>
		<?php endif; ?>

		<div class="product-card__body">
			<span class="pretitle"><?= $title; ?></span>

			<p><?= $excerpt; ?></p>

			<a class="main-button main-button--transparent" href="<?= esc_url( get_permalink($post_id) );?>">View Product</a>
		</div>
	</div>
	<?php
}
