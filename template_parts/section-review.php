<?php
	$shower  = get_sub_field( 'shower' );
	$editors = get_sub_field( 'editors' );
	$posts   = get_sub_field( 'posts' );

	if ( ! $shower ) : ?>

        <section class="section-review" <?php if ( get_sub_field( 'section_id' ) ) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-review__inner">
					<?= display_editor_blocks( $editors );

						if ( $posts ) : ?>
                            <ul class="section-review__list">
								<?php foreach ( $posts as $post_id ) {
									$title    = get_the_title( $post_id );
									$content  = get_the_content( null, false, $post_id );
									$thumb    = get_the_post_thumbnail( $post_id, 'full' );
									$name     = get_field( 'name', $post_id );
									$stars    = get_field( 'stars', $post_id );
									$position = get_field( 'position', $post_id ); ?>

                                    <li class="section-review__card">
                                        <div class="review-card">
                                            <div class="editor">
												<?= sprite( '120', '25', 'Stars' . $stars ) ?>
												<?php echo wpautop( $content ); ?>
                                            </div>

                                            <div class="review-card__bottom">

                                                <div class="review-card__thumb">
													<?php echo $thumb; ?>
                                                </div>

												<?php if ( $name || $position ) : ?>
                                                    <div class="review-card__meta">
														<?php if ( $name ) : ?>
                                                            <span class="review-card__name"><?php echo esc_html( $name ); ?></span>
														<?php endif; ?>
														<?php if ( $position ) : ?>
                                                            <span class="review-card__position"><?php echo esc_html( $position ); ?></span>
														<?php endif; ?>
                                                    </div>
												<?php endif; ?>
                                            </div>
                                        </div>
                                    </li>
									<?php
								} ?>
                            </ul>
						<?php endif; ?>
                </div>
            </div>
        </section>

	<?php endif; ?>



