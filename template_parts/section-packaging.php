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
                        $editor_list = $item['editor_list'];
                        ?>

                        <li class="section-packaging__item">
                            <div class="section-packaging__wrapp">
                                <?= $editor_list; ?>
                            </div>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

<?php endif; ?>