<?php
	function render_reviews_widget(): string {
		$rating = get_option('google_reviews_rating');
		$count  = get_option('google_reviews_count');

		if (!$rating || !$count) {
			$rating = get_option('google_reviews_default_rating', '5.0');
			$count  = get_option('google_reviews_default_count', '1');
		}

		$starLevel = max(1, min(5, floor(floatval($rating))));
		$starIcon = 'Stars' . $starLevel;

		ob_start();
		?>
        <div class="reviews">
            <span class="reviews__logo sprite"><?= sprite('48', '16', 'Google') ?></span>
            <div class="reviews__inner">
                <span class="reviews__title"><?= __('Google Reviews', 'GoogleReviews') ?></span>
                <span class="reviews__value"><?= number_format_i18n($count, 0); ?> <?= __('reviews', 'GoogleReviews') ?></span>
            </div>
            <span class="reviews__rating">
            <?= esc_html($rating); ?>
            <i class="sprite"><?= sprite('120', '24', $starIcon) ?></i>
        </span>
        </div>
		<?php
		return ob_get_clean();
	}


	add_shortcode('custom_google_reviews_widget', 'render_reviews_widget');

