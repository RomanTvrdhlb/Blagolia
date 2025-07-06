<?php
	function current_year_shortcode($atts) {
		$atts = shortcode_atts([
			'from' => '',
			'mode' => 'full', // 'short' or 'full'
		], $atts);

		$currentYear = date('Y');

		if ($atts['from']) {
			$from = esc_html($atts['from']);
			if ($atts['mode'] === 'short') {
				$to = substr($currentYear, -2); // last 2 number
			} else {
				$to = $currentYear;
			}
			return "{$from}–{$to}";
		}

		return $currentYear;
	}
	add_shortcode('year', 'current_year_shortcode');
