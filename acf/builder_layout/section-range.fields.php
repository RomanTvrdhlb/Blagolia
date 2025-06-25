<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	function section_range( $layout_name ) {

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
			->addWysiwyg( 'editor', [
				'label'             => false,
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => [],
				'wrapper'           => [
					'width' => '40',
					'class' => '',
					'id'    => '',
				],
				'default_value'     => '',
				'tabs'              => 'all',
				'toolbar'           => 'full',
				'media_upload'      => 0,
				'delay'             => 0,
			] )

			->addGroup( 'table', [
				'label'   => false,
				'layout'  => 'block',
				'wrapper' => [
					'width' => '60',
					'class' => '',
					'id'    => '',
				],
			] )

				->addText( 'title', [
					'label'         => 'Title',
					'placeholder' => '',
					'wrapper' => [
						'width' => 50,
						'class' => '',
						'id'    => '',
					],
				] )

				->addRange('default', [
					'label' => 'Range value',
					'default_value' => '400000',
					'step' => '1000',
					'wrapper' => [
						'width' => 50,
						'class' => '',
						'id'    => '',
					],
					'max' => 1500000,
					'min' => 75000
				])


				->addGroup( 'table_head', [
					'label'  => false,
					'layout' => 'table',
				] )
					->addText( 'coll', [
						'label'         => false,
						'placeholder' => 'Term',
						'default_value' => 'Term'
					] )
					->addText( 'coll2', [
						'label'         => false,
						'placeholder' => 'Rates From',
						'default_value' => 'Rates From'
					] )
					->addText( 'coll3',
						[
							'label'         => false,
							'placeholder' => 'Payments',
							'default_value' => 'Payments'
						] )

				->endGroup()

				->addRepeater( 'table_row', [
					'label'        => __( 'Table', 'ACF' ),
					'button_label' => __( 'Add row', 'ACF' ),
					'layout'       => 'table',
				] )

					->addGroup( 'group_term', [
						'label'  => 'Term',
						'layout' => 'block',
					] )

						->addNumber('year', [
							'label' => 'Year',
							'default_value' => '0',
							'step' => '1',
							'wrapper' => [
								'width' => '50',
								'class' => '',
								'id'    => '',
							],
						])

						->addNumber('month', [
							'label' => 'Month',
							'default_value' => '0',
							'step' => '1',
							'max' => '12',
							'wrapper' => [
								'width' => '50',
								'class' => '',
								'id'    => '',
							],
						])
						->addText('title',[
							'wrapper' => [
								'width' => '100',
								'class' => '',
								'id'    => '',
							],
						])

						->addLink( 'term', [
							'label' => false
						] )
					->endGroup()

						->addNumber( 'rates' )
						->addNumber( 'payments' )
				->endRepeater()

				->addWysiwyg('bottom_editor', [
				    'label' => false,
				    'instructions' => '',
				    'required' => 0,
				    'default_value' => '',
				    'tabs' => 'visual', // text or visual
				    'toolbar' => 'full', // all or basic
				    'media_upload' => 0,
				    'delay' => 0,
				])
			->endGroup();


		return [
			'layout'  => $layout,
			'display' => 'block',
		];
	}

