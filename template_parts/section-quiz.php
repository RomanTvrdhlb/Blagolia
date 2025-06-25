<?php
	$shower           = get_sub_field( 'shower' );
	$formId           = get_sub_field( 'form_select' );
	$editors          = get_sub_field( 'editors' );
	$quiz_questions   = get_sub_field( 'quiz_questions' );
	$last             = get_sub_field( 'last_slide_group' );
	$settings_group   = get_sub_field( 'settings_group' );
	$header           = $settings_group['header'];

	$leaving_settings = $settings_group['leaving_settings'];
	$save_settings = $settings_group['save_settings'];

	$email_settings = $settings_group['email_settings'];
	$email_coll = $settings_group['email_coll'];

	$drawer_settings = $settings_group['drawer_settings'];
	$phone = $drawer_settings['phone'] ?? [];
	$send  = $drawer_settings['send'] ?? [];
	$data  = $drawer_settings['data'] ?? [];

	function render_flexible_inputs( $fields ) {
		if ( ! $fields || ! is_array( $fields ) ) {
			return;
		}

		foreach ( $fields as $field ) {
			$layout       = $field['acf_fc_layout'];
			$required     = ! empty( $field['required'] ) ? 'required' : '';
			$label        = $field['label'] ?? '';
			$name         = $field['name'] ?? '';
			$placeholder  = $field['placeholder'] ?? '';
			$default_date = $field['default_date'] ?? '';
			$options      = $field['options'] ?? [];


//        if (!$name || $layout === 'checkbox_group') {
//            continue;
//        }

			$sanitized_name  = esc_attr( sanitize_title( $name ) );

			switch ( $layout ) {
				case 'text_input':
				case 'number_input':
				case 'phone_input':
				case 'email_input':
					$type = str_replace( '_input', '', $layout ); // text, number, phone, email
					?>
                    <label class="full-row">
						<?php if ( $label ) : ?>
                            <span class="<?= $required ? 'required' : ''; ?>">
                                <?= esc_html( $label ); ?>
                            </span>
						<?php endif; ?>

                        <input type="<?= esc_attr( $type === 'phone' ? 'tel' : $type ); ?>"
                               name="<?= $sanitized_name; ?>"
                               placeholder="<?= esc_attr( $placeholder ); ?>"
							<?= $required; ?>
                        >
                    </label>
					<?php
					break;

				case 'textarea': ?>

                    <label class="full-row">
						<?php if ( $label ) : ?>
                            <span class="<?= $required ? 'required' : ''; ?>">
                                <?= esc_html( $label ); ?>
                            </span>
						<?php endif; ?>
                        <textarea name="<?= $sanitized_name; ?>"
                                  placeholder="<?= esc_attr( $placeholder ); ?> <?= $required; ?>"></textarea>
                    </label>
					<?php
					break;

				case 'date_input':
					$type = $field['type'] ? 'range' : 'single'; ?>

                    <label class="full-row" data-calendar="<?= $type; ?>">
                        <span class="<?= $required ? 'required' : ''; ?>"> <?= esc_html( $label ); ?></span>
                        <input type="text" <?= $required; ?> name="<?= $sanitized_name; ?>"
                               placeholder="<?= esc_attr( $placeholder ); ?>" class="main-form__input">
                        <button type="button" class="main-form__btn">
							<?= sprite( '24', '24', 'calendar' ) ?>
                        </button>
                    </label>

					<?php
					break;

				case 'radio_group':
					if ( $options ) : ?>
						<?php foreach ( $options as $option ) :
							$option_label = $option['option_label'] ?? ''; ?>
                            <label class="radio-button">
                                <input value="<?= esc_html( $option_label ); ?>" type="radio"
                                       name="<?= $sanitized_name; ?>"<?= $required; ?>>
                                <span><?= esc_html( $option_label ); ?></span>
                            </label>
						<?php endforeach; ?>
					<?php
					endif;
					break;

				case 'checkbox_group':
					if ( $options ) :
						foreach ( $options as $option ) :
							$option_label = $option['option_label'] ?? ''; ?>
                            <label class="custom-checkbox">
                                <input type="checkbox" name="<?= $option['name']; ?>"
                                       value="<?= esc_html( $option_label ); ?>" <?= $option['required'] ? 'required' : ''; ?>>
                                <span><?= esc_html( $option_label ); ?></span>
                            </label>
						<?php endforeach; ?>
					<?php
					endif;
					break;

				case 'select':
					$type = $field['type'] ? 'multiple' : 'single';
					$name    = $field['name'];
					$options = $field['options'];
					?>

                    <label class="full-row">
						<?php if ( $label ) : ?>
                            <span class="<?= $required ? 'required' : ''; ?>">
                                <?= esc_html( $label ); ?>
                            </span>
						<?php endif; ?>


                        <div class="custom-select <?= $type; ?> default-select" data-name="<?= $name; ?>">
                            <div class="select-field">
                                <div class="selected-options"><span class="placeholder"></span></div>
                                <div class="arrow-down">
                                    <i class="icon-arrow-down"></i>
                                </div>
                            </div>

							<?php if ( $options ) : ?>
                                <ul class="options-container">
									<?php foreach ( $options as $index => ['option' => $value, 'value' => $label] ): ?>
                                        <li class="option <?= $index === 0 && $required ? 'active' : ''; ?>"
                                            data-value="<?= esc_attr( $value ); ?>">
                                            <span class="option-text"><?= esc_html( $label ); ?></span>
                                        </li>
									<?php endforeach; ?>
                                </ul>
							<?php endif; ?>
                        </div>
                    </label>
            <?php break;
			}
		}
	}


	if ( ! $shower ) : ?>
        <section class="section-quiz" <?php if ( get_sub_field( 'section_id' ) ) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="option-menu">
                <button class="option-menu__close">
					<?= sprite( 24, 24, 'close' ) ?>
                </button>

                <ul class="option-menu__list">
                    <li class="option-menu__item">
                        <a href="tel:<?= esc_attr($phone['text'] ?? '') ?>" class="option-menu__link">
							<?= sprite(24, 24, 'phone') ?>
                            <span>
                <?= esc_html($phone['text'] ?? '') ?>
								<?php if (!empty($phone['sub'])): ?>
                                    <i><?= esc_html($phone['sub']) ?></i>
								<?php endif; ?>
            </span>
                        </a>
                    </li>
                    <li class="option-menu__item">
                        <button class="option-menu__link" data-continue>
							<?= sprite(24, 24, 'mail') ?>
                            <span>
                <?= esc_html($send['text'] ?? '') ?>
								<?php if (!empty($send['sub'])): ?>
                                    <i><?= esc_html($send['sub']) ?></i>
								<?php endif; ?>
            </span>
                        </button>
                    </li>
                    <li class="option-menu__item">
                        <button class="option-menu__link" data-choice>
							<?= sprite(24, 24, 'settings') ?>
                            <span>
                <?= esc_html($data['text'] ?? '') ?>
								<?php if (!empty($data['sub'])): ?>
                                    <i><?= esc_html($data['sub']) ?></i>
								<?php endif; ?>
            </span>
                        </button>
                    </li>
                    <li class="option-menu__item">
                        <button class="option-menu__lang">
							<?= sprite(24, 24, 'lang') ?>
                            <span>Language: <i>English</i></span>
                        </button>
                    </li>
                </ul>

                <div class="option-menu__bottom editor">
                    <?= $drawer_settings['editor']?>
                </div>

                <div class="option-menu__wrapp">
                    <button class="option-menu__back">
						<?= sprite( 24, 24, 'back' ) ?>
                    </button>

                    <ul class="option-menu__list">
                        <li class="option-menu__item">
                            <a href="#" class="option-menu__link">
                                <span>French</span>
                            </a>
                        </li>

                        <li class="option-menu__item">
                            <a href="#" class="option-menu__link active">
                                <span>English</span>
                            </a>
                        </li>

                    </ul>

                    <div class="option-menu__bottom">
                        <span class="option-menu__title">Privacy Policy / Terms of Service</span>
                        <p>© 2025 Mortgagefy, Powered by LD Financial Group Ltd., FSRA 12034</p>
                    </div>
                </div>
            </div>

            <div class="fixed-block section-quiz__modal leave">
                <div class="container">
                    <div class="section-quiz__inner">
                        <div class="section-quiz__top">
                            <div class="section-quiz__logo" data-exit>
								<?= display_image( $header['logo'], 182, 36 ) ?>
                            </div>

                            <div class="section-quiz__wrapp">
                                <div class="editor">
									<?= $header['editor'] ?>
                                </div>

                                <a href="#" class="section-quiz__setting close-btn">
                                    <i class="sprite">
										<?= sprite(24, 24, 'close') ?>
                                    </i>
									<?= __('Close', "ACF")?>
                                </a>
                            </div>
                        </div>
                        <div class="section-quiz__modal-coll left">
                            <div class="editor">
								<?= display_image( $leaving_settings['desktop_image'], '380', '380', 'desktop-image' ) ?>
								<?= display_image( $leaving_settings['mobile_image'], '220', '220', 'mobile-image' ) ?>
                            </div>
                        </div>

                        <div class="section-quiz__modal-coll right">
                            <div class="editor">
								<?= $leaving_settings['editor'] ?>
                                <div class="row">
                                    <a href="<?php echo home_url(); ?>" class="quiz-btn quiz-btn--transparent"><?= __( 'Yes, leave the application', 'ACF' ) ?></a>
                                    <button class="quiz-btn close-btn"><?= __( 'No, continue application', 'ACF' ) ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fixed-block section-quiz__modal continue">
                <div class="container">
                    <div class="section-quiz__inner">
                        <div class="section-quiz__top">
                            <div class="section-quiz__logo" data-exit>
								<?= display_image( $header['logo'], 182, 36 ) ?>
                            </div>

                            <div class="section-quiz__wrapp">
                                <div class="editor">
									<?= $header['editor'] ?>
                                </div>

                                <a href="#" class="section-quiz__setting close-btn">
                                    <i class="sprite">
										<?= sprite(24, 24, 'close') ?>
                                    </i>
									<?= __('Close', "ACF")?>
                                </a>
                            </div>
                        </div>
                        <div class="section-quiz__modal-coll left">
                            <div class="editor">
                                <?= $email_settings['editor']?>
								<?= display_image( $email_settings['desktop_image'], '380', '380', 'desktop-image' ) ?>
								<?= display_image( $email_settings['mobile_image'], '220', '220', 'mobile-image' ) ?>
                            </div>
                        </div>

                        <div class="section-quiz__modal-coll right">
                            <div class="editor">
                                <?= $email_coll['editor']?>
                            </div>

                            <div class="main-form">
                                <label class="main-form__label">
                                    <span class="main-form__text required">Email</span>
                                    <input id="save-user-email" type="email" placeholder="user@mail.com">
                                </label>


                                <div class="main-form__btns">
                                    <button id="save-email" class="main-button main-button--transparent close-btn">Later</button>
                                    <button id="save-my-data" class="main-button">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fixed-block section-quiz__modal choice">
                <div class="container">
                    <div class="section-quiz__inner">
                        <div class="section-quiz__top">
                            <div class="section-quiz__logo" data-exit>
								<?= display_image( $header['logo'], 182, 36 ) ?>
                            </div>

                            <div class="section-quiz__wrapp">
                                <div class="editor">
									<?= $header['editor'] ?>
                                </div>
                                <a href="#" class="section-quiz__setting close-btn">
                                    <i class="sprite">
                                        <?= sprite(24, 24, 'close') ?>
                                    </i>
                                    <?= __('Close', "ACF")?>
                                </a>
                            </div>
                        </div>
                        <div class="section-quiz__modal-coll left">
                            <div class="editor">
                                <?= $save_settings['coll_left']['editor'] ?>
							    <?= display_image( $save_settings['coll_left']['desktop_image'], '380', '380', 'desktop-image' ) ?>
							    <?= display_image( $save_settings['coll_left']['mobile_image'], '220', '220', 'mobile-image' ) ?>
                            </div>
                        </div>

                        <div class="section-quiz__modal-coll right">
                            <div class="editor">
                                <?= $save_settings['editor']?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="contact-form" style="display: none">
				<?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $formId ) . '"]' ); ?>
            </div>
            <div class="container">
                <div class="section-quiz__inner">
                    <div class="section-quiz__top">
                        <div class="section-quiz__logo" data-exit>
							<?= display_image( $header['logo'], 182, 36 ) ?>
                        </div>

                        <div class="section-quiz__wrapp">
                            <div class="editor">
								<?= $header['editor'] ?>
                            </div>

                            <!--                        Варианты кнопки-->
                            <a href="#" class="section-quiz__setting">
                                <i class="sprite">
									<?= sprite( 24, 24, 'settings' ) ?>
                                </i>
								<?= __( 'Option', 'ACF' ) ?>
                            </a>
                            <!--                        <a href="#" class="section-quiz__setting">-->
                            <!--                            <i class="sprite">-->
                            <!--                                --><?php //= sprite(24, 24, 'close') ?>
                            <!--                            </i>-->
                            <!--                            Close-->
                            <!--                        </a>-->
                        </div>
                    </div>

					<?php if ( $quiz_questions ) : ?>

                        <div class="section-quiz__coll swiper-container swiper-container--left">
                            <div class="swiper-wrapper">
                                <?php foreach ($quiz_questions as $quiz) : ?>
                                    <?php if (!empty($quiz['left']) && empty($quiz['shower_slide'])) : ?>
                                        <div class="swiper-slide">
                                            <div class="editor">
                                                <?php if (!empty($quiz['left']['editor'])) : ?>
                                                    <?= $quiz['left']['editor']; ?>
                                                <?php endif; ?>

                                                <?php if (!empty($quiz['left']['desktop_image'])) : ?>
                                                    <?= display_image($quiz['left']['desktop_image'], 560, 440, 'desktop-image'); ?>
                                                <?php endif; ?>

                                                <?php if (!empty($quiz['left']['mobile_image'])) : ?>
                                                    <?= display_image($quiz['left']['mobile_image'], 220, 220, 'mobile-image'); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <div class="swiper-slide">
                                    <div class="editor">
										<?php if ( ! empty( $last['left']['editor'] ) ) : ?>
											<?= $last['left']['editor']; ?>
										<?php endif;


										?>

										<?php if ( ! empty( $last['left']['desktop_image'] ) ) : ?>
											<?= display_image( $last['left']['desktop_image'], 560, 440, 'desktop-image' ); ?>
										<?php endif; ?>

										<?php if ( ! empty( $last['left']['mobile_image'] ) ) : ?>
											<?= display_image( $last['left']['mobile_image'], 220, 220, 'mobile-image' ); ?>
										<?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="loader loaded section-quiz__coll swiper-container swiper-container--right">
                            <span class="swiper-pagination"></span>

                            <div class="swiper-wrapper">

								<?php foreach ( $quiz_questions as $quiz ) : ?>
									<?php if ( ! empty( $quiz['right'] ) && empty( $quiz['shower_slide'] ) ) : ?>

                                        <div class="swiper-slide"
                                             data-slide-name="<?= esc_attr( $quiz['right']['slide_name'] ?? '' ); ?>">
                                            <div class="slide">
                                                <div class="slide__top">
													<?php if ( ! empty( $quiz['right']['form_select'] ) ) : ?>
                                                        <input type="hidden" name="contact-form"
                                                               value="<?= esc_attr( $quiz['right']['form_select'] ); ?>">
													<?php endif; ?>

													<?php if ( ! empty( $quiz['right']['slide_title'] ) ) : ?>
                                                        <span class="h3"><?= esc_html( $quiz['right']['slide_title'] ); ?></span>
													<?php endif; ?>

													<?php if ( ! empty( $quiz['right']['slide_subtitle'] ) ) : ?>
                                                        <p><?= esc_html( $quiz['right']['slide_subtitle'] ); ?></p>
													<?php endif; ?>
                                                </div>

												<?php if ( ! empty( $quiz['right']['fields'] ) ) : ?>
                                                    <div class="fields-list">
														<?= render_flexible_inputs( $quiz['right']['fields'] ); ?>
                                                    </div>
												<?php endif; ?>
                                            </div>
                                        </div>
									<?php endif; ?>
								<?php endforeach; ?>

                                <!-- Last Slide -->
                                <div class="swiper-slide"
                                     data-slide-name="<?= esc_attr( $last['right']['slide_name'] ?? '' ); ?>">
                                    <div class="slide">
                                        <div class="slide__top">
											<?php if ( ! empty( $last['right']['slide_title'] ) ) : ?>
                                                <span class="h3"><?= esc_html( $last['right']['slide_title'] ); ?></span>
											<?php endif; ?>


											<?php if ( ! empty( $last['right']['slide_subtitle'] ) ) : ?>
                                                <p><?= esc_html( $last['right']['slide_subtitle'] ); ?></p>
											<?php endif; ?>
                                        </div>

                                        <div class="slide__inner">
                                            <div class="slide-info">
                                            <span class="slide-info__icon">
                                                <i class="sprite">
                                                    <?= sprite( 72, 72, 'home' ) ?>
                                                </i>
                                            </span>

                                                <div class="slide-info__inner">
                                                    <span class="slide-info__title">Mortgage Information</span>
                                                    <span class="slide-info__value">$100,000</span>
                                                </div>

                                                <span class="slide-info__right">
                                                <i class="sprite">
                                                     <?= sprite( 36, 36, 'check' ) ?>
                                                </i>
                                               Complete
                                            </span>
                                            </div>

                                            <div class="slide-info">
                                            <span class="slide-info__icon">
                                                <i class="sprite">
                                                    <?= sprite( 72, 72, 'contact' ) ?>
                                                </i>
                                            </span>

                                                <div class="slide-info__inner">
                                                    <span class="slide-info__title">Contact Information</span>
                                                    <span class="slide-info__value">First, Last name</span>
                                                </div>

                                                <span class="slide-info__right">
                                                <i class="sprite">
                                                     <?= sprite( 36, 36, 'check' ) ?>
                                                </i>
                                               Complete
                                            </span>
                                            </div>

                                            <div class="fields-list">
												<?= render_flexible_inputs( $last['right']['fields'] ); ?>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>

                            <!--                        mode для слайда choice (фиксированые кнопки внизу на мобиле)-->
                            <div class="section-quiz__buttons mode">
                                <button class="main-button main-button--transparent prev" type="button">Back</button>
                                <button class="main-button next" type="submit">Next</button>
                            </div>
                        </div>


					<?php endif; ?>

                </div>
            </div>
        </section>
	<?php endif; ?>



