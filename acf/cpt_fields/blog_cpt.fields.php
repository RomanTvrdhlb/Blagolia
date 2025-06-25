<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	add_action( 'acf/init', function () {

		$author = new FieldsBuilder( 'post_author' );
		$image = new FieldsBuilder( 'post_image' );
		$editor = new FieldsBuilder( 'post_editor' );
		$social = new FieldsBuilder( 'post_aside' ,[
			'style' => 'seamless'
		]);


		$posts = new FieldsBuilder( 'posts' );


		$posts
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

		$author
			->addImage( 'image', [
				'label'        => 'Author photo',
				'instructions' => 'Enter the reviewer\'s photo.',
				'required'     => 1,
			] )
			->addText( 'name', [
				'label'        => 'Name',
				'instructions' => 'Enter the reviewer\'s name.',
				'required'     => 1,
			] )
			->addText( 'time', [
				'label'        => 'Reading time',
				'instructions' => 'Please indicate the estimated reading time',
				'required'     => 1,
				'default_value' => '15 min read'
			] )

			->addText( 'position', [
				'label'        => 'Position',
				'instructions' => 'Enter the position.',
				'required'     => 0,
				'default_value' => 'Mortgage Specialist'
			] )

			->addText( 'lic', [
				'label'        => 'License',
				'instructions' => 'Enter the license.',
				'required'     => 0,
				'default_value' => 'Lic # M18200541'
			] )

			->addTextarea( 'quote', [
				'label'        => 'Quote',
				'instructions' => 'Enter the quote.',
				'rows' => '4',
				'new_lines' => '',
				'required'     => 0,
				'default_value' => 'Helping Canadians navigate the mortgage process with confidence and clarity — every step of the way.'
			] )
		;

		$editor
			->addWysiwyg('post_editor', [
			    'label' => '',
			    'instructions' => '',
			    'required' => 0,
			    'conditional_logic' => [],
			    'wrapper' => [
			        'width' => '',
			        'class' => '',
			        'id' => '',
			    ],
			    'default_value' => '',
			    'tabs' => 'full', // text or visual
			    'toolbar' => 'all', // all or basic
			    'media_upload' => 0,
			    'delay' => 0,
			]);

		$image
			->addImage( 'post_image', [
				'label'        => 'Post image',
				'required'     => 0,
			] );

		$social
			->addGroup( 'post_anchor')
				->addText( 'title', [
					'label'        => 'Title',
					'required'     => 1,
				] )
				->addRepeater( 'anchor', [
					'label'        => __( 'Links list', 'ACF' ),
					'button_label' => __( 'Add link', 'ACF' ),
					'layout' => 'block',
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					]])

					->addLink('link', [
						'label' => 'Link'
					])
				->endRepeater()
			->endGroup()
			->addGroup( 'post_social' )
				->addTrueFalse('share', [
					'label' => 'Share?',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => [],
					'wrapper' => [
						'width' => '',
						'class' => '',
						'id' => '',
					],
					'message' => '',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				])
				->addText( 'title', [
					'label'        => 'Title',
					'required'     => 1,
					'conditional_logic' => [
						[
							[
								'field'    => 'share',
								'operator' => '==',
								'value'    => '1',
							]
						]
					],
				] )
			->endGroup();



		$editor->setLocation( 'post_type', '==', 'blog' );
		$author->setLocation( 'post_type', '==', 'blog' );
		$image->setLocation( 'post_type', '==', 'blog' );
		$social->setLocation( 'post_type', '==', 'blog' );
		$posts->setLocation('post_template', '==', 'blog.php');

		acf_add_local_field_group( $author->build() );
		acf_add_local_field_group( $image->build() );
		acf_add_local_field_group( $editor->build() );
		acf_add_local_field_group( $social->build() );
		acf_add_local_field_group( $posts->build() );
	} );


