<?php
function get_taxonomy_breadcrumbs( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$post_type  = get_post_type( $post_id );
	$taxonomies = get_object_taxonomies( $post_type );

	if ( empty( $taxonomies ) ) {
		return [];
	}

	foreach ( $taxonomies as $taxonomy ) {
		$tax_obj = get_taxonomy( $taxonomy );
		if ( $tax_obj && $tax_obj->hierarchical ) {
			$terms = wp_get_post_terms( $post_id, $taxonomy );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				$term        = $terms[0];
				$breadcrumbs = [];

				$ancestors = get_ancestors( $term->term_id, $taxonomy );
				$ancestors = array_reverse( $ancestors );
				foreach ( $ancestors as $ancestor_id ) {
					$ancestor      = get_term( $ancestor_id, $taxonomy );
					$breadcrumbs[] = [
						'label' => $ancestor->name,
						'url'   => get_term_link( $ancestor )
					];
				}

				$breadcrumbs[] = [
					'label' => $term->name,
					'url'   => get_term_link( $term )
				];

				return $breadcrumbs;
			}
		}
	}

	return [];
}

function get_breadcrumbs($color = '') {
	global $post;

	$breadcrumbs = [];

	// Главная
	$breadcrumbs[] = [
		'label' => get_the_title( get_option( 'page_on_front' ) ),
		'url'   => home_url()
	];

	// Страница таксономии
	if ( is_tax() ) {
		$taxonomy = get_queried_object();

		$post_types = get_taxonomy( $taxonomy->taxonomy )->object_type ?? [];

		if ( $post_types ) {
			$post_type = $post_types[0];
			$post_type_obj = get_post_type_object( $post_type );

			if ( $post_type_obj && ! empty( $post_type_obj->has_archive ) ) {
				$archive_url = get_post_type_archive_link( $post_type );
				if ( $archive_url ) {
					$breadcrumbs[] = [
						'label' => $post_type_obj->labels->name,
						'url'   => $archive_url
					];
				}
			} else {
				$page = get_archive_by_post( $post_type );
				if ( $page ) {
					$breadcrumbs[] = [
						'label' => get_the_title( $page ),
						'url'   => get_permalink( $page )
					];
				}
			}
		}

		$ancestors = get_ancestors( $taxonomy->term_id, $taxonomy->taxonomy );
		$ancestors = array_reverse( $ancestors );
		foreach ( $ancestors as $ancestor_id ) {
			$ancestor      = get_term( $ancestor_id, $taxonomy->taxonomy );
			$breadcrumbs[] = [
				'label' => $ancestor->name,
				'url'   => get_term_link( $ancestor )
			];
		}

		$breadcrumbs[] = [
			'label' => $taxonomy->name,
			'url'   => ''
		];

	} elseif ( is_singular() ) {
		$post_type = get_post_type();
		$post_type_obj = get_post_type_object( $post_type );

		if ( $post_type_obj && ! empty( $post_type_obj->has_archive ) ) {
			$archive_url = get_post_type_archive_link( $post_type );
			if ( $archive_url ) {
				$breadcrumbs[] = [
					'label' => $post_type_obj->labels->name,
					'url'   => $archive_url
				];
			}
		} else {
			$page = get_archive_by_post( $post_type );
			if ( $page ) {
				$breadcrumbs[] = [
					'label' => get_the_title( $page ),
					'url'   => get_permalink( $page )
				];
			}
		}

		$term_breadcrumbs = get_taxonomy_breadcrumbs( $post->ID );
		if ( $term_breadcrumbs ) {
			$breadcrumbs = array_merge( $breadcrumbs, $term_breadcrumbs );
		}

		$breadcrumbs[] = [
			'label' => get_the_title(),
			'url'   => ''
		];

	} elseif ( is_page() ) {
		if ( $post->post_parent ) {
			$ancestors = get_post_ancestors( $post );
			$ancestors = array_reverse( $ancestors );
			foreach ( $ancestors as $ancestor_id ) {
				$breadcrumbs[] = [
					'label' => get_the_title( $ancestor_id ),
					'url'   => get_permalink( $ancestor_id )
				];
			}
		}
		$breadcrumbs[] = [
			'label' => get_the_title(),
			'url'   => ''
		];

	} elseif ( is_search() ) {
		$breadcrumbs[] = [
			'label' => sprintf( __( 'Search results for: "%s"' ), get_search_query() ),
			'url'   => ''
		];

	} elseif ( is_404() ) {
		$breadcrumbs[] = [
			'label' => 'Ошибка 404',
			'url'   => ''
		];
	}

	// Вывод
	?>
	<nav class="breadcrumbs" style="--accent-color: <?= esc_attr($color); ?>">
		<ul>
			<?php foreach ( $breadcrumbs as $index => $item ) : ?>
				<?php if ( $item['url'] && $index !== array_key_last( $breadcrumbs ) ) : ?>
					<li><a href="<?= esc_url( $item['url'] ); ?>"><?= esc_html( $item['label'] ); ?></a></li>
				<?php else : ?>
					<li><span><?= esc_html( $item['label'] ); ?></span></li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</nav>
	<?php
}
