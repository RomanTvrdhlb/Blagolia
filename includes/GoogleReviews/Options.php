<?php

	add_action('admin_menu', function () {
		add_submenu_page(
			'edit.php?post_type=review', // под CPT Review
			'Google Reviews Settings',
			'Settings Page',
			'manage_options',
			'google_reviews_settings',
			'render_google_reviews_settings_page'
		);
	});

	function render_google_reviews_settings_page() {
		?>
		<div class="wrap">
			<h1>Google Reviews Settings</h1>
			<form method="post" action="options.php">
				<?php
					settings_fields('google_reviews_options');
					do_settings_sections('google_reviews_settings');
					submit_button();
				?>
			</form>
		</div>
		<?php
	}

	add_action('admin_init', function () {
		register_setting('google_reviews_options', 'google_reviews_api_key');
		register_setting('google_reviews_options', 'google_reviews_place_id');
		register_setting('google_reviews_options', 'google_reviews_default_rating');
		register_setting('google_reviews_options', 'google_reviews_default_count');

		add_settings_section('google_reviews_main_section', '', null, 'google_reviews_settings');

		add_settings_field('google_reviews_api_key', 'API Key', function () {
			$value = esc_attr(get_option('google_reviews_api_key'));
			echo "<input type='text' name='google_reviews_api_key' value='$value' class='regular-text'>";
		}, 'google_reviews_settings', 'google_reviews_main_section');

		add_settings_field('google_reviews_place_id', 'Place ID', function () {
			$value = esc_attr(get_option('google_reviews_place_id'));
			echo "<input type='text' name='google_reviews_place_id' value='$value' class='regular-text'>";
		}, 'google_reviews_settings', 'google_reviews_main_section');

		add_settings_field('google_reviews_default_rating', 'Default Rating', function () {
			$value = esc_attr(get_option('google_reviews_default_rating', '5.0'));
			echo "<input type='text' name='google_reviews_default_rating' value='$value' class='small-text'>";
		}, 'google_reviews_settings', 'google_reviews_main_section');

		add_settings_field('google_reviews_default_count', 'Default Reviews Count', function () {
			$value = esc_attr(get_option('google_reviews_default_count', '1'));
			echo "<input type='text' name='google_reviews_default_count' value='$value' class='small-text'>";
		}, 'google_reviews_settings', 'google_reviews_main_section');

	});

