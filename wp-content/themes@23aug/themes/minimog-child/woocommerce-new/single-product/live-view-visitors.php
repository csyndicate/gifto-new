<?php
/**
 * Live View Visitors
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="live-viewing-visitors">
	<span class="icon minimog-animate-pulse far fa-eye"></span>
	<?php echo sprintf( esc_html__( '%s people are viewing this right now', 'minimog' ), '<span class="count">' . $total_visitors . '</span>' ); ?>
</div>
