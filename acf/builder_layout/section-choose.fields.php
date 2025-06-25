<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	function section_choose( $layout_name ) {

		$layout = new FieldsBuilder( $layout_name );
		$layout
			->addTrueFalse( 'shower', [
				'label'             => __( 'Hide section?', 'ACF' ),
				'instructions'      => __( 'Activate to hide the block.', 'ACF' ),
				'required'          => 0,
				'conditional_logic' => [],
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __( 'Hide', 'ACF' ),
				'ui_off_text'       => __( 'Show', 'ACF' ),
			] )

			->addFields(editors(0))

			->addRepeater('list', [
				'label'        => __('Item', 'ACF'),
				'button_label' => __('Add item', 'ACF'),
				'layout' => 'block',
				'wrapper' => [
					'width' => '',
					'class' => 'choose-repeater',
					'id' => '',
				],
			])

			->addLink('link', [
				'label' => 'Link',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => [],
				'wrapper' => [
					'width' => '50',
					'class' => '',
					'id' => '',
				],
				'return_format' => 'array',
			])

			->addColorPicker('background', [
				'label' =>  __( 'Color Picker', 'ACF' ),
				'instructions'      => __( 'Set background color image', 'ACF' ),
				'required' => 0,
				'conditional_logic' => [],
				'enable_opacity' => 0,
				'return_format' => 'string',
				'wrapper' => [
					'width' => '50',
					'class' => '',
					'id' => '',
				],
				'default_value' => '#EFF7FF',
			])

			->addWysiwyg('editor', [
				'label'         => __('WYSIWYG Editor', 'ACF'),
				'tabs'          => 'full',
				'toolbar'       => 'all',
				'media_upload'  => 1,
				'delay'         => 0,
			])

			->endRepeater();
	

		return [
			'layout'  => $layout,
			'display' => 'block',
		];
	}

