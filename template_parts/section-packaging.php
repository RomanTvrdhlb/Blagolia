<?php
	$shower  = get_sub_field( 'shower' );
    $editor      = get_sub_field('editor');
	$list   = get_sub_field( 'list' );

	if ( ! $shower ) : ?>
        <section class="section-packaging" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-team__inner">
                    <?php if (!empty($editor)) : ?>
                        <div class="editor">
                            <?= $editor; ?>
                        </div>
                    <?php endif; ?>

                    <?php foreach ( $list as $index => $item ) :
                        $icon = $item['icon'];
                        $title = $item['title'];
                        $text = $item['text']; ?>
                        <ul class="list">
                            <li class="list__item">
                                <?= display_image( $icon, 27, 36, 'list__item-icon' ); ?>

                                <div class="list__item">
                                    <div class="list__item">
                                        <?php if ( $title ) : ?>
                                            <span class="list__item-title"><?= $title; ?></span>
                                        <?php endif; ?>

                                        <?php if ( $text ) : ?>
                                            <span class="list__item-text"><?= $text; ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

	<?php endif; ?>



