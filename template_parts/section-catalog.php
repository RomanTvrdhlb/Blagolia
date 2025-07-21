<?php
    $shower   = get_sub_field('shower');
    $editor   = get_sub_field('editor');
    $products = get_sub_field('products'); // Массив ID из relationship-поля
    $section_id = get_sub_field('section_id');

    if ( ! $shower && ! empty( $products ) ) : ?>
        <section class="section-catalog" <?= $section_id ? 'id="' . esc_attr( $section_id ) . '"' : ''; ?>>
            <div class="container">
                <?php get_breadcrumbs(); ?>

                <div class="section-catalog__inner">
                    <?php if ( ! empty( $editor ) ) : ?>
                        <div class="editor">
                            <?= $editor; ?>
                        </div>
                    <?php endif; ?>

                    <ul class="section-catalog__list">
                        <?php foreach ( $products as $product_id ) : ?>
                            <li class="section-catalog__item">
                                <?php display_catalog_card( $product_id ); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>
    <?php endif; ?>
