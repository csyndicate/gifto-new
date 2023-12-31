<?php
/**
 * Category Caption Style 02
 * Info with button
 */

defined( 'ABSPATH' ) || exit;
extract( $args );
?>
<div class="category-info">
	<div class="category-info-wrapper">
		<h5 class="category-name">
			<a href="<?php echo esc_url( $link ); ?>">
				<?php echo esc_html( $category->name ); ?>
			</a>
		</h5>

		<?php wc_get_template( 'cat-loop/item-count.php', [
			'category' => $category,
			'link'     => $link,
			'settings' => $settings,
		] ); ?>
	</div>
	<a href="<?php echo esc_url( $link ); ?>" class="tm-button style-flat">
		<i class="far fa-arrow-right"></i>
	</a>
</div>
