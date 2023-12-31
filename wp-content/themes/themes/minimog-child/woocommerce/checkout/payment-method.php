<?php
/**
 * Output a single payment method
 *
 * This template can be overridden by copying it to minimog-child/woocommerce/checkout/payment-method.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.5.0
 */

defined( 'ABSPATH' ) || exit;
?>
<li class="wc_payment_method payment_method_<?php echo esc_attr( $gateway->id ); ?>">
	<label class="payment_title" for="payment_method_<?php echo esc_attr( $gateway->id ); ?>">
		<input id="payment_method_<?php echo esc_attr( $gateway->id ); ?>" type="radio" class="input-radio"
		       name="payment_method"
		       value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?>
		       data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>"/>

		<span class="payment-title-icon"><?php echo '' . $gateway->get_icon() ?></span>

		<span class="payment-title-name"><?php echo wp_kses_post( $gateway->get_title() ); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?>
			<?php if( esc_attr( $gateway->id ) == "stripe" ): ?>
				<i class="fas fa-info-circle tooltip" title="A small processing fee (by Stripe) may apply based on your card's currency & country of issue "></i>
			<?php endif; ?>
		</span>
			<?php if( esc_attr( $gateway->id ) == "bacs" ): ?>
				<i class="fas fa-info-circle tooltip" title="Buy now & pay later in our bank account"></i>
			<?php endif; ?>
			<?php if( esc_attr( $gateway->id ) == "mamopay" ): ?>
				<i class="fas fa-info-circle tooltip" title="Place order now, You can pay later"></i>
			<?php endif; ?>
		
		
	</label>
	<?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
		<div class="payment_box payment_method_<?php echo esc_attr( $gateway->id ); ?>"
		     <?php if ( ! $gateway->chosen ) : /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>style="display:none;"<?php endif; /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>>
			<?php $gateway->payment_fields(); ?>
		</div>
	<?php endif; ?>
</li>
