<?php use StoutLogic\AcfBuilder\FieldsBuilder;

	function icon_list_repeater(string $name, string $width = '100', string $layout = 'block', $iconWidth = 50, $max = ''): FieldsBuilder {
		$field = new FieldsBuilder($name . '_list');

		$field
			->addRepeater($name, [
				'label'        => ucfirst($name) . ' list',
				'button_label' => __('Add item', 'ACF'),
				'layout'       => $layout,
				'wrapper'      => ['width' => $width],
				'max'          => $max,
			])
			->addImage('icon', [
				'label'   => __('Icon', 'ACF'),
				'wrapper' => ['width' => $iconWidth],
			])
			->addLink('link', [
				'label'   => __('Link', 'ACF'),
				'wrapper' => ['width' => 100 - $iconWidth],
			])
			->endRepeater();

		return $field;
	}

