<?php
get_header();

$post_id = get_the_ID();

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
		<section <?php post_class('section-product'); ?>>
			<div class="container">
				<?php get_breadcrumbs(); ?>

					<div class="section-product__box">
						<div class="section-product__thumb">
							<?php
							if (has_post_thumbnail()) {
								the_post_thumbnail('full', array('loading' => 'lazy'));
							}
							?>
						</div>

						<div class="editor">
							<h1 class="section-product__title">Refined Sunflower Oil</h1>
							<p>Our refined deodorized sunflower oil is produced using advanced processing methods that maintain the oil’s natural purity while eliminating impurities and odors. This results in a clean, neutral taste that doesn’t overpower dishes and makes it an ideal base for a wide range of culinary applications.
								<br><br>
								Blagoliya sunflower oil is made from carefully selected Ukrainian sunflower seeds, refined under strict food safety standards, and bottled in versatile packaging formats — from 0.5L to 5L PET bottles — to meet diverse market needs.
							</p>

							<ul class="section-product__list">
								<li class="section-product__item">
									<span class="section-product__icon">
										<i class="sprite">
											<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
												<g clip-path="url(#clip0_319_1639)">
													<path d="M6.38236 11.8749C4.89004 14.2074 5.64151 16.218 7.27192 17.8856C7.29582 17.9122 7.31971 17.9361 7.34627 17.9627C7.37282 17.9893 7.39672 18.0132 7.42327 18.0372C9.42543 19.9999 11.9241 20.6941 14.8849 17.7287C17.8563 14.7526 20.1771 9.21536 18.2572 7.14622C18.2413 7.12494 18.2227 7.10632 18.2041 7.08505C18.1855 7.06377 18.1643 7.04781 18.143 7.03185C16.6879 5.67547 13.5121 6.43345 10.7266 8.03717" stroke="#007833" stroke-width="0.531915" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M8.95459 12.4361C6.33903 15.1728 6.30186 16.8404 7.26842 17.8856C7.29232 17.9122 7.31622 17.9361 7.34277 17.9627C7.36932 17.9893 7.39322 18.0132 7.41978 18.0372C8.50583 19.0425 10.261 18.9627 13.1873 16.0319C16.1321 13.0771 19.1725 8.34036 18.2564 7.14887C18.2405 7.1276 18.2219 7.10898 18.2033 7.0877C18.1847 7.06643 18.1634 7.05047 18.1422 7.03451C17.1677 6.28451 13.8299 8.18079 11.0311 10.5132" stroke="#007833" stroke-width="0.531915" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M18.2016 7.08777L7.34375 17.9628" stroke="#007833" stroke-width="0.531915" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M11.1898 9.5612C11.1898 11.1995 9.86475 12.5266 8.22903 12.5266C6.59332 12.5266 5.26562 11.1968 5.26562 9.5612C5.26562 7.92557 8.22638 4.26599 8.22638 4.26599C8.22638 4.26599 11.1871 7.92291 11.1871 9.5612H11.1898Z" stroke="#007833" stroke-width="0.531915" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M6.45312 9.30054C6.45312 9.30054 6.45312 10.8298 7.81002 11.258" stroke="#007833" stroke-width="0.531915" stroke-linecap="round" stroke-linejoin="round" />
												</g>
												<defs>
													<clipPath id="clip0_319_1639">
														<rect width="14.2222" height="16" fill="white" transform="translate(5 4)" />
													</clipPath>
												</defs>
											</svg>

										</i>
									</span>
									<div class="section-product__info">
										<span>Ingredients:</span>
										<p>100% Refined Deodorized Sunflower Oil</p>
									</div>
								</li>
								<li class="section-product__item">
									<span class="section-product__icon">
										<i class="sprite">
											<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M19.8548 8.84448H5V20.4442H19.8548V8.84448Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
												<path d="M19.8548 8.84434H5L6.48436 5H18.3704L19.8548 8.84434Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
												<path d="M14.0047 10.9849H10.8497C10.5811 10.9849 10.3633 11.2027 10.3633 11.4713V12.0717C10.3633 12.3404 10.5811 12.5582 10.8497 12.5582H14.0047C14.2734 12.5582 14.4911 12.3404 14.4911 12.0717V11.4713C14.4911 11.2027 14.2734 10.9849 14.0047 10.9849Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
												<path d="M7.23047 16.3774V18.6763" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
												<path d="M7.95935 17.2393L7.23106 16.3776L6.5 17.2393" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
												<path d="M9.91406 16.3774V18.6763" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
												<path d="M10.6468 17.2393L9.91578 16.3776L9.1875 17.2393" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
												<path d="M12.4297 8.84446V5.00012" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
											</svg>

										</i>
									</span>
									<div class="section-product__info">
										<span>Packaging:</span>
										<p>PET bottle (Available in 0.5L – 5L sizes)</p>
									</div>
								</li>
								<li class="section-product__item">
									<span class="section-product__icon">
										<i class="sprite">
											<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
												<g clip-path="url(#clip0_319_1656)">
													<path d="M11.6459 18.2137H4.2243C3.72188 18.2137 3.3125 17.8043 3.3125 17.3019V5.22205C3.3125 4.71962 3.72188 4.31024 4.2243 4.31024H19.7591C20.2615 4.31024 20.6709 4.71962 20.6709 5.22205V11.4186" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M3.3125 6.6424H20.6678" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M20.7688 15.7946C20.7688 17.9438 19.0259 19.6868 16.8766 19.6868C14.7273 19.6868 12.9844 17.9438 12.9844 15.7946C12.9844 13.6453 14.7273 11.9023 16.8766 11.9023C19.0259 11.9023 20.7688 13.6453 20.7688 15.7946Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M18.3935 15.7946H17.3359" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M16.875 15.3388V13.1058" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M17.3321 15.7946C17.3321 16.0489 17.1274 16.2536 16.8731 16.2536C16.6188 16.2536 16.4141 16.0489 16.4141 15.7946C16.4141 15.5403 16.6188 15.3356 16.8731 15.3356C17.1274 15.3356 17.3321 15.5403 17.3321 15.7946Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M5.95943 8.40088H7.0108C7.34575 8.40088 7.61867 8.6738 7.61867 9.00875V10.0601C7.61867 10.3951 7.34575 10.668 7.0108 10.668H5.95943C5.62448 10.668 5.35156 10.3951 5.35156 10.0601V9.00875C5.35156 8.6738 5.62448 8.40088 5.95943 8.40088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M10.6093 8.40088H9.56099C9.22528 8.40088 8.95312 8.67303 8.95312 9.00875V10.057C8.95312 10.3927 9.22528 10.6649 9.56099 10.6649H10.6093C10.945 10.6649 11.2171 10.3927 11.2171 10.057V9.00875C11.2171 8.67303 10.945 8.40088 10.6093 8.40088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M14.1679 8.40088H13.1196C12.7839 8.40088 12.5117 8.67303 12.5117 9.00875V10.057C12.5117 10.3927 12.7839 10.6649 13.1196 10.6649H14.1679C14.5036 10.6649 14.7757 10.3927 14.7757 10.057V9.00875C14.7757 8.67303 14.5036 8.40088 14.1679 8.40088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M5.95943 12.1629H7.0108C7.34575 12.1629 7.61867 12.4358 7.61867 12.7708V13.8221C7.61867 14.1571 7.34575 14.43 7.0108 14.43H5.95943C5.62448 14.43 5.35156 14.1571 5.35156 13.8221V12.7708C5.35156 12.4358 5.62448 12.1629 5.95943 12.1629Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M9.56099 12.1629H10.6124C10.9473 12.1629 11.2202 12.4358 11.2202 12.7708V13.8221C11.2202 14.1571 10.9473 14.43 10.6124 14.43H9.56099C9.22605 14.43 8.95312 14.1571 8.95312 13.8221V12.7708C8.95312 12.4358 9.22605 12.1629 9.56099 12.1629Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
												</g>
												<defs>
													<clipPath id="clip0_319_1656">
														<rect width="18.0779" height="16" fill="white" transform="translate(3 4)" />
													</clipPath>
												</defs>
											</svg>

										</i>
									</span>
									<div class="section-product__info">
										<span>Shelf life:</span>
										<p>24 months</p>
									</div>
								</li>
								<li class="section-product__item">
									<span class="section-product__icon">
										<i class="sprite">
											<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
												<g clip-path="url(#clip0_319_1663)">
													<path d="M12.9196 14.8313C13.5755 15.4114 13.9596 16.2921 13.8498 17.2537C13.7061 18.5393 12.6609 19.5819 11.3752 19.7204C9.68718 19.9034 8.25781 18.5864 8.25781 16.9323C8.25781 16.0935 8.62365 15.3409 9.20898 14.8287C9.44677 14.6197 9.57743 14.3166 9.57743 14.0004V5.74559C9.57743 4.92769 10.2412 4.26135 11.0617 4.26135C11.8796 4.26135 12.5459 4.92508 12.5459 5.74559V14.0004C12.5459 14.3192 12.6818 14.6223 12.9196 14.8313Z" stroke="#007833" stroke-width="0.52262" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M11.0664 15.6753V5.56787" stroke="#007833" stroke-width="0.52262" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M11.0659 18.4269C11.825 18.4269 12.4404 17.8115 12.4404 17.0524C12.4404 16.2933 11.825 15.6779 11.0659 15.6779C10.3068 15.6779 9.69141 16.2933 9.69141 17.0524C9.69141 17.8115 10.3068 18.4269 11.0659 18.4269Z" stroke="#007833" stroke-width="0.52262" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M13.4375 5.56787H15.1595" stroke="#007833" stroke-width="0.52262" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M13.4375 6.97113H16.5314" stroke="#007833" stroke-width="0.52262" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M13.4375 8.37695H15.1595" stroke="#007833" stroke-width="0.52262" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M13.4375 9.78015H16.5314" stroke="#007833" stroke-width="0.52262" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M13.4375 11.1834H15.1595" stroke="#007833" stroke-width="0.52262" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M13.4375 12.5867H16.5314" stroke="#007833" stroke-width="0.52262" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M13.4375 13.9925H15.1595" stroke="#007833" stroke-width="0.52262" stroke-linecap="round" stroke-linejoin="round" />
												</g>
												<defs>
													<clipPath id="clip0_319_1663">
														<rect width="8.79308" height="16" fill="white" transform="translate(8 4)" />
													</clipPath>
												</defs>
											</svg>

										</i>
									</span>
									<div class="section-product__info">
										<span>Storage Temperature:</span>
										<p>Store at +8°C to +20°C</p>
									</div>
								</li>
								<li class="section-product__item">
									<span class="section-product__icon">
										<i class="sprite">
											<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
												<g clip-path="url(#clip0_319_1696)">
													<path d="M5.83208 4.28088C6.68898 4.28088 7.38292 4.97764 7.38292 5.83172V8.26754H4.28125V5.83172C4.28125 4.97764 4.978 4.28088 5.83208 4.28088Z" stroke="#007833" stroke-width="0.561896" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M5.83203 4.28088H16.2945C17.1514 4.28088 17.8454 4.97483 17.8454 5.83172V16.2942" stroke="#007833" stroke-width="0.561896" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M7.38672 8.26758V18.1682C7.38672 19.0251 8.08066 19.719 8.93755 19.719M8.93755 19.719C9.79444 19.719 10.4884 19.0251 10.4884 18.1682V16.2943H20.9509V18.1682C20.9509 19.0251 20.257 19.719 19.4001 19.719H8.93755Z" stroke="#007833" stroke-width="0.561896" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M12.3723 13.1505L12.2403 13.3135C12.1729 13.3949 12.1307 13.4961 12.1223 13.6L12.0998 13.8079C12.0745 14.0636 11.8723 14.2659 11.6166 14.2912L11.4087 14.3136C11.3019 14.3249 11.2036 14.367 11.1221 14.4316L10.9592 14.5637C10.7597 14.7266 10.4731 14.7266 10.2737 14.5637L10.1107 14.4316C10.0292 14.3642 9.9281 14.3221 9.82415 14.3136L9.61624 14.2912C9.36058 14.2659 9.1583 14.0636 9.13301 13.8079L9.11054 13.6C9.0993 13.4933 9.05716 13.3949 8.99254 13.3135L8.86049 13.1505C8.69754 12.951 8.69754 12.6645 8.86049 12.465L8.99254 12.3021C9.05997 12.2206 9.10211 12.1194 9.11054 12.0155L9.13301 11.8076C9.1583 11.5519 9.36058 11.3496 9.61624 11.3244L9.82415 11.3019C9.93091 11.2906 10.0292 11.2485 10.1107 11.1839L10.2737 11.0518C10.4731 10.8889 10.7597 10.8889 10.9592 11.0518L11.1221 11.1839C11.2036 11.2513 11.3047 11.2935 11.4087 11.3019L11.6166 11.3244C11.8723 11.3496 12.0745 11.5519 12.0998 11.8076L12.1223 12.0155C12.1335 12.1223 12.1757 12.2206 12.2403 12.3021L12.3723 12.465C12.5353 12.6645 12.5353 12.951 12.3723 13.1505Z" stroke="#007833" stroke-width="0.561896" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M10.6186 13.5045C11.0034 13.5045 11.3154 13.1926 11.3154 12.8078C11.3154 12.423 11.0034 12.111 10.6186 12.111C10.2338 12.111 9.92188 12.423 9.92188 12.8078C9.92188 13.1926 10.2338 13.5045 10.6186 13.5045Z" stroke="#007833" stroke-width="0.561896" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M13.5625 12.8077H16.4928" stroke="#007833" stroke-width="0.561896" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M12.9766 11.0041H16.494" stroke="#007833" stroke-width="0.561896" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M8.73438 9.19757H16.4914" stroke="#007833" stroke-width="0.561896" stroke-linecap="round" stroke-linejoin="round" />
													<path d="M8.73438 7.39386H16.4914" stroke="#007833" stroke-width="0.561896" stroke-linecap="round" stroke-linejoin="round" />
												</g>
												<defs>
													<clipPath id="clip0_319_1696">
														<rect width="17.2334" height="16" fill="white" transform="translate(4 4)" />
													</clipPath>
												</defs>
											</svg>

										</i>
									</span>
									<div class="section-product__info">
										<span>Certifications:</span>
										<p>ISO 22000, HACCP, GMO-free</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				
			</div>
		</section>
<?php endwhile;
endif;
?>

<?php
// ACF Flexible Content: builder
if (have_rows('builder', $post_id)) {
	while (have_rows('builder', $post_id)) {
		the_row();
		get_template_part('template_parts/' . str_replace('_', '-', get_row_layout()));
	}
}
?>

<?php get_footer(); ?>