<?php
/**
 * Review order totals table
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="review-order-totals-table">
	<div class="cart-totals-row cart-subtotal">
		<div class="cart-totals-label"><?php esc_html_e( 'Subtotal', 'minimog' ); ?></div>
		<div class="cart-totals-value"><?php wc_cart_totals_subtotal_html(); ?></div>
	</div>

	<?php
	$coupons = WC()->cart->get_coupons();
	?>
	<?php if ( ! empty( $coupons ) ) : ?>
		<div class="cart-totals-row cart-coupons">
			<div class="cart-totals-label"><?php esc_html_e( 'Coupon:', 'minimog' ); ?></div>
			<div class="cart-totals-value">
				<?php foreach ( $coupons as $code => $coupon ) : ?>
					<?php Minimog_Woo::instance()->cart_totals_coupon_html( $coupon ); ?>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
		<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

		<?php wc_cart_totals_shipping_html(); ?>

		<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
	<?php endif; ?>

	<?php 
		$i = 0; 
		foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<div class="cart-totals-row cart-totals-fee">		
				<div class="cart-totals-label">
					<?php if( $i == 0 ){
						echo esc_html( $fee->name ); 
						
							echo ' <i class="fas fa-info-circle tooltip" title="This is a nominal flat fee for third-party payment processing assurance &<br> warranty, service & support, admin, convenience to help you gift better! "></i>';
						}
						elseif(  $i == 1 ){
							echo esc_html( $fee->name );
                            	echo ' <i class="fas fa-info-circle tooltip" title="Value Added Tax"></i>';
						}
					?>
				</div>
				<div class="cart-totals-value"><?php wc_cart_totals_fee_html( $fee ); ?></div>
			</div>
		<?php $i = $i+1; ?>
	<?php endforeach; ?>

	<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
		<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
			<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
				<div class="cart-totals-row tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
					<div class="cart-totals-label"><?php echo esc_html( $tax->label ); ?></div>
					<div class="cart-totals-value"><?php echo wp_kses_post( $tax->formatted_amount ); ?></div>
				</div>
			<?php endforeach; ?>
		<?php else : ?>
			<div class="cart-totals-row tax-total">
				<div class="cart-totals-label"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></div>
				<div class="cart-totals-value"><?php wc_cart_totals_taxes_total_html(); ?></div>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

	<div class="cart-totals-row order-total">
		<div class="cart-totals-label"><?php esc_html_e( 'Total', 'minimog' ); ?></div>
		<div class="cart-totals-value"><?php wc_cart_totals_order_total_html(); ?>Only</div>
	</div>

	<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

</div>
