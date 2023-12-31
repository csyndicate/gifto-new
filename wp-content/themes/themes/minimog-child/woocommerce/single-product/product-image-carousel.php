<?php
defined( 'ABSPATH' ) || exit;

global $post;

$slider_args = [
	'data-items-desktop'  => '2',
	'data-gutter-desktop' => '10',
	'data-effect'         => 'slide',
	'data-auto-height'    => '1',
	'data-pagination'     => '1',
];
?>
<div class="<?php echo esc_attr( $wrapper_classes ); ?>">
	<div
		class="tm-swiper minimog-main-swiper bullets-v-align-below nav-style-01 pagination-style-08" <?php echo Minimog_Helper::slider_args_to_html_attr( $slider_args ); ?>>
		<div class="swiper-inner">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php
					foreach ( $attachment_ids as $attachment_id ) {
						$props = wc_get_product_attachment_props( $attachment_id, $post );

						if ( ! $props['url'] ) {
							continue;
						}

						$main_slide_classes = array( 'swiper-slide' );
						$video_play_html    = '';
						$video_html         = '';
						$attributes_string  = '';

						$media_attach = get_post_meta( $attachment_id, 'minimog_product_attachment_type', true );
						switch ( $media_attach ) {
							case 'video':
								$video_url = get_post_meta( $attachment_id, 'minimog_product_video', true );
								if ( ! empty( $video_url ) ) {
									$main_slide_classes[] = 'zoom has-video';
									$video_play_html      = '<div class="main-play-product-video"></div>';

									if ( strpos( $video_url, 'mp4' ) !== false ) {
										$html5_video_id = uniqid( 'product-video-' . $attachment_id );

										$attributes_string .= sprintf( ' data-html="%s"', '#' . $html5_video_id );

										$video_html .= '<div id="' . $html5_video_id . '" style="display:none;"><video class="lg-video-object lg-html5 video-js vjs-default-skin" controls preload="none" src="' . esc_url( $video_url ) . '"></video></div>';
									} else {
										$attributes_string .= sprintf( ' data-src="%s"', esc_url( $video_url ) );
									}

									$main_slide_suffix_html = $video_play_html . $video_html;
								}
								break;
							case '360':
								$sprite_image_id  = get_post_meta( $attachment_id, 'minimog_360_source_sprite', true );
								$sprite_image_url = Minimog_Image::get_attachment_url_by_id( [
									'id'   => $sprite_image_id,
									'size' => 'full',
								] );

								if ( ! empty( $sprite_image_url ) ) {
									ob_start();
									wc_get_template( 'single-product/product-360-modal.php', [
										'attachment_id'    => $attachment_id,
										'sprite_image_url' => $sprite_image_url,
									] );
									$modal_360_html .= ob_get_clean();

									$attributes_string .= ' data-minimog-toggle="modal" data-minimog-target="#modal-product-360-' . $attachment_id . '"';
								}
								break;

							default:
								$main_slide_classes[] = 'zoom';
								$attributes_string    .= sprintf( ' data-src="%s"', esc_url( $props['url'] ) );
								break;
						}

						if ( isset( $thumbnail_id ) && $attachment_id == $thumbnail_id ) {
							$main_slide_classes[] = 'product-main-image';
						}

						$attributes_string .= 'class="' . esc_attr( implode( ' ', $main_slide_classes ) ) . '"';

						if ( $open_gallery ) {
							$sub_html = '';

							if ( ! empty( $props['title'] ) ) {
								$sub_html .= "<h4>{$props['title']}</h4>";
							}

							if ( ! empty( $props['caption'] ) ) {
								$sub_html .= "<p>{$props['caption']}</p>";
							}

							if ( ! empty( $sub_html ) ) {
								$attributes_string .= ' data-sub-html="' . $sub_html . '"';
							}
						}

						$attributes_string .= ' data-image-id="' . $attachment_id . '"';

						$main_image_html = Minimog_Image::get_attachment_by_id( array(
							'id'   => $attachment_id,
							'size' => $main_image_size,
						) );

						printf( '<div %1$s>%2$s%3$s</div>', $attributes_string, $main_image_html, $video_play_html . $video_html );
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
