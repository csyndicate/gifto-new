<?php
/**
 * Mini cart button on search popup
 *
 * @package Minimog
 * @since   1.0.0
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! Minimog_Woo::instance()->is_activated() ) {
	return;
}

global $woocommerce;
$cart_url = isset( $woocommerce ) ? wc_get_cart_url() : '/cart';

$cart_html  = '';
$link_class = "mini-cart__button has-badge hint--bounce hint--bottom popup-search-icon";
$qty        = ! empty( WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;

$cart_badge_html = '<div class="icon-badge"><span class="mini-cart-badge">' . $qty . '</span></div>';

$svg       = Minimog_Helper::get_file_contents( MINIMOG_THEME_ASSETS_DIR . '/svg/custom/shopping-bag.svg' );
$cart_html .= '<div class="icon">' . $svg . $cart_badge_html . '</div>';
?>
<a href="<?php echo esc_url( $cart_url ); ?>" class="<?php echo esc_attr( $link_class ); ?>"
   aria-label="<?php esc_attr_e( 'Cart', 'minimog' ); ?>">
	<?php echo '' . $cart_html; ?>
</a>
