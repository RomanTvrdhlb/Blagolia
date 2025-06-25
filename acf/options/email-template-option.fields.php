<?php

	use StoutLogic\AcfBuilder\FieldsBuilder;

	add_action( 'acf/init', function () {
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_sub_page( [
				'page_title'  => 'Quiz Email Settings',
				'menu_title'  => 'Quiz Email Settings',
				'parent_slug' => 'wpcf7', // Contact Form 7
				'capability'  => 'edit_posts',
				'menu_slug'   => 'quiz-email-settings',
			] );
		}

		$options = new FieldsBuilder( 'mail_options' );

		$options
			->addText( 'subject', [
				"label"         => 'Subject',
				'default_value' => 'Your Mortgage Magic Link',
			] )
			->addWysiwyg( 'table_editor', [
				'label'        => 'Email Template',
				'instructions' => 'Use [user-name], [user-email] and [magic-link]',
				'tabs'         => 'visual',
				'toolbar'      => 'all',
				'media_upload' => 0,
			] );

		$options->setLocation( 'options_page', '==', 'quiz-email-settings' );

		acf_add_local_field_group( $options->build() );
	} );
