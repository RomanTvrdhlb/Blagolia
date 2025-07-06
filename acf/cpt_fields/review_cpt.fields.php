<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	add_action( 'acf/init', function () {

		$options = new FieldsBuilder( 'review_author' );

		$options
			->addText( 'name', [
				'label'        => 'Name',
				'instructions' => 'Enter the reviewer\'s name.',
				'required'     => 1,
			] )
			->addText('position', [
				'label' => 'Position',
				'instructions' => 'Enter the reviewer\'s position or company.',
				'required' => 0,
			]);

		$options->setLocation( 'post_type', '==', 'review' );

		acf_add_local_field_group( $options->build() );
	} );



