<?php
    $shower  = get_sub_field('shower');
    $editor  = get_sub_field('editor');
    $gallery = get_sub_field('gallery');

    if (!$shower && !empty($gallery)) : ?>
        <section class="section-gallery" <?php if (get_sub_field('section_id')) : ?> id="<?php echo esc_attr(get_sub_field('section_id')); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-gallery__inner">
                    <?php if (!empty($editor)) : ?>
                        <div class="editor">
                            <?= $editor; ?>
                        </div>
                    <?php endif; ?>

                    <div class="main-slider mode" data-slider="single">
                        <div class="swiper-container">
                            <ul class="swiper-wrapper">
                                <?php foreach ($gallery as $image) : ?>
                                    <li class="swiper-slide">
                                        <a href="<?= esc_url($image['url']); ?>" data-fancybox="gallery">
                                            <?= wp_get_attachment_image($image['ID'], 'full', false, ['alt' => esc_attr($image['alt'])]); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <span class="slider-pagination"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
