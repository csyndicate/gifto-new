<?php
/**
 * Single variation cart button
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$add_to_cart_button_class = 'single_add_to_cart_button ajax_add_to_cart button alt';

if ( '1' === Minimog::setting( 'single_product_buy_now_enable' ) ) {
	$add_to_cart_button_class .= ' button-2';
}
?>
<div class="woocommerce-variation-add-to-cart variations_button">

	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<div class="entry-product-quantity-wrapper">
		<?php do_action( 'woocommerce_before_add_to_cart_quantity' ); ?>

		<?php
		\Minimog_Woo::instance()->output_add_to_cart_quantity_html( array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(),
			// WPCS: CSRF ok, input var ok.
		) );
		?>

		<?php do_action( 'woocommerce_after_add_to_cart_quantity' ); ?>

		<button type="submit"
		        class="<?php echo esc_attr( $add_to_cart_button_class ); ?>">
			<span><?php echo esc_html( $product->single_add_to_cart_text() ); ?></span></button>

		<?php if ( '1' === Minimog::setting( 'single_product_buy_now_enable' ) ) : ?>
			<button type="submit"
			        class="single_add_to_cart_button ajax_add_to_cart button alt button-buy-now"
			        data-redirect="<?php echo esc_url( wc_get_checkout_url() ); ?>">
				<span><?php esc_html_e( 'Buy Now', 'minimog' ); ?></span>
			</button>
		<?php endif; ?>
	</div>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>"/>
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>"/>
	<input type="hidden" name="variation_id" class="variation_id" value="0"/>
</div>
