<?php

// 🔧 1. Задаём нужные CPT
	add_filter('fake_archive_supported_post_types', function () {
		return ['products', 'blog'];
	});

// 🧩 2. Опция и UI
	add_action('admin_menu', function () {
		add_options_page(
			'Post Type Archives',
			'Archives CPT',
			'manage_options',
			'fake_archives',
			'render_fake_archives_settings_page'
		);
	});

// ✅ 3. Хелпер: какие CPT поддерживаются
	function get_supported_fake_archive_post_types() {
		return array_filter(apply_filters('fake_archive_supported_post_types', []));
	}

// ✅ 4. UI настройки
	function render_fake_archives_settings_page() {
		if ( ! current_user_can('manage_options') ) return;

		if (
			isset($_POST['fake_archives_nonce']) &&
			wp_verify_nonce($_POST['fake_archives_nonce'], 'save_fake_archives')
		) {
			update_option('custom_fake_archives', $_POST['fake_archives'] ?? []);
			echo '<div class="updated"><p>Сохранено</p></div>';
		}

		$fake_archives = get_option('custom_fake_archives', []);
		$supported_types = get_supported_fake_archive_post_types();
		$post_types = get_post_types([], 'objects');
		$pages = get_pages();
		?>

        <div class="wrap">
            <h1>Архивные страницы для CPT</h1>
            <form method="post">
				<?php wp_nonce_field('save_fake_archives', 'fake_archives_nonce'); ?>
                <table class="form-table">
					<?php foreach ($supported_types as $pt_name) :
						if ( ! isset($post_types[$pt_name]) ) continue;
						$pt = $post_types[$pt_name]; ?>
                        <tr>
                            <th scope="row"><?= esc_html($pt->label); ?></th>
                            <td>
                                <select name="fake_archives[<?= esc_attr($pt_name); ?>]">
                                    <option value="">— Не выбрано —</option>
									<?php foreach ($pages as $page) : ?>
                                        <option value="<?= esc_attr($page->ID); ?>" <?= selected($fake_archives[$pt_name] ?? '', $page->ID); ?>>
											<?= esc_html($page->post_title); ?>
                                        </option>
									<?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
					<?php endforeach; ?>
                </table>
				<?php submit_button(); ?>
            </form>
        </div>
		<?php
	}

// 🔐 5. Блокируем удаление архивной страницы (и из корзины тоже!)
	add_action('before_delete_post', 'prevent_deletion_of_fake_archive_pages');
	add_action('wp_trash_post', 'prevent_deletion_of_fake_archive_pages');

	function prevent_deletion_of_fake_archive_pages($post_id) {
		if ( get_post_type($post_id) !== 'page' ) return;

		$archives = get_option('custom_fake_archives', []);
		if ( ! is_array($archives) ) return;

		if ( in_array($post_id, $archives) ) {
			wp_die(
				'Эта страница используется как архив для одного из типов записей. Сначала удалите привязку в настройках "Архивы CPT".',
				'Удаление запрещено',
				[
					'response' => 403,
					'back_link' => true
				]
			);
		}
	}


	add_filter('display_post_states', function($post_states, $post) {
		if ($post->post_type !== 'page') return $post_states;

		// Фейковые архивы CPT
		$fake_archives = get_option('custom_fake_archives', []);
		if (is_array($fake_archives)) {
			$post_types = get_post_types([], 'objects');

			foreach ($fake_archives as $cpt => $page_id) {
				if ((int) $page_id === $post->ID && isset($post_types[$cpt])) {
					$post_states["fake_archive_{$cpt}"] = 'Archive Page, ' . $post_types[$cpt]->labels->name;
				}
			}
		}

		return $post_states;
	}, 10, 2);

