<?php
	$shower  = get_sub_field( 'shower' );
	$editor = get_sub_field( 'editor' );


	if ( ! $shower ) : ?>
        <section class="section-global" <?php if ( get_sub_field( 'section_id' ) ) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-form__wrapp">
                    <?php if (!empty($editor)) : ?>
                        <div class="editor">
                            <?= $editor; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
	<?php endif; ?>




