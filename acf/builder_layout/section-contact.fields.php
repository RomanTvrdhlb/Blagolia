<?php
	use StoutLogic\AcfBuilder\FieldsBuilder;

	function section_contact($layout_name) {
		$layout = new FieldsBuilder($layout_name);

		$layout
			->addTrueFalse('shower', [
				'label' => __('Hide section?', 'ACF'),
				'instructions' => __('Activate to hide the block.', 'ACF'),
				'wrapper' => ['width' => 100 / 3],
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => __('Hide', 'ACF'),
				'ui_off_text' => __('Show', 'ACF'),
			])
			->addTrueFalse('breadcrumbs', [
				'label' => __('Show breadcrumbs?', 'ACF'),
				'instructions' => __('Activate to show the breadcrumbs.', 'ACF'),
				'wrapper' => ['width' => 100 / 3],
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => __('Show', 'ACF'),
				'ui_off_text' => __('Hide', 'ACF'),
			])
			->addText('section_id', [
				'label' => __('ID fields', 'ACF'),
				'instructions' => __('You can set a unique id for the section (And add them to the navigation)', 'ACF'),
				'wrapper' => ['width' => 100 / 3],
			])
			->addWysiwyg('editor', [
				'label' => 'WYSIWYG Field',
				'wrapper' => ['width' => '100'],
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
			])
			->addGroup('contacts_info', [
				'label' => 'Contacts Info',
				'layout' => 'block',
				'wrapper' => ['width' => '70'],
			])
				->addLink('location', [
					'label' => 'Location',
					'instructions' => 'Google map link',
					'return_format' => 'array',
				])
				->addRepeater('phones', [
					'label' => 'Phones',
					'required' => 1,
					'min' => 1,
					'layout' => 'row',
				])
					->addText('tel_heading', [
						'label' => 'Phone link Heading',
						'wrapper' => ['width' => 100 / 3],
					])
					->addLink('tel', [
						'label' => 'Phone link',
						'instructions' => 'tel',
						'return_format' => 'array',
					])
				->endRepeater()
				->addRepeater('emails', [
					'label' => 'Emails',
					'required' => 1,
					'min' => 1,
					'layout' => 'block',
				])
					->addLink('email', [
						'label' => 'Email link',
						'instructions' => 'mailto',
						'return_format' => 'array',
					])
				->endRepeater()
			->endGroup()
			->addImage('image', [
				'label' => 'Background Image',
				'wrapper' => ['width' => '30'],
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
			]);

		return [
			'layout' => $layout,
			'display' => 'block',
		];
	}


