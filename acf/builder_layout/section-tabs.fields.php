<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	function section_tabs( $layout_name ) {

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
			->addRepeater( 'tabs', [
				'label'        => __( 'Tabs', 'ACF' ),
				'button_label' => __( 'Add tab', 'ACF' ),
				'layout'       => 'block'
			] )
				->addText( 'tab_name', [
					'label'        => __( 'Tab name', 'ACF' ),
					'instructions' => '',
					'required'     => 1,
				] )
				->addGroup( 'tabs_group', [
					'label'             => '',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => [],
					'wrapper'           => [
						'width' => '50',
						'class' => '',
						'id'    => '',
					],
					'layout'            => 'block'
				] )
					->addGallery('image', [
						'label' => __( 'Image', 'ACF' ),
						'instructions' => 'Add image',
						'required' => 1,
						'wrapper' => [
							'width' => '50',
							'class' => 'admin-background-image',
							'id' => '',
						],
						'return_format' => 'array',
						'min' => '1',
						'max' => '1',
					])

					->addWysiwyg( 'editor', [
						'label'             => '',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => [],
						'wrapper'           => [
							'width' => '50',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'tabs'              => 'visual', // text or visual
						'toolbar'           => 'basic', // all or basic
						'media_upload'      => 0,
						'delay'             => 0,
					])
				->endGroup()

				->addWysiwyg( 'editor', [
					'label'             => __( 'WYSIWYG Editor', 'ACF' ),
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => [],
					'default_value'     => '',
					'tabs'              => 'full',
					'toolbar'           => 'all',
					'media_upload'      => 0,
					'delay'             => 0,
					'wrapper'           => [
						'width' => '50',
						'class' => '',
						'id'    => '',
					],
				] )
			->endRepeater();


		return [
			'layout'  => $layout,
			'display' => 'block',
		];
	}

