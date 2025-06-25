<?php
	$shower  = get_sub_field( 'shower' );
	$editors = get_sub_field( 'editors' );
	$posts   = get_sub_field( 'posts' );

	if ( ! $shower ) : ?>

        <section class="section-info" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-info__inner">
                    <?php if ($editors) {
						display_editor_blocks( $editors );
                    }

                    if ( $posts ) : ?>
                        <ul class="section-info__list">
                            <?php foreach ( $posts as $post_id ) : ?>
                                <li class="section-info__item">
                                    <?= display_services_card( $post_id );?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </section>

	<?php endif; ?>



