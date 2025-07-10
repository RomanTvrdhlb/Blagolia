<?php
$shower  = get_sub_field('shower');
$editor      = get_sub_field('editor');
$image      = get_sub_field('image');
$list   = get_sub_field('list');

if (! $shower) : ?>
    <section class="section-facilities" <?php if (get_sub_field('section_id')) : ?> id="<?php echo get_sub_field('section_id'); ?>" <?php endif; ?>>
        <div class="container">
            <div class="section-facilities__inner">
                <?php if (!empty($editor)) : ?>
                    <div class="editor">
                        <?= $editor; ?>
                    </div>
                <?php endif; ?>

                <div class="section-facilities__box">
                    <ul class="section-facilities__list">
                        <?php foreach ($list as $index => $item) :
                            $title = $item['title'];
                            $text = $item['text']; ?>

                            <li class="section-facilities__item">
                                <?php if ($title) : ?>
                                    <span class="pretitle"><?= $title; ?></span>
                                <?php endif; ?>

                                <?php if ($text) : ?>
                                    <p><?= $text; ?></p>
                                <?php endif; ?>

                            </li>
                        <?php endforeach; ?>

                    </ul>

                    <?= display_image($image, 708, 582, 'section-facilities__image') ?>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>