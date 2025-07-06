<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	function section_hero( $layout_name ) {

		$layout = new FieldsBuilder( $layout_name );
		$layout
			->addTrueFalse( 'shower', [
				'label'             => __( 'Hide section?', 'ACF' ),
				'instructions'      => __( 'Activate to hide the block.', 'ACF' ),
				'required'          => 0,
				'conditional_logic' => [],
				'wrapper'           => [
					'width' => 100 / 2,
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __( 'Hide', 'ACF' ),
				'ui_off_text'       => __( 'Show', 'ACF' ),
			])
			->addTrueFalse( 'bg_content', [
				'label'             => __( 'Slider or Static?', 'ACF' ),
				'instructions'      => __( 'Activate to use slider.', 'ACF' ),
				'required'          => 0,
				'conditional_logic' => [],
				'wrapper'           => [
					'width' => 100 / 2,
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __( 'Hide', 'ACF' ),
				'ui_off_text'       => __( 'Show', 'ACF' ),
			])
			->addWysiwyg('editor', [
				'label' => 'WYSIWYG Field',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => [],
				'wrapper' => [
					'width' => '50',
					'class' => '',
					'id' => '',
				],
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
				'delay' => 0,
			])
            ->addGroup('media_content', [
                'label' => '',
                'layout' => 'block',
                'wrapper' => ['width' => '50'],
                ])
                    ->addGallery('gallery', [
                        'label' => __('Background Images', 'ACF'),
                        'required' => 1,
                        'wrapper' => [
                            'width' => '100',
                            'class' => 'admin-background-image',
                        ],
                        'return_format' => 'array',
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'bg_content',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ])
                    ->addImage('image', [
                        'label' => __('Static Image', 'ACF'),
                        'wrapper' => [
                            'width' => '100',
                        ],
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'bg_content',
                                    'operator' => '!=',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ])
            ->endGroup();

		return [
			'layout'  => $layout,
			'display' => 'block',
		];
	}
