<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) return;

    if (function_exists('acf_add_options_page')) {
        acf_add_options_sub_page(array(
            'page_title' => __('Header settings', THEME_SLUG),
            'menu_title' => __('Header', THEME_SLUG),
            'parent_slug' => 'themes.php',
            'menu_slug' => 'header',
            'post_id' => 'header'
        ));
    }

    $options = new FieldsBuilder('header_options');

    $options
        ->addGroup('header', [
            'label' => 'Header settings',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => [],
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'layout' => 'block'
        ])
            ->addImage('logo', [
                'label' => 'Site Logo',
                'wrapper' => [
                    'width' => '20',
                    'class' => '',
                    'id' => '',
                ],
            ])
            ->addLink('contact_link', [
                'label' => 'Contact Page Link',
                'wrapper' => ['width' => '40'],
                'return_format' => 'array',
            ])
            ->addLink('order_link', [
                'label' => 'Order Link',
                'wrapper' => ['width' => '40'],
                'return_format' => 'array',
            ])
        ->endGroup();

    $options->setLocation('options_page', '==', 'header');

    acf_add_local_field_group($options->build());
});