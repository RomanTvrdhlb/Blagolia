<?php
	if ( ! defined( '_S_VERSION' ) ) {
		define( '_S_VERSION', '1.0.5' );
	}

	define('PRINT_TEMPLATE_NAME',  false); // Set true to show the template used

	define('BUILD', 	 get_template_directory_uri() . '/assets/');
	define('THEME_SLUG', basename(get_template_directory()));
	define('THEME_URI',  get_template_directory_uri());
	define('THEME_DIR',  get_template_directory());

	add_theme_support( 'title-tag' );


	require_once THEME_DIR . '/vendor/autoload.php';
	require_once THEME_DIR . '/acf/index.php';



	require_once THEME_DIR . '/includes/helpers.php';

	// ====================== Styles && Scripts ======================

	require_once THEME_DIR . '/includes/theme/enqueue-admin.php';
	require_once THEME_DIR . '/includes/theme/enqueue-styles.php';
	require_once THEME_DIR . '/includes/theme/enqueue-scripts.php';


	require_once THEME_DIR . '/shortcodes/index.php';

	function theme_setup() {
		add_theme_support( 'post-thumbnails' );
	}

	add_action( 'after_setup_theme', 'theme_setup' );


	// Добавление lazy loading ко всем изображениям
	function add_lazy_loading_to_all_images( $content ) {
		if ( is_admin() || empty( $content ) ) {
			return $content;
		}

		$content = preg_replace_callback(
			'/<img(?![^>]*loading=["\']?(?:lazy|eager|auto)["\']?)[^>]+>/i',
			function ( $matches ) {
				return str_replace( '<img', '<img loading="lazy"', $matches[0] );
			},
			$content
		);

		return $content;
	}

	add_filter( 'the_content', 'add_lazy_loading_to_all_images' );


	// Подключение дополнительных файлов

	$helpers = array(
//		'/ajax-actions/load_post_content.php',
		'/ajax-actions/load_blog_posts.php',
		'/ajax-actions/comments.php',
		'/ajax-actions/quiz-save.php',
		'/ajax-actions/quiz-load.php',


		'/helpers/fake_archive_pages.php',
		'/helpers/clean_the_content.php',
		'/helpers/default_reset.php',
		'/helpers/allow_svg_upload.php',
		'/helpers/contact_form_hooks.php',
		'/helpers/menus.php',

		'/helpers/custom-editor.php',
		'/helpers/remove_post_slug.php',
		'/helpers/shortcodes_fields.php',


		'/custom_posts/post_type_faq.php',
		'/custom_posts/post_type_services.php',
		'/custom_posts/post_type_blog.php',
		'/custom_posts/post_type_reviews.php',
		'/custom_posts/post_type_modals.php',

		'/hooks/display_post_card.php',
		'/hooks/display_services_card.php',
		'/hooks/display_breadcrumbs.php',
		'/hooks/display_image.php',
		'/hooks/display_gallery.php',
		'/hooks/display_tabs.php',
		'/hooks/display_post_content.php',
		'/hooks/display_editors_blocks.php',
		'/hooks/display_icon_link_list.php',
		'/hooks/display_main_top.php',
		'/hooks/display_sprite.php',

		'/includes/GoogleReviews/init.php'
	);

	foreach ( $helpers as $helper ) {
		require_once THEME_DIR . $helper;
	}


	function register_missing_media() {
		$upload_dir = wp_get_upload_dir();
		$dir = $upload_dir['basedir'];
		$url = $upload_dir['baseurl'];

		$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

		foreach ($rii as $file) {
			if ($file->isDir()) continue;

			$filepath = $file->getPathname();
			$rel_path = str_replace($dir, '', $filepath);
			$filetype = wp_check_filetype($filepath);

			if (!in_array($filetype['type'], ['image/jpeg', 'image/png', 'image/gif'])) continue;

			$exists = attachment_url_to_postid($url . $rel_path);
			if ($exists) continue;

			$attachment = [
				'guid'           => $url . $rel_path,
				'post_mime_type' => $filetype['type'],
				'post_title'     => basename($filepath),
				'post_content'   => '',
				'post_status'    => 'inherit'
			];

			$attach_id = wp_insert_attachment($attachment, $filepath);
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$attach_data = wp_generate_attachment_metadata($attach_id, $filepath);
			wp_update_attachment_metadata($attach_id, $attach_data);
		}

		echo 'Импорт завершён.';
	}

//	add_action('init', function () {
//		if (current_user_can('administrator') && !get_option('media_sync_done')) {
//			register_missing_media();
//			update_option('media_sync_done', true); // чтобы не запустилось снова
//		}
//	});











































