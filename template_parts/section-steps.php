<?php
$shower  = get_sub_field('shower');
$editor      = get_sub_field('editor');
$image      = get_sub_field('image');
$list   = get_sub_field('list');

if (! $shower) : ?>
    <section class="section-steps" <?php if (get_sub_field('section_id')) : ?> id="<?php echo get_sub_field('section_id'); ?>" <?php endif; ?>>
        <div class="container">
             <?php get_breadcrumbs();  ?>
            <div class="section-steps__inner">
                <?php if (!empty($editor)) : ?>
                    <div class="editor">
                        <?= $editor; ?>
                    </div>
                <?php endif; ?>

                <ul class="section-steps__list">
                    <?php foreach ($list as $index => $item) :
                        $title = $item['title'];
                        $text = $item['text']; ?>

                        <li class="section-steps__item">
                            <?php if ($title) : ?>
                                <span class="pretitle"><?= $title; ?></span>
                            <?php endif; ?>

                            <?php if ($text) : ?>
                                <p><?= $text; ?></p>
                            <?php endif; ?>
                        </li>

                    <?php endforeach; ?>
                </ul>

                <?= display_image($image, 460, 500, 'section-steps__image') ?>
            </div>
        </div>
    </section>

<?php endif; ?>