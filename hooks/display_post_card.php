<?php function display_post_card( $post_id ) {
	if ( ! $post_id ) {
		return;
	}

	$title   = get_the_title( $post_id );
	$excerpt = get_the_excerpt( $post_id );
	$content = get_the_content( null, false, $post_id );
	$thumb   = get_the_post_thumbnail( $post_id, 'full' );
	$photo   = get_field( 'image', $post_id );
	$name    = get_field( 'name', $post_id );
	$time    = get_field( 'time', $post_id ); ?>

	<a href="<?= esc_url( get_permalink($post_id) );?>" class="post-card">
		<?php if ( $thumb ) : ?>
			<div class="post-card__thumb">
				<?php echo $thumb; ?>
			</div>
		<?php endif; ?>

		<div class="post-card__body">
			<span class="h4"><?= $title; ?></span>

			<div class="post-card__row">
				<span class="post-card__coll">
					<?= display_image( $photo, 24, 24, 'post-card__photo' ); ?>
					<?= $name; ?>
				</span>

				<span class="post-card__coll">
					<i class="icon-timer"></i>
					<?= $time; ?>
				</span>
			</div>

			<p><?= $excerpt; ?></p>
		</div>
	</a>
	<?php
}
