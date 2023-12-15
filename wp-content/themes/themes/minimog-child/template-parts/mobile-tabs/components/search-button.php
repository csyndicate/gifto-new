<?php
/**
 * Search button open search popup on mobile tabs
 *
 * @package Minimog
 * @since   1.0.0
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$classes = "page-open-popup-search mobile-tab-link";
?>
<a href="javascript:void(0);" class="<?php echo esc_attr( $classes ); ?>">
	<div class="icon">
		<?php echo Minimog_Helper::get_file_contents( MINIMOG_THEME_ASSETS_DIR . '/svg/custom/search.svg' ); ?>
	</div>
</a>
