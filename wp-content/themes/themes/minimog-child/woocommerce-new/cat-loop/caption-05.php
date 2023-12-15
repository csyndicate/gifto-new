<?php
/**
 * Category Caption Style 05
 * Info with button only
 */

defined( 'ABSPATH' ) || exit;
extract( $args );
?>
<div class="category-info">
	<a href="<?php echo esc_url( $link ); ?>" class="tm-button style-flat">
		<?php echo esc_html( $category->name ); ?>
	</a>
</div>
