<?php
	$shower  = get_sub_field( 'shower' );
	$editor = get_sub_field( 'editor' );

	if ( ! $shower ) : ?>

        <section class="section-cta" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-cta__inner">
                    <?php if (!empty($editor)) : ?>
                        <div class="editor">
                            <?= $editor; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

	<?php endif; ?>