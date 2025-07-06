<?php
    $shower  = get_sub_field( 'shower' );
    $editor  = get_sub_field( 'editor' );
    $box     = get_sub_field( 'box' ); // группа ACF
    $image   = $box['image'] ?? null;  // картинка из группы
    $box_editor = $box['editor'] ?? ''; // редактор из группы

    if ( ! $shower ) : ?>
        <section class="section-about" <?php if ( get_sub_field( 'section_id' ) ) : ?> id="<?php echo esc_attr( get_sub_field( 'section_id' ) ); ?>" <?php endif; ?>>
            <div class="container">
                <div class="section-about__inner">
                    <div class="editor">
                        <?= $editor ?>
                    </div>

                    <div class="section-about__box">
                        <div class="editor">
                            <?= $box_editor ?>
                        </div>

                        <?php if ( $image ) : ?>
                            <?= display_image( $image, 708, 710, 'section-about__image' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
