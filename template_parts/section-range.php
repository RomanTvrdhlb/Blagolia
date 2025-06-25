<?php
$shower = get_sub_field('shower');
$editor = get_sub_field('editor');
$background_color = get_sub_field('background_color');



if (!$shower) : ?>

    <section class="section-range" style="--bg-color:<?= $background_color; ?>;" <?php if (get_sub_field('section_id')) : ?> id="<?php echo get_sub_field('section_id'); ?>" <?php endif; ?>>
        <div class="container">
            <div class="section-range__inner">
                <?php if ($editor) : ?>
                    <div class="editor">
                        <?= $editor ?>
                    </div>
                <?php endif; ?>

                <div class="section-range__wrapp">

                    <div class="section-range__coll">
                        <?php $range = get_sub_field('table');
                        if ($range): ?>
                            <div class="calc-table__range">

                                <?php if (!empty($range['title'])): ?>
                                    <h2 class="calc-table__range-title"><?= $range['title'] ?></h2>
                                <?php endif; ?>

                                <label class="range mode" data-symbol="$">
                                    <input max="1500000" min="75000"
                                           step="1000" type="range" value="<?= esc_attr($range['default']) ?>">
                                    <span class="range__thumb-label"></span>
                                </label>
                            </div>
                        <?php endif; ?>

                        <?php
                        $rows = get_sub_field('table')['table_row'] ?? null;
                        if ($rows): ?>
                            <ul class="calc-table">

                                <?php $head = get_sub_field('table')['table_head'] ?? null;
                                if ($head): ?>
                                    <li class="calc-table__head">
                                        <div class="calc-table__cell"><?= esc_html($head['coll'] ?? 'Term') ?></div>
                                        <div class="calc-table__cell"><?= esc_html($head['coll2'] ?? 'Rates From') ?></div>
                                        <div class="calc-table__cell"><?= esc_html($head['coll3'] ?? 'Payments') ?></div>
                                    </li>
                                <?php endif; ?>

                                <?php foreach ($rows as $row):
                                    $term = $row['group_term']['term'] ?? null;
                                    $year = (int)($row['group_term']['year'] ?? 0);
                                    $month = (int)($row['group_term']['month'] ?? 0);
                                    $title = $row['group_term']['title'];

                                    $payments = $row['group_payments']['payments'] ?? null;
                                    $currency = '$';
                                    $time = '/mo';

                                    ?>
                                    <li class="calc-table__row">
                                        <div class="calc-table__cell" data-month="<?= $month ?>"
                                             data-year='<?= $year ?>'>
                                                <span class="term-label">
                                                    <?php if ($term): ?>
                                                        <a href="<?= esc_url($term['url']) ?>">
                                                            <?= sprite(16, 16, 'info') ?>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?= $title; ?>
                                                </span>
                                        </div>

                                        <div class="calc-table__cell" data-rates="<?= $row['rates']; ?>">
                                            <?= isset($row['rates']) ? esc_html(number_format($row['rates'], 2)) . '%' : '' ?>
                                        </div>

                                        <div class="calc-table__cell" data-currency="<?= $currency; ?>"
                                             data-payments="<?= $payments; ?>" data-time="<?= $time; ?>">
                                            <?= $payments ? esc_html("{$currency}" . number_format($payments, 0, '.', ' ') . " <i>{$time}</i>") : '' ?>
                                        </div>

                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <?php if (get_sub_field('table')['bottom_editor']) :?>
                        <div class="section-range__bottom">
							<?= get_sub_field('table')['bottom_editor'];?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </section>

<?php endif; ?>



