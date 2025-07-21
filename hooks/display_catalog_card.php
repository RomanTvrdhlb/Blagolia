<?php
	function display_catalog_card( $post_id ) {
		if ( ! $post_id ) {
			return;
		}

		$title           = get_the_title( $post_id );
		$catalog_editor  = get_field( 'catalog_editor', $post_id );
		$catalog_image   = get_field( 'catalog_image', $post_id );
		$has_thumb       = has_post_thumbnail( $post_id );

		?>
		<div class="catalog-card">
			<div class="catalog-card__box editor">
				<?php if ( $catalog_editor ) : ?>
					<?= $catalog_editor; ?>
				<?php endif; ?>

				<a class="main-button main-button--transparent" href="<?= esc_url( get_permalink( $post_id ) ); ?>">
					View Product
				</a>
			</div>

			<?php if ( $catalog_image || $has_thumb ) : ?>
				<div class="catalog-card__image">
					<?php if ( $catalog_image ) : ?>
						<img
							src="<?= esc_url( $catalog_image['url'] ); ?>"
							alt="<?= esc_attr( $catalog_image['alt'] ?: $title ); ?>"
							loading="lazy"
						/>
					<?php else : ?>
						<?= get_the_post_thumbnail( $post_id, 'medium', [
							'alt'     => esc_attr( $title ),
							'loading' => 'lazy'
						] ); ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php
	}
