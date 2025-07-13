<?php
	$shower  = get_sub_field( 'shower' );
	$editor = get_sub_field( 'editor' );
    $image      = get_sub_field('image');


	if ( ! $shower ) : ?>
        <section class="section-global" <?php if ( get_sub_field( 'section_id' ) ) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-global__inner">
                    <?php if (!empty($editor)) : ?>
                        <div class="editor">
                            <?= $editor; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

             <?= display_image($image, 460, 500, 'section-global__image') ?>
        </section>
	<?php endif; ?>




