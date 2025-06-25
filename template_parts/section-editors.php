<?php
	$shower  = get_sub_field( 'shower' );
	$editors = get_sub_field( 'editors' );
	$background_color = get_sub_field( 'background_color' );

	if ( ! $shower ) : ?>

        <section class="section-editors" style="--bg-color:<?= $background_color;?>;" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
				<?= display_editor_blocks( $editors, 'editors' ) ?>
            </div>
        </section>

	<?php endif; ?>



