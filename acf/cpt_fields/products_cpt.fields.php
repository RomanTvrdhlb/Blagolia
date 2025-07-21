<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	add_action( 'acf/init', function () {

		$options = new FieldsBuilder( 'product_info' );
		$catalog = new FieldsBuilder( 'catalog_info' );
		$image = new FieldsBuilder( 'product_group_image' );

		$image 
			->addImage('group_image', [
				'label' => 'Single Product Image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => [],
				'wrapper' => [
					'width' => '',
					'class' => '',
					'id' => '',
				],
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			]);

		$options
			->addImage('info_image', [
				'label' => 'Single Page Image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => [],
				'wrapper' => [
					'width' => '30',
					'class' => '',
					'id' => '',
				],
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			])
			->addWysiwyg('editor', [
				'label' => 'Single Page Content',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => [],
				'wrapper' => [
					'width' => '70',
					'class' => '',
					'id' => '',
				],
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
				'delay' => 0,
			]);

		$catalog
			->addImage('catalog_image', [
				'label' => 'Catalog Page Image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => [],
				'wrapper' => [
					'width' => '30',
					'class' => '',
					'id' => '',
				],
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			])
			->addWysiwyg('catalog_editor', [
				'label' => 'Catalog Page Content',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => [],
				'wrapper' => [
					'width' => '70',
					'class' => '',
					'id' => '',
				],
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
				'delay' => 0,
			]);

		$image->setLocation( 'post_type', '==', 'products' );
		$options->setLocation( 'post_type', '==', 'products' );
		$catalog->setLocation( 'post_type', '==', 'products' );

		acf_add_local_field_group( $image->build() );
		acf_add_local_field_group( $options->build() );
		acf_add_local_field_group( $catalog->build() );
	} );