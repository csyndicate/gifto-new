<?php
defined( 'ABSPATH' ) || exit;

global $post;

$output = '';

foreach ( $attachment_ids as $attachment_id ) {
	$props = wc_get_product_attachment_props( $attachment_id, $post );

	if ( ! $props['url'] ) {
		continue;
	}

	$output = Minimog_Image::get_attachment_by_id( array(
		'id'   => $attachment_id,
		'size' => $main_image_size,
	) );

	break;
}

?>
<div class="<?php echo esc_attr( $wrapper_classes ); ?>">
	<?php echo '' . $output; ?>
</div>
