<?php
	function display_icon_link_list( array $array, $class = 'list', $text = false ) : void {
		if ( empty( $array ) ) {
			return;
		}
		?>
        <ul class="<?= $class;?>">
			<?php foreach ( $array as $data ) :
				$icon = $data['icon'] ?? null;
				$link = $data['link'] ?? null;

				if ( $link ) :
					$link_url    = $link['url'] ?? '';
					$link_title  = $link['title'] ?? '';
					$link_target = !empty( $link['target'] ) ? $link['target'] : '_self';
					?>
                    <li class="<?= $class;?>__item">
                        <a class="<?= $class;?>__link" href="<?php echo esc_url( $link_url ); ?>"
                           target="<?php echo esc_attr( $link_target ); ?>"
                           aria-label="<?php echo esc_attr( $link_title ); ?>">
							<?php if ( $icon ) : ?>
                                <img width="16" height="16"
                                     src="<?php echo esc_url( $icon['url'] ); ?>"
                                     alt="<?php echo esc_attr( $link_title ); ?>"/>
							<?php endif; ?>

							<?php if ( $text ) : ?>
								<?php echo esc_attr( $link_title ); ?>
							<?php endif; ?>
                        </a>
                    </li>
				<?php endif;
			endforeach; ?>
        </ul>
		<?php
	}
?>

