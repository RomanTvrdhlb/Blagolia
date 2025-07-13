<?php
$shower  = get_sub_field('shower');
$editor      = get_sub_field('editor');
$list   = get_sub_field('list');

if (! $shower) : ?>
    <section class="section-packaging" <?php if (get_sub_field('section_id')) : ?> id="<?php echo get_sub_field('section_id'); ?>" <?php endif; ?>>
        <div class="container">
            <div class="section-packaging__inner">
                <?php if (!empty($editor)) : ?>
                    <div class="editor">
                        <?= $editor; ?>
                    </div>
                <?php endif; ?>

                <ul class="section-packaging__list">
                    <?php foreach ($list as $index => $item) :
                        $icon = $item['icon'];
                        $title = $item['title'];
                        $text = $item['text']; ?>

                        <li class="section-packaging__item">
                            <?= display_image($icon, 27, 36, 'section-packaging__icon'); ?>

                            <div class="section-packaging__wrapp">
                                <?php if ($title) : ?>
                                    <span class="pretitle"><?= $title; ?></span>
                                <?php endif; ?>

                                <?php if ($text) : ?>
                                    <p><?= $text; ?></p>
                                <?php endif; ?>
                                <div class="section-packaging__bottom">
                                    <span class="section-packaging__name">Available volumes:</span>
                                    <p>0.5L–5L</p>
                                </div>
                            </div>

                        </li>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

<?php endif; ?>