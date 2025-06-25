<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	function section_cta( $layout_name ) {

		$layout = new FieldsBuilder( $layout_name );
		$layout
			->addTrueFalse( 'shower', [
				'label'             => __( 'Hide section?', 'ACF' ),
				'instructions'      => __( 'Activate to hide the block.', 'ACF' ),
				'required'          => 0,
				'conditional_logic' => [],
				'wrapper'           => [
					'width' => '50',
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __( 'Hide', 'ACF' ),
				'ui_off_text'       => __( 'Show', 'ACF' ),
			] )
			->addText('section_id',[
				'label'             => __( 'ID fields', 'ACF' ),
				'instructions'      => __( 'You can set a unique id for the section (And add them to the navigation)', 'ACF' ),
				'wrapper'           => [
					'width' => '50',
					'class' => '',
					'id'    => '',
				],
			])
			->addFlexibleContent( 'cta_banners', [
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => [],
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'button_label'      => 'Add Banner',
				'min'               => '1',
				'max'               => '1',
			] )
				->addLayout( 'cta_1', [
					'label'   => 'СTA №1',
					'display' => 'block',
					'min'     => '',
					'max'     => '',
				])
					->addColorPicker('background_color', [
						'label' => 'Select CTA Background color',
						'default_value' => '#044DD6',
					])

					->addFields(editors(0))

				->addLayout( 'cta_2', [
					'label'   => 'СTA №1',
					'display' => 'table',
					'min'     => '',
					'max'     => '',
				])
//					->addWysiwyg( 'editor', [
//						'label'             => 'WYSIWYG Editor',
//						'instructions'      => '',
//						'required'          => 0,
//						'conditional_logic' => [],
//						'wrapper'           => [
//							'width' => '',
//							'class' => '',
//							'id'    => '',
//						],
//						'default_value'     => '',
//						'tabs'              => 'full', // text or visual
//						'toolbar'           => 'all', // all or basic
//						'media_upload'      => 1,
//						'delay'             => 0,
//					] )

			->endFlexibleContent();


		return [
			'layout'  => $layout,
			'display' => 'block',
		];
	}

