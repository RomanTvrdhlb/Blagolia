<?php
	$shower  = get_sub_field( 'shower' );
	$editors = get_sub_field( 'editors' );
	$list   = get_sub_field( 'list' );

	if ( ! $shower ) : ?>

        <section class="section-choose">
            <div class="container">
                <div class="section-choose__inner">
					<?= display_editor_blocks( $editors );

                    if ( $list ) : ?>
                       <ul class="section-choose__list">
                            <?php foreach ( $list as $item ) : 
                                $link = $item['link'];
                                $background = $item['background'];
                                $editor = $item['editor'];
                                $url = $link['url'] ?? null;
                                $target = $link['target'] ?? '';
                                $target_attr = $target ? ' target="' . esc_attr($target) . '" rel="noopener noreferrer"' : '';
                            ?>
                                <li class="section-choose__item" style='--bg-color:<?= esc_attr($background); ?>'>
                                    <div class="editor">
                                        <?= $editor; ?>
                                    </div>

                                    <?php if ( $url ) : ?>
                                        <a href="<?= esc_url($url); ?>" class="section-choose__link"<?= $target_attr; ?>></a>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                    <?php endif; ?>
                </div>
            </div>
        </section>

	<?php endif; ?>



