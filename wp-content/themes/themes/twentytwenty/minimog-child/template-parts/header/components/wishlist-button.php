<?php
/**
 * Wishlist button on header
 *
 * @package Minimog
 * @since   1.0.0
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$link_classes = 'wishlist-link header-icon has-badge header-wishlist-link hint--bounce hint--bottom';
$wishlist_url = WPCleverWoosw::get_url();
$count        = WPCleverWoosw::get_count();

$header_type  = Minimog_Global::instance()->get_header_type();
$icon_style   = Minimog::setting( "header_style_{$header_type}_header_icon_style" );
$link_classes .= " {$icon_style}";

switch ( $icon_style ) :
	case 'icon-set-02':
		$icon_html = Minimog_Helper::get_file_contents( MINIMOG_WOO_ASSETS_DIR . '/heart.svg' );
		break;
	default :
		$icon_html = Minimog_Helper::get_file_contents( MINIMOG_THEME_ASSETS_DIR . '/svg/custom/star.svg' );
		break;
endswitch;
?>
<a href="<?php echo esc_url( $wishlist_url ) ?>"
   class="<?php echo esc_attr( $link_classes ); ?>" aria-label="<?php esc_attr_e( 'Wishlist', 'minimog' ); ?>">
	<div class="icon">
		<?php echo '' . $icon_html; ?>
		<span class="header-icon-badge icon-badge"><?php echo esc_html( $count ); ?></span>
	</div>
</a>
