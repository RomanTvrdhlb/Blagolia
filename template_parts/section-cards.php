<?php
	$shower  = get_sub_field( 'shower' );
	$editors = get_sub_field( 'editors' );
	$list   = get_sub_field( 'list' );
	$bg   = get_sub_field( 'background' );

	if ( ! $shower ) : ?>

        <section class="section-cards" style='--bg-color:<?=$bg;?>'>
            <div class="container">
                <div class="section-cards__inner">
					<?= display_editor_blocks( $editors );

                    if ( $list ) : ?>
                        <ul class="section-cards__list">
                            <?php foreach ( $list as $item ) : ?>
                                <li class="section-cards__item editor">
                                    <?= $item['editor'];?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </section>

	<?php endif; ?>



