<?php
	$shower  = get_sub_field( 'shower' );
	$content = get_sub_field( 'content' );


	if ( ! $shower ) : ?>
        <section class="section-recent" <?php if ( get_sub_field( 'section_id' ) ) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                related products
            </div>
        </section>
	<?php endif; ?>




