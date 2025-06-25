<?php
	$shower  = get_sub_field( 'shower' );
	$tabs    = get_sub_field( 'tabs' );

	if ( ! $shower ) : ?>

        <section class="section-tabs" data-tabs-parent <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-tabs__inner">
                    <ul class="tabs-nav">
                        <?php foreach ( $tabs as $index => $tab ) : ?>
                            <li class="tabs-nav__item">
                                <button class="tabs-nav__btn <?= $index === 0 ? 'active' : '' ?>" type="button"
                                        data-tab="<?= $index + 1 ?>">
                                    <span><?= $tab['tab_name'] ?></span>
                                </button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <ul class="tabs-content">
                        <?php foreach ( $tabs as $index => $tab ) :
                            $image = $tab['tabs_group']['image'][0];
                            $caption = $tab['tabs_group']['editor'];
                            $editor = $tab['editor']; ?>

                            <li class="tabs-content__item <?= $index === 0 ? 'active' : '' ?>"
                                data-tab-content="<?= $index + 1 ?>">
                                <div class="tab-inner">

                                    <div class="tab-inner__image">
                                        <?= display_image( $image, 550, 440 ) ?>

                                        <div class="editor">
                                            <?= $caption; ?>
                                        </div>
                                    </div>

                                    <div class="editor">
                                        <?= $editor; ?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>

	<?php endif; ?>



