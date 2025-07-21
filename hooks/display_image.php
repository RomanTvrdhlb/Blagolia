<?php
	function display_image( $image_array, $target_width, $target_height, $class = '', $loading = 'lazy' ): void {
		if ( empty($image_array['ID']) || empty($image_array['url']) ) return;

		$image_id  = $image_array['ID'];
		$image_url = esc_url( $image_array['url'] );
		$image_alt = esc_attr( $image_array['alt'] ?? '' );

		$mime_type = get_post_mime_type($image_id);
		$main_type = explode('/', $mime_type)[0];
		$video_poster = $image_array['sizes']['large'] ?? '';

		if ( !empty($class) ) {
			echo '<div class="' . esc_attr($class) . '">';
		}

		if ( $main_type === 'video' ) {

			echo '<video autoplay loop muted playsinline preload="auto" poster="' . $video_poster .'"';
			echo ' width="100%" height="auto"';
			echo ' style="object-fit: cover; display: block;"';
			echo '>';
			echo '<source src="' . $image_url . '" type="' . esc_attr($mime_type) . '">';
			echo 'Ваш браузер не поддерживает видео.';
			echo '</video>';
		}  else {
			$sizes_attr = '(max-width: 576px) 100vw, (max-width: 768px) 80vw, (max-width: 1200px) 50vw, 800px';
			$best_match = 'full';
			$img_data = null;

			$meta = wp_get_attachment_metadata( $image_id );
			if ( $meta && !empty($meta['sizes']) ) {
				$min_diff = PHP_INT_MAX;
				foreach ( $meta['sizes'] as $name => $data ) {
					$diff = abs( $data['width'] - $target_width ) + abs( $data['height'] - $target_height );
					if ( $diff < $min_diff ) {
						$min_diff = $diff;
						$best_match = $name;
					}
				}

				$img_data = wp_get_attachment_image_src( $image_id, $best_match );
			}

			if ( $img_data ) {
				$image_url    = esc_url( $img_data[0] );
				$image_width  = intval( $img_data[1] );
				$image_height = intval( $img_data[2] );
			} else {
				$image_width  = $target_width;
				$image_height = $target_height;
			}

			$srcset = wp_get_attachment_image_srcset( $image_id, $best_match );

			echo '<img src="' . $image_url . '"'
				 . ' width="' . esc_attr($image_width) . '"'
				 . ' height="' . esc_attr($image_height) . '"'
				 . ' alt="' . $image_alt . '"'
				 . ( $srcset ? ' srcset="' . esc_attr($srcset) . '"' : '' )
				 . ' sizes="' . esc_attr($sizes_attr) . '"'
				 . ' loading="' . esc_attr($loading) . '" />';
		}

		if ( !empty($class) ) {
			echo '</div>';
		}
	}


