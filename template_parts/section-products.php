<?php
    $shower      = get_sub_field('shower');
    $editor      = get_sub_field('editor');
    $products       = get_sub_field('products');
    $link        = get_sub_field('link');

    if (!$shower) : ?>
        <section class="section-products">
            <div class="container">
                <div class="section-products__wrapp">
                    <?php if (!empty($editor)) : ?>
                        <div class="editor">
                            <?= $editor; ?>
                        </div>
                    <?php endif; ?>

                    <div class="section-products__top">
                        <span>all products</span>

                        <div class="section-products__controls">
                            <button class="slider-btn prev">
                                <?php sprite(32, 32, 'ArrowLeft') ?>
                            </button>
                            <button class="slider-btn next">
                                <?php sprite(32, 32, 'ArrowRight') ?>
                            </button>
                        </div>
                    </div>

                    <?php if (!empty($products)) : ?>
                        <div class="section-products__slider">
                            <div class="swiper-container">
                                <ul class="swiper-wrapper">
                                    <?php foreach ($products as $product_id) : ?>
                                        <li class="swiper-slide">
                                            <?php display_product_card($product_id); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($link) :
                            $link_url    = $link['url'];
                            $link_title  = $link['title'];
                            $link_target = $link['target'] ?: '_self';
                        ?>
                            <a class="button button--yellow" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>">
                                <?= esc_html($link_title); ?>
                            </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
