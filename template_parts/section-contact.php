<?php
$shower     = get_sub_field('shower');
$editor     = get_sub_field('editor');
$image      = get_sub_field('image');
$section_id = get_sub_field('section_id');
$breadcrumbs = get_sub_field('breadcrumbs');
$contacts   = get_sub_field('contacts_info');
?>

<?php if (!$shower) : ?>
    <section class="section-contact" <?php if ($section_id) : ?> id="<?= esc_attr($section_id); ?>" <?php endif; ?>>
        <div class="container">
            <?php if ($breadcrumbs) {
                get_breadcrumbs(); // предполагается, что это твоя функция
            } ?>

            <div class="section-contact__inner">
                <?php if (!empty($editor)) : ?>
                    <div class="editor">
                        <?= $editor; ?>
                    </div>
                <?php endif; ?>

                <div class="section-contact__box">
                    <ul class="section-contact__list">
                        <?php if (!empty($contacts['location'])) : ?>
                            <li class="section-contact__item">
                                <span class="pretitle">Address:</span>
                                <a href="<?= esc_url($contacts['location']['url']); ?>" target="_blank" class="section-contact__link">
                                    <?= esc_html($contacts['location']['title']); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($contacts['phones'])) : ?>
                            <li class="section-contact__item">
                                <span class="pretitle">Phone:</span>
                                <ul>
                                    <?php foreach ($contacts['phones'] as $phone) : ?>
                                        <li>
                                            <?php if (!empty($phone['tel_heading'])) : ?>
                                                <p><?= esc_html($phone['tel_heading']); ?>:</p>
                                            <?php endif; ?>
                                            <?php if (!empty($phone['tel'])) : ?>
                                                <a href="<?= esc_url($phone['tel']['url']); ?>" class="section-contact__link">
                                                    <?= esc_html($phone['tel']['title']); ?>
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($contacts['emails'])) : ?>
                            <li class="section-contact__item">
                                <span class="pretitle">Email:</span>
                                <ul>
                                    <?php foreach ($contacts['emails'] as $email) : ?>
                                        <?php if (!empty($email['email'])) : ?>
                                            <li>
                                                <a href="<?= esc_url($email['email']['url']); ?>" class="section-contact__link">
                                                    <?= esc_html($email['email']['title']); ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>

                    <?php if ($image) : ?>
                        <?= display_image($image, 708, 614, 'section-contact__image'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
