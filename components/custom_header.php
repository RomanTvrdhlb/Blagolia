<?php
$header = get_field('header', 'header');


if ($header) {
    $logo = $header['logo'];
    $phone_link = $header['phone_link'];
    $trigger = $header['trigger'];
}

?>

<header class="header fixed-block" role="banner">
    <div class="container">
        <div class="header__inner">
            <button class="burger">
                <span class="burger__line"></span>
            </button>

            <a href="<?php echo home_url(); ?>" class="header__logo" aria-label="logo">
                <?php display_image($logo, 196, 41, ''); ?>
            </a>

            <div class="mobile">
                <div class="header__wrapper">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'header_nav',
                        'container' => 'nav',
                        'container_class' => 'main-nav',
                    )); ?>

                    <?php if ($trigger) :
                        $link_url = $trigger['link']['url'];
                        $link_title = $trigger['link']['title'];
                        $link_target = $trigger['link']['target'] ?? '_self';
                        $icon = $trigger['icon'] ?? null;
                        ?>
                        <a class="trigger-button" href="<?php echo esc_url($link_url); ?>"
                           target="<?php echo esc_attr($link_target); ?>">

                            <img class="trigger-button__icon" src="<?php echo esc_url($icon['url']); ?>"
                                 alt="<?php echo esc_attr($icon['alt'] ?? $link_title); ?>" width="37" height="37">

                            <span><?php echo esc_html($link_title); ?></span>
                        </a>
                    <?php endif; ?>

                    <?php if ($phone_link) :
                        $link_url = $phone_link['link']['url'];
                        $link_title = $phone_link['link']['title'];
                        $link_target = $phone_link['link']['target'] ?? '_self';
                        $icon = $phone_link['icon'] ?? null;
                        ?>
                        <a class="phone-link" href="<?php echo esc_url($link_url); ?>"
                           target="<?php echo esc_attr($link_target); ?>">
                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?? $link_title); ?>" width="30" height="30">
                            <?php echo esc_html($link_title); ?>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</header>









