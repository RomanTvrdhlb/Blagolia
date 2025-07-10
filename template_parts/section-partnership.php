<?php
	$shower  = get_sub_field( 'shower' );
    $editor      = get_sub_field('editor');
	$list   = get_sub_field( 'list' );
    $link        = get_sub_field('link');

	if ( ! $shower ) : ?>
        <section class="section-partnership" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-partnership__inner">
                    <?php if (!empty($editor)) : ?>
                        <div class="editor">
                            <?= $editor; ?>
                        </div>
                    <?php endif; ?>

                       <ul class="section-partnership__list">
                    <?php foreach ( $list as $index => $item ) :
                        $icon = $item['icon'];
                        $title = $item['title'];
                        $text = $item['text']; ?>
                     
                            <li class="section-partnership__item">
                                <?= display_image( $icon, 38, 36, 'section-partnership__icon' ); ?>

                                        <?php if ( $title ) : ?>
                                            <span class="pretitle"><?= $title; ?></span>
                                        <?php endif; ?>

                                        <?php if ( $text ) : ?>
                                            <p><?= $text; ?></p>
                                        <?php endif; ?>
                                 
                            </li>
                   
                    <?php endforeach; ?>
                         </ul>

                    <?php if ($link) :
                            $link_url    = $link['url'];
                            $link_title  = $link['title'];
                            $link_target = $link['target'] ?: '_self';
                        ?>
                            <a class="main-button" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>">
                                <?= esc_html($link_title); ?>
                            </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>

	<?php endif; ?>



