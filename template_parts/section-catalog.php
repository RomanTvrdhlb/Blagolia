<?php
	$shower  = get_sub_field( 'shower' );
	$editor = get_sub_field( 'editor' );


	if ( ! $shower ) : ?>

        <section class="section-catalog" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <?php if ( ! empty( $editor ) ) : ?>
                    <div class="editor">
                        <?= $editor; ?>
                    </div>
                <?php endif; ?>

                <ul class="section-catalog__items">
                    <li>
                        Пили сюда хардкодом li, я на карточку поменяю
                    </li>
                </ul>
            </div>
        </section>

	<?php endif; ?>



