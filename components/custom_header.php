<?php
    $header = get_field('header', 'header');

    if ($header) {
        $logo = $header['logo'];
        $contact_link = $header['contact_link'];
        $order_link = $header['order_link'];
    }
?>

<header class="header fixed-block" role="banner">
    <div class="container">
        <div class="header__inner">
            <a class="header__logo" href="<?php echo home_url(); ?>" aria-label="logo">
				<?php display_image( $logo, 285, 95, '' ); ?>
            </a>

            <?php wp_nav_menu(array(
                'theme_location' => 'header_nav',
                'container' => 'nav',
                'container_class' => 'main-nav',
            )); ?>

            <div class="header__controls">
                <?php if ($contact_link) :
                    $contact_link_url = $contact_link['url'];
                    $contact_link_title = $contact_link['title'];
                    $contact_link_target = $contact_link['target'] ?? '_self';
                ?>
                    <a class="trigger-button" href="<?php echo esc_url($contact_link_url); ?>"
                        target="<?php echo esc_attr($contact_link_target); ?>">
                        <span><?php echo esc_html($contact_link_title); ?></span>
                    </a>
                <?php endif; ?>

                <?php if ($order_link) :
                    $order_link_url = $order_link['url'];
                    $order_link_title = $order_link['title'];
                    $order_link_target = $order_link['target'] ?? '_self';
                ?>
                    <a class="trigger-button" href="<?php echo esc_url($order_link_url); ?>"
                        target="<?php echo esc_attr($order_link_target); ?>">
                        <span><?php echo esc_html($order_link_title); ?></span>
                    </a>
                <?php endif; ?>
            </div>

            <button class="burger">
                <span class="burger__line"></span>
            </button>

            <div class="mobile">
                <div class="mobile__box">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'mobile_nav',
                        'container' => 'nav',
                        'container_class' => 'main-nav',
                    )); ?>
                </div>
            </div>
        </div>
    </div>
</header>









