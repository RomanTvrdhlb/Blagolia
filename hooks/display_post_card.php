<?php function display_post_card($post_id)
{
	if (! $post_id) {
		return;
	}

	$title   = get_the_title($post_id);
	$excerpt = get_the_excerpt($post_id);
	$thumb   = get_the_post_thumbnail($post_id, 'full'); ?>

	<div class="post-card">
		<?php if ($thumb) : ?>
			<div class="post-card__thumb">
				<?php echo $thumb; ?>
			</div>
		<?php endif; ?>

		<div class="post-card__body">
			<span class="post-card__title"><?= $title; ?></span>

			<span class="post-card__date"><?php echo get_the_date('d.m.Y', $post_id); ?></span>
			<p class="post-card__excerpt"><?php echo esc_html($excerpt); ?></p>

			<a class="main-button" href="<?= esc_url(get_permalink($post_id)); ?>">Read more</a>
		</div>
	</div>
<?php }
