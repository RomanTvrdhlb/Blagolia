<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) return;

    if (function_exists('acf_add_options_page')) {
        acf_add_options_sub_page(array(
            'page_title' => __('Footer settings', THEME_SLUG),
            'menu_title' => __('Footer', THEME_SLUG),
            'parent_slug' => 'themes.php',
            'menu_slug' => 'footer',
            'post_id' => 'footer'
        ));
    }

    $options = new FieldsBuilder('footer_options');

    $options
        ->addGroup('footer', [
            'label' => 'Footer settings',
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
            ]
        ])
        ->addGroup('trigger', [
            'label' => 'Trigger-Button',
            'layout' => 'block',
            'wrapper' => ['width' => '40'],
        ])
        ->addImage('icon', [
            'label' => 'Trigger Icon',
            'wrapper' => ['width' => '30'],
        ])
        ->addLink('link', [
            'label' => 'Trigger Link',
            'wrapper' => ['width' => '70'],
            'return_format' => 'array',
        ])
        ->endGroup()
        ->addGroup('phone_link', [
            'label' => 'Phone Link',
            'layout' => 'block',
            'wrapper' => ['width' => '40'],
        ])
        ->addImage('icon', [
            'label' => 'Link Icon',
            'wrapper' => ['width' => '30'],
        ])
        ->addLink('link', [
            'label' => 'Phone link',
            'wrapper' => ['width' => '70'],
            'return_format' => 'array',
        ])
        ->endGroup()
        ->addImage('background_image', [
            'label' => __('Background Image', 'ACF'),
            'instructions' => 'Add a background image',
            'required' => 0,
            'wrapper' => [
                'class' => 'admin-background-image',
            ],
            'return_format' => 'array',
        ])
        ->endGroup();


    $options->setLocation('options_page', '==', 'footer');

    acf_add_local_field_group($options->build());
});
