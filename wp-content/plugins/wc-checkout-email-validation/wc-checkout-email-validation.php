<?php 
/**
    * @link              https://b4ecommerce.com
    * @since             1.0.0
    * @package           Checkout_Email_Validation_For_WooCommerce
    *
    * @wordpress-plugin
    * Plugin Name:       Checkout email validation for WooCommerce
    * Description:       A lightweight plugin that checks for the most common email typos in the customer's email and provides the customer with a warning.
    * Version:           1.0
    * Author:            B4 Ecommerce
    * Author URI:        https://b4ecommerce.com
    * License:           GPL-2.0+
    * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
    * Text Domain:       b4-woocommerce-email-validation
    * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$plugin_path = trailingslashit( WP_PLUGIN_DIR ) . 'woocommerce/woocommerce.php';

if ( in_array( $plugin_path, wp_get_active_and_valid_plugins() ) || in_array( $plugin_path, wp_get_active_network_plugins() ) ) {
    
    add_action( 'init', 'cevfw_email_validation_load_textdomain' );
    
    add_action( 'wp_enqueue_scripts', 'cevfw_email_validation_enqueue_scripts_styles' );

}

if ( ! function_exists( 'cevfw_email_validation_enqueue_scripts_styles' ) ) {

    function cevfw_email_validation_enqueue_scripts_styles() {   

        if( is_checkout() ) {

            wp_enqueue_style( 'b4-email-validation-style', plugin_dir_url( __FILE__ ) . 'public/css/style.css' );

            wp_register_script( 'b4-email-validation-script', plugin_dir_url( __FILE__ ) . 'public/js/script.js' );  

            wp_localize_script( 'b4-email-validation-script', 'b4_validation_params', array(
                'b4_validation_warning_text' => __('There seems to be a typo in the email address provided, please check the email address. If the email address is correct, you can ignore this message.', 'b4-woocommerce-email-validation'),
            ) );

            wp_enqueue_script( 'b4-email-validation-script' );

        }

    }

}

if ( ! function_exists( 'cevfw_email_validation_load_textdomain' ) ) {

    function cevfw_email_validation_load_textdomain() {

        load_plugin_textdomain( 'b4-woocommerce-email-validation', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

    }

}

