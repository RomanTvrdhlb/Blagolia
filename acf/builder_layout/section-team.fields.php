<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	function section_team( $layout_name ) {

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

			->addRepeater( 'team', [
				'label'        => __( '', 'ACF' ),
				'button_label' => __( 'Add Person', 'ACF' ),
				'layout' => 'block',
				'wrapper'           => [
					'width' => '',
					'class' => 'col-4',
					'id'    => '',
				]])
				->addImage( 'image', ['label' => ''])
				->addText('name', ['label' => 'Name'])
				->addText('text', ['label' => 'Description'])

				->addRepeater( 'contact', [
					'label'        => __( '', 'ACF' ),
					'button_label' => __( 'Add link', 'ACF' ),
					'layout' => 'block',
					'wrapper'           => [
						'width' => '',
						'class' => 'col-2',
						'id'    => '',
					]])
				->addImage( 'icon', ['label' => 'Icon'])
				->addLink('link', ['label' => 'Link' ])



				->endRepeater()


			->endRepeater();


		return [
			'layout'  => $layout,
			'display' => 'block',
		];
	}

