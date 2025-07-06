<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	function section_statistics( $layout_name ) {

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
			->addRepeater('list', [
				'label'        => __('List', 'ACF'),
				'button_label' => __('Add Item', 'ACF'),
				'instructions' => '',
				'required' => 1,
				'min' => 1,
				'max' => '',
				'layout' => 'row',
				'wrapper' => [
					'width' => '100',
					'class' => '',
					'id' => '',
				],
				])
				->addText('title', ['label' => 'Title'])
				->addText('text', ['label' => 'Description'])
			->endRepeater();

		return [
			'layout'  => $layout,
			'display' => 'block',
		];
	}

