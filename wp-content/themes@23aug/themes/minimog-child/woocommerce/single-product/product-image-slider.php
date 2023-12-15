<?php
defined( 'ABSPATH' ) || exit;

global $post;

$is_vertical_slider = Minimog_Woo::instance()->get_product_setting( 'single_product_slider_vertical' );
$is_vertical_slider = isset( $args['vertical_slider'] ) ? $args['vertical_slider'] : $is_vertical_slider;

$show_gallery = '1';
$show_gallery = isset( $args['show_gallery'] ) ? $args['show_gallery'] : $show_gallery;

$looped_slides      = 6;

if ( true === $is_quick_view ) {
	$is_vertical_slider = '0';
}

$main_slider_slides_html   = '';
$thumbs_slider_slides_html = '';

$number_attachments = count( $attachment_ids );
if ( $number_attachments > 1 ) {
	$wrapper_classes .= ' has-thumbs-slider';
	$wrapper_classes .= '1' === $is_vertical_slider ? ' thumbs-slider-vertical' : ' thumbs-slider-horizontal';
}

$modal_360_html = '';
?>
<div class="<?php echo esc_attr( $wrapper_classes ); ?>">
	<?php
	foreach ( $attachment_ids as $attachment_id ) {
		$props = wc_get_product_attachment_props( $attachment_id, $post );

		if ( ! $props['url'] ) {
			continue;
		}

		$main_slide_classes          = array( 'swiper-slide' );
		$thumbnail_slide_classes     = array( 'swiper-slide' );
		$video_play_html             = '';
		$video_html                  = '';
		$attributes_string           = '';
		$main_slide_suffix_html      = '';
		$thumbnail_slide_suffix_html = '';

		$media_attach = get_post_meta( $attachment_id, 'minimog_product_attachment_type', true );
		switch ( $media_attach ) {
			case 'video':
				$video_url = get_post_meta( $attachment_id, 'minimog_product_video', true );
				if ( ! empty( $video_url ) ) {
					$main_slide_classes[]        = 'zoom has-video';
					$thumbnail_slide_classes[]   = 'has-video';
					$video_play_html             = '<div class="main-play-product-video"></div>';
					$svg_icon                    = Minimog_Helper::get_file_contents( MINIMOG_THEME_SVG_DIR . '/font-awesome/regular/video.svg' );
					$thumbnail_slide_suffix_html = '<div class="thumbnail-play-product-video">' . $svg_icon . '</div>';

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

					$svg_icon                    = Minimog_Helper::get_file_contents( MINIMOG_THEME_SVG_DIR . '/cube.svg' );
					$thumbnail_slide_suffix_html = '<div class="thumbnail-play-product-video">' . $svg_icon . '</div>';

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
		$attributes_string .= ' class="' . esc_attr( implode( ' ', $main_slide_classes ) ) . '"';

		$main_image_html         = Minimog_Image::get_attachment_by_id( array(
			'id'   => $attachment_id,
			'size' => $main_image_size,
		) );
		$main_slider_slides_html .= sprintf( '<div %1$s>%2$s%3$s</div>', $attributes_string, $main_image_html, $main_slide_suffix_html );

		$thumbs_image_html         = Minimog_Image::get_attachment_by_id( [
			'id'   => $attachment_id,
			'size' => $thumb_image_size,
		] );
		$thumbs_slider_slides_html .= sprintf( '<div class="%1$s"><div class="swiper-thumbnail-wrap">%2$s%3$s</div></div>',
			esc_attr( implode( ' ', $thumbnail_slide_classes ) ),
			$thumbs_image_html,
			$thumbnail_slide_suffix_html
		);
	}
	?>
	<?php
	$main_slider_settings = [
		'data-items-desktop'  => 1,
		'data-gutter-desktop' => 10,
		'data-nav'            => '1',
		'data-loop'           => '1',
	];

	if ( '1' === $is_vertical_slider ) {
		$main_slider_settings['data-looped-slides'] = $looped_slides;
	}
	?>
	<div
		class="tm-swiper minimog-main-swiper nav-style-02" <?php echo Minimog_Helper::slider_args_to_html_attr( $main_slider_settings ); ?>>
		<div class="swiper-inner">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php echo '' . $main_slider_slides_html; ?>
				</div>
			</div>
		</div>
	</div>

	<?php if ( $number_attachments > 1 && '1' === $show_gallery ) { ?>
		<?php
		$thumb_slider_defaults = [
			'data-slide-to-clicked-slide' => '1',
			'data-freemode'               => '1',
		];

		if ( '1' === $is_vertical_slider ) {
			$thumb_slider_settings = [
				'data-items-desktop'  => 'auto',
				'data-gutter-desktop' => 10,
				'data-vertical'       => '1',
				'data-freemode'       => '1',
				'data-looped-slides'  => $looped_slides,
			];
		} else {
			$thumb_slider_settings = [
				'data-items-desktop'  => '5',
				'data-items-mobile'   => '4',
				'data-gutter-desktop' => 10,
			];
		}

		$thumb_slider_settings = wp_parse_args( $thumb_slider_settings, $thumb_slider_defaults );
		?>
		<div class="minimog-thumbs-swiper-wrap">
			<div
				class="tm-swiper minimog-thumbs-swiper" <?php echo Minimog_Helper::slider_args_to_html_attr( $thumb_slider_settings ); ?>>
				<div class="swiper-inner">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php echo '' . $thumbs_slider_slides_html; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>

<?php echo '' . $modal_360_html; ?>
