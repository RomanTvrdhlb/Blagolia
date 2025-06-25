<?php
	function theme_enqueue_scripts() {
		$manifest_path = THEME_DIR . '/assets/assets-manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );

			if ( $manifest && isset( $manifest['js'] ) ) {
				// 1. Подключаем vendors, если есть
				if ( isset( $manifest['js']['vendors'] ) ) {
					wp_register_script( 'vendors', THEME_URI . '/assets/' . $manifest['js']['vendors']['file'], array(), _S_VERSION, true );
					wp_enqueue_script( 'vendors' );
				}

				// 2. AJAX параметры
				global $categorySlug;

				wp_register_script( 'ajax_params', '', array(), null, false );
				wp_add_inline_script( 'ajax_params', 'ajax_params = ' . json_encode( array(
						'ajax_url'      => admin_url( 'admin-ajax.php' ),
						'once'          => wp_create_nonce( 'ajax_global' ),
						'shortcodes'    => get_custom_shortcodes_list(),
//						'category_slug' => $categorySlug,
						'theme_url'      => THEME_URI,
					) ) . ';'
				);
				wp_enqueue_script( 'ajax_params' );

				// 3. Подключаем main, учитывая зависимости
				if ( isset( $manifest['js']['main'] ) ) {
					$main_deps = array( 'ajax_params' );
					if ( isset( $manifest['js']['vendors'] ) ) {
						$main_deps[] = 'vendors';
					}

					wp_register_script( 'main', THEME_URI . '/assets/' . $manifest['js']['main']['file'], $main_deps, _S_VERSION, true );
					wp_enqueue_script( 'main' );
				}
			}
		}
	}

	// Добавление атрибута defer для основного скрипта
	function add_defer_attribute( $tag, $handle ) {
		if ( 'main' === $handle || 'vendors' === $handle ) {
			return str_replace( ' src', ' defer="defer" src', $tag );
		}

		return $tag;
	}


	add_filter( 'script_loader_tag', 'add_defer_attribute', 10, 3 );
	add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
