<?php
defined( 'ABSPATH' ) || exit;

/**
 * Plugin installation and activation for WordPress themes
 */
class Minimog_Register_Plugins {

	public function __construct() {
		add_filter( 'insight_core_tgm_plugins', [ $this, 'register_required_plugins' ] );

		add_filter( 'insight_core_compatible_plugins', [ $this, 'register_compatible_plugins' ] );
	}

	public function register_required_plugins( $plugins ) {
		/*
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$new_plugins = array(
			array(
				'name'        => 'Insight Core',
				'description' => 'Core functions for WordPress theme',
				'slug'        => 'insight-core',
				'logo'        => 'insight',
				'source'      => 'https://www.dropbox.com/scl/fi/zn7u6igqmycybagfje2he/insight-core-2.6.5.zip?rlkey=7t4urvc2is33v9nddm3xiw68x&dl=1',
				'version'     => '2.6.5',
				'required'    => true,
			),
			array(
				'name'        => 'Redux Framework',
				'description' => 'Build better sites in WordPress fast',
				'slug'        => 'redux-framework',
				'logo'        => 'redux-framework',
				'required'    => true,
			),
			array(
				'name'        => 'Elementor',
				'description' => 'The Elementor Website Builder has it all: drag and drop page builder, pixel perfect design, mobile responsive editing, and more.',
				'slug'        => 'elementor',
				'logo'        => 'elementor',
				'required'    => true,
			),
			array(
				'name'        => 'Thememove Addons For Elementor',
				'description' => 'Additional functions for Elementor',
				'slug'        => 'tm-addons-for-elementor',
				'logo'        => 'insight',
				'source'      => 'https://www.dropbox.com/scl/fi/giyeenvi0z8rafck3pc8q/tm-addons-for-elementor-1.3.1.zip?rlkey=vpzbqvgvzr6sm2gspxpqbg6jf&dl=1',
				'version'     => '1.3.1',
				'required'    => true,
			),
			array(
				'name'        => 'WPForms',
				'description' => 'Beginner friendly WordPress contact form plugin. Use our Drag & Drop form builder to create your WordPress forms',
				'slug'        => 'wpforms-lite',
				'logo'        => 'wpforms-lite',
			),
			array(
				'name'        => 'WooCommerce',
				'description' => 'An eCommerce toolkit that helps you sell anything. Beautifully.',
				'slug'        => 'woocommerce',
				'logo'        => 'woocommerce',
			),
			array(
				'name'        => 'Insight Swatches',
				'description' => 'Allows you set a style for each attribute variation as color, image, or label on product page.',
				'slug'        => 'insight-swatches',
				'logo'        => 'insight',
				'source'      => 'https://www.dropbox.com/scl/fi/j2po0jzzlb8zs4b5t7zu4/insight-swatches-1.7.0.zip?rlkey=1st3r1s1w3w43fbyrek90df75&dl=1',
				'version'     => '1.7.0',
			),
			array(
				'name'        => 'Insight Product Brands',
				'description' => 'Add brands for products',
				'slug'        => 'insight-product-brands',
				'logo'        => 'insight',
				'source'      => 'https://www.dropbox.com/scl/fi/txru77gjhxdsjdk3pudfm/insight-product-brands-1.3.0.zip?rlkey=06306y30g3ttowyi63ui60fs5&dl=1',
				'version'     => '1.3.0',
			),
			array(
				'name'        => 'Conditional Discounts for WooCommerce',
				'description' => 'This plugin is a simple yet advanced WooCommerce dynamic discount plugin ideal for all types of deals.',
				'slug'        => 'woo-advanced-discounts',
				'logo'        => 'woo-advanced-discounts',
			),
			array(
				'name'        => 'Sales Countdown Timer (Premium)',
				'description' => 'Create a sense of urgency with a countdown to the beginning or end of sales, store launch or other events for higher conversions.',
				'slug'        => 'sctv-sales-countdown-timer',
				'logo'        => 'sctv-sales-countdown-timer',
				'source'      => 'https://www.dropbox.com/scl/fi/nlen39oznpfvc7drcycxz/sctv-sales-countdown-timer-1.1.2.1.zip?rlkey=f010hjecuqcrdx5ym85kkgw1t&dl=1',
				'version'     => '1.1.2.1',
			),
			array(
				'name'        => 'WPC Smart Compare for WooCommerce (Premium)',
				'description' => 'Allows your visitors to compare some products of your shop.',
				'slug'        => 'woo-smart-compare-premium',
				'logo'        => 'woo-smart-compare',
				'source'      => 'https://www.dropbox.com/scl/fi/4nlc7sx98c19035g6nvvx/woo-smart-compare-premium-616.zip?rlkey=l2p5zk8k11i8dqoj4i2ufmf9b&dl=1',
				'version'     => '6.1.6',
			),
			array(
				'name'        => 'WPC Smart Wishlist for WooCommerce (Premium)',
				'description' => 'Allows your visitors save products for buy later.',
				'slug'        => 'woo-smart-wishlist-premium',
				'logo'        => 'woo-smart-wishlist',
				'source'      => 'https://www.dropbox.com/scl/fi/6arye7uobmqpsdhua4ihw/woo-smart-wishlist-premium-479.zip?rlkey=hda6ps3ldiznksie7zbsqyxv6&dl=1',
				'version'     => '4.7.9',
			),
			array(
				'name'        => 'WPC Frequently Bought Together for WooCommerce (Premium)',
				'description' => 'Increase your sales with personalized product recommendations',
				'slug'        => 'woo-bought-together-premium',
				'logo'        => 'woo-bought-together-premium',
				'source'      => 'https://www.dropbox.com/scl/fi/vrjmogif0z9jpf4b9abct/woo-bought-together-premium-623.zip?rlkey=u87sm99nuft5i3yj9j2cnbhr5&dl=1',
				'version'     => '6.2.3',
			),
			array(
				'name'        => 'WPC Product Bundles for WooCommerce (Premium)',
				'description' => 'This plugin helps you bundle a few products, offer them at a discount and watch the sales go up.',
				'slug'        => 'woo-product-bundle-premium',
				'logo'        => 'woo-product-bundle-premium',
				'source'      => 'https://www.dropbox.com/scl/fi/qc8rep4erxxovlry2zwd7/woo-product-bundle-premium-733.zip?rlkey=t7qihsjy53iyf9o6xo8js0z0t&dl=1',
				'version'     => '7.3.3',
			),
			array(
				'name'        => 'WPC Product Tabs for WooCommerce (Premium)',
				'description' => 'Allows adding custom tabs to your products and provide your buyers with extra details for boosting customers’ confidence in the items.',
				'slug'        => 'wpc-product-tabs-premium',
				'logo'        => 'wpc-product-tabs-premium',
				'source'      => 'https://www.dropbox.com/scl/fi/spby8yjsksuqznp1io97n/wpc-product-tabs-premium-306.zip?rlkey=83e2fbv8e4m25hz8ftuvap1rq&dl=1',
				'version'     => '3.0.6',
			),
			array(
				'name'        => 'Shoppable Images',
				'description' => 'Easily add \'shoppable images\' (images with hotspots) to your website or store',
				'slug'        => 'mabel-shoppable-images-lite',
				'logo'        => 'mabel-shoppable-images-lite',
			),
		);

		return array_merge( $plugins, $new_plugins );
	}

	public function register_compatible_plugins( $plugins ) {
		/**
		 * Each Item should have 'compatible'
		 * 'compatible': set be "true" to work correctly
		 */
		$new_plugins = [
			array(
				'name'        => 'Multi Currency for WooCommerce (Premium)',
				'description' => 'Allows to display prices and accepts payments in multiple currencies.',
				'slug'        => 'woocommerce-multi-currency',
				'logo'        => 'woocommerce-multi-currency',
				'source'      => 'https://www.dropbox.com/scl/fi/z5k05p037ozvl9h0ibph4/woocommerce-multi-currency-2.3.1.1.zip?rlkey=amw4ue6oii3va8czbuukfeucy&dl=1',
				'version'     => '2.3.1.1',
				'compatible'  => true,
			),
			array(
				'name'        => 'WPC Smart Notification for WooCommerce (Premium)',
				'description' => 'Increase trust, credibility, and sales with smart notifications.',
				'slug'        => 'wpc-smart-notification-premium',
				'logo'        => 'wpc-smart-notification',
				'source'      => 'https://www.dropbox.com/scl/fi/hpwa8yhvgyqqa3wqgun2y/wpc-smart-notification-premium-235.zip?rlkey=o8rgn49cknhqnea265rin6lho&dl=1',
				'version'     => '2.3.5',
				'compatible'  => true,
			),
			array(
				'name'        => 'Revolution Slider',
				'description' => 'This plugin helps beginner-and mid-level designers WOW their clients with pro-level visuals. You’ll be able to create anything you can imagine, not just amazing, responsive sliders.',
				'slug'        => 'revslider',
				'logo'        => 'revslider',
				'source'      => 'https://www.dropbox.com/scl/fi/ri7wmxcmxg80jktwijpbm/revslider-6.6.18.zip?rlkey=76otmm0csollaj8c8bsybvzpj&dl=1',
				'version'     => '6.6.18',
				'compatible'  => true,
			),
			array(
				'name'        => 'WordPress Social Login',
				'description' => 'Allows your visitors to login, comment and share with Facebook, Google, Apple, Twitter, LinkedIn etc using customizable buttons.',
				'slug'        => 'miniorange-login-openid',
				'logo'        => 'miniorange-login-openid',
				'compatible'  => true,
			),
			array(
				'name'        => 'User Profile Picture',
				'description' => 'Allows your visitors upload their avatar with the native WP uploader.',
				'slug'        => 'metronet-profile-picture',
				'logo'        => 'metronet-profile-picture',
				'compatible'  => true,
			),
			array(
				'name'        => 'DCO Comment Attachment',
				'description' => 'Allows your visitors to attach files with their comments.',
				'slug'        => 'dco-comment-attachment',
				'logo'        => 'dco-comment-attachment',
				'compatible'  => true,
			),
			array(
				'name'        => 'hCaptcha for WordPress',
				'description' => 'Add captcha to protects user privacy, rewards websites, and helps companies get their data labeled. Help build a better web.',
				'slug'        => 'hcaptcha-for-forms-and-more',
				'logo'        => 'hcaptcha-for-forms-and-more',
				'compatible'  => true,
			),
		];

		return array_merge( $plugins, $new_plugins );
	}
}

new Minimog_Register_Plugins();
