<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	add_action( 'acf/init', function () {

		$options = new FieldsBuilder( 'modals' );

		$options
			->addFlexibleContent( 'modals_layout', [
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => [],
				'wrapper'           => [
					'width' => '',
					'class' => '',
					'id'    => '',
				],
				'button_label'      => 'Add Banner',
				'min'               => '1',
				'max'               => '1',
			] )
			->addLayout( 'editors', [
				'label'   => 'Modal',
				'display' => 'block',
				'min'     => '',
				'max'     => '',
			])
				->addFields(editors(1))

			->addLayout( 'popup_1', [
				'label'   => 'Info popup',
				'display' => 'block',
				'min'     => '',
				'max'     => '',
			])
				->addWysiwyg('editor', [
				    'label' => false,
				    'required' => 0,
				    'tabs' => 'full',
				    'toolbar' => 'all',
				    'media_upload' => 0,
				    'delay' => 0,
				])
			->endFlexibleContent();


		$options->setLocation( 'post_type', '==', 'modals' );

		acf_add_local_field_group( $options->build() );
	} );


