<?php use StoutLogic\AcfBuilder\FieldsBuilder;

function icon_link_field(string $name, string $width = '100', int $iconWidth = 50): FieldsBuilder {
    $field = new FieldsBuilder($name);

    $field
        ->addImage('icon', [
            'label'   => __('Icon', 'ACF'),
            'wrapper' => ['width' => $iconWidth],
        ])
        ->addLink('link', [
            'label'   => __('Link', 'ACF'),
            'wrapper' => ['width' => 100 - $iconWidth],
        ]);

    return $field;
}

