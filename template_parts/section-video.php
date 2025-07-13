<?php
$shower  = get_sub_field('shower');
$editor = get_sub_field('editor');
$media_content  = get_sub_field('media_content');

$media_switcher = $media_content['media_switcher'] ?? false;
$image          = $media_content['image'] ?? null;
$poster         = $media_content['poster'] ?? null;
$video_link     = $media_content['video_link'] ?? null;

if (! $shower) : ?>
    <section class="section-video" <?php if (get_sub_field('section_id')) : ?> id="<?php echo get_sub_field('section_id'); ?>" <?php endif; ?>>
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
                            <i class="sprite">
                                <svg width="98" height="110" viewBox="0 0 98 110" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M93.75 49.2265C98.1945 51.7925 98.1944 58.2075 93.75 60.7735L10.625 108.766C6.18054 111.332 0.624995 108.124 0.624995 102.992L0.624999 7.00774C0.624999 1.87574 6.18056 -1.33175 10.625 1.23425L93.75 49.2265Z" fill="#FDFDFD" />
                                </svg>
                            </i>
                        </button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>