<?php
/**
 * Low stock notice
 *
 * @package Minimog/WooCommerce/Templates
 * @since   1.0.0
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="entry-product-low-stock">
	<?php if ( ! empty( $availability_text ) ): ?>
		<div class="text"><?php echo '' . $availability_text; ?></div>
	<?php endif; ?>
	<?php if ( ! empty( $stock_percent ) ): ?>
		<div class="minimog-progress">
			<div class="progress-bar-wrap">
				<div class="progress-bar" role="progressbar"
				     style="<?php echo esc_attr( "width: {$stock_percent}%" ); ?>"
				     aria-valuenow="<?php echo esc_attr( $stock_percent ); ?>" aria-valuemin="0"
				     aria-valuemax="100"></div>
			</div>
		</div>
	<?php endif; ?>
</div>
