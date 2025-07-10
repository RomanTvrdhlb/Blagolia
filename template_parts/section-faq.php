<?php
$shower  = get_sub_field('shower');
$editor = get_sub_field('editor');
$faqs   = get_sub_field('faq');

if (! $shower) : ?>

	<section class="section-faq" <?php if (get_sub_field('section_id')) : ?> id="<?php echo get_sub_field('section_id'); ?>" <?php endif; ?>>
		<div class="container">
			<div class="section-faq__inner">
				<?php if (!empty($editor)) : ?>
					<div class="editor">
						<?= $editor; ?>
					</div>
				<?php endif; ?>

				<?php if ($faqs) : ?>
					<ul class="accordion" data-single="true" data-breakpoint="576" data-accordion>
						<?php foreach ($faqs as $index => $faq) :
							$id = $index + 1;
							$faq_heading = $faq['title'];
							$faq_editor  = $faq['faq_editor'];
						?>
							<li class="accordion__item">
								<?php if ($faq_heading) : ?>
									<button class="accordion__btn" data-id="<?= esc_attr($id); ?>">
										<?= esc_html($faq_heading); ?>
										<i class="sprite">
											<svg width="24" height="25" viewBox="0 0 24 25" fill="none">
												<g clip-path="url(#clip0_357_2362)">
													<path d="M12 17.67a5.001 5.001 0 01-3.54-1.46L.29 8.04a1.004 1.004 0 011.42-1.42l8.17 8.17a3 3 0 004.24 0l8.17-8.17a1.004 1.004 0 111.42 1.42l-8.17 8.17A5 5 0 0112 17.67z" fill="#59635D" />
												</g>
												<defs>
													<clipPath id="clip0_357_2362">
														<path fill="#fff" transform="translate(0 .5)" d="M0 0h24v24H0z" />
													</clipPath>
												</defs>
											</svg>
										</i>
									</button>
								<?php endif; ?>

								<div class="accordion__content" data-content="<?= esc_attr($id); ?>">
									<article class="editor">
										<?= $faq_editor; ?>
									</article>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</section>

<?php endif; ?>