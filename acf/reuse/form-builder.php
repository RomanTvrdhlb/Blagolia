<?php use StoutLogic\AcfBuilder\FieldsBuilder;

	function form_builder(string $name): FieldsBuilder {
		$field = new FieldsBuilder($name . '_list');

		$field
			->addFlexibleContent($name, [
				'label'        =>  false,
				'button_label' => __('Add row', 'ACF'),
				'layout'       => 'block',
				'wrapper' => ['width' => 50],
			])

				// Layout: Form Input Currency
				->addLayout('form_input_currency', [
					'label'   => 'Text Input',
					'display' => 'block',
				])
					->addText('label', [
						'label' => false,
						'instructions' => 'Input label',
						'wrapper' => ['width' => 65],
					])
					->addLink('info_popup',[
						'label'   => false,
						'wrapper' => ['width' => 35],
						'instructions' => 'Info popup',

					])
					->addText('placeholder', [
						'label' => false,
						'instructions' => 'Input placeholder',
						'wrapper' => ['width' => 100/3],
						'default_value' => '300,000',
						'required' => 1
					])
					->addText('name', [
						'label' => false,
						'instructions' => 'Input name',
						'wrapper' => ['width' => 100/3],
						'default_value' => '',
						'required' => 1
					])
					->addText('id', [
						'label' => false,
						'instructions' => 'Input ID',
						'wrapper' => ['width' => 100/3],
						'default_value' => '',
						'required' => 1
					])

				->addLayout('form_description', [
					'label'   => 'Description',
					'display' => 'block',
				])
					->addText('btn')
					->addWysiwyg('editor', [
					    'label' => false,
					    'instructions' => '',
					    'required' => 0,
					    'conditional_logic' => [],
					    'wrapper' => [
					        'width' => '',
					        'class' => '',
					        'id' => '',
					    ],
					    'default_value' => '',
					    'tabs' => 'visual',
					    'toolbar' => 'all',
					    'media_upload' => 0,
					    'delay' => 0,
					])

				->addLayout('form_input_select', [
					'label'   => 'Select',
					'display' => 'block',
				])
					->addText('label', [
						'label' => false,
						'instructions' => 'Input label',
						'wrapper' => ['width' => 65],
					])
					->addLink('info_popup',[
						'label'   => false,
						'wrapper' => ['width' => 35],
						'instructions' => 'Info popup',

					])
					->addText('name', [
						'label' => false,
						'instructions' => 'Select name',
						'wrapper' => ['width' => 100/2],
						'required' => 1
					])
					->addText('id', [
						'label' => false,
						'instructions' => 'Select ID',
						'wrapper' => ['width' => 100/2],
						'required' => 1
					])
					->addRepeater('options',[
						'label' => false,
						'instructions' => 'Select option & value',
						'display' => 'table',
					])
						->addText('label')
						->addText('value')
					->endRepeater()

					->addTrueFalse('additional_fields_enabler', [
						'label' => __('True / False Additional fields', 'ACF'),
						'required' => 0,
						'ui' => 1,
						'ui_on_text' => '',
						'ui_off_text' => '',
					])

					->addGroup('additional_fields',[
						'conditional_logic' => [
							[
								[
									'field'    => 'additional_fields_enabler',
									'operator' => '==',
									'value'    => '1',
								],
							],
						],
					])
						->addText('label', [
							'label' => false,
							'instructions' => 'Input label',
							'wrapper' => ['width' => 65],
						])
						->addLink('info_popup',[
							'label'   => false,
							'wrapper' => ['width' => 35],
							'instructions' => 'Info popup',

						])
					->endGroup()
				->addLayout('form_subfields', [
					'label'   => 'Subfields',
					'display' => 'block',
				])
					->addText('label', [
						'label' => false,
						'instructions' => 'Input label',
						'wrapper' => ['width' => 65],
					])
					->addLink('info_popup',[
						'label'   => false,
						'wrapper' => ['width' => 35],
						'instructions' => 'Info popup',

					])

					->addFlexibleContent('Subfields', [
						'label'        =>  false,
						'layout'       => 'block',
					])

						->addLayout('form_subfield_input', [
							'label'   => 'Text Input',
							'display' => 'block',
						])
							->addText('title', [
								'label'   => 'Title',
								'wrapper' => [ 'width' => 100 ],
							])
							->addText('placeholder', [
								'label' => false,
								'instructions' => 'Input placeholder',
								'wrapper' => ['width' => 100/3],
								'default_value' => '300,000',
								'required' => 1
							])
							->addText('name', [
								'label' => false,
								'instructions' => 'Input name',
								'wrapper' => ['width' => 100/3],
								'default_value' => '',
								'required' => 1
							])
							->addText('id', [
								'label' => false,
								'instructions' => 'Input ID',
								'wrapper' => ['width' => 100/3],
								'default_value' => '',
								'required' => 1
							])

						->addLayout('form_subfield_select', [
							'label'   => 'Select',
							'display' => 'block',
						])
							->addText('title', [
								'label' => 'Title',
								'wrapper' => ['width' => 100],
							])
							->addText('name', [
								'label' => false,
								'instructions' => 'Select name',
								'wrapper' => ['width' => 100/2],
								'required' => 1
							])
							->addText('id', [
								'label' => false,
								'instructions' => 'Select ID',
								'wrapper' => ['width' => 100/2],
								'required' => 1
							])
							->addRepeater('options',[
								'label' => false,
								'instructions' => 'Select option & value',
								'display' => 'table',
							])
								->addText('label')
								->addText('value')
							->endRepeater()

					->endFlexibleContent()


			->endFlexibleContent();

		return $field;
	}


