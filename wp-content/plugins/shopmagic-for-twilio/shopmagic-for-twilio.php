<?php
/*
Plugin Name: ShopMagic for Twilio
Plugin URI: https://shopmagic.app/products/woocommerce-subscriptions/?utm_source=add_plugin_details&utm_medium=link&utm_campaign=plugin_homepage
Description: Allows users to send SMS using Twilio account.
Version: 2.1.7
Author: WP Desk
Author URI: https://shopmagic.app/?utm_source=user-site&utm_medium=quick-link&utm_campaign=author
Text Domain: shopmagic-for-twilio
Domain Path: /lang/
Tested up to: 6.4
Requires at least: 5.0
WC requires at least: 8.0
WC tested up to: 8.3
Requires PHP: 7.3

Copyright 2020 WP Desk Ltd.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


/* THESE TWO VARIABLES CAN BE CHANGED AUTOMATICALLY */
$plugin_version = '2.1.7';

$plugin_name        = 'ShopMagic for Twilio';
$plugin_class_name  = '\WPDesk\ShopMagicTwilio\Plugin';
$plugin_text_domain = 'shopmagic-for-twilio';
$product_id         = 'ShopMagic for Twilio';
$plugin_file        = __FILE__;
$plugin_dir         = __DIR__;

$requirements = [
	'php'     => '7.3',
	'wp'      => '5.0',
	'plugins' => [
		[
			'name'      => 'shopmagic-for-woocommerce/shopMagic.php',
			'nice_name' => 'ShopMagic for WooCommerce',
			'version'   => '4.0',
		],
	],

];

require __DIR__ . '/vendor_prefixed/wpdesk/wp-plugin-flow-common/src/plugin-init-php52-free.php';
