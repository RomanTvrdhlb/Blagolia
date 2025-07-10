<?php
$shower  = get_sub_field('shower');
$editor  = get_sub_field('editor');

if (! $shower) : ?>
    <section class="section-blog" <?php if (get_sub_field('section_id')) : ?> id="<?php echo esc_attr(get_sub_field('section_id')); ?>" <?php endif; ?>>
        <div class="container">
            <div class="section-blog__inner">
                <?php if (! empty($editor)) : ?>
                    <div class="editor">
                        <?= $editor; ?>
                    </div>
                <?php endif; ?>

                <ul class="section-blog__posts">
                    <?php
                    $posts_query = new WP_Query(array(
                        'post_type'      => 'blog', // твой пост-тайп
                        'posts_per_page' => -1, // все посты, можно ограничить числом
                        'post_status'    => 'publish',
                    ));

                    if ($posts_query->have_posts()) :
                        while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
                            <li>
                                <?php display_post_card(get_the_ID()); ?>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata();
                    else : ?>
                        <li>No posts found.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>
<?php endif; ?>