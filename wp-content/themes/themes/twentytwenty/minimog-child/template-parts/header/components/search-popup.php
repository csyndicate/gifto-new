<?php
/**
 * Search button open search popup on header
 *
 * @package Minimog
 * @since   1.0.0
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$header_type = Minimog_Global::instance()->get_header_type();
$icon_style  = Minimog::setting( "header_style_{$header_type}_header_icon_style" );
$classes     = "page-open-popup-search mobile_header_mk hint--bounce hint--bottom header-icon {$icon_style}";

if ( ! empty( $args['extra_class'] ) ) {
	$classes .= ' ' . $args['extra_class'];
}
?>
<a href="javascript:void(0);"
   class="<?php echo esc_attr( $classes ); ?>"
   aria-label="<?php esc_attr_e( 'Search', 'minimog' ); ?>">
	<div class="icon">
		<?php
		switch ( $icon_style ) :
			case 'icon-set-02':
				echo Minimog_Helper::get_file_contents( MINIMOG_WOO_ASSETS_DIR . '/search.svg' );
				break;
			default:
				echo Minimog_Helper::get_file_contents( MINIMOG_THEME_ASSETS_DIR . '/svg/custom/search.svg' );
				break;
		endswitch; ?>
	</div>
	<?php if ( ! empty( $args['show_text'] ) ) : ?>
		<div class="text"><?php esc_html_e( 'Search', 'minimog' ); ?></div>
	<?php endif; ?>
</a>
