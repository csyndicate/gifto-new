<?php

function wcsms_sanitize_option( $option ) {
	$keys = array_keys( wcsms_get_defaults() );
	foreach( $keys as $key ) {
		if( !isset( $option[$key] ) ) {
			$option[$key] = '';
		}
	}
	return $option;
}

function wcsms_get_defaults() {
	$defaults = array(
		'wcsms_checkout_cb' 		=> 1,
		'wcsms_checkout_label' 		=> 'Please send me order updates via text message',
		'wcsms_checkout_status'		=> array( 'processing', 'failed', 'completed', 'pending', 'on-hold', 'refunded', 'cancelled' ),
		'wcsms_status_processing' 	=> 'Your order is now Processing.',
		'wcsms_status_pending' 		=> 'Your order is now Pending payment.',
		'wcsms_status_on-hold' 		=> 'Your order is now On-hold.',
		'wcsms_status_completed' 	=> 'Your order is now Completed.',
		'wcsms_status_cancelled' 	=> 'Your order is now cancelled.',
		'wcsms_status_refunded' 	=> 'Your order is now Refunded.',
		'wcsms_status_failed' 		=> 'Your order is now Failed.',
	);
	return $defaults;
}