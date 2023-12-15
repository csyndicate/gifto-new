<?php
/**
 * Review order table body
 */

defined( 'ABSPATH' ) || exit;
?>
<tbody>
<?php
do_action( 'woocommerce_review_order_before_cart_contents' );

foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
	/**
	 * @var WC_Product $_product
	 */
	$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

	if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
		$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

		?>
		<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
			<td class="product-info">
				<div class="product-wrapper">
					<div class="product-thumbnail">
						<?php
						$product_image = Minimog_Woo::instance()->get_product_image( $_product, Minimog_Woo::instance()->get_loop_product_image_size( 80 ), [ 'lazy_load' => false ] );

						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $product_image, $cart_item, $cart_item_key );
						if(!$thumbnail){
						echo '' . $thumbnail;
						}
						else{?>
							<?php
						$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
						$img_mk = get_field( 'rwd_product_api_image', $product_id)?>
						<img class="single-product-cstm-image" src="<?php echo $img_mk ?>" alt="Placeholder">
							<?php } ?>
					</div>

					<div class="product-caption">
						<h3 class="product-name">
							<?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ) . '&nbsp;'; ?>
							<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <span class="product-quantity">' . sprintf( 'x%s', $cart_item['quantity'] ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</h3>
						<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
				</div>
			</td>
			<td class="product-total">
				<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</td>
		</tr>
		<?php
	}
}

do_action( 'woocommerce_review_order_after_cart_contents' );
?>
</tbody>
