<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	function section_editors( $layout_name ) {

		$layout = new FieldsBuilder( $layout_name );
		$layout
			->addTrueFalse( 'shower', [
				'label'             => __( 'Hide section?', 'ACF' ),
				'instructions'      => __( 'Activate to hide the block.', 'ACF' ),
				'required'          => 0,
				'conditional_logic' => [],
				'wrapper'           => [
					'width' => (100 / 3),
					'class' => '',
					'id'    => '',
				],
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => __( 'Hide', 'ACF' ),
				'ui_off_text'       => __( 'Show', 'ACF' ),
			] )
			->addColorPicker('background_color', [
				'label' => 'Color Picker',
				'instructions'      => __( 'Select background color', 'ACF' ),
				'default_value' => '#ffffff',
				'wrapper'           => [
					'width' => (100 / 3),
					'class' => '',
					'id'    => '',
				],
			])
			->addText('section_id',[
				'label'             => __( 'ID fields', 'ACF' ),
				'instructions'      => __( 'You can set a unique id for the section (And add them to the navigation)', 'ACF' ),
				'wrapper'           => [
					'width' => (100 / 3),
					'class' => '',
					'id'    => '',
				],
			])
			->addFields(editors(1));

		return [
			'layout'  => $layout,
			'display' => 'block',
		];
	}

