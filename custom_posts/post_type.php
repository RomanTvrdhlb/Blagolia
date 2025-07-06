<?php
	function rename_categories_to_custom_name() {
		global $wp_taxonomies;
		if ( isset( $wp_taxonomies['category'] ) ) {
			$wp_taxonomies['category']->labels = (object) array_merge( (array) $wp_taxonomies['category']->labels, array(
				'name'              => 'Категории',
				'singular_name'     => 'Категория',
				'search_items'      => 'Искать категории',
				'all_items'         => 'Все категории',
				'parent_item'       => 'Родительская категория',
				'parent_item_colon' => 'Родительская категория:',
				'edit_item'         => 'Редактировать категорию',
				'update_item'       => 'Обновить категорию',
				'add_new_item'      => 'Добавить новую категорию',
				'new_item_name'     => 'Название новой категории',
				'menu_name'         => 'Категории',
			) );
		}
	}

	add_action( 'init', 'rename_categories_to_custom_name' );

	function rename_uncategorized_category() {
		$uncategorized = get_term_by( 'slug', 'uncategorized', 'category' );

		if ( $uncategorized ) {
			wp_update_term( $uncategorized->term_id, 'category', array(
				'name' => 'Без категории',
				'slug' => 'bez-kategorii', // Новый слаг
			) );
		}
	}

	add_action( 'init', 'rename_uncategorized_category' );

	if ( function_exists( 'acf_add_local_field_group' ) ) {
		acf_add_local_field_group( array(
			'key'      => 'group_tag_icon',
			'title'    => 'Иконка метки',
			'fields'   => array(
				array(
					'key'           => 'field_tag_icon',
					'label'         => 'Иконка',
					'name'          => 'tag_icon',
					'type'          => 'image',
					'instructions'  => 'Загрузите иконку для этой метки.',
					'return_format' => 'array',
					'preview_size'  => 'thumbnail',
					'library'       => 'all',
					'mime_types'    => 'jpg,jpeg,png,svg',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'taxonomy',
						'operator' => '==',
						'value'    => 'post_tag',
					),
				),
			),
			'show_ui'  => true,
			'style'    => 'seamless',
		) );
	}


	function remove_default_tags_metabox() {
		remove_meta_box( 'tagsdiv-post_tag', 'post', 'side' );
	}

	add_action( 'admin_menu', 'remove_default_tags_metabox' );

	function add_custom_tags_metabox() {
		add_meta_box(
			'custom_tags_metabox',         // ID метабокса
			'Метки',                       // Заголовок
			'render_custom_tags_metabox',  // Функция отображения
			'post',                        // Где отображать (тип записи)
			'side',                        // Позиция
			'default'                      // Приоритет
		);
	}

	add_action( 'add_meta_boxes', 'add_custom_tags_metabox' );

	function render_custom_tags_metabox( $post ) {
		$tags = get_terms( array(
			'taxonomy'   => 'post_tag',
			'hide_empty' => false,
		) );

		$post_tags = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );

		echo '<style>
        .custom-tag-checkbox {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }
        .custom-tag-checkbox input {
            margin-right: 10px;
        }
        .custom-tags-container {
            max-height: 200px;
            overflow-y: auto;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>';

		echo '<div class="custom-tags-container">';

		foreach ( $tags as $tag ) {
			$checked = in_array( $tag->term_id, $post_tags ) ? 'checked' : '';
			echo '<label class="custom-tag-checkbox">';
			echo '<input type="checkbox" name="custom_post_tags[]" value="' . esc_attr( $tag->term_id ) . '" ' . $checked . '> ';
			echo esc_html( $tag->name );
			echo '</label>';
		}

		echo '</div>';
	}

	function save_custom_tags( $post_id ) {
		if ( ! isset( $_POST['custom_post_tags'] ) ) {
			wp_set_post_tags( $post_id, array() );

			return;
		}

		$selected_tags = array_map( 'intval', $_POST['custom_post_tags'] );
		wp_set_post_tags( $post_id, $selected_tags, false );
	}

	add_action( 'save_post', 'save_custom_tags' );


	add_action( 'wp_ajax_filter_posts', 'filter_posts' );
	add_action( 'wp_ajax_nopriv_filter_posts', 'filter_posts' );


	function render_news_card( $post_id ) {
		$post = get_post( $post_id );

		if ( ! $post ) {
			return '<p>Пост не найден.</p>';
		}

		$title         = $post->post_title;
		$permalink     = get_permalink( $post_id );
		$excerpt       = wp_trim_words( $post->post_excerpt );
		$thumbnail     = get_the_post_thumbnail_url( $post_id, 'medium' );
		$categories    = get_the_category( $post_id );
		$category_name = $categories ? $categories[0]->name : 'Без категории';

		$subcategories = [];
		if ( $categories ) {
			$subcategories = get_categories( array(
				'parent'     => $categories[0]->term_id,
				'hide_empty' => false,
			) );
		}

		ob_start(); ?>

        <li class="post-list__item" data-aos="fade-up" data-aos-delay="250">
            <a href="<?php echo esc_url( $permalink ); ?>" class="news-card">
                <div class="news-card__image">
					<?php if ( $thumbnail ): ?>
                        <picture>
                            <img width="464" height="222" src="<?php echo esc_url( $thumbnail ); ?>"
                                 alt="<?php echo esc_attr( $title ); ?>">
                        </picture>
					<?php endif; ?>
                </div>
                <div class="editor">
                    <h2><?php echo esc_html( $title ); ?></h2>

					<?php if ( $excerpt ): ?>
                        <p><?php echo esc_html( $excerpt ); ?></p>
					<?php endif; ?>

                </div>
                <div class="news-card__bottom">
                    <div class="news-card__labels">
						<?php
							$tags = get_the_tags( $post_id );
							if ( $tags && ! is_wp_error( $tags ) ) :
								foreach ( $tags as $tag ) :
									$icon = get_field( 'tag_icon', 'term_' . $tag->term_id );

									if ( $icon ) :
										$icon_url = $icon['url'] ?? ''; ?>
                                        <span class="news-card__label">
                                    <?php if ( $icon_url ): ?>
                                        <img src="<?php echo esc_url( $icon_url ); ?>"
                                             alt="<?php echo esc_attr( $tag->name ); ?>" width="24" height="24">
									<?php endif; ?>
											<?php echo esc_html( $tag->name ); ?>
                                </span>
									<?php endif;
								endforeach;
							endif;
						?>
                    </div>

					<?php if ( ! empty( $subcategories ) ) : ?>
                        <div class="news-card__labels">
                            <?php foreach ( $subcategories as $subcategory ) : ?>
                                <span class="green-btn">
                                    <?php echo esc_html( $subcategory->name ); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
					<?php else : ?>
                        <span class="green-btn"><?php echo esc_html( $category_name ); ?></span>
					<?php endif; ?>
                </div>
            </a>
        </li>

		<?php
		return ob_get_clean();
	}



	function display_pagination( $total, $current ) {
		if ( $total < 2 ) {
			return '';
		}
		$prev_disabled = $current == 1 ? 'disabled' : '';
		$next_disabled = $current == $total ? 'disabled' : '';

		ob_start(); ?>
        <nav class="page-nav">
            <button
                    class="page-nav__btn prev"
				<?php echo $prev_disabled; ?>
				<?php echo $current > 1 ? 'data-page="' . ( $current - 1 ) . '"' : ''; ?>>
				<?php echo sprite( 9, 13, 'arrow' ); ?>
            </button>
            <ul>
				<?php for ( $i = 1; $i <= $total; $i ++ ) : ?>
                    <li>
                        <button
                                class="<?php echo $i == $current ? 'active' : ''; ?>"
							<?php echo $i != $current ? 'data-page="' . $i . '"' : ''; ?>>
							<?php echo $i; ?>
                        </button>
                    </li>
				<?php endfor; ?>
            </ul>
            <button
                    class="page-nav__btn next"
				<?php echo $next_disabled; ?>
				<?php echo $current < $total ? 'data-page="' . ( $current + 1 ) . '"' : ''; ?>>
				<?php echo sprite( 9, 13, 'arrow' ); ?>
            </button>
        </nav>
		<?php
		return ob_get_clean();

	}


	function filter_posts() {
		try {
			$paged    = intval( $_POST['page'] ?? 1 );
			$input_id = $_POST['category_id'] ?? '';

			if ( strpos( $input_id, 'all_posts_' ) === 0 ) {
				$category_id = intval( str_replace( 'all_posts_', '', $input_id ) );

				$query_args = array(
					'cat'            => $category_id,
					'posts_per_page' => 9,
					'paged'          => $paged,
				);
			} else {
				$subcategory_id = intval( $input_id );

				$query_args = array(
					'cat'            => $subcategory_id,
					'posts_per_page' => 9,
					'paged'          => $paged,
				);
			}

			$query = new WP_Query( $query_args );

			if ( $query->have_posts() ) {
				ob_start();

				while ( $query->have_posts() ) : $query->the_post();
					echo render_news_card( get_the_ID() );
					?>
				<?php
				endwhile;

				$posts_html = ob_get_clean();

				wp_reset_postdata();

				ob_start();

				echo display_pagination( $query->max_num_pages, $paged );

				$pagination_html = ob_get_clean();

				wp_send_json_success( array(
					'posts'      => $posts_html,
					'pagination' => $pagination_html,
					'current'    => $paged,
				) );
			} else {
				wp_send_json_error( 'Посты не найдены.' );
			}
		} catch ( Exception $e ) {
			wp_send_json_error( array(
				'message' => $e->getMessage(),
			), 500 );
		}
	}







