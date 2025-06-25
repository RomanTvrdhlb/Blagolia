<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	function section_quiz( $layout_name ) {

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
			->addSelect('form_select', [
				'label' => 'Contact Form Select',
				'instructions' => 'Select contact form',
				'wrapper' => ['width' => (100 / 3)],
				'required' => 1
			])

			->addTab('quiz_slides', [
				'label' => 'Quiz Slides',
			])

			->addFlexibleContent( 'quiz_questions', [
				'label'        => 'Setup questions',
				'instructions' => 'Add layout and create your slide',
				'min'          => 1,
				'max'          => 0,
				'layout'       => 'block',
				'button_label' => 'Create slide',
			] )

				->addLayout('slide', [
					'label'   => 'Slide',
					'display' => 'block',
				])

				->addTrueFalse( 'shower_slide', [
					'label'             => '',
					'instructions'      => __( 'Activate to hide the slide.', 'ACF' ),
					'required'          => 0,
					'conditional_logic' => [],
					'wrapper'           => [
						'width' => 100,
						'class' => '',
						'id'    => '',
					],
					'message'           => '',
					'default_value'     => 0,
					'ui'                => 1,
					'ui_on_text'        => __( 'Hide', 'ACF' ),
					'ui_off_text'       => __( 'Show', 'ACF' ),
				] )

				->addGroup('left', [
					'label' => '',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => [
						[
							'field'    => 'shower_slide',
							'operator' => '==',
							'value'    => '0',
						]
					],
					'wrapper' => [
						'width' => '50',
						'class' => '',
						'id' => '',
					],
					'layout' => 'block'
				])
					->addWysiwyg( 'editor', [
						'label'        => '',
						'instructions' => 'Add slide content here.',
						'wrapper'      => [
							'width' => '100',
							'class' => '',
							'id'    => '',
						],
//						'conditional_logic' => [
//							[
//								[
//									'field'    => 'slide_index',
//									'operator' => '==',
//									'value'    => '0',
//								]
//							]
//						],
						'tabs'         => 'visual',
						'toolbar'      => 'all',
						'media_upload' => 0,
					] )
					->addImage('desktop_image', [
						'label' => '',
						'instructions' => 'Desktop image',
						'required' => 0,
						'conditional_logic' => [],
						'wrapper' => [
							'width' => '50',
							'class' => '',
							'id' => '',
						],
						'return_format' => 'array',
						'preview_size' => 'large',
					])
					->addImage('mobile_image', [
						'label' => '',
						'instructions' => 'Mobile image',
						'required' => 0,
						'conditional_logic' => [],
						'wrapper' => [
							'width' => '50',
							'class' => '',
							'id' => '',
						],
						'return_format' => 'array',
						'preview_size' => 'large',
					])
				->endGroup()

				->addGroup('right', [
					'label' => '',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => [
						[
							'field'    => 'shower_slide',
							'operator' => '==',
							'value'    => '0',
						]
					],
					'wrapper' => [
						'width' => '50',
						'class' => 'quiz_fields',
						'id' => '',
					],
					'layout' => 'block'
				])
					->addText('slide_name', [
						'label' => '',
						'instructions' => 'Slide name',
						'wrapper' => ['width' => '100'],
						'required' => 1,
//						'conditional_logic' => [
//							[
//								[
//									'field'    => 'slide_index',
//									'operator' => '==',
//									'value'    => '0',
//								]
//							]
//						],
					])
					->addText('slide_title', [
						'label' => '',
						'instructions' => 'Slide title',
						'wrapper' => ['width' => '100'],
					])
					->addText('slide_subtitle', [
						'label' => '',
						'instructions' => 'Slide subitle',
						'wrapper' => ['width' => '100'],
					])

					->addFields(quiz_builder('fields'))

				->endGroup()
			->endFlexibleContent()
//==================================================
			->addTab('last_slide', [
				'label' => 'Last Slide',
			])
				->addGroup('last_slide_group', [
					'label' => '',
					'instructions' => '',
					'required' => 0,
					'wrapper' => [
						'width' => '100',
						'class' => '',
						'id' => '',
					],
					'layout' => 'block'
				])
					->addGroup('left', [
						'label' => '',
						'instructions' => '',
						'required' => 0,
						'wrapper' => [
							'width' => '50',
							'class' => '',
							'id' => '',
						],
						'layout' => 'block'
					])
						->addWysiwyg( 'editor', [
							'label'        => '',
							'instructions' => 'Add slide content here.',
							'wrapper'      => [
								'width' => '100',
								'class' => '',
								'id'    => '',
							],
							'tabs'         => 'visual',
							'toolbar'      => 'all',
							'media_upload' => 0,
						] )
						->addImage('desktop_image', [
							'label' => '',
							'instructions' => 'Desktop image',
							'required' => 0,
							'conditional_logic' => [],
							'wrapper' => [
								'width' => '50',
								'class' => '',
								'id' => '',
							],
							'return_format' => 'array',
							'preview_size' => 'large',
						])
						->addImage('mobile_image', [
							'label' => '',
							'instructions' => 'Mobile image',
							'required' => 0,
							'conditional_logic' => [],
							'wrapper' => [
								'width' => '50',
								'class' => '',
								'id' => '',
							],
							'return_format' => 'array',
							'preview_size' => 'large',
						])
					->endGroup()

					->addGroup('right', [
						'label' => '',
						'instructions' => '',
						'required' => 0,
						'wrapper' => [
							'width' => '50',
							'class' => 'quiz_fields',
							'id' => '',
						],
						'layout' => 'block'
					])
						->addText('slide_name', [
							'label' => '',
							'instructions' => 'Slide name',
							'wrapper' => ['width' => '100'],
							'required' => 1,
							//						'conditional_logic' => [
							//							[
							//								[
							//									'field'    => 'slide_index',
							//									'operator' => '==',
							//									'value'    => '0',
							//								]
							//							]
							//						],
						])
						->addText('slide_title', [
							'label' => '',
							'instructions' => 'Slide title',
							'wrapper' => ['width' => '100'],
						])
						->addText('slide_subtitle', [
							'label' => '',
							'instructions' => 'Slide subitle',
							'wrapper' => ['width' => '100'],
						])

						->addFields(quiz_builder('fields'))
					->endGroup()
				->endGroup()
//==================================================
			->addTab('', [
				'label' => 'Settings',
			])

			->addGroup('settings_group', [ 'layout' => 'block' ])
				->addGroup('header', [ 'layout' => 'table' ])
					->addImage('logo',[
						'label' => false,
						'preview_size' => 'medium',
					])
					->addWysiwyg('editor', [
					    'label' => false,
					    'tabs' => 'visual', // text or visual
					    'toolbar' => 'basic', // all or basic
					    'media_upload' => 0,
					])
				->endGroup()

				->addTab('Leaving Settings', [
					'label' => 'Leaving Settings',
				])

					->addGroup('leaving_settings', [
						'label' => '',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => [
							[
								'field'    => 'shower_slide',
								'operator' => '==',
								'value'    => '0',
							]
						],
						'wrapper' => [
							'width' => '100',
							'class' => '',
							'id' => '',
						],
						'layout' => 'block'
					])
						->addImage('desktop_image', [
							'label' => '',
							'instructions' => 'Desktop image',
							'required' => 0,
							'conditional_logic' => [],
							'wrapper' => [
								'width' => '25',
								'class' => '',
								'id' => '',
							],
							'return_format' => 'array',
							'preview_size' => 'large',
						])
						->addImage('mobile_image', [
							'label' => '',
							'instructions' => 'Mobile image',
							'required' => 0,
							'conditional_logic' => [],
							'wrapper' => [
								'width' => '25',
								'class' => '',
								'id' => '',
							],
							'return_format' => 'array',
							'preview_size' => 'large',
						])
						->addWysiwyg( 'editor', [
							'label'        => '',
							'instructions' => 'Add slide content here.',
							'wrapper'      => [
								'width' => '50',
								'class' => '',
								'id'    => '',
							],
							'tabs'         => 'visual',
							'toolbar'      => 'all',
							'media_upload' => 0,
						] )
					->endGroup()

				->addTab('Email Settings', [
					'label' => 'Email Settings',
				])
					->addGroup('email_settings', [
						'label' => '',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => [
							[
								'field'    => 'shower_slide',
								'operator' => '==',
								'value'    => '0',
							]
						],
						'wrapper' => [
							'width' => '50',
							'class' => '',
							'id' => '',
						],
						'layout' => 'block'
					])
						->addWysiwyg( 'editor', [
							'label'        => '',
							'instructions' => '',
							'wrapper'      => [
								'width' => '100',
								'class' => '',
								'id'    => '',
							],
							'tabs'         => 'visual',
							'toolbar'      => 'all',
							'media_upload' => 0,
						] )
						->addImage('desktop_image', [
							'label' => '',
							'instructions' => 'Desktop image',
							'required' => 0,
							'conditional_logic' => [],
							'wrapper' => [
								'width' => '50',
								'class' => '',
								'id' => '',
							],
							'return_format' => 'array',
							'preview_size' => 'large',
						])
						->addImage('mobile_image', [
							'label' => '',
							'instructions' => 'Mobile image',
							'required' => 0,
							'conditional_logic' => [],
							'wrapper' => [
								'width' => '50',
								'class' => '',
								'id' => '',
							],
							'return_format' => 'array',
							'preview_size' => 'large',
						])
					->endGroup()

					->addGroup('email_coll', [
						'label' => '',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => [
							[
								'field'    => 'shower_slide',
								'operator' => '==',
								'value'    => '0',
							]
						],
						'wrapper' => [
							'width' => '50',
							'class' => '',
							'id' => '',
						],
						'layout' => 'block'
					])
						->addWysiwyg( 'editor', [
							'label'        => '',
							'instructions' => '',
							'wrapper'      => [
								'width' => '100',
								'class' => '',
								'id'    => '',
							],
							'tabs'         => 'visual',
							'toolbar'      => 'all',
							'media_upload' => 0,
						] )
					->endGroup()

				->addTab('Data & Privacy Settings', [
					'label' => 'Data & Privacy Settings',
				])
					->addMessage('info', 'Info', [
						'label' => 'Quiz actions',
						'message' => '
						[form_button id="cleaning" text="Erase all current form data"] - <b>Button</b>
						[form_button id="contacts" text="Fill in Contact Section first"] - <b>Button</b>
						[form_button id="done" text="Done"] - <b>Button</b>
						[form_radio] - <b>Radio buttons</b>
						',
					])

					->addGroup('save_settings', [
						'label' => 'Save settings',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => [
							[
								'field'    => 'shower_slide',
								'operator' => '==',
								'value'    => '0',
							]
						],
						'wrapper' => [
							'width' => '100',
							'class' => '',
							'id' => '',
						],
						'layout' => 'table'
					])
						->addGroup('coll_left', [
							'label' => '',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => [
								[
									'field'    => 'shower_slide',
									'operator' => '==',
									'value'    => '0',
								]
							],
							'wrapper' => [
								'width' => '50',
								'class' => '',
								'id' => '',
							],
							'layout' => 'block'
						])
							->addWysiwyg( 'editor', [
								'label'        => '',
								'instructions' => 'Add slide content here.',
								'wrapper'      => [
									'width' => '100',
									'class' => '',
									'id'    => '',
								],
								'tabs'         => 'visual',
								'toolbar'      => 'all',
								'media_upload' => 0,
							] )
							->addImage('desktop_image', [
								'label' => '',
								'instructions' => 'Desktop image',
								'required' => 0,
								'conditional_logic' => [],
								'wrapper' => [
									'width' => '50',
									'class' => '',
									'id' => '',
								],
								'return_format' => 'array',
								'preview_size' => 'large',
							])
							->addImage('mobile_image', [
								'label' => '',
								'instructions' => 'Mobile image',
								'required' => 0,
								'conditional_logic' => [],
								'wrapper' => [
									'width' => '50',
									'class' => '',
									'id' => '',
								],
								'return_format' => 'array',
								'preview_size' => 'large',
							])
						->endGroup()

						->addWysiwyg('editor', [
							'label' => false,
							'instructions' => '',
							'media_upload' => 0,
							'delay' => 0,
						])
					->endGroup()

				->addTab('Drawer', [
					'label' => 'Drawer',
				])

					->addGroup('drawer_settings', [
						'label' => 'Save settings',
						'instructions' => '',
						'required' => 0,
						'wrapper' => [
							'width' => '50',
							'class' => '',
							'id' => '',
						],
						'layout' => 'block'
					])
						->addGroup('phone', [
							'label' => 'Phone',
							'instructions' => '',
							'layout' => 'row'
						])
							->addText('text',['label'=>'Phone number'])
							->addText('sub',['label'=>'Text'])
						->endGroup()

					->addGroup('send', [
						'label' => 'Send',
						'instructions' => '',
						'layout' => 'row'
					])
						->addText('text',['label'=>'Title'])
						->addText('sub',['label'=>'Text'])
					->endGroup()

					->addGroup('data', [
						'label' => 'Data',
						'instructions' => '',
						'layout' => 'row'
					])
						->addText('text',['label'=>'Title'])
						->addText('sub',['label'=>'Text'])
					->endGroup()

					->addWysiwyg('editor', [
						'label' => false,
						'instructions' => '',
						'media_upload' => 0,
						'delay' => 0,
					])
					->endGroup()





			->endGroup();


		return [
			'layout'  => $layout,
			'display' => 'block',
		];
	}

