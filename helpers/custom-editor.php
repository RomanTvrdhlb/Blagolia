<?php

	// Передача параметров JS
	add_action('admin_print_footer_scripts', function () {
		if (!function_exists('get_custom_shortcodes_list')) {
			return;
		}

		$shortcodes = get_custom_shortcodes_list();
		?>
        <script type="text/javascript">
            window.ajax_params = {
                ajax_url: "<?php echo esc_url(admin_url('admin-ajax.php')); ?>",
                shortcodes: <?php echo json_encode($shortcodes); ?>
            };
        </script>
		<?php
	});

// Добавляем все кнопки в одну цепочку
	add_filter('mce_buttons', function ($buttons) {
		$custom_buttons = [
			'styleselect',
			'shortcode_button',
			'link_style_selector',
			'link_text_selector',
//			'range_selector',
//			'frame_selector',
//			'editor_acccent',
		];

		// Добавим все кнопки в конец
		return array_merge($buttons, $custom_buttons);
	});


// Добавляем все JS-плагины
	add_filter('mce_external_plugins', function ($plugins) {
		$base = get_template_directory_uri() . '/admin/js/';

		$plugins['shortcode_button']     = $base . 'shortcode-button.js';
		$plugins['link_style_selector']  = $base . 'custom-link-class.js';
		$plugins['link_text_selector']   = $base . 'custom-text-class.js';
//		$plugins['range_selector']       = $base . 'custom-range-editor.js';
//		$plugins['frame_selector']       = $base . 'custom-description-editor.js';
//		$plugins['editor_acccent']       = $base . 'custom-editor-accent.js';

		return $plugins;
	});


// Подключаем стили редактора
	add_action('admin_init', function () {
		add_editor_style(get_template_directory_uri() . '/assets/css/for-editor.css');
	});

// Обработка абзацев с кнопками
	function add_row_class_to_paragraphs_global($content) {
		if (empty($content)) return $content;

		$dom = new DOMDocument();
		libxml_use_internal_errors(true);
		$dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
		libxml_clear_errors();

		// 1. Добавляем .row в <p> с <a class="...">
		$paragraphs = $dom->getElementsByTagName('p');
		$toRemove = [];

		foreach ($paragraphs as $p) {
			$links = $p->getElementsByTagName('a');
			$hasClass = false;
			foreach ($links as $link) {
				if ($link->hasAttribute('class') && !empty($link->getAttribute('class'))) {
					$hasClass = true;
					break;
				}
			}
			if ($hasClass) {
				$existingClass = $p->getAttribute('class');
				$newClass = trim($existingClass . ' row');
				$p->setAttribute('class', $newClass);
			}

			// 2. Удаляем <p>, если внутри только <label class="range mode">
			if (
				$p->childNodes->length === 1 &&
				$p->firstChild->nodeName === 'label' &&
				$p->firstChild->hasAttributes()
			) {
				$label = $p->firstChild;
				$class = $label->getAttribute('class');
				if (strpos($class, 'range') !== false && strpos($class, 'mode') !== false) {
					$toRemove[] = $p;
				}
			}
		}

		// Заменяем <p><label></label></p> → <label></label>
		foreach ($toRemove as $p) {
			$p->parentNode->insertBefore($p->firstChild, $p);
			$p->parentNode->removeChild($p);
		}

		$html = $dom->saveHTML();
		$html = preg_replace('/^<!DOCTYPE.+?>/', '', $html);
		return $html;
	}

	add_filter('the_content', 'add_row_class_to_paragraphs_global', 20);
	add_filter('acf_the_content', 'add_row_class_to_paragraphs_global', 20);
	add_filter('render_block', function ($block_content, $block) {
		return add_row_class_to_paragraphs_global($block_content);
	}, 10, 2);

