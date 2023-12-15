<?php
/**
 * Wishlist button on mobile tabs
 *
 * @package Minimog
 * @since   1.0.0
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WPCleverWoosw' ) ) {
	return;
}

$link_classes = 'mobile-tab-link has-badge wishlist-link';
$wishlist_url = WPCleverWoosw::get_url();
$count        = WPCleverWoosw::get_count();
?>
<a href="<?php echo esc_url( $wishlist_url ) ?>" class="<?php echo esc_attr( $link_classes ); ?>">
	<div class="icon">
		<?php echo Minimog_Helper::get_file_contents( MINIMOG_THEME_ASSETS_DIR . '/svg/custom/star.svg' ); ?>
		<span class="icon-badge"><?php echo esc_html( $count ); ?></span>
	</div>
</a>
