<?php
	$shower  = get_sub_field( 'shower' );
    $list           = get_sub_field('list');

	if ( ! $shower ) : ?>
        <section class="section-statistics" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <?php if ($list) : ?>
                    <ul class="items-list">
                        <?php foreach ($list as $item) :
                            $title   = $item['title'];
                            $text    = $item['text'];
                        ?>
                            <li class="items-list__box">
                                <?php if ($title) : ?>
                                    <span class="items-list__title"><?= esc_html($title); ?></span>
                                <?php endif; ?>

                                <?php if ($text) : ?>
                                    <p class="items-list__text"><?= esc_html($text); ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </section>
	<?php endif; ?>



