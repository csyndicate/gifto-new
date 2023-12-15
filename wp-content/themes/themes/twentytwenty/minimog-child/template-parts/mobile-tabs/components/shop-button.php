<?php
/**
 * Shop link on mobile tabs
 *
 * @package Minimog
 * @since   1.0.0
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! Minimog_Woo::instance()->is_activated() ) {
	return;
}

$link_classes = 'mobile-tab-link';
$link_url     = get_permalink( wc_get_page_id( 'shop' ) );
?>
<a href="<?php echo esc_url( $link_url ) ?>" class="<?php echo esc_attr( $link_classes ); ?>">
	<div class="icon">
		<?php echo Minimog_Helper::get_file_contents( MINIMOG_THEME_ASSETS_DIR . '/svg/custom/grid.svg' ); ?>
	</div>
</a>
