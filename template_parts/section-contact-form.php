<?php
	$shower  = get_sub_field( 'shower' );
	$map = get_sub_field( 'map' );
	$editor = get_sub_field( 'editor' );

	if ( ! $shower ) : ?>
        <section class="section-contact-form" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <?php if (!empty($map)) : ?>
                <div class="section-cta__map">
                    <iframe src="<?php echo $map; ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            <?php endif; ?>
            
            <div class="container">
                <?php if (!empty($editor)) : ?>
                    <div class="editor">
                        <?= $editor; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
	<?php endif; ?>