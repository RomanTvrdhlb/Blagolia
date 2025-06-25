<?php
	$shower  = get_sub_field( 'shower' );
	$teams   = get_sub_field( 'team' );
	$editors = get_sub_field( 'editors' );

	if ( ! $shower ) : ?>

        <section class="section-team" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-team__inner">

					<?= display_editor_blocks( $editors ); ?>

                    <ul class="team-list">
						<?php foreach ( $teams as $index => $team ) :
							$image = $team['image'];
							$name = $team['name'];
							$text = $team['text'];
							$contact = $team['contact']; ?>

                            <li class="team-list__item">
								<?= display_image( $image, 220, 320, 'team-list__image' ); ?>

                                <div class="team-list__info">
                                    <div class="team-list__row">
										<?php if ( $name ) : ?>
                                            <span class="team-list__name"><?= $name; ?></span>
										<?php endif; ?>

										<?php if ( $text ) : ?>
                                            <span class="team-list__text"><?= $text; ?></span>
										<?php endif; ?>
                                    </div>

									<?= display_icon_link_list( $contact, 'team-social', true ) ?>
                                </div>
                            </li>
						<?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>

	<?php endif; ?>



