<?php
$shower  = get_sub_field('shower');
$editor      = get_sub_field('editor');
$image      = get_sub_field('image');

if (! $shower) : ?>
    <section class="section-contact" <?php if (get_sub_field('section_id')) : ?> id="<?php echo get_sub_field('section_id'); ?>" <?php endif; ?>>
        <div class="container">
            <div class="section-team__inner">
                <?php if (!empty($editor)) : ?>
                    <div class="editor">
                        <?= $editor; ?>
                    </div>
                <?php endif; ?>

                <div class="section-contact__box">
                    <ul class="section-contact__list">
                        <li class="section-contact__item">
                            <span class="pretitle">Address:</span>
                            <a href="#" class="section-contact__link">
                                Vulytsia Promyslova 12,
                                Brovary, Kyiv Region, 07400
                                Ukraine
                            </a>
                        </li>


                        <li class="section-contact__item">
                            <span class="pretitle">Phone:</span>
                            <a href="tel:+380441234567" class="section-contact__link">
                                <b>General Inquiries:</b>

                                +380 44 123 45 67
                            </a>
                            <a href="tel:+380441234567" class="section-contact__link">
                                <b>Sales Department:</b>

                                +380 44 123 45 67
                            </a>
                            <a href="tel:+380441234567" class="section-contact__link">
                                <b>Export & Logistics:</b>

                                +380 44 123 45 67
                            </a>
                            <a href="tel:+380441234567" class="section-contact__link">
                                <b>Partnership:</b>

                                +380 44 123 45 67
                            </a>
                        </li>

                        <li class="section-contact__item">
                            <span class="pretitle">Email:</span>
                            <a href="#" class="section-contact__link">
                                info@example.com
                            </a>
                            <a href="#" class="section-contact__link">
                                sales@example.com
                            </a>
                        </li>
                    </ul>

                    <?= display_image($image, 708, 614, 'section-contact__image') ?>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>