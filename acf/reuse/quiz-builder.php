<?php use StoutLogic\AcfBuilder\FieldsBuilder;

	function quiz_builder(string $name): FieldsBuilder {
		$field = new FieldsBuilder($name . '_constructor');

		$field  ->addFlexibleContent($name, [
			'instructions'      => 'Add input fields here.',
			'required'          => 0,
			'wrapper'           => [
				'width' => '',
				'class' => '',
				'id'    => '',
			],
			'button_label'      => 'Add input field',
			'min'               => '',
			'max'               => '',
		])
			// Layout: Text Input
			->addLayout('text_input', [
				'label'   => 'Text Input',
				'display' => 'block',
			])
			->addText('label', [
				'label' => '',
				'instructions' => 'Input label',
				'wrapper' => ['width' => 75],
			])
			->addTrueFalse('required', [
				'label' => '',
				'instructions' => 'Required field?',
				'wrapper' => ['width' => '25'],
				'ui' => 1,
			])
			->addText('placeholder', [
				'label' => '',
				'instructions' => 'Input placeholder',
				'wrapper' => ['width' => 100 / 2],
				'required' => 1
			])
			->addText('name', [
				'label' => '',
				'instructions' => 'Input name (attribute)',
				'wrapper' => ['width' => 100 / 2],
				'required' => 1
			])

			// Layout: Number Input
			->addLayout('number_input', [
				'label'   => 'Number Input',
				'display' => 'block',
			])
			->addText('label', [
				'label' => '',
				'instructions' => 'Input label',
				'wrapper' => ['width' => '75'],
			])
			->addTrueFalse('required', [
				'label' => '',
				'instructions' => 'Required field?',
				'wrapper' => ['width' => '25'],
				'ui' => 1,
			])
			->addNumber('placeholder', [
				'label' => '',
				'instructions' => 'Input placeholder',
				'wrapper' => ['width' => 100 / 2],
				'required' => 1
			])
			->addText('name', [
				'label' => '',
				'instructions' => 'Input name (attribute)',
				'wrapper' => ['width' => 100 / 2],
				'required' => 1
			])

			// Layout: Phone Input
			->addLayout('phone_input', [
				'label'   => 'Phone Input',
				'display' => 'block',
			])
			->addText('label', [
				'label' => '',
				'instructions' => 'Input label',
				'wrapper' => ['width' => '75'],
			])
			->addTrueFalse('required', [
				'label' => '',
				'instructions' => 'Required field?',
				'wrapper' => ['width' => '25'],
				'ui' => 1,
			])
			->addText('placeholder', [
				'label' => '',
				'instructions' => 'Input placeholder',
				'wrapper' => ['width' => 50],
				'required' => 1,
			])
			->addText('name', [
				'label' => '',
				'instructions' => 'Input name (attribute)',
				'wrapper' => ['width' => 50],
				'required' => 1,
			])


			// Layout: Email Input
			->addLayout('email_input', [
				'label'   => 'Email Input',
				'display' => 'block',
			])
			->addText('label', [
				'label' => '',
				'instructions' => 'Input label',
				'wrapper' => ['width' => '75'],
			])
			->addTrueFalse('required', [
				'label' => '',
				'instructions' => 'Required field?',
				'wrapper' => ['width' => '25'],
				'ui' => 1,
			])
			->addText('placeholder', [
				'label' => '',
				'instructions' => 'Input placeholder',
				'wrapper' => ['width' => 50],
				'required' => 1,
			])
			->addText('name', [
				'label' => '',
				'instructions' => 'Input name (attribute)',
				'wrapper' => ['width' => 50],
				'required' => 1,
			])


			// Layout: Date Input
			->addLayout('date_input', [
				'label'   => 'Date Input',
				'display' => 'block',
			])
			->addText('label', [
				'label' => '',
				'instructions' => 'Input label',
				'wrapper' => ['width' => '50'],
			])
			->addTrueFalse('required', [
				'label' => '',
				'instructions' => 'Required field?',
				'wrapper' => ['width' => '25'],
				'ui' => 1,
			])
			->addTrueFalse('type', [
				'label' => '',
				'instructions' => 'Input type',
				'wrapper' => ['width' => '25'],
				'ui' => 1,
				'default_value' => 0,
				'ui_on_text' => 'Multiple',
				'ui_off_text' => 'Single',
			])
			->addText('placeholder', [
				'label' => '',
				'instructions' => 'Placeholder',
				'wrapper' => ['width' => '50'],
				'required' => 1
			])
			->addText('name', [
				'label' => '',
				'instructions' => 'Input name (attribute)',
				'wrapper' => ['width' => '50'],
				'required' => 1
			])


			// Layout: Radio Group
			->addLayout('radio_group', [
				'label'   => 'Radio Group',
				'display' => 'block',
			])
			->addTrueFalse('required', [
				'label' => '',
				'instructions' => 'Required field?',
				'wrapper' => ['width' => '20'],
				'ui' => 1,
			])
			->addText('name', [
				'label' => '',
				'instructions' => 'Input name (attribute)',
				'wrapper' => ['width' => '80'],
			])
			->addRepeater('options', [
				'label' => '',
				'instructions' => 'Radio buttons',
				'layout' => 'row',
				'button_label' => 'Add radio button',
				'wrapper' => ['width' => '100'],
			])
			->addText('option_label', [
				'label' => '',
				'instructions' => 'Radio text',
			])
			->endRepeater()


			// Layout: Checkbox Group
			->addLayout('checkbox_group', [
				'label'   => 'Checkbox Group',
				'display' => 'block',
			])

			->addRepeater('options', [
				'label' => 'Checkbox Options',
				'layout' => 'table',
				'button_label' => 'Add Option',
				'wrapper' => ['width' => '100'],
			])
				->addTrueFalse('required', [
					'label' => '',
					'instructions' => 'Required field?',
					'wrapper' => ['width' => '20'],
					'ui' => 1,
				])
				->addText('name', [
					'label' => '',
					'instructions' => 'Input name (attribute)',
					'wrapper' => ['width' => '40'],
				])
				->addText('option_label', [
					'label' => '',
					'instructions' => 'Checkbox text',
					'wrapper' => ['width' => '40'],
				])
			->endRepeater()

			// Layout: Select
			->addLayout('select', [
				'label'   => 'Select',
				'display' => 'block',
			])

				->addTrueFalse('required', [
					'label' => '',
					'instructions' => 'Required field?',
					'wrapper' => ['width' => '20'],
					'ui' => 1,
				])
				->addTrueFalse('type', [
					'label' => '',
					'instructions' => 'Input type',
					'wrapper' => ['width' => '20'],
					'ui' => 1,
					'default_value' => 0,
					'ui_on_text' => 'Multiple',
					'ui_off_text' => 'Single',
				])
				->addText('name', [
					'label' => '',
					'instructions' => 'Name',
					'wrapper' => ['width' => '30'],
					'required' => 1
				])

				->addText('label', [
					'label' => '',
					'instructions' => 'label',
					'wrapper' => ['width' => '30'],
					'required' => 0
				])


				->addRepeater('options', [
					'label' => 'Checkbox Options',
					'layout' => 'table',
					'button_label' => 'Add Option',
					'wrapper' => ['width' => '100'],
				])
					->addText('option', [
						'label' => '',
						'instructions' => 'option',
						'wrapper' => ['width' => '50'],
						'required' => 1
					])
					->addText('value', [
						'label' => '',
						'instructions' => 'value',
						'wrapper' => ['width' => '50'],
						'required' => 1
					])
				->endRepeater()

				// Layout: Text Input
				->addLayout('textarea', [
					'label'   => 'Textarea',
					'display' => 'block',
				])
				->addText('label', [
					'label' => '',
					'instructions' => 'Input label',
					'wrapper' => ['width' => 75],
				])
				->addTrueFalse('required', [
					'label' => '',
					'instructions' => 'Required field?',
					'wrapper' => ['width' => '25'],
					'ui' => 1,
				])
				->addText('placeholder', [
					'label' => '',
					'instructions' => 'Input placeholder',
					'wrapper' => ['width' => 100 / 2],
					'required' => 1
				])
				->addText('name', [
					'label' => '',
					'instructions' => 'Input name (attribute)',
					'wrapper' => ['width' => 100 / 2],
					'required' => 1
				])



			->endFlexibleContent();

		return $field;
	}


