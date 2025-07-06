<?php
	$shower  = get_sub_field( 'shower' );
	$editor = get_sub_field( 'editor' );

	if ( ! $shower ) : ?>

        <section class="section-info" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-info__inner">
					<div class="editor">
                        <?=$editor?>
                    </div>


                </div>
            </div>
        </section>

	<?php endif; ?>