<?php
/**
 * Shipping Methods Display
 *
 * In 2.1 we show methods per package. This allows for multiple methods per order if so desired.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

$formatted_destination    = isset( $formatted_destination ) ? $formatted_destination : WC()->countries->get_formatted_address( $package['destination'], ', ' );
$has_calculated_shipping  = ! empty( $has_calculated_shipping );
$show_shipping_calculator = ! empty( $show_shipping_calculator );
$calculator_text          = '';
?>
<div class="cart-totals-row cart-shipping woocommerce-shipping-totals shipping">
	<div class="cart-totals-label"><?php echo esc_html( $package_name ); ?></div>
	<div class="cart-totals-value">
		<?php if ( $available_methods ) : ?>
			<?php
			$total_methods = count( $available_methods );
			?>
			<div id="shipping_method" class="woocommerce-shipping-methods">
				<?php if ( 1 < $total_methods ) : ?>
					<select name="<?php echo esc_attr( 'shipping_method[' . $index . ']' ) ?>"
					        data-index="<?php echo esc_attr( $index ); ?>"
					        class="shipping_method"
					>
						<?php foreach ( $available_methods as $method ) : ?>
							<option value="<?php echo esc_attr( $method->id ); ?>"
								<?php selected( $method->id, $chosen_method, true ); ?>
							>
								<?php echo wc_cart_totals_shipping_method_label( $method ); ?>
								<?php do_action( 'woocommerce_after_shipping_rate', $method, $index ); ?>
							</option>
						<?php endforeach; ?>
					</select>
				<?php else: ?>
					<?php foreach ( $available_methods as $method ) : ?>
						<?php
						printf( '<input type="hidden" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" />', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ) ); // WPCS: XSS ok.
						printf( '<label for="shipping_method_%1$s_%2$s">%3$s</label>', $index, esc_attr( sanitize_title( $method->id ) ), wc_cart_totals_shipping_method_label( $method ) ); // WPCS: XSS ok.
						do_action( 'woocommerce_after_shipping_rate', $method, $index );
						?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		<?php
		elseif ( ! $has_calculated_shipping || ! $formatted_destination ) :
			if ( ! is_checkout() && 'no' === get_option( 'woocommerce_enable_shipping_calc' ) ) {
				echo wp_kses_post( apply_filters( 'woocommerce_shipping_not_enabled_on_cart_html', __( 'Shipping costs are calculated during checkout.', 'minimog' ) ) );
			} else {
				echo wp_kses_post( apply_filters( 'woocommerce_shipping_may_be_available_html', __( 'Enter your address to view shipping options.', 'minimog' ) ) );
			}
		elseif ( is_checkout() ) :
			echo wp_kses_post( apply_filters( 'woocommerce_no_shipping_available_html', __( 'There are no shipping options available. Please ensure that your address has been entered correctly, or contact us if you need any help.', 'minimog' ) ) );
		else :
			// Translators: $s shipping destination.
			echo wp_kses_post( apply_filters( 'woocommerce_cart_no_shipping_available_html', sprintf( esc_html__( 'No shipping options were found for %s.', 'minimog' ) . ' ', '<strong>' . esc_html( $formatted_destination ) . '</strong>' ) ) );
			$calculator_text = esc_html__( 'Enter a different address', 'minimog' );
		endif;
		?>
	</div>
</div>
