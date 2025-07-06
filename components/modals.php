<div class="overlay fixed-block" data-overlay>
	<?php $args       = array(
		'post_type'      => 'modals',
		'posts_per_page' => - 1
	);
		$modals_query = new WP_Query( $args );

		if ( $modals_query->have_posts() ) :
			while ( $modals_query->have_posts() ) : $modals_query->the_post(); ?>

				<?php while ( have_rows( 'modals_layout', get_the_ID() ) ) {
					the_row();


					if ( get_row_layout() == 'editors' ) { ?>
                        <div class="modal" data-popup="modal_<?php echo get_the_ID(); ?>">
                            <button class="close modal__close">
								<?php sprite( 14, 14, 'close' ) ?>
                            </button>

                            <div class="modal__container">
								<?= display_editor_blocks( get_sub_field( 'editors' ), 'modal_box editor' ); ?>
                            </div>
                        </div>
					<?php }

					if ( get_row_layout() == 'popup_1' ) { ?>
                        <div class="modal mode" data-popup="modal_<?php echo get_the_ID(); ?>">

                            <div class="modal__container">
                                <div class="modal__top">
                                    <span class="modal__subtitle">
                                        <?= the_title(); ?>
                                    </span>

                                    <button class="close modal__close">
										<?php sprite( 14, 14, 'close' ) ?>
                                    </button>
                                </div>

                                <div class="editor">
									<?= get_sub_field( 'editor' ) ?>
                                </div>

                            </div>
                        </div>
					<?php }


				}

			endwhile;
		endif;
		wp_reset_postdata(); ?>


</div>
