<?php

if(! defined('ABSPATH')) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

?>


<form action="<?php echo admin_url('admin-ajax.php') ?>" method="post">
	
	<h3><?php echo  __('Export Transactions', 'fsww'); ?>:</h3>
	
	<input type="hidden" name="action" value="fsww_export_transactions">
	
	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Export"></p>

</form>