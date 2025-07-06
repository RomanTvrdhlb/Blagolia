<?php
	function form_button_shortcode($atts) {
		$atts = shortcode_atts([
			'id'   => '',
			'text' => 'Click',
		], $atts);

		if (empty($atts['id'])) {
			return '';
		}

		$classes = ['main-button'];
		$extra_attrs = '';

		switch ($atts['id']) {
			case 'cleaning':
				$classes[] = 'main-button--red';
				break;
			case 'contacts':
				$classes[] = 'main-button--blue';
				$extra_attrs .= ' data-continue';
				break;
			case 'done':
				// no additional class
				break;
		}

		$id_attr = esc_attr($atts['id']);
		$text = esc_html($atts['text']);
		$class_attr = esc_attr(implode(' ', $classes));

		return "<button type=\"button\" id=\"{$id_attr}\" class=\"{$class_attr}\"{$extra_attrs}>{$text}</button>";
	}
	add_shortcode('form_button', 'form_button_shortcode');


//	================================================================================

	function form_radio_shortcode($atts) {
		$atts = shortcode_atts([
			'labels' => 'Yes,No', // по умолчанию две опции
		], $atts);

		$name = 'reminder_permission';
		$options = array_map('trim', explode(',', $atts['labels']));

		ob_start();
		echo '<div class="fields-list">';
		foreach ($options as $value) {
			$label = esc_html($value);
			$val = esc_attr($value);
			echo '
            <label class="radio-button">
                <input type="radio" name="' . $name . '" value="' . $val . '">
                <span>' . $label . '</span>
            </label>
        ';
		}
		echo '</div>';

		return ob_get_clean();
	}
	add_shortcode('form_radio', 'form_radio_shortcode');


