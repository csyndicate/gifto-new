<?php
/**
 * Mini cart button on header
 *
 * @package Minimog
 * @since   1.0.0
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

global $woocommerce;
$cart_url = isset( $woocommerce ) ? wc_get_cart_url() : '/cart';

$header_type = Minimog_Global::instance()->get_header_type();
$style       = Minimog::setting( "header_style_{$header_type}_cart_style" );

$cart_html  = '';
$link_class = "mini-cart__button_redirect has-badge hint--bounce hint--bottom style-{$style} header-icon";
$qty        = ! empty( WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;

ob_start();
wc_cart_totals_order_total_html();
$cart_total = ob_get_clean();

$cart_total_html = '<div class="mini-cart-total">' . $cart_total . '</div>';
$cart_badge_html = '<div class="header-icon-badge"><span class="mini-cart-badge">' . $qty . '</span></div>';

switch ( $style ) :
	case 'icon-set-02':
		$svg       = Minimog_Helper::get_file_contents( MINIMOG_WOO_ASSETS_DIR . '/shopping-bag.svg' );
		$cart_html = '<div class="icon">' . $svg . $cart_badge_html . '</div>';
		break;
	case 'icon-circle-price-01':
		$svg        = Minimog_Helper::get_file_contents( MINIMOG_THEME_ASSETS_DIR . '/svg/custom/shopping-bag.svg' );
		$cart_html  = $cart_total_html . '<div class="icon">' . $svg . $cart_badge_html . '</div>';
		$link_class .= ' header-icon-circle';
		break;
	default:
		$svg       = Minimog_Helper::get_file_contents( MINIMOG_THEME_ASSETS_DIR . '/svg/custom/shopping-bag.svg' );
		$cart_html .= '<div class="icon">' . $svg . $cart_badge_html . '</div>';
		break;
endswitch;
?>
<a href="<?php echo esc_url( $cart_url ); ?>" class="<?php echo esc_attr( $link_class ); ?>"
   aria-label="<?php esc_attr_e( 'Cart', 'minimog' ); ?>">
	<?php echo '' . $cart_html; ?>
</a>
