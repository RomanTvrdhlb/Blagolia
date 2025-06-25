<?php
	$shower  = get_sub_field( 'shower' );
	$content = get_sub_field( 'content' );


	if ( ! $shower ) : ?>
        <section class="section-calculator" <?php if ( get_sub_field( 'section_id' ) ) : ?> id="<?php echo get_sub_field( 'section_id' ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-calculator__inner" data-single="true" data-breakpoint="576" data-accordion>
<!--                    <table id="amortizationTableBody"></table>-->
                    <div id="error-message" class="hidden" style="position: fixed"></div>

					<?php if ( have_rows( 'form' ) ) : ?>
                        <div class="calc-form">
							<?php while ( have_rows( 'form' ) ) : the_row();
								$layout                        = get_row_layout();

								if ( $layout === 'form_input_currency' ) :
									$label = get_sub_field( 'label' );
									$info_popup                = get_sub_field( 'info_popup' );
									$placeholder               = get_sub_field( 'placeholder' );
									$name                      = get_sub_field( 'name' );
									$id                        = get_sub_field( 'id' ); ?>

                                    <label class="calc-form__label" data-symbol="$">
                                        <span class="calc-form__title"><?= $label; ?></span>
										<?php if ( $info_popup ): ?>
                                            <a href="<?= esc_url( $info_popup['url'] ) ?>">
												<?= sprite( 16, 16, 'info' ) ?>
                                            </a>
										<?php endif; ?>
                                        <input min="75000" max="1500000" type="number" name="<?= $name; ?>" class="calc-form__input"
                                               id="<?= $id ?>" placeholder="<?= $placeholder; ?>">
                                    </label>

								<?php endif;

								if ( $layout === 'form_input_select' ) :
									$label = get_sub_field( 'label' );
									$info_popup                = get_sub_field( 'info_popup' );
									$name                      = get_sub_field( 'name' );
									$id                        = get_sub_field( 'id' );
									$options                   = get_sub_field( 'options' );
									$additional_fields_enabler = get_sub_field( 'additional_fields_enabler' );
									$additional_fields         = get_sub_field( 'additional_fields' ); ?>

                                    <div class="calc-form__label">
                                        <span class="calc-form__title"><?= $label; ?></span>
										<?php if ( $info_popup ): ?>
                                            <a href="<?= esc_url( $info_popup['url'] ) ?>">
												<?= sprite( 16, 16, 'info' ) ?>
                                            </a>
										<?php endif; ?>

                                        <div class="custom-select single default-select" <?php if ( $additional_fields_enabler ) : ?> data-additional="<?= $name; ?>"<?php endif; ?>
                                             data-name="<?= $name; ?>" data-id="<?= $id; ?>">
                                            <div class="select-field">
                                                <div class="selected-options"><span class="placeholder"></span></div>
                                                <div class="arrow-down">
                                                    <i class="icon-arrow-down"></i>
                                                </div>
                                            </div>

											<?php if ( $options = get_sub_field( 'options' ) ): ?>
                                                <ul class="options-container">
													<?php foreach ( $options as $index => ['value' => $value, 'label' => $label] ): ?>
                                                        <li class="option <?= $index === 0 ? 'active' : ''; ?>"
                                                            data-value="<?= esc_attr( $value ); ?>">
                                                            <span class="option-text"><?= esc_html( $label ); ?></span>
                                                        </li>
													<?php endforeach; ?>
                                                </ul>
											<?php endif; ?>
                                        </div>
                                    </div>

									<?php if ( $additional_fields_enabler ) : ?>
                                    <div class="calc-form__field">
                                        <span class="calc-form__title"><?= $additional_fields['label']; ?></span>
										<?php if ( $additional_fields['info_popup'] ): ?>
                                            <a href="<?= esc_url( $additional_fields['info_popup']['url'] ) ?>">
												<?= sprite( 16, 16, 'info' ) ?>
                                            </a>
										<?php endif; ?>
                                        <span class="calc-form__value"
                                              data-target="<?= $name; ?>"><?= $options[0]['value']; ?></span>
                                    </div>
								<?php endif; ?>

								<?php endif;

								if ( $layout === 'form_description' ) :
									$btn = get_sub_field( 'btn' );
									$editor                    = get_sub_field( 'editor' ); ?>

                                    <button class="calc-form__link"
                                            data-id="<?= preg_replace( '/\s+/', '_', $btn ); ?>">
										<?= $btn; ?>
                                        <i class="icon-arrow-down"></i>
                                    </button>

								<?php endif;

								if ( $layout === 'form_subfields' ) :
									$label = get_sub_field( 'label' );
									$info_popup                = get_sub_field( 'info_popup' ); ?>

                                    <div class="calc-form__label">
                                        <span class="calc-form__title"><?= $label; ?></span>
										<?php if ( $info_popup ): ?>
                                            <a href="<?= esc_url( $info_popup['url'] ) ?>">
												<?= sprite( 16, 16, 'info' ) ?>
                                            </a>
										<?php endif; ?>
                                    </div>

									<?php if ( have_rows( 'Subfields' ) ) : ?>
									<?php while ( have_rows( 'Subfields' ) ) : the_row();
										$layout          = get_row_layout();

										if ( $layout === 'form_subfield_input' ) :
											$title = get_sub_field( 'title' );
											$placeholder = get_sub_field( 'placeholder' );
											$name        = get_sub_field( 'name' );
											$id          = get_sub_field( 'id' ); ?>

                                            <div class="calc-form__row">
                                                <span class="calc-form__subtitle"><?= $title; ?></span>

                                                <label class="calc-form__label" data-symbol="$">
                                                    <input type="text" name="<?= $name; ?>" class="calc-form__input"
                                                           id="<?= $id; ?>" placeholder="<?= $placeholder ?>">
                                                </label>
                                            </div>
										<?php endif;

										if ( $layout === 'form_subfield_select' ) :
											$title = get_sub_field( 'title' );
											$name        = get_sub_field( 'name' );
											$id          = get_sub_field( 'id' );
											$options     = get_sub_field( 'options' ); ?>

                                            <div class="calc-form__row">
                                                <span class="calc-form__subtitle"><?= $title; ?></span>

                                                <div class="custom-select single default-select"
                                                     data-name="<?= $name; ?>" data-id="<?= $id; ?>">
                                                    <div class="select-field">
                                                        <div class="selected-options"><span class="placeholder"></span>
                                                        </div>
                                                        <div class="arrow-down">
                                                            <i class="icon-arrow-down"></i>
                                                        </div>
                                                    </div>

													<?php if ( $options = get_sub_field( 'options' ) ): ?>
                                                        <ul class="options-container">
															<?php foreach ( $options as $index => ['value' => $value, 'label' => $label] ): ?>
                                                                <li class="option <?= $index === 0 ? 'active' : ''; ?>"
                                                                    data-value="<?= esc_attr( $value ); ?>">
                                                                    <span class="option-text"><?= esc_html( $label ); ?></span>
                                                                </li>
															<?php endforeach; ?>
                                                        </ul>
													<?php endif; ?>
                                                </div>
                                            </div>

										<?php endif;

									endwhile; ?>
								<?php endif; ?>
								<?php endif;

							endwhile; ?>

                            <button id="m-calculator" class="main-button">Calculate</button>
                        </div>
					<?php endif; ?>

					<?php if ( have_rows( 'form' ) ) : ?>
						<?php while ( have_rows( 'form' ) ) : the_row();
							$layout     = get_row_layout();
							if ( $layout === 'form_description' ) :
								$btn = get_sub_field( 'btn' );
								$editor = get_sub_field( 'editor' ); ?>

                                <div class="calc-form__acc-content"
                                     data-content="<?= preg_replace( '/\s+/', '_', $btn ); ?>">
                                    <article class="editor">
										<?= $editor; ?>
                                    </article>
                                </div>

							<?php endif;
						endwhile; ?>
					<?php endif; ?>



                    <div class="section-calculator__box">
						<?php if ( $content['editor'] ) : ?>
                            <div class="editor">
								<?= $content['editor'] ?>
                                <div class="rate-highlight row">
                                    <span class="rate-highlight__value" id="periodicPaymentResult">$1,673</span>
                                    <span style="display: none" class="rate-highlight__text"
                                          id="mortgageInsuranceResult">/mo</span>
                                </div>
                            </div>
						<?php endif;

							if ( $list_options = $content['list_options'] ): ?>
                                <ul class="section-calculator__list" data-title="<?= $content['title_list'] ?>">
									<?php foreach ( $list_options as $index => ['title' => $title, 'id' => $id] ): ?>
                                        <li>
                                            <p><?= $title; ?></p>
                                            <p <?php if ( $id ) : ?>id="<?= $id; ?>"<?php endif; ?>>$548,014</p>
                                        </li>
									<?php endforeach; ?>
                                </ul>
							<?php endif; ?>

                        <div class="editor">
                            <p><?= $content['text'] ?></p>
                            <button class="main-button" id="save-pdf">Download Report</button>
                            <a href="#" class="main-link">Send to Email</a>
                        </div>
                    </div>

                    <div id="pdf-container" style="grid-column: 1/-1;display: none;opacity:0">
                        <table id="amortizationTable" style="width: 100%; border-collapse: collapse; font-family: sans-serif; font-size: 13px;">
                            <thead>
                            <tr>
                                <th style="padding: 6px; border: 1px solid #ccc;">Term</th>
                                <th style="padding: 6px; border: 1px solid #ccc;">Interest</th>
                                <th style="padding: 6px; border: 1px solid #ccc;">Principal</th>
                                <th style="padding: 6px; border: 1px solid #ccc;">Balance</th>
                            </tr>
                            </thead>
                            <tbody id="amortizationTableBody">
                            <!-- filled dynamically -->
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>





        </section>
	<?php endif; ?>




