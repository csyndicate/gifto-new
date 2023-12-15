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
?>
<a href="<?php echo esc_url( home_url() ) ?>" class="<?php echo esc_attr( $link_classes ); ?>">
	<div class="icon">
		<?php echo Minimog_Helper::get_file_contents( MINIMOG_THEME_ASSETS_DIR . '/svg/custom/home-alt.svg' ); ?>
	</div>
</a>
