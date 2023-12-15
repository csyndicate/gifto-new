<?php
/**
 * Cart countdown
 */

defined( 'ABSPATH' ) || exit;

$length          = intval( Minimog::setting( 'shopping_cart_countdown_length' ) );
$message         = Minimog::setting( 'shopping_cart_countdown_message' );
$expired_message = Minimog::setting( 'shopping_cart_countdown_expired_message' );
$loop            = ! empty( Minimog::setting( 'shopping_cart_countdown_loop_enable' ) ) ? true : false;

$timer              = '<div class="timer">00m 00s</div>';
$message            = str_replace( '{timer}', $timer, $message );
$html_message       = str_replace( '{fire}', '&#128293;', $message );
$js_message         = str_replace( '{fire}', '\ud83d\udd25', $message );
$wrap_class         = 'cart-countdown-timer';
$countdown_settings = [
	'loop'            => $loop,
	'length'          => $length,
	'message'         => $js_message,
	'expired_message' => $expired_message,
];
?>
<div class="<?php echo esc_attr( $wrap_class ); ?>"
     data-countdown="<?php echo esc_attr( wp_json_encode( $countdown_settings ) ); ?>">
	<div class="inner">
		<div class="cart-countdown-message"><?php echo '' . $html_message; ?></div>
	</div>
</div>
