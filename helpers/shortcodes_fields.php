<?php

	if ( ! function_exists( 'get_custom_shortcodes_list' ) ) {
		function get_custom_shortcodes_list(): array {
			$shortcodes = [
				'custom_google_reviews_widget' => 'Google reviews widget',
				'addtoany'                     => 'Share widget',
				'year'                     	   => 'Year (has attr from="2020" mode="short/full)',
			];

			$result = [];

			foreach ( $shortcodes as $tag => $label ) {
				if ( isset( $GLOBALS['shortcode_tags'][ $tag ] ) ) {
					$result[] = [
						'value' => $tag,
						'text'  => $label,
					];
				}
			}

			if ( post_type_exists( 'wpcf7_contact_form' ) ) {
				$cf7_forms = get_posts( [
					'post_type'      => 'wpcf7_contact_form',
					'post_status'    => 'publish',
					'posts_per_page' => -1,
				] );

				foreach ( $cf7_forms as $form ) {
					$result[] = [
						'value' => 'contact-form-7 id="' . $form->ID . '"',
						'text'  => 'Form: ' . $form->post_title,
					];
				}
			}

			return $result;
		}
	}





	add_action( 'acf/init', function () {
		add_filter( 'acf/load_field/name=get_shortcode', function ( $field ) {
			$choices         = [];
			$choices['none'] = '— Do not withdraw —';

			foreach ( get_custom_shortcodes_list() as $item ) {
				$choices[ $item['value'] ] = $item['text'];
			}

			$field['choices'] = $choices;

			return $field;
		} );
	} );

