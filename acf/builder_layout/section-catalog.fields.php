<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	function section_catalog( $layout_name ) {
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
			])
				->addTrueFalse('breadcrumbs', [
				'label' => __('Show breadcrumbs?', 'ACF'),
				'instructions' => __('Activate to show the breadcrumbs.', 'ACF'),
				'wrapper' => ['width' => '50'],
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => __('Show', 'ACF'),
				'ui_off_text' => __('Hide', 'ACF'),
			])
			->addWysiwyg('editor', [
				'label' => 'WYSIWYG Field',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => [],
				'wrapper' => [
					'width' => '100',
					'class' => '',
					'id' => '',
				],
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
				'delay' => 0,
			]);
	

		return [
			'layout'  => $layout,
			'display' => 'block',
		];
	}

