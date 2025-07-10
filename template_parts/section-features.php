<?php
	$shower  = get_sub_field( 'shower' );
    $editor      = get_sub_field('editor');
	$list   = get_sub_field( 'list' );

	if ( ! $shower ) : ?>
        <section class="section-features" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-features__inner">
                    <?php if (!empty($editor)) : ?>
                        <div class="editor">
                            <?= $editor; ?>
                        </div>
                    <?php endif; ?>

                      <ul class="section-features__list">
                    <?php foreach ( $list as $index => $item ) :
                        $icon = $item['icon'];
                        $title = $item['title'];
                        $text = $item['text']; ?>
                      
                            <li class="section-features__item">
                                <?= display_image( $icon, 27, 36, 'section-features__icon' ); ?>

                                <div class="section-features__wrapp">
                                        <?php if ( $title ) : ?>
                                            <span class="section-features__title pretitle"><?= $title; ?></span>
                                        <?php endif; ?>

                                        <?php if ( $text ) : ?>
                                            <p class="section-features__text"><?= $text; ?></p>
                                        <?php endif; ?>
                                </div>
                            </li>
                    
                    <?php endforeach; ?>
                        </ul>
                </div>
            </div>
        </section>

	<?php endif; ?>



