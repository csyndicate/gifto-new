<?php

/**
 * Plugin Name: WP SMS For WooCommercess
 * Description: Send SMS notifications to the admin & Customers through WooCommerce Store.
 * Plugin URI: https://wpsms.io
 * Version: 1.0.2
 * Author: WPSMS
 * Author URI: https://wpsms.io
 */
define( 'WCSMS_VERSION', '1.0.2' );
define( 'WCSMS_TD', 'woocommerce-sms' );
define( 'WCSMS_OPTION', 'wcsms_option' );
//integrating Freemius SKD

if ( !function_exists( 'wc_sms_fs' ) ) {
    // Create a helper function for easy SDK access.
    function wc_sms_fs()
    {
        global  $wc_sms_fs ;
        
        if ( !isset( $wc_sms_fs ) ) {
            // Include Freemius SDK.
            
            if ( file_exists( dirname( dirname( __FILE__ ) ) . '/wp-twilio-core/freemius/start.php' ) ) {
                // Try to load SDK from parent plugin folder.
                require_once dirname( dirname( __FILE__ ) ) . '/wp-twilio-core/freemius/start.php';
            } else {
                
                if ( file_exists( dirname( dirname( __FILE__ ) ) . '/wp-twilio-core-premium/freemius/start.php' ) ) {
                    // Try to load SDK from premium parent plugin folder.
                    require_once dirname( dirname( __FILE__ ) ) . '/wp-twilio-core-premium/freemius/start.php';
                } else {
                    require_once dirname( __FILE__ ) . '/freemius/start.php';
                }
            
            }
            
            $wc_sms_fs = fs_dynamic_init( array(
                'id'               => '6021',
                'slug'             => 'wc-sms',
                'type'             => 'plugin',
                'public_key'       => 'pk_2d9db0bb13ee9e4ad218ab42daa8f',
                'is_premium'       => true,
                'is_premium_only'  => true,
                'has_paid_plans'   => true,
                'is_org_compliant' => false,
                'parent'           => array(
                'id'         => '2894',
                'slug'       => 'wp-twilio-core',
                'public_key' => 'pk_41d58e132e8e380880894f44eb5ca',
                'name'       => 'WP Twilio Core',
            ),
                'menu'             => array(
                'slug'           => 'twilio-options',
                'override_exact' => true,
                'support'        => false,
                'parent'         => array(
                'slug' => 'options-general.php',
            ),
            ),
                'is_live'          => true,
            ) );
        }
        
        return $wc_sms_fs;
    }
    
    function wc_sms_fs_settings_url()
    {
        return admin_url( 'admin.php?page=twilio-options&tab=woocommerce' );
    }

}

function wc_sms_fs_is_parent_active_and_loaded()
{
    // Check if the parent's init SDK method exists.
    return function_exists( 'twl_freemius' );
}

function wc_sms_fs_is_parent_active()
{
    $active_plugins = get_option( 'active_plugins', array() );
    
    if ( is_multisite() ) {
        $network_active_plugins = get_site_option( 'active_sitewide_plugins', array() );
        $active_plugins = array_merge( $active_plugins, array_keys( $network_active_plugins ) );
    }
    
    foreach ( $active_plugins as $basename ) {
        if ( 0 === strpos( $basename, 'wp-twilio-core/' ) || 0 === strpos( $basename, 'wp-twilio-core-premium/' ) ) {
            return true;
        }
    }
    return false;
}

function wc_sms_fs_init()
{
    
    if ( wc_sms_fs_is_parent_active_and_loaded() ) {
        // Init Freemius.
        wc_sms_fs();
        wc_sms_fs()->add_filter( 'connect_url', 'wc_sms_fs_settings_url' );
        wc_sms_fs()->add_filter( 'after_skip_url', 'wc_sms_fs_settings_url' );
        wc_sms_fs()->add_filter( 'after_connect_url', 'wc_sms_fs_settings_url' );
        wc_sms_fs()->add_filter( 'after_pending_connect_url', 'wc_sms_fs_settings_url' );
        // Signal that the add-on's SDK was initiated.
        do_action( 'wc_sms_fs_loaded' );
        // Parent is active, add your init code here.
    } else {
        // Parent is inactive, add your error handling here.
    }

}


if ( wc_sms_fs_is_parent_active_and_loaded() ) {
    // If parent already included, init add-on.
    wc_sms_fs_init();
} else {
    
    if ( wc_sms_fs_is_parent_active() ) {
        // Init add-on only after the parent is loaded.
        add_action( 'twl_freemius_loaded', 'wc_sms_fs_init' );
    } else {
        // Even though the parent is not activated, execute add-on for activation / uninstall hooks.
        wc_sms_fs_init();
    }

}

require_once 'helpers.php';
// Loading plugin text domain
function wcsms_load_textdomain()
{
    load_plugin_textdomain( WCSMS_TD, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'wcsms_load_textdomain' );
// Registering Setting
function wcsms_register_setting()
{
    register_setting( 'wcsms-update-options', WCSMS_OPTION, 'wcsms_sanitize_option' );
}

add_action( 'admin_init', 'wcsms_register_setting', 11 );
// Registering a new tab name
function wcsms_settings_tab( $tabs = array() )
{
    $tabs['woocommerce'] = __( 'WooCommerce', WCSMS_TD );
    return $tabs;
}

add_filter( 'twl_settings_tabs', 'wcsms_settings_tab' );
// Adding form to new tab
function wcsms_tab_content( $tab, $page_url )
{
    if ( $tab != 'woocommerce' ) {
        return;
    }
    $options = get_option( WCSMS_OPTION );
    //print_r('<pre>');
    //$statuses = wc_get_order_statuses();
    //print_r($statuses);
    ?>

	<form method="post" action="options.php">
		<table class="form-table">
		
		<section class="optionssection">
		    <h2><?php 
    _e( 'Customer Order SMS Notifications:', WCSMS_TD );
    ?></h2>

			<tr valign="top">
				<th scope="row"><?php 
    _e( 'Opt-in Checkbox Option', WCSMS_TD );
    ?></th>
				<td>
					<input type="checkbox" name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_checkout_cb]" value="1" <?php 
    checked( $options['wcsms_checkout_cb'], 1, true );
    ?> />
					<?php 
    _e( 'Default status for the Opt-in checkbox on the Checkout page. Defaults to Checked for SMS notifications', WCSMS_TD );
    ?>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php 
    _e( 'Opt-in Checkbox Label', WCSMS_TD );
    ?></th>
				<td>
					<input type="text" name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_checkout_label]" value="<?php 
    echo  $options['wcsms_checkout_label'] ;
    ?>" class="regular-text" style="display:block;" />
					<?php 
    _e( 'Label for the Opt-in checkbox on the Checkout page. Leave blank to disable the opt-in and force ALL customers to receive SMS updates.', WCSMS_TD );
    ?>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php 
    _e( 'Order statuses to send SMS notifications for', WCSMS_TD );
    ?></th>
				<td>
					<label><?php 
    _e( 'Orders with these statuses will have SMS notifications sent.', WCSMS_TD );
    ?></label>
					<ul>
						<li><input type="checkbox" name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_checkout_status][]" value="processing" <?php 
    if ( in_array( 'processing', $options['wcsms_checkout_status'] ) ) {
        echo  'checked="checked"' ;
    }
    ?> />Processing</li>
						<li><input type="checkbox" name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_checkout_status][]" value="on-hold" <?php 
    if ( in_array( 'on-hold', $options['wcsms_checkout_status'] ) ) {
        echo  'checked="checked"' ;
    }
    ?> />On hold</li>
						<li><input type="checkbox" name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_checkout_status][]" value="completed" <?php 
    if ( in_array( 'completed', $options['wcsms_checkout_status'] ) ) {
        echo  'checked="checked"' ;
    }
    ?> />Completed</li>
						<li><input type="checkbox" name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_checkout_status][]" value="cancelled" <?php 
    if ( in_array( 'cancelled', $options['wcsms_checkout_status'] ) ) {
        echo  'checked="checked"' ;
    }
    ?>/>Cancelled</li>
						<li><input type="checkbox" name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_checkout_status][]" value="refunded" <?php 
    if ( in_array( 'refunded', $options['wcsms_checkout_status'] ) ) {
        echo  'checked="checked"' ;
    }
    ?> />Refunded</li>
						<li><input type="checkbox" name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_checkout_status][]" value="failed" <?php 
    if ( in_array( 'failed', $options['wcsms_checkout_status'] ) ) {
        echo  'checked="checked"' ;
    }
    ?> />Failed</li>
						<li><input type="checkbox" name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_checkout_status][]" value="pending" <?php 
    if ( in_array( 'pending', $options['wcsms_checkout_status'] ) ) {
        echo  'checked="checked"' ;
    }
    ?> />Pending</li>
					</ul>
				</td>
			</tr>

			<tr>
				<td></td><td>
					<?php 
    _e( 'Use these tags to customize your message: <strong>%shop_name%, %order_id%, %order_count%, %order_amount%, %order_status%, %billing_name%, %billing_first_name%, %billing_last_name%, %billing_company_name%, %billing_email%, %billing_phone%, %billing_address_1%, %billing_address_2%, %billing_city%, %billing_state%, %billing_postcode%, %billing_country%, %shipping_name%, %shipping_method%, %shipping_first_name%, %shipping_last_name%, %shipping_company_name%, %shipping_address_1%, %shipping_address_2%, %shipping_city%, %shipping_state%, %shipping_postcode%, %shipping_country%</strong>.', WCSMS_TD );
    ?>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php 
    _e( 'Order Processing SMS Message', WCSMS_TD );
    ?></th>
				<td>
					<textarea name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_status_processing]" class="regular-text" style="display:block;"><?php 
    echo  $options['wcsms_status_processing'] ;
    ?></textarea>
					<p><?php 
    _e( 'Add SMS message for processing orders.', WCSMS_TD );
    ?></p>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php 
    _e( 'Order On-hold SMS Message', WCSMS_TD );
    ?></th>
				<td>
					<textarea name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_status_on-hold]" class="regular-text" style="display:block;"><?php 
    echo  $options['wcsms_status_on-hold'] ;
    ?></textarea>
					<p><?php 
    _e( 'Add SMS message for on-hold orders.', WCSMS_TD );
    ?></p>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php 
    _e( 'Payment Completed SMS Message', WCSMS_TD );
    ?></th>
				<td>
					<textarea name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_status_completed]" class="regular-text" style="display:block;"><?php 
    echo  $options['wcsms_status_completed'] ;
    ?></textarea>
					<p><?php 
    _e( 'Add SMS message for completed orders.', WCSMS_TD );
    ?></p>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php 
    _e( 'Order Cancelled SMS Message', WCSMS_TD );
    ?></th>
				<td>
					<textarea name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_status_cancelled]" class="regular-text" style="display:block;"><?php 
    echo  $options['wcsms_status_cancelled'] ;
    ?></textarea>
					<p><?php 
    _e( 'Add SMS message for cancelled orders.', WCSMS_TD );
    ?></p>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php 
    _e( 'Payment Refunded SMS Message', WCSMS_TD );
    ?></th>
				<td>
					<textarea name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_status_refunded]" class="regular-text" style="display:block;"><?php 
    echo  $options['wcsms_status_refunded'] ;
    ?></textarea>
					<p><?php 
    _e( 'Add SMS message for refunded orders.', WCSMS_TD );
    ?></p>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php 
    _e( 'Payment Failed SMS Message', WCSMS_TD );
    ?></th>
				<td>
					<textarea name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_status_failed]" class="regular-text" style="display:block;"><?php 
    echo  $options['wcsms_status_failed'] ;
    ?></textarea>
					<p><?php 
    _e( 'Add SMS message for failed orders.', WCSMS_TD );
    ?></p>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php 
    _e( 'Pending Payment SMS Message', WCSMS_TD );
    ?></th>
				<td>
					<textarea name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_status_pending]" class="regular-text" style="display:block;"><?php 
    echo  $options['wcsms_status_pending'] ;
    ?></textarea>
					<p><?php 
    _e( 'Add SMS message for pending payment orders.', WCSMS_TD );
    ?></p>
				</td>
			</tr>

		</table>
		</section>
		
		<section class="optionssection">
		<h2><?php 
    _e( 'Admin order SMS Notifications:', WCSMS_TD );
    ?></h2>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php 
    _e( 'Enable order confirmation', WCSMS_TD );
    ?></th>
				<td>
					<input type="checkbox" name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_admin_confirmation]" value="1" <?php 
    checked( $options['wcsms_admin_confirmation'], 1, true );
    ?> />
					
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php 
    _e( 'Phone number (optional)', WCSMS_TD );
    ?></th>
				<td>
					<input type="text" name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_admin_phone_number]" value="<?php 
    echo  $options['wcsms_admin_phone_number'] ;
    ?>" class="regular-text" style="display:block;" />		
					<span><?php 
    _e( 'If this number is not set,the number in the main settings will be used.', WCSMS_TD );
    ?></span>			
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php 
    _e( 'SMS Message', WCSMS_TD );
    ?></th>
				<td>
					<textarea name="<?php 
    echo  WCSMS_OPTION ;
    ?>[wcsms_admin_message]" class="regular-text" style="display:block;"><?php 
    echo  $options['wcsms_admin_message'] ;
    ?></textarea>
					<p><?php 
    _e( 'Add SMS message for pending payment orders.', WCSMS_TD );
    ?></p>
				</td>
			</tr>
			<tr>
				<td></td><td>
					<?php 
    _e( 'Use these tags to customize your message: <strong>%shop_name%, %order_id%, %order_count%, %order_amount%, %order_status%, %billing_name%, %billing_first_name%, %billing_last_name%, %billing_company_name%, %billing_email%, %billing_phone%, %billing_address_1%, %billing_address_2%, %billing_city%, %billing_state%, %billing_postcode%, %billing_country%, %shipping_name%, %shipping_method%, %shipping_first_name%, %shipping_last_name%, %shipping_company_name%, %shipping_address_1%, %shipping_address_2%, %shipping_city%, %shipping_state%, %shipping_postcode%, %shipping_country%</strong>.', WCSMS_TD );
    ?>
				</td>
			</tr>
		</table>
		</section>
		<?php 
    settings_fields( 'wcsms-update-options' );
    ?>
		<input name="submit" type="submit" class="button-primary" value="<?php 
    _e( 'Save Changes', WCSMS_TD );
    ?>" />
	</form>

	<?php 
}

add_action(
    'twl_display_tab',
    'wcsms_tab_content',
    10,
    2
);
// Prevent plugin from auto updating from WP.org
function wcsms_plugin_meta( $object )
{
    //print_r( $object );
    foreach ( array( 'response', 'no_update' ) as $key ) {
        if ( !isset( $object->{$key} ) ) {
            continue;
        }
        $new_array = array();
        foreach ( $object->{$key} as $plugin_name => $plugin_data ) {
            if ( $plugin_name != plugin_basename( __FILE__ ) ) {
                $new_array[$plugin_name] = $plugin_data;
            }
            $object->{$key} = $new_array;
        }
    }
    return $object;
}

add_filter( 'pre_set_site_transient_update_plugins', 'wcsms_plugin_meta', 10 );
// Add opt-in checkbox to checkout
function add_opt_in_checkbox()
{
    $options = get_option( WCSMS_OPTION );
    // use previous value or default value when loading checkout page
    
    if ( !empty($_POST['wcsms_optin']) ) {
        $value = wc_clean( $_POST['wcsms_optin'] );
    } else {
        $value = ( !empty($options['wcsms_checkout_cb']) ? 1 : 0 );
    }
    
    $optin_label = $options['wcsms_checkout_label'];
    if ( !empty($optin_label) ) {
        // output checkbox
        woocommerce_form_field( 'wcsms_optin', array(
            'type'  => 'checkbox',
            'class' => array( 'form-row-wide' ),
            'label' => $optin_label,
        ), $value );
    }
}

add_action( 'woocommerce_after_checkout_billing_form', 'add_opt_in_checkbox' );
// Process opt-in checkbox after order is processed
function process_opt_in_checkbox( $order_id )
{
    
    if ( !empty($_POST['wcsms_optin']) ) {
        $order = wc_get_order( $order_id );
        $order->update_meta_data( 'wcsms_optin', 1 );
        $order->save();
    }

}

add_action( 'woocommerce_checkout_update_order_meta', 'process_opt_in_checkbox' );
// Send SMS notifications to customer
function send_customer_notification( $order_id )
{
    $options = get_option( WCSMS_OPTION );
    $order = wc_get_order( $order_id );
    $order_status = $order->get_status();
    $message = $options['wcsms_status_' . $order_status];
    $message = replace_message_variables( $message, $order );
    $contact_number = $order->get_billing_phone();
    
    if ( !empty($contact_number) && $order->get_meta( 'wcsms_optin' ) && in_array( $order_status, $options['wcsms_checkout_status'] ) ) {
        $args = array(
            'number_to' => $contact_number,
            'message'   => $message,
        );
        twl_send_sms( $args );
        //wp_mail( get_option('admin_email'), $contact_number, $message );
    }

}

// Send SMS notifications to admin
function send_admin_notification( $order_id )
{
    $options = get_option( WCSMS_OPTION );
    
    if ( $options["wcsms_admin_confirmation"] ) {
        $order = wc_get_order( $order_id );
        $order_status = $order->get_status();
        $message = $options['wcsms_admin_message'];
        $message = replace_message_variables( $message, $order );
        $contact_number = $options["wcsms_admin_phone_number"];
        
        if ( empty($contact_number) ) {
            $defaults = twl_get_options();
            $contact_number = $defaults["number_from"];
        }
        
        $args = array(
            'number_to' => $contact_number,
            'message'   => $message,
        );
        twl_send_sms( $args );
    }

}

add_action( 'woocommerce_order_status_processing', 'send_customer_notification' );
add_action( 'woocommerce_order_status_failed', 'send_customer_notification' );
add_action( 'woocommerce_order_status_pending', 'send_customer_notification' );
add_action( 'woocommerce_order_status_on-hold', 'send_customer_notification' );
add_action( 'woocommerce_order_status_cancelled', 'send_customer_notification' );
add_action( 'woocommerce_order_status_refunded', 'send_customer_notification' );
add_action( 'woocommerce_order_status_completed', 'send_customer_notification' );
add_action( 'woocommerce_order_status_processing', 'send_admin_notification' );
add_action( 'woocommerce_order_status_failed', 'send_admin_notification' );
add_action( 'woocommerce_order_status_pending', 'send_admin_notification' );
add_action( 'woocommerce_order_status_on-hold', 'send_admin_notification' );
add_action( 'woocommerce_order_status_cancelled', 'send_admin_notification' );
add_action( 'woocommerce_order_status_refunded', 'send_admin_notification' );
add_action( 'woocommerce_order_status_completed', 'send_admin_notification' );
/**
 * Replaces template variables in SMS message
 */
function replace_message_variables( $message, $order )
{
    $replacements = array(
        '%shop_name%'             => get_bloginfo(),
        '%order_id%'              => $order->get_order_number(),
        '%order_count%'           => $order->get_item_count(),
        '%order_amount%'          => $order->get_total(),
        '%order_status%'          => ucfirst( $order->get_status() ),
        '%billing_name%'          => $order->get_formatted_billing_full_name(),
        '%billing_first_name%'    => $order->get_billing_first_name(),
        '%billing_last_name%'     => $order->get_billing_last_name(),
        '%billing_company_name%'  => $order->get_billing_company(),
        '%billing_email%'         => $order->get_billing_email(),
        '%billing_phone%'         => $order->get_billing_phone(),
        '%billing_address_1%'     => $order->get_billing_address_1(),
        '%billing_address_2%'     => $order->get_billing_address_2(),
        '%billing_city%'          => $order->get_billing_city(),
        '%billing_state%'         => $order->get_billing_state(),
        '%billing_postcode%'      => $order->get_billing_postcode(),
        '%billing_country%'       => $order->get_billing_country(),
        '%shipping_name%'         => $order->get_formatted_shipping_full_name(),
        '%shipping_method%'       => $order->get_shipping_method(),
        '%shipping_first_name%'   => $order->get_shipping_first_name(),
        '%shipping_last_name%'    => $order->get_shipping_last_name(),
        '%shipping_company_name%' => $order->get_shipping_company(),
        '%shipping_address_1%'    => $order->get_shipping_address_1(),
        '%shipping_address_2%'    => $order->get_shipping_address_2(),
        '%shipping_city%'         => $order->get_shipping_city(),
        '%shipping_state%'        => $order->get_shipping_state(),
        '%shipping_postcode%'     => $order->get_shipping_postcode(),
        '%shipping_country%'      => $order->get_shipping_country(),
    );
    //$replacements = apply_filters( 'wcsms_message_replacements', $replacements );
    return str_replace( array_keys( $replacements ), $replacements, $message );
}

// Install default settings
function wcsms_install_option()
{
    add_option( WCSMS_OPTION, wcsms_get_defaults() );
}

register_activation_hook( __FILE__, 'wcsms_install_option' );
// Uninstall settings
function wcsms_uninstall_option()
{
    delete_option( WCSMS_OPTION );
}

register_uninstall_hook( __FILE__, 'wcsms_uninstall_option' );