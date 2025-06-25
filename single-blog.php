<?php
	get_header();
	$post_id = get_the_ID();

	$categories = get_the_terms($post_id, 'blog_category');
	$tags       = get_the_terms($post_id, 'blog_tag');
	$prev_post  = get_previous_post();
	$next_post  = get_next_post();

	$post_image  = get_field('post_image');
	$post_editor = get_field('post_editor');
	$name        = get_field('name');
	$photo       = get_field('image');
	$time        = get_field('time');
	$position    = get_field('position');
	$license     = get_field('lic');
	$quote       = get_field('quote');

	$post_anchor = get_field('post_anchor');
	$post_anchor_title = isset($post_anchor['title']) ? $post_anchor['title'] : '';
	$post_anchor_list  = isset($post_anchor['anchor']) ? $post_anchor['anchor'] : [];

	$post_social = get_field('post_social');
	$post_social_title = isset($post_social['title']) ? $post_social['title'] : '';
	$shortcode  = isset($post_social['share']) ? $post_social['share'] : [];


	if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section <?php post_class('section-blog'); ?>>
            <div class="container">
				<?php get_breadcrumbs(); ?>
            </div>
            <div class="container">
                <div class="section-blog__inner">
                    <div class="editor">
						<?= $post_editor; ?>

                        <div class="editor__info">
							<?php if (!empty($name)) : ?>
                                <div class="post-author">
									<?= display_image($photo, 24, 24, 'post-card__photo'); ?>
									<?= $name; ?>
                                </div>
							<?php endif; ?>

                            <time datetime="<?php echo get_the_date('c'); ?>">
                                <i class="icon-calendar"></i>
								<?php echo get_the_date(); ?>
                            </time>

							<?php if (!empty($time)) : ?>
                                <span>
                                    <i class="icon-timer"></i>
                                    <?= $time; ?>
                                </span>
							<?php endif; ?>
                        </div>
                    </div>

					<?= display_image($post_image, 1140, 760, 'section-blog__image'); ?>
                </div>
            </div>
        </section>

	<?php endwhile; endif; ?>

<div class="container">
    <div class="section-wrapper">
        <div class="section-wrapper__coll">
			<?php
				if (have_rows('post_builder', $post_id)) {
					while (have_rows('post_builder', $post_id)) {
						the_row();
						get_template_part('template_parts/' . str_replace('_', '-', get_row_layout()));
					}
				}
			?>
        </div>

        <aside class="section-wrapper__aside">
			<?php if (!empty($post_anchor_title) || !empty($post_anchor_list)) : ?>
                <div class="anchor-tags">
					<?php if (!empty($post_anchor_title)) : ?>
                        <span class='anchor-tags__title'><?= $post_anchor_title; ?></span>
					<?php endif; ?>

					<?php if (!empty($post_anchor_list)) : ?>
						<?= display_icon_link_list($post_anchor_list, 'anchor-list', true); ?>
					<?php endif; ?>
                </div>
			<?php endif; ?>

			<?php if ($shortcode && !empty($post_social_title) || !empty($post_social_list)) : ?>
                <div class="social">
					<?php if ( !empty($post_social_title)) : ?>
                        <span class='social__title'><?= $post_social_title; ?></span>
					<?php endif; ?>

					<?php if ($shortcode) : ?>
						<?= do_shortcode('[addtoany]') ?>
					<?php endif; ?>
                </div>
			<?php endif; ?>

        </aside>
    </div>
</div>

<section class='section-tags'>
    <div class="container">
        <div class="section-tags__inner">

            <div class="written-card">
				<?= display_image($photo, 24, 24, 'post-card__photo'); ?>

                <div class="written-card__box">
					<?php if (!empty($name)) : ?>
                        <span class="post-author">
                                <?= __('Written By', THEME_SLUG); ?><br>
                                <i><?= $name; ?></i>
                            </span>
					<?php endif; ?>

                    <div class="written-card__inner">
						<?php if (!empty($position)) : ?>
                            <span class="written-card__position"><?= $position; ?></span>
						<?php endif; ?>

						<?php if (!empty($license)) : ?>
                            <span class="written-card__license"><?= $license; ?></span>
						<?php endif; ?>
                    </div>

					<?php if (!empty($quote)) : ?>
                        <span class="written-card__quote"><?= $quote; ?></span>
					<?php endif; ?>
                </div>
            </div>

            <div class="section-tags__content">
				<?php if (!empty($categories) && !is_wp_error($categories)) : ?>
                    <div class="section-tags__wrapp">
                            <span class="section-tags__title">
                                <?= __('Categories:', THEME_SLUG); ?>
                            </span>

                        <ul class="section-tags__list">
							<?php foreach ($categories as $cat) : ?>
                                <li><span><?= esc_html($cat->name); ?></span></li>
							<?php endforeach; ?>
                        </ul>
                    </div>
				<?php endif; ?>

				<?php if (!empty($tags) && !is_wp_error($tags)) : ?>
                    <div class="section-tags__wrapp">
                        <span class="section-tags__title"><?= __('Tags:', THEME_SLUG); ?></span>
                        <ul class='section-tags__list'>
							<?php foreach ($tags as $tag) : ?>
                                <li><span><?= esc_html($tag->name); ?></span></li>
							<?php endforeach; ?>
                        </ul>
                    </div>
				<?php endif; ?>
            </div>

            <ul class="post-nav">
                <li class='post-nav__item'>
					<?php if (!empty($prev_post)) : ?>
                        <a class="post-nav__btn" href="<?= esc_url(get_permalink($prev_post->ID)); ?>">
                            <span class="icon-prev"></span>
							<?= __('Older Post', THEME_SLUG); ?>
                            <span class='post-nav__text'><?= esc_html(get_the_title($prev_post->ID)); ?></span>
                        </a>
					<?php endif; ?>
                </li>
                <li class='post-nav__item'>
					<?php if (!empty($next_post)) : ?>
                        <a class="post-nav__btn next" href="<?= esc_url(get_permalink($next_post->ID)); ?>">
							<?= __('Newer post', THEME_SLUG); ?>
                            <span class="icon-next"></span>
                            <span class='post-nav__text'><?= esc_html(get_the_title($next_post->ID)); ?></span>
                        </a>
					<?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</section>

<?php
	if (have_rows('builder', $post_id)) {
		while (have_rows('builder', $post_id)) {
			the_row();
			get_template_part('template_parts/' . str_replace('_', '-', get_row_layout()));
		}
	}

	get_footer();
?>
