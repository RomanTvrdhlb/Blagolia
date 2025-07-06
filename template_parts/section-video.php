<?php
	$shower  = get_sub_field( 'shower' );
	$editor = get_sub_field( 'editor' );
    $media_content  = get_sub_field('media_content');

    $media_switcher = $media_content['media_switcher'] ?? false;
    $image          = $media_content['image'] ?? null;
    $poster         = $media_content['poster'] ?? null;
    $video_link     = $media_content['video_link'] ?? null;

	if ( ! $shower ) : ?>
        <section class="section-video" <?php if ( get_sub_field( 'section_id' ) ) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-video__wrapp">
                    <?php if (!empty($editor)) : ?>
                        <div class="editor">
                            <?= $editor; ?>
                        </div>
                    <?php endif; ?>

                        <?php if (!$media_switcher && !empty($image)) : ?>
                            <?= display_image($image, 1140, 600, 'section-video__media') ?>

                            <?php elseif ($media_switcher && !empty($poster) && !empty($video_link)) : ?>
                                <a class="section-video__media" data-fancybox="videos" href="<?= esc_url($video_link); ?>" data-video="true">
                                    <?= display_image($poster, 1440, 600, 'section-video__poster') ?>
                                    <button class="section-video__play">
                                        <?php sprite(64, 64, 'Play'); ?>
                                    </button>
                                </a>
                        <?php endif; ?>
                </div>
            </div>
        </section>
	<?php endif; ?>




