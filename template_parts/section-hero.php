<?php
$shower = get_sub_field('shower');
$banners = get_sub_field('banners');


if (!$shower) : ?>

    <section class="swiper-container hero-slider" <?php if (get_sub_field('section_id')) : ?> id="<?php echo get_sub_field('section_id'); ?>" <?php endif; ?>>
        <div class="hero-slider__nav container">
            <button class="prev hero-slider__btn" aria-label="Prev slide"></button>
            <button class="next hero-slider__btn" aria-label="Next Slide"></button>
        </div>

        <?php if ($banners): ?>
            <div class="swiper-wrapper">
                <?php foreach ($banners as $item): ?>
                    <div class="swiper-slide hero-slider__card">
                        <div class="hero-slider__image">
                            <?= display_image($item['image'][0], 1920, 800, 'swiper-slide__bg'); ?>
                        </div>

                        <div class="hero-slider__content container">
                            <div class="hero-slider__wrapp cta-box">
                                <?php
                                if (!empty($item['left']['main_button'])): ?>
                                    <button class="main-button">
                                        <?php echo esc_html($item['left']['main_button']); ?>
                                    </button>
                                <?php endif; ?>

                                <?php
                                $whatsapp = $item['left']['whatsapp_link'] ?? null;
                                if ($whatsapp && !empty($whatsapp['link']['url'])):
                                    $whatsapp_link = $whatsapp['link'];
                                    $whatsapp_icon = $whatsapp['icon'] ?? null;
                                    ?>
                                    <a href="<?php echo esc_url($whatsapp_link['url']); ?>"
                                       target="<?php echo esc_attr($whatsapp_link['target'] ?? '_self'); ?>"
                                       class="whatsapp-btn" aria-label="<?php echo esc_attr($whatsapp_link['title'] ?? 'WhatsApp'); ?>">
                                        <img src="<?php echo esc_url($whatsapp_icon['url']); ?>"
                                             alt="<?php echo esc_attr($whatsapp_icon['alt'] ?? $whatsapp_link['title']); ?>"
                                             width="50" height="50" />
                                    </a>
                                <?php endif; ?>

                                <?php

                                $telegram = $item['left']['telegram_link'] ?? null;
                                if ($telegram && !empty($telegram['link']['url'])):
                                    $telegram_link = $telegram['link'];
                                    $telegram_icon = $telegram['icon'] ?? null;
                                    ?>
                                    <a href="<?php echo esc_url($telegram_link['url']); ?>"
                                       target="<?php echo esc_attr($telegram_link['target'] ?? '_self'); ?>"
                                       class="telegram-btn" aria-label="<?php echo esc_attr($telegram_link['title'] ?? 'Telegram'); ?>">
                                        <img src="<?php echo esc_url($telegram_icon['url']); ?>"
                                             alt="<?php echo esc_attr($telegram_icon['alt'] ?? $telegram_link['title']); ?>"
                                             width="50" height="50" />
                                    </a>
                                <?php endif; ?>

                                <?php
                                if (!empty($item['left']['descr'])): ?>
                                    <p>
                                        <?php echo nl2br(esc_html($item['left']['descr'])); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <span class="hero-slider__content-text">
                                 <?= $item['editor'] ?>
                            </span>
                        </div>


                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>


    </section>

<?php endif; ?>
