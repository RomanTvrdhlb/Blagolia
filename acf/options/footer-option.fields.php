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
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ],
            ])
            ->addTextarea('text', [
                'label' => 'Text Field',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '2',
                'new_lines' => '', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->addLink('email', [
                'label' => 'Email Link',
                'wrapper' => ['width' => 100 / 3],
                'return_format' => 'array',
            ])
            ->addLink('tel', [
                'label' => 'Tel Link',
                'wrapper' => ['width' => 100 / 3],
                'return_format' => 'array',
            ])
            ->addText('worktime', [
                'label' => 'WorkTime Field',
                'wrapper' => ['width' => 100 / 3],
            ])
        ->endGroup();


    $options->setLocation('options_page', '==', 'footer');

    acf_add_local_field_group($options->build());
});
