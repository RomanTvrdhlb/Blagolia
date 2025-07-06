<?php
$shower  = get_sub_field( 'shower' );
$editor = get_sub_field( 'editor' );

if ( ! $shower ) : ?>

<section class="section-certificates" <?php if (get_sub_field( 'section_id' )) : ?> id="<?php echo esc_attr(get_sub_field( 'section_id' )); ?>" <?php endif; ?>>
    <div class="container">
        <div class="section-certificates__inner">
            <?php if ( !empty($editor) ) : ?>
                <div class="editor">
                    <?= $editor; ?>
                </div>
            <?php endif; ?>

            <?php
            $certificates_query = new WP_Query( array(
                'post_type'      => 'certificates',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
            ) );
            if ( $certificates_query->have_posts() ) : ?>
                <ul class="section-certificates__items">
                    <?php while ( $certificates_query->have_posts() ) : $certificates_query->the_post(); ?>
                        <li>
                            <div class="certificate">
                                <div class="certificate__thumb">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'medium' ); ?>
                                    <?php endif; ?>
                                </div>
                                <span class="certificate__title"><?php the_title(); ?></span>
                                <p class="certificate__excerpt"><?php the_excerpt(); ?></p>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>No certificates found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php endif; ?>
