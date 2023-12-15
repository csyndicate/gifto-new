<?php
/**
 * Loop Category
 */

defined( 'ABSPATH' ) || exit;

global $product;

$categories = Minimog_Woo::instance()->get_the_product_categories();

if ( empty( $categories ) ) {
	return;
}

$term = $categories[0];

$link = get_term_link( $term, 'product_cat' );
if ( is_wp_error( $link ) ) {
	return;
}
?>
<div class="loop-product-category">
	<a href="<?php echo esc_url( $link ); ?>">
		<?php echo esc_html( $term->name ); ?>
	</a>
</div>
