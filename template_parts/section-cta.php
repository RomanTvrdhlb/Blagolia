<?php
	$shower  = get_sub_field( 'shower' );
	$editors = get_sub_field( 'editors' );
	$tabs    = get_sub_field( 'tabs' );

	if ( ! $shower ) : ?>

        <section class="section-cta" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-tabs__inner">
					<?php if ( have_rows( 'cta_banners' ) ) :
						while ( have_rows( 'cta_banners' ) ) : the_row();
							$layout = get_row_layout();

							if ( $layout === 'cta_1' ) :
								    $editors   = get_sub_field( 'editors' );
								    $bg_color   = get_sub_field( 'background_color' );
                                ?>

                                <div class="cta-baner" style="--bg-color: <?= $bg_color;?>;">
									<?= display_editor_blocks($editors, 'editors')?>
                                </div>

							<?php endif;

							if ( $layout === 'cta_2' ) : ?>




							<?php endif;

						endwhile;
					endif; ?>
                </div>
            </div>
        </section>

	<?php endif; ?>



