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
					'width' => 100 / 3,
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __( 'Hide', 'ACF' ),
				'ui_off_text'       => __( 'Show', 'ACF' ),
			] )


            ->addRepeater('banners', [
                'label' => __('Banners', 'ACF'),
                'button_label' => __('Add banner', 'ACF'),
                'layout' => 'block',
                'wrapper' => [],
            ])

            ->addGallery('image', [
                'label' => __('Background Image', 'ACF'),
                'required' => 1,
                'wrapper' => [
                    'width' => '100',
                    'class' => 'admin-background-image',
                ],
                'return_format' => 'array',
                'min' => 1,
                'max' => 1,
            ])

            // Левая колонка (50%)
            ->addGroup('left', [
                'label' => '',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ],
                'layout' => 'block'
            ])
                ->addText('main_button', [
                    'label' => __('Main Button Text', 'ACF'),
                    'wrapper' => ['width' => '100'],
                    'default_value' => 'Забронировать яхту',
                ])

                ->addGroup('whatsapp_link', [
                    'label' => 'Whatsapp Link',
                    'layout' => 'block',
                    'wrapper' => ['width' => '50'],
                ])
                ->addImage('icon', [
                    'label' => 'Link Icon',
                    'wrapper' => ['width' => '40'],
                ])
                ->addLink('link', [
                    'label' => 'link',
                    'wrapper' => ['width' => '60'],
                    'return_format' => 'array',
                ])
                ->endGroup()

            ->addGroup('telegram_link', [
                'label' => 'Telegram Link',
                'layout' => 'block',
                'wrapper' => ['width' => '50'],
            ])
            ->addImage('icon', [
                'label' => 'Link Icon',
                'wrapper' => ['width' => '40'],
            ])
            ->addLink('link', [
                'label' => 'link',
                'wrapper' => ['width' => '60'],
                'return_format' => 'array',
            ])
            ->endGroup()


                ->addTextarea('descr', [
                    'label' => __('Description', 'ACF'),
                    'wrapper' => ['width' => '100'],

                ])

            ->endGroup()

            // Правая колонка (50%)
            ->addWysiwyg('editor', [
                'label' => __('Banner Title', 'ACF'),
                'wrapper' => ['width' => '50'],
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'media_upload' => 0,
            ])

            ->endRepeater()



;

		return [
			'layout'  => $layout,
			'display' => 'block',
		];
	}
