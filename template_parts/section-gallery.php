<?php
	$shower  = get_sub_field( 'shower' );
    $editor      = get_sub_field('editor');
    $gallery      = get_sub_field('gallery');



	if ( ! $shower ) : ?>
        <section class="section-partnership" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-team__inner">
                    <?php if (!empty($editor)) : ?>
                        <div class="editor">
                            <?= $editor; ?>
                        </div>
                    <?php endif; ?>

                    <?php foreach ($gallery as $image) : ?>
                        <div class="section-hero__slider">
                            <div class="swiper-container">
                                <ul class="swiper-wrapper">
                                    <li class="swiper-slide">
                                        <div class="section-hero__slide">
                                            <?= wp_get_attachment_image($image['ID'], 'full'); ?>
                                        </div>
                                    </li>
                                </ul>

                                <span class="swiper-pagination"></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

	<?php endif; ?>



