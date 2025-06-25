<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	function section_calculator( $layout_name ) {

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
			->addText('section_id',[
				'label'             => __( 'ID fields', 'ACF' ),
				'instructions'      => __( 'You can set a unique id for the section (And add them to the navigation)', 'ACF' ),
				'wrapper'           => [
					'width' => (100 / 3),
					'class' => '',
					'id'    => '',
				],
			])

			->addFields(form_builder('form'))
			->addGroup('content',[
				'label' => false,
				'wrapper' => ['width' => 50],
			])
				->addWysiwyg('editor', [
				    'label' => false,
				    'instructions' => '',
				    'tabs' => 'full',
				    'toolbar' => 'all',
				    'media_upload' => 0,
				])
				->addText('title_list')
				->addRepeater('list_options',[
					'layout'       => 'table',
				])
					->addText('title')
					->addText('id')
				->endRepeater()

				->addTextarea('text',[
					'label' => false,
					'rows' => '4',
					'new_lines' => '',
				])

			->endGroup();


		return [
			'layout'  => $layout,
			'display' => 'block',
		];
	}

