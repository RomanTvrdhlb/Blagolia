<?php
	$shower  = get_sub_field( 'shower' );
    $editor      = get_sub_field('editor');
    $image      = get_sub_field('image');

	if ( ! $shower ) : ?>
        <section class="section-contact" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-team__inner">
                    <?php if (!empty($editor)) : ?>
                        <div class="editor">
                            <?= $editor; ?>
                        </div>
                    <?php endif; ?>

                    <div class="section-contact__wrapp">
                        <div class="section-contact__box">
                            Пока не решил как лучше левую часть, можно просто отверстать
                        </div>
                        
                        <?= display_image($image, 460, 500, 'section-contact__image') ?>
                    </div>
                </div>
            </div>
        </section>

	<?php endif; ?>