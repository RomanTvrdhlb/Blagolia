<?php
$shower  = get_sub_field('shower');
$editor  = get_sub_field('editor');

if (! $shower) : ?>
    <section class="section-blog" <?php if (get_sub_field('section_id')) : ?> id="<?php echo esc_attr(get_sub_field('section_id')); ?>" <?php endif; ?>>
        <div class="container">
            <?php get_breadcrumbs();  ?>
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

                <ul class="pagination">
                    <li>
                        <a href="#" class="active">1</a>
                    </li>
                    <li>
                        <span>...</span>
                    </li>
                    <li>
                        <a href="#">10</a>
                    </li>
                    <li>
                        <a href="#">Next page
                            <i class="sprite">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M8.93408 8.47335C8.99656 8.41138 9.04616 8.33764 9.08001 8.2564C9.11385 8.17516 9.13128 8.08803 9.13128 8.00002C9.13128 7.91201 9.11385 7.82487 9.08001 7.74364C9.04616 7.6624 8.99656 7.58866 8.93408 7.52669L5.87408 4.47335C5.81159 4.41138 5.76199 4.33764 5.72815 4.2564C5.6943 4.17516 5.67688 4.08803 5.67688 4.00002C5.67688 3.91201 5.6943 3.82487 5.72815 3.74364C5.76199 3.6624 5.81159 3.58866 5.87408 3.52669C5.99899 3.40252 6.16795 3.33282 6.34408 3.33282C6.5202 3.33282 6.68917 3.40252 6.81408 3.52669L9.87408 6.58669C10.2486 6.96169 10.459 7.47002 10.459 8.00002C10.459 8.53002 10.2486 9.03835 9.87408 9.41335L6.81408 12.4734C6.6899 12.5965 6.5223 12.6659 6.34741 12.6667C6.25967 12.6672 6.1727 12.6504 6.09147 12.6172C6.01025 12.584 5.93637 12.5351 5.87408 12.4734C5.81159 12.4114 5.76199 12.3376 5.72815 12.2564C5.6943 12.1752 5.67688 12.088 5.67688 12C5.67688 11.912 5.6943 11.8249 5.72815 11.7436C5.76199 11.6624 5.81159 11.5887 5.87408 11.5267L8.93408 8.47335Z" fill="currentColor" />
                                </svg>

                            </i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
<?php endif; ?>