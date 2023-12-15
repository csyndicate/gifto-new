<?php
/**
 * Login button on mobile tabs
 *
 * @package Minimog
 * @since   1.0.0
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$link_classes = 'mobile-tab-link login-link';

if ( is_user_logged_in() ) {
	$button_url = wp_logout_url();
	$button_url = apply_filters( 'minimog/user_profile/url', $button_url );
} else {
	$button_url = wp_login_url();
	$button_url = apply_filters( 'minimog/user_login/url', $button_url );

	/**
	 * Force remove link.
	 */
	if ( Minimog::setting( 'login_popup_enable' ) ) {
		$button_url   = '#';
		$link_classes .= ' open-modal-login';
	}
}

if ( empty( $button_url ) ) {
	return;
}
?>
<a href="<?php echo esc_url( $button_url ); ?>" class="<?php echo esc_attr( $link_classes ); ?>">
	<span class="icon">
		<?php echo Minimog_Helper::get_file_contents( MINIMOG_THEME_ASSETS_DIR . '/svg/custom/user.svg' ) ?>
	</span>
</a>
