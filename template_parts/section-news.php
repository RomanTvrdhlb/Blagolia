<?php
	$shower  = get_sub_field( 'shower' );
	$editor = get_sub_field( 'editor' );
	$posts   = get_sub_field( 'posts' );
	
	if ( ! $shower ) : ?>

        <section class="section-news" >
            <div class="container">
                <div class="section-advantage__inner">
					<div class="editor">
                        <?=$editor?>
                    </div>

                    <?php if (!empty($posts)) : ?>
                        <div class="section-products__slider">
                            <div class="swiper-container">
                                <ul class="swiper-wrapper">
                                    <?php foreach ($posts as $post_id) : ?>
                                        <li class="swiper-slide">
                                            <?php display_post_card($post_id); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

	<?php endif; ?>