<?php
$shower  = get_sub_field('shower');
$editor = get_sub_field('editor');


if (! $shower) : ?>

    <section class="section-catalog" <?php if (get_sub_field('section_id')) : ?> id="<?php echo get_sub_field('section_id'); ?>" <?php endif; ?>>
        <div class="container">
            <?php get_breadcrumbs();  ?>
            <div class="section-catalog__inner">
                <?php if (! empty($editor)) : ?>
                    <div class="editor">
                        <?= $editor; ?>
                    </div>
                <?php endif; ?>

                <ul class="section-catalog__list">
                    <li class="section-catalog__item">
                        <div class="catalog-card">
                            <div class="catalog-card__box">
                                <h2 class="pretitle">Refined Sunflower Oil</h2>
                                <p>This oil is deodorized and winterized for maximum thermal stability, making it a staple in both home kitchens and industrial food production. It doesn’t foam or burn at high temperatures, ensuring consistent frying results while preserving natural taste.</p>

                                <ul class="catalog-card__list">
                                    <li class="catalog-card__item">
                                        <span class="catalog-card__icon">
                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_314_575)">
                                                    <path d="M1.71289 16.1906C1.71289 16.1906 7.81702 16.209 9.22897 16.1446C10.6409 16.0803 11.6853 15.0359 11.6853 15.0359L14.4265 12.4264C14.7604 12.065 14.4357 10.8491 13.6302 11.5443L11.8722 12.8644C11.2718 13.3146 10.5429 13.5566 9.79252 13.5566H7.73127" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.41406 13.0298L4.33749 13.3238C5.85357 13.3391 5.81988 12.2151 7.27164 12.2977H8.76016C9.79844 12.3039 9.99752 13.5596 9.58405 13.5596" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M16.8978 9.56893C16.8978 9.56893 16.5731 2.34995 8.60373 2.34995C0.634359 2.34995 0.306641 9.56893 0.306641 9.56893H16.8978Z" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.78711 2.47843C6.78711 2.47843 7.01376 0.806152 8.60028 0.806152C10.1868 0.806152 10.4165 2.47843 10.4165 2.47843" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M1.75586 11.0083H12.154" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_314_575">
                                                        <rect width="17.2037" height="16" fill="white" transform="translate(0 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </span>
                                        <p>Daily cooking & frying</p>
                                    </li>
                                    <li class="catalog-card__item">
                                        <span class="catalog-card__icon">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_313_565)">
                                                    <path d="M15.1321 4.62207H0.277344V16.2218H15.1321V4.62207Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15.1321 4.62202H0.277344L1.76171 0.777679H13.6477L15.1321 4.62202Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9.28204 6.76254H6.12707C5.85842 6.76254 5.64062 6.98033 5.64062 7.24899V7.84941C5.64062 8.11807 5.85842 8.33586 6.12707 8.33586H9.28204C9.5507 8.33586 9.76849 8.11807 9.76849 7.84941V7.24899C9.76849 6.98033 9.5507 6.76254 9.28204 6.76254Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.50781 12.1551V14.4539" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M3.23474 13.0168L2.50645 12.1551L1.77539 13.0168" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.19141 12.1551V14.4539" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.92224 13.0168L5.19117 12.1551L4.46289 13.0168" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.70508 4.62202V0.777679" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_313_565">
                                                        <rect width="15.4107" height="16" fill="white" transform="translate(0 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </span>
                                        <p>PET bottles: 0.5L–5L</p>
                                    </li>
                                    <li class="catalog-card__item">
                                        <span class="catalog-card__icon">
                                            <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_315_617)">
                                                    <path d="M8.64395 14.7137H1.22235C0.719929 14.7137 0.310547 14.3043 0.310547 13.8019V1.72205C0.310547 1.21962 0.719929 0.810242 1.22235 0.810242H16.7571C17.2596 0.810242 17.669 1.21962 17.669 1.72205V7.9186" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M0.310547 3.1424H17.6658" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M17.7669 12.2946C17.7669 14.4438 16.0239 16.1868 13.8746 16.1868C11.7254 16.1868 9.98242 14.4438 9.98242 12.2946C9.98242 10.1453 11.7254 8.40234 13.8746 8.40234C16.0239 8.40234 17.7669 10.1453 17.7669 12.2946Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15.3916 12.2946H14.334" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M13.877 11.8388V9.60579" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.334 12.2946C14.334 12.5489 14.1293 12.7536 13.875 12.7536C13.6207 12.7536 13.416 12.5489 13.416 12.2946C13.416 12.0403 13.6207 11.8356 13.875 11.8356C14.1293 11.8356 14.334 12.0403 14.334 12.2946Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.95943 4.90088H4.0108C4.34575 4.90088 4.61867 5.1738 4.61867 5.50875V6.56012C4.61867 6.89506 4.34575 7.16799 4.0108 7.16799H2.95943C2.62448 7.16799 2.35156 6.89506 2.35156 6.56012V5.50875C2.35156 5.1738 2.62448 4.90088 2.95943 4.90088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.60731 4.90088H6.55904C6.22332 4.90088 5.95117 5.17303 5.95117 5.50875V6.55701C5.95117 6.89273 6.22332 7.16488 6.55904 7.16488H7.60731C7.94302 7.16488 8.21518 6.89273 8.21518 6.55701V5.50875C8.21518 5.17303 7.94302 4.90088 7.60731 4.90088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11.1679 4.90088H10.1196C9.78387 4.90088 9.51172 5.17303 9.51172 5.50875V6.55701C9.51172 6.89273 9.78387 7.16488 10.1196 7.16488H11.1679C11.5036 7.16488 11.7757 6.89273 11.7757 6.55701V5.50875C11.7757 5.17303 11.5036 4.90088 11.1679 4.90088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.95943 8.66292H4.0108C4.34575 8.66292 4.61867 8.93584 4.61867 9.27079V10.3222C4.61867 10.6571 4.34575 10.93 4.0108 10.93H2.95943C2.62448 10.93 2.35156 10.6571 2.35156 10.3222V9.27079C2.35156 8.93584 2.62448 8.66292 2.95943 8.66292Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.55904 8.66292H7.61041C7.94536 8.66292 8.21828 8.93584 8.21828 9.27079V10.3222C8.21828 10.6571 7.94536 10.93 7.61041 10.93H6.55904C6.22409 10.93 5.95117 10.6571 5.95117 10.3222V9.27079C5.95117 8.93584 6.22409 8.66292 6.55904 8.66292Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_315_617">
                                                        <rect width="18.0779" height="16" fill="white" transform="translate(0 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </span>
                                        <p>Shelf life: 24 months</p>
                                    </li>
                                </ul>

                                <a href="#" class="main-button main-button--transparent">View Product</a>
                            </div>


                            <div class="catalog-card__image">
                                <img width='100' height='100' src='http://blagoliya/wp-content/uploads/2025/07/Product2.png' alt='image'>
                            </div>
                        </div>
                    </li>
                      <li class="section-catalog__item">
                        <div class="catalog-card">
                            <div class="catalog-card__box">
                                <h2 class="pretitle">Refined Sunflower Oil</h2>
                                <p>This oil is deodorized and winterized for maximum thermal stability, making it a staple in both home kitchens and industrial food production. It doesn’t foam or burn at high temperatures, ensuring consistent frying results while preserving natural taste.</p>

                                <ul class="catalog-card__list">
                                    <li class="catalog-card__item">
                                        <span class="catalog-card__icon">
                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_314_575)">
                                                    <path d="M1.71289 16.1906C1.71289 16.1906 7.81702 16.209 9.22897 16.1446C10.6409 16.0803 11.6853 15.0359 11.6853 15.0359L14.4265 12.4264C14.7604 12.065 14.4357 10.8491 13.6302 11.5443L11.8722 12.8644C11.2718 13.3146 10.5429 13.5566 9.79252 13.5566H7.73127" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.41406 13.0298L4.33749 13.3238C5.85357 13.3391 5.81988 12.2151 7.27164 12.2977H8.76016C9.79844 12.3039 9.99752 13.5596 9.58405 13.5596" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M16.8978 9.56893C16.8978 9.56893 16.5731 2.34995 8.60373 2.34995C0.634359 2.34995 0.306641 9.56893 0.306641 9.56893H16.8978Z" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.78711 2.47843C6.78711 2.47843 7.01376 0.806152 8.60028 0.806152C10.1868 0.806152 10.4165 2.47843 10.4165 2.47843" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M1.75586 11.0083H12.154" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_314_575">
                                                        <rect width="17.2037" height="16" fill="white" transform="translate(0 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </span>
                                        <p>Daily cooking & frying</p>
                                    </li>
                                    <li class="catalog-card__item">
                                        <span class="catalog-card__icon">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_313_565)">
                                                    <path d="M15.1321 4.62207H0.277344V16.2218H15.1321V4.62207Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15.1321 4.62202H0.277344L1.76171 0.777679H13.6477L15.1321 4.62202Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9.28204 6.76254H6.12707C5.85842 6.76254 5.64062 6.98033 5.64062 7.24899V7.84941C5.64062 8.11807 5.85842 8.33586 6.12707 8.33586H9.28204C9.5507 8.33586 9.76849 8.11807 9.76849 7.84941V7.24899C9.76849 6.98033 9.5507 6.76254 9.28204 6.76254Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.50781 12.1551V14.4539" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M3.23474 13.0168L2.50645 12.1551L1.77539 13.0168" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.19141 12.1551V14.4539" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.92224 13.0168L5.19117 12.1551L4.46289 13.0168" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.70508 4.62202V0.777679" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_313_565">
                                                        <rect width="15.4107" height="16" fill="white" transform="translate(0 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </span>
                                        <p>PET bottles: 0.5L–5L</p>
                                    </li>
                                    <li class="catalog-card__item">
                                        <span class="catalog-card__icon">
                                            <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_315_617)">
                                                    <path d="M8.64395 14.7137H1.22235C0.719929 14.7137 0.310547 14.3043 0.310547 13.8019V1.72205C0.310547 1.21962 0.719929 0.810242 1.22235 0.810242H16.7571C17.2596 0.810242 17.669 1.21962 17.669 1.72205V7.9186" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M0.310547 3.1424H17.6658" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M17.7669 12.2946C17.7669 14.4438 16.0239 16.1868 13.8746 16.1868C11.7254 16.1868 9.98242 14.4438 9.98242 12.2946C9.98242 10.1453 11.7254 8.40234 13.8746 8.40234C16.0239 8.40234 17.7669 10.1453 17.7669 12.2946Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15.3916 12.2946H14.334" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M13.877 11.8388V9.60579" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.334 12.2946C14.334 12.5489 14.1293 12.7536 13.875 12.7536C13.6207 12.7536 13.416 12.5489 13.416 12.2946C13.416 12.0403 13.6207 11.8356 13.875 11.8356C14.1293 11.8356 14.334 12.0403 14.334 12.2946Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.95943 4.90088H4.0108C4.34575 4.90088 4.61867 5.1738 4.61867 5.50875V6.56012C4.61867 6.89506 4.34575 7.16799 4.0108 7.16799H2.95943C2.62448 7.16799 2.35156 6.89506 2.35156 6.56012V5.50875C2.35156 5.1738 2.62448 4.90088 2.95943 4.90088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.60731 4.90088H6.55904C6.22332 4.90088 5.95117 5.17303 5.95117 5.50875V6.55701C5.95117 6.89273 6.22332 7.16488 6.55904 7.16488H7.60731C7.94302 7.16488 8.21518 6.89273 8.21518 6.55701V5.50875C8.21518 5.17303 7.94302 4.90088 7.60731 4.90088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11.1679 4.90088H10.1196C9.78387 4.90088 9.51172 5.17303 9.51172 5.50875V6.55701C9.51172 6.89273 9.78387 7.16488 10.1196 7.16488H11.1679C11.5036 7.16488 11.7757 6.89273 11.7757 6.55701V5.50875C11.7757 5.17303 11.5036 4.90088 11.1679 4.90088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.95943 8.66292H4.0108C4.34575 8.66292 4.61867 8.93584 4.61867 9.27079V10.3222C4.61867 10.6571 4.34575 10.93 4.0108 10.93H2.95943C2.62448 10.93 2.35156 10.6571 2.35156 10.3222V9.27079C2.35156 8.93584 2.62448 8.66292 2.95943 8.66292Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.55904 8.66292H7.61041C7.94536 8.66292 8.21828 8.93584 8.21828 9.27079V10.3222C8.21828 10.6571 7.94536 10.93 7.61041 10.93H6.55904C6.22409 10.93 5.95117 10.6571 5.95117 10.3222V9.27079C5.95117 8.93584 6.22409 8.66292 6.55904 8.66292Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_315_617">
                                                        <rect width="18.0779" height="16" fill="white" transform="translate(0 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </span>
                                        <p>Shelf life: 24 months</p>
                                    </li>
                                </ul>

                                <a href="#" class="main-button main-button--transparent">View Product</a>
                            </div>


                            <div class="catalog-card__image">
                                <img width='100' height='100' src='http://blagoliya/wp-content/uploads/2025/07/prod-bg-scaled.png' alt='image'>
                            </div>
                        </div>
                    </li>
                      <li class="section-catalog__item">
                        <div class="catalog-card">
                            <div class="catalog-card__box">
                                <h2 class="pretitle">Refined Sunflower Oil</h2>
                                <p>This oil is deodorized and winterized for maximum thermal stability, making it a staple in both home kitchens and industrial food production. It doesn’t foam or burn at high temperatures, ensuring consistent frying results while preserving natural taste.</p>

                                <ul class="catalog-card__list">
                                    <li class="catalog-card__item">
                                        <span class="catalog-card__icon">
                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_314_575)">
                                                    <path d="M1.71289 16.1906C1.71289 16.1906 7.81702 16.209 9.22897 16.1446C10.6409 16.0803 11.6853 15.0359 11.6853 15.0359L14.4265 12.4264C14.7604 12.065 14.4357 10.8491 13.6302 11.5443L11.8722 12.8644C11.2718 13.3146 10.5429 13.5566 9.79252 13.5566H7.73127" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.41406 13.0298L4.33749 13.3238C5.85357 13.3391 5.81988 12.2151 7.27164 12.2977H8.76016C9.79844 12.3039 9.99752 13.5596 9.58405 13.5596" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M16.8978 9.56893C16.8978 9.56893 16.5731 2.34995 8.60373 2.34995C0.634359 2.34995 0.306641 9.56893 0.306641 9.56893H16.8978Z" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.78711 2.47843C6.78711 2.47843 7.01376 0.806152 8.60028 0.806152C10.1868 0.806152 10.4165 2.47843 10.4165 2.47843" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M1.75586 11.0083H12.154" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_314_575">
                                                        <rect width="17.2037" height="16" fill="white" transform="translate(0 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </span>
                                        <p>Daily cooking & frying</p>
                                    </li>
                                    <li class="catalog-card__item">
                                        <span class="catalog-card__icon">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_313_565)">
                                                    <path d="M15.1321 4.62207H0.277344V16.2218H15.1321V4.62207Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15.1321 4.62202H0.277344L1.76171 0.777679H13.6477L15.1321 4.62202Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9.28204 6.76254H6.12707C5.85842 6.76254 5.64062 6.98033 5.64062 7.24899V7.84941C5.64062 8.11807 5.85842 8.33586 6.12707 8.33586H9.28204C9.5507 8.33586 9.76849 8.11807 9.76849 7.84941V7.24899C9.76849 6.98033 9.5507 6.76254 9.28204 6.76254Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.50781 12.1551V14.4539" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M3.23474 13.0168L2.50645 12.1551L1.77539 13.0168" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.19141 12.1551V14.4539" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.92224 13.0168L5.19117 12.1551L4.46289 13.0168" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.70508 4.62202V0.777679" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_313_565">
                                                        <rect width="15.4107" height="16" fill="white" transform="translate(0 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </span>
                                        <p>PET bottles: 0.5L–5L</p>
                                    </li>
                                    <li class="catalog-card__item">
                                        <span class="catalog-card__icon">
                                            <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_315_617)">
                                                    <path d="M8.64395 14.7137H1.22235C0.719929 14.7137 0.310547 14.3043 0.310547 13.8019V1.72205C0.310547 1.21962 0.719929 0.810242 1.22235 0.810242H16.7571C17.2596 0.810242 17.669 1.21962 17.669 1.72205V7.9186" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M0.310547 3.1424H17.6658" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M17.7669 12.2946C17.7669 14.4438 16.0239 16.1868 13.8746 16.1868C11.7254 16.1868 9.98242 14.4438 9.98242 12.2946C9.98242 10.1453 11.7254 8.40234 13.8746 8.40234C16.0239 8.40234 17.7669 10.1453 17.7669 12.2946Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15.3916 12.2946H14.334" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M13.877 11.8388V9.60579" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.334 12.2946C14.334 12.5489 14.1293 12.7536 13.875 12.7536C13.6207 12.7536 13.416 12.5489 13.416 12.2946C13.416 12.0403 13.6207 11.8356 13.875 11.8356C14.1293 11.8356 14.334 12.0403 14.334 12.2946Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.95943 4.90088H4.0108C4.34575 4.90088 4.61867 5.1738 4.61867 5.50875V6.56012C4.61867 6.89506 4.34575 7.16799 4.0108 7.16799H2.95943C2.62448 7.16799 2.35156 6.89506 2.35156 6.56012V5.50875C2.35156 5.1738 2.62448 4.90088 2.95943 4.90088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.60731 4.90088H6.55904C6.22332 4.90088 5.95117 5.17303 5.95117 5.50875V6.55701C5.95117 6.89273 6.22332 7.16488 6.55904 7.16488H7.60731C7.94302 7.16488 8.21518 6.89273 8.21518 6.55701V5.50875C8.21518 5.17303 7.94302 4.90088 7.60731 4.90088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11.1679 4.90088H10.1196C9.78387 4.90088 9.51172 5.17303 9.51172 5.50875V6.55701C9.51172 6.89273 9.78387 7.16488 10.1196 7.16488H11.1679C11.5036 7.16488 11.7757 6.89273 11.7757 6.55701V5.50875C11.7757 5.17303 11.5036 4.90088 11.1679 4.90088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.95943 8.66292H4.0108C4.34575 8.66292 4.61867 8.93584 4.61867 9.27079V10.3222C4.61867 10.6571 4.34575 10.93 4.0108 10.93H2.95943C2.62448 10.93 2.35156 10.6571 2.35156 10.3222V9.27079C2.35156 8.93584 2.62448 8.66292 2.95943 8.66292Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.55904 8.66292H7.61041C7.94536 8.66292 8.21828 8.93584 8.21828 9.27079V10.3222C8.21828 10.6571 7.94536 10.93 7.61041 10.93H6.55904C6.22409 10.93 5.95117 10.6571 5.95117 10.3222V9.27079C5.95117 8.93584 6.22409 8.66292 6.55904 8.66292Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_315_617">
                                                        <rect width="18.0779" height="16" fill="white" transform="translate(0 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </span>
                                        <p>Shelf life: 24 months</p>
                                    </li>
                                </ul>

                                <a href="#" class="main-button main-button--transparent">View Product</a>
                            </div>


                             <div class="catalog-card__image">
                                <img width='100' height='100' src='http://blagoliya/wp-content/uploads/2025/07/prod-bg-scaled.png' alt='image'>
                            </div>
                        </div>
                    </li>
                      <li class="section-catalog__item">
                        <div class="catalog-card">
                            <div class="catalog-card__box">
                                <h2 class="pretitle">Refined Sunflower Oil</h2>
                                <p>This oil is deodorized and winterized for maximum thermal stability, making it a staple in both home kitchens and industrial food production. It doesn’t foam or burn at high temperatures, ensuring consistent frying results while preserving natural taste.</p>

                                <ul class="catalog-card__list">
                                    <li class="catalog-card__item">
                                        <span class="catalog-card__icon">
                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_314_575)">
                                                    <path d="M1.71289 16.1906C1.71289 16.1906 7.81702 16.209 9.22897 16.1446C10.6409 16.0803 11.6853 15.0359 11.6853 15.0359L14.4265 12.4264C14.7604 12.065 14.4357 10.8491 13.6302 11.5443L11.8722 12.8644C11.2718 13.3146 10.5429 13.5566 9.79252 13.5566H7.73127" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.41406 13.0298L4.33749 13.3238C5.85357 13.3391 5.81988 12.2151 7.27164 12.2977H8.76016C9.79844 12.3039 9.99752 13.5596 9.58405 13.5596" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M16.8978 9.56893C16.8978 9.56893 16.5731 2.34995 8.60373 2.34995C0.634359 2.34995 0.306641 9.56893 0.306641 9.56893H16.8978Z" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.78711 2.47843C6.78711 2.47843 7.01376 0.806152 8.60028 0.806152C10.1868 0.806152 10.4165 2.47843 10.4165 2.47843" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M1.75586 11.0083H12.154" stroke="#007833" stroke-width="0.612557" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_314_575">
                                                        <rect width="17.2037" height="16" fill="white" transform="translate(0 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </span>
                                        <p>Daily cooking & frying</p>
                                    </li>
                                    <li class="catalog-card__item">
                                        <span class="catalog-card__icon">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_313_565)">
                                                    <path d="M15.1321 4.62207H0.277344V16.2218H15.1321V4.62207Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15.1321 4.62202H0.277344L1.76171 0.777679H13.6477L15.1321 4.62202Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9.28204 6.76254H6.12707C5.85842 6.76254 5.64062 6.98033 5.64062 7.24899V7.84941C5.64062 8.11807 5.85842 8.33586 6.12707 8.33586H9.28204C9.5507 8.33586 9.76849 8.11807 9.76849 7.84941V7.24899C9.76849 6.98033 9.5507 6.76254 9.28204 6.76254Z" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.50781 12.1551V14.4539" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M3.23474 13.0168L2.50645 12.1551L1.77539 13.0168" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.19141 12.1551V14.4539" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.92224 13.0168L5.19117 12.1551L4.46289 13.0168" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.70508 4.62202V0.777679" stroke="#007833" stroke-width="0.555942" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_313_565">
                                                        <rect width="15.4107" height="16" fill="white" transform="translate(0 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </span>
                                        <p>PET bottles: 0.5L–5L</p>
                                    </li>
                                    <li class="catalog-card__item">
                                        <span class="catalog-card__icon">
                                            <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_315_617)">
                                                    <path d="M8.64395 14.7137H1.22235C0.719929 14.7137 0.310547 14.3043 0.310547 13.8019V1.72205C0.310547 1.21962 0.719929 0.810242 1.22235 0.810242H16.7571C17.2596 0.810242 17.669 1.21962 17.669 1.72205V7.9186" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M0.310547 3.1424H17.6658" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M17.7669 12.2946C17.7669 14.4438 16.0239 16.1868 13.8746 16.1868C11.7254 16.1868 9.98242 14.4438 9.98242 12.2946C9.98242 10.1453 11.7254 8.40234 13.8746 8.40234C16.0239 8.40234 17.7669 10.1453 17.7669 12.2946Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15.3916 12.2946H14.334" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M13.877 11.8388V9.60579" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.334 12.2946C14.334 12.5489 14.1293 12.7536 13.875 12.7536C13.6207 12.7536 13.416 12.5489 13.416 12.2946C13.416 12.0403 13.6207 11.8356 13.875 11.8356C14.1293 11.8356 14.334 12.0403 14.334 12.2946Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.95943 4.90088H4.0108C4.34575 4.90088 4.61867 5.1738 4.61867 5.50875V6.56012C4.61867 6.89506 4.34575 7.16799 4.0108 7.16799H2.95943C2.62448 7.16799 2.35156 6.89506 2.35156 6.56012V5.50875C2.35156 5.1738 2.62448 4.90088 2.95943 4.90088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.60731 4.90088H6.55904C6.22332 4.90088 5.95117 5.17303 5.95117 5.50875V6.55701C5.95117 6.89273 6.22332 7.16488 6.55904 7.16488H7.60731C7.94302 7.16488 8.21518 6.89273 8.21518 6.55701V5.50875C8.21518 5.17303 7.94302 4.90088 7.60731 4.90088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11.1679 4.90088H10.1196C9.78387 4.90088 9.51172 5.17303 9.51172 5.50875V6.55701C9.51172 6.89273 9.78387 7.16488 10.1196 7.16488H11.1679C11.5036 7.16488 11.7757 6.89273 11.7757 6.55701V5.50875C11.7757 5.17303 11.5036 4.90088 11.1679 4.90088Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.95943 8.66292H4.0108C4.34575 8.66292 4.61867 8.93584 4.61867 9.27079V10.3222C4.61867 10.6571 4.34575 10.93 4.0108 10.93H2.95943C2.62448 10.93 2.35156 10.6571 2.35156 10.3222V9.27079C2.35156 8.93584 2.62448 8.66292 2.95943 8.66292Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.55904 8.66292H7.61041C7.94536 8.66292 8.21828 8.93584 8.21828 9.27079V10.3222C8.21828 10.6571 7.94536 10.93 7.61041 10.93H6.55904C6.22409 10.93 5.95117 10.6571 5.95117 10.3222V9.27079C5.95117 8.93584 6.22409 8.66292 6.55904 8.66292Z" stroke="#007833" stroke-width="0.620275" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_315_617">
                                                        <rect width="18.0779" height="16" fill="white" transform="translate(0 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </span>
                                        <p>Shelf life: 24 months</p>
                                    </li>
                                </ul>

                                <a href="#" class="main-button main-button--transparent">View Product</a>
                            </div>


                            <div class="catalog-card__image">
                                <img width='100' height='100' src='http://blagoliya/wp-content/uploads/2025/07/prod-bg-scaled.png' alt='image'>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

<?php endif; ?>