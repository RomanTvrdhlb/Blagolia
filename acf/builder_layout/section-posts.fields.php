<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	function section_posts( $layout_name ) {

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
			->addFields(editors(0))

			->addRelationship('posts', [
				'label' => 'Select your	posts',
				'instructions' => 'The selected posts will be displayed in the same order.',
				'post_type' => ['blog'],
				'filters' => [
					0 => 'search',
					1 => '',
					2 => 'taxonomy',
				],
				'min' => '1',
				'max' => '',
				'return_format' => 'id',
			]);



		return [
			'layout'  => $layout,
			'display' => 'block',
		];
	}

