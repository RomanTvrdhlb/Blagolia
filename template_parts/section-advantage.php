<?php
	$shower  = get_sub_field( 'shower' );
	$editor = get_sub_field( 'editor' );
	$list   = get_sub_field( 'list' );
	
	if ( ! $shower ) : ?>

        <section class="section-advantage" >
            <div class="container">
                <div class="section-advantage__inner">
					<div class="editor">
                        <?=$editor?>
                    </div>
        <?php
                    if ( $list ) : ?>
                        <ul class="section-advantage__list">
                            <?php foreach ( $list as $item ) : ?>
                                <li class="section-advantage__item editor" style='--bg-color:<?= get_sub_field( 'background' );?>'>
                                    <?= $item['editor'];?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </section>

	<?php endif; ?>



