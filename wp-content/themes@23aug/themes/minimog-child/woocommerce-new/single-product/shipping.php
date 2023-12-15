<?php
/**
 * Single Product Shipping
 *
 * @package Minimog/WooCommerce/Templates
 * @since   1.0.0
 * @version 1.3.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

$show_shipping_class        = Minimog::setting( 'single_product_shipping_class_enable' );
$show_shipping_estimated    = Minimog::setting( 'single_product_shipping_estimated_enable' );
$show_free_shipping_returns = Minimog::setting( 'single_product_shipping_n_returns_enable' );

$shipping_class_id   = $product->get_shipping_class_id();
$shipping_class_name = $shipping_class_description = '';
if ( $shipping_class_id ) {
	$term = get_term_by( 'id', $shipping_class_id, 'product_shipping_class' );

	if ( $term && ! is_wp_error( $term ) ) {
		$shipping_class_name        = $term->name;
		$shipping_class_description = $term->description;
	}
}

$delivery_begin = Minimog_Woo::instance()->get_product_delivery_range_begin();
$delivery_end   = Minimog_Woo::instance()->get_product_delivery_range();

$amount_for_free_shipping = Minimog\Woo\Free_Shipping_Label::instance()->get_min_free_shipping_amount();
$min_amount               = (float) $amount_for_free_shipping['amount'];
?>
<div class="entry-product-meta-shipping">
	<?php if ( ! empty( $shipping_class_name ) && '1' === $show_shipping_class ) : ?>
		<div class="item product-meta-shipping-class">
			<div
				class="icon"><?php echo Minimog_Helper::get_file_contents( MINIMOG_THEME_SVG_DIR . '/font-awesome/light/truck-moving.svg' ); ?></div>
			<div class="label"><?php echo esc_html( $shipping_class_name ) . ':'; ?></div>
			<div class="value"><?php echo esc_html( $shipping_class_description ); ?></div>
		</div>
	<?php endif; ?>
	<?php if ( ! empty( $delivery_end ) && $delivery_end > 0 && '1' === $show_shipping_estimated ): ?>
		<?php
		$delivery_begin = min( $delivery_begin, $delivery_end );
		$delivery_begin = strtotime( '+' . $delivery_begin . ' day' );
		$delivery_end   = strtotime( '+' . $delivery_end . ' day' );

		$date_format = get_option( 'woocommerce_shipping_delivery_time_format' );

		switch ( $date_format ) :
			case 'M d, Y':
				$delivery_start_format = $delivery_end_format = 'M d, Y';

				// Simplify date if same year.
				if ( date( 'Y', $delivery_begin ) === date( 'Y', $delivery_end ) ) {
					$delivery_start_format = 'M d';

					// Simplify date if same month.
					if ( date( 'n', $delivery_begin ) === date( 'n', $delivery_end ) ) {
						$delivery_end_format = 'd, Y';
					}
				}
				break;
			default:
				$delivery_start_format = $delivery_end_format = 'd M, Y';

				// Simplify date if same year.
				if ( date( 'Y', $delivery_begin ) === date( 'Y', $delivery_end ) ) {
					$delivery_start_format = 'M d';

					// Simplify date if same month.
					if ( date( 'n', $delivery_begin ) === date( 'n', $delivery_end ) ) {
						$delivery_start_format = 'd';
					}
				}
				break;
		endswitch;

		$delivery_ranges = wp_date( $delivery_start_format, $delivery_begin ) . ' - ' . wp_date( $delivery_end_format, $delivery_end );
		?>
		<?php ?>
		<div class="item product-meta-shipping-delivery-time">
			<div
				class="icon"><?php echo Minimog_Helper::get_file_contents( MINIMOG_THEME_SVG_DIR . '/font-awesome/light/shipping-fast.svg' ); ?></div>
			<div class="label"><?php esc_html_e( 'Estimated Delivery:', 'minimog' ); ?></div>
			<div class="value"><?php echo esc_html( $delivery_ranges ); ?></div>
		</div>
	<?php endif; ?>

	<?php if ( $min_amount > 0 && '1' === $show_free_shipping_returns ) : ?>
		<div class="item product-meta-shipping-return">
			<div
				class="icon"><?php echo Minimog_Helper::get_file_contents( MINIMOG_THEME_SVG_DIR . '/font-awesome/light/box.svg' ); ?></div>
			<div class="label"><?php esc_html_e( 'Free Shipping & Returns:', 'minimog' ); ?></div>
			<div
				class="value"><?php echo sprintf( esc_html__( 'On all orders over %s', 'minimog' ), wc_price( $min_amount ) ); ?></div>
		</div>
	<?php endif; ?>
</div>
