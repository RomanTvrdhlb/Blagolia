<?php 
$footer = get_field('footer', 'footer'); 

if ($footer) {
    $logo = $footer['logo'];
    $text = $footer['text'];
    $email = $footer['email'];
    $tel = $footer['tel'];
    $worktime = $footer['worktime'];
}
?>

</main>

<footer class="footer" <?php if (get_field('header_footer_enabler', get_the_ID())) : ?> style="display:none;" <?php endif; ?>>
    <div class="container">
        <div class="footer__inner">
            <div class="footer__box">
                <a class="logo" href="<?php echo home_url(); ?>" aria-label="logo">
                    <?php display_image($logo, 285, 95, ''); ?>
                </a>

                <?php if ($text) : ?>
                    <span class="footer__name"><?= esc_html($text); ?></span>
                <?php endif; ?>
            </div>

            <?php wp_nav_menu(array(
                'theme_location' => 'footer_nav',
                'container' => 'nav',
                'container_class' => 'footer-nav',
            )); ?>

            <div class="footer__links">
                <?php if ($email) :
                    $email_url = $email['url'];
                    $email_title = $email['title'];
                    $email_target = $email['target'] ?? '_self';
                ?>
                    <a class="footer__link" href="<?php echo esc_url($email_url); ?>"
                        target="<?php echo esc_attr($email_target); ?>">
                        <span><?php echo esc_html($email_title); ?></span>
                    </a>
                <?php endif; ?>

                <?php if ($tel) :
                    $tel_url = $tel['url'];
                    $tel_title = $tel['title'];
                    $tel_target = $tel['target'] ?? '_self';
                ?>
                    <a class="footer__link" href="<?php echo esc_url($tel_url); ?>"
                        target="<?php echo esc_attr($tel_target); ?>">
                        <span><?php echo esc_html($tel_title); ?></span>
                    </a>
                <?php endif; ?>

                <?php if ($worktime) : ?>
                    <span class="footer__link"><?= esc_html($worktime); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

<?php
load_template(get_template_directory() . '/components/modals.php', true);
wp_footer();
?>
</body>
</html>
