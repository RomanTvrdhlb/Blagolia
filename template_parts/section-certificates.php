<?php
$shower  = get_sub_field('shower');
$editor = get_sub_field('editor');

if (! $shower) : ?>

    <section class="section-certificates" <?php if (get_sub_field('section_id')) : ?> id="<?php echo esc_attr(get_sub_field('section_id')); ?>" <?php endif; ?>>
        <div class="container">
            <div class="section-certificates__inner">
                <?php if (!empty($editor)) : ?>
                    <div class="editor">
                        <?= $editor; ?>
                    </div>
                <?php endif; ?>

                <?php
                $certificates_query = new WP_Query(array(
                    'post_type'      => 'certificates',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ));
                if ($certificates_query->have_posts()) : ?>
                    <ul class="section-certificates__list">
                        <?php while ($certificates_query->have_posts()) : $certificates_query->the_post(); ?>
                            <li>
                                <div class="certificate">
                                    <div class="certificate__thumb">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium'); ?>
                                        <?php endif; ?>

                                        <div class="certificate__links">
                                            <a href="http://blagoliya/wp-content/uploads/2025/07/Certpng-210x300.png" target="_blank" rel="noopener noreferrer">
                                                <i class="sprite">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none">
                                                        <g clip-path="url(#a)">
                                                            <path fill="#59635D" d="m27.378 25.764-6.822-6.821a11.447 11.447 0 1 0-1.616 1.616l6.822 6.821a1.143 1.143 0 0 0 1.616-1.616Zm-15.665-4.906a9.143 9.143 0 1 1 9.143-9.143 9.153 9.153 0 0 1-9.143 9.143Z" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="a">
                                                                <path fill="#fff" d="M.286.286h27.429v27.429H.285z" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </i>
                                            </a>
                                            <a href="http://blagoliya/wp-content/uploads/2025/07/Certpng-210x300.png" download>
                                                <i class="sprite">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none">
                                                        <g fill="#59635D" clip-path="url(#a)">
                                                            <path d="M11.574 20.997a3.428 3.428 0 0 0 4.85 0l3.67-3.67a1.143 1.143 0 0 0-1.616-1.613l-3.344 3.345.008-17.63A1.143 1.143 0 0 0 14 .285a1.143 1.143 0 0 0-1.143 1.143l-.01 17.609-3.326-3.324a1.143 1.143 0 1 0-1.616 1.617l3.67 3.666Z" />
                                                            <path d="M26.571 18.571a1.143 1.143 0 0 0-1.143 1.143v4.572a1.143 1.143 0 0 1-1.142 1.142H3.714a1.143 1.143 0 0 1-1.143-1.142v-4.572a1.143 1.143 0 1 0-2.285 0v4.572a3.428 3.428 0 0 0 3.428 3.428h20.572a3.428 3.428 0 0 0 3.428-3.428v-4.572a1.143 1.143 0 0 0-1.143-1.143Z" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="a">
                                                                <path fill="#fff" d="M.286.286h27.429v27.429H.285z" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="certificate__title"><?php the_title(); ?></span>
                                    <?php the_excerpt(); ?>
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