<?php
$shower      = get_sub_field('shower');
$bg_content  = get_sub_field('bg_content');
$editor      = get_sub_field('editor');

$media       = get_sub_field('media_content');
$gallery     = $media['gallery'] ?? [];
$image       = $media['image'] ?? [];

if (!$shower) : ?>
    <?php if ($bg_content && !empty($gallery)) : ?>
        <section class="section-hero mode" <?php if (get_sub_field('section_id')) : ?> id="<?php echo get_sub_field('section_id'); ?>" <?php endif; ?>>

        <?php elseif (!$bg_content && !empty($image)) : ?>
            <section class="section-hero" <?php if (get_sub_field('section_id')) : ?> id="<?php echo get_sub_field('section_id'); ?>" <?php endif; ?>>
            <?php endif; ?>

            <div class="section-hero__bg">
                <?php if ($bg_content && !empty($gallery)) : ?>
                    <div class="section-hero__slider">
                        <div class="swiper-container">
                            <ul class="swiper-wrapper">
                                <?php foreach ($gallery as $image) : ?>
                                    <li class="swiper-slide">
                                        <div class="section-hero__slide">
                                            <?= wp_get_attachment_image($image['ID'], 'full'); ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <span class="slider-pagination"></span>
                        </div>
                    </div>

                <?php elseif (!$bg_content && !empty($image)) : ?>
                    <div class="section-hero__image">
                        <?= wp_get_attachment_image($image['ID'], 'full'); ?>
                    </div>
                <?php endif; ?>

            </div>

            <div class="container">
                <div class="section-hero__wrapp">
                    <?php if (!empty($editor)) : ?>
                        <div class="editor">
                            <?= $editor; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            </section>
        <?php endif; ?>