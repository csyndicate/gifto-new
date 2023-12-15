<?php
Redux::set_section( Minimog_Redux::OPTION_NAME, array(
	'title'      => __( 'Cart', 'minimog' ),
	'id'         => 'cart_page',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'section_shopping_cart_features',
			'type'     => 'tm_heading',
			'collapse' => 'show',
			'title'    => __( 'Cart Countdown', 'minimog' ),
			'subtitle' => __( 'Show countdown timer as soon as any product has been added to the cart. This can help your store make those product sales quicker.', 'minimog' ),
			'indent'   => true,
		),
		array(
			'id'      => 'shopping_cart_countdown_enable',
			'type'    => 'button_set',
			'title'   => __( 'Visibility', 'minimog' ),
			'options' => array(
				'0' => __( 'Hide', 'minimog' ),
				'1' => __( 'Show', 'minimog' ),
			),
			'default' => Minimog_Redux::get_default_setting( 'shopping_cart_countdown_enable' ),
			'class'   => 'redux-row-field-parent redux-row-field-first-parent',
		),
		array(
			'id'       => 'shopping_cart_countdown_loop_enable',
			'type'     => 'button_set',
			'title'    => __( 'Enable Loop', 'minimog' ),
			'options'  => array(
				'0' => __( 'No', 'minimog' ),
				'1' => __( 'Yes', 'minimog' ),
			),
			'default'  => Minimog_Redux::get_default_setting( 'shopping_cart_countdown_loop_enable' ),
			'required' => array(
				[ 'shopping_cart_countdown_enable', '=', '1' ],
			),
			'class'    => 'redux-row-field-child',
		),
		array(
			'id'            => 'shopping_cart_countdown_length',
			'title'         => __( 'Length', 'minimog' ),
			'type'          => 'slider',
			'default'       => Minimog_Redux::get_default_setting( 'shopping_cart_countdown_length' ),
			'description'   => __( 'Countdown length in minute(s)', 'minimog' ),
			'min'           => 0,
			'max'           => 400,
			'step'          => 1,
			'display_value' => 'text',
			'required'      => array(
				[ 'shopping_cart_countdown_enable', '=', '1' ],
			),
			'class'         => 'redux-row-field-child',
		),
		array(
			'id'          => 'shopping_cart_countdown_message',
			'type'        => 'textarea',
			'title'       => __( 'Text', 'minimog' ),
			'default'     => __( '{fire} These products are limited, checkout within {timer}', 'minimog' ),
			'description' => '{timer} will be replace with countdown timer.<br/> {fire} will be replace with icon 🔥',
			'required'    => array(
				[ 'shopping_cart_countdown_enable', '=', '1' ],
			),
			'class'       => 'redux-row-field-child',
		),
		array(
			'id'       => 'shopping_cart_countdown_expired_message',
			'type'     => 'textarea',
			'title'    => __( 'Expired Message', 'minimog' ),
			'default'  => __( 'You\'re out of time! Checkout now to avoid losing your order!', 'minimog' ),
			'required' => array(
				[ 'shopping_cart_countdown_enable', '=', '1' ],
			),
			'class'    => 'redux-row-field-child',
		),
		array(
			'id'       => 'section_shopping_cart_free_shipping_bar',
			'type'     => 'tm_heading',
			'collapse' => 'show',
			'title'    => __( 'Cart Free Shipping', 'minimog' ),
			'subtitle' => __( 'Show the amount left for free shipping with beautiful progress bar.', 'minimog' ),
			'indent'   => true,
		),
		array(
			'id'      => 'shopping_cart_free_shipping_bar_enable',
			'type'    => 'button_set',
			'title'   => __( 'Visibility', 'minimog' ),
			'options' => array(
				'0' => __( 'Hide', 'minimog' ),
				'1' => __( 'Show', 'minimog' ),
			),
			'default' => Minimog_Redux::get_default_setting( 'shopping_cart_free_shipping_bar_enable' ),
			'class'   => 'redux-row-field-parent redux-row-field-first-parent',
		),
		array(
			'id'       => 'section_shopping_cart_drawer',
			'type'     => 'tm_heading',
			'collapse' => 'show',
			'title'    => __( 'Cart Drawer', 'minimog' ),
			'indent'   => true,
		),
		array(
			'id'          => 'add_to_cart_behaviour',
			'type'        => 'button_set',
			'title'       => 'Add to cart behaviour',
			'description' => 'Choose an action after added to cart successful.',
			'options'     => array(
				''                 => __( 'Default', 'minimog' ),
				'open_cart_drawer' => __( 'Open Cart Drawer', 'minimog' ),
			),
			'default'     => Minimog_Redux::get_default_setting( 'add_to_cart_behaviour' ),
		),
		array(
			'id'      => 'shopping_cart_drawer_modal_customer_notes_enable',
			'type'    => 'button_set',
			'title'   => __( 'Customer Notes Modal', 'minimog' ),
			'options' => array(
				'0' => __( 'Hide', 'minimog' ),
				'1' => __( 'Show', 'minimog' ),
			),
			'default' => Minimog_Redux::get_default_setting( 'shopping_cart_drawer_modal_customer_notes_enable' ),
		),
		array(
			'id'      => 'shopping_cart_drawer_modal_shipping_calculator_enable',
			'type'    => 'button_set',
			'title'   => __( 'Shipping Calculator Modal', 'minimog' ),
			'options' => array(
				'0' => __( 'Hide', 'minimog' ),
				'1' => __( 'Show', 'minimog' ),
			),
			'default' => Minimog_Redux::get_default_setting( 'shopping_cart_drawer_modal_shipping_calculator_enable' ),
		),
		array(
			'id'      => 'shopping_cart_drawer_modal_coupon_enable',
			'type'    => 'button_set',
			'title'   => __( 'Coupon Modal', 'minimog' ),
			'options' => array(
				'0' => __( 'Hide', 'minimog' ),
				'1' => __( 'Show', 'minimog' ),
			),
			'default' => Minimog_Redux::get_default_setting( 'shopping_cart_drawer_modal_coupon_enable' ),
		),
		array(
			'id'      => 'shopping_cart_drawer_view_cart_button_enable',
			'type'    => 'button_set',
			'title'   => __( 'View Cart Button', 'minimog' ),
			'options' => array(
				'0' => __( 'Hide', 'minimog' ),
				'1' => __( 'Show', 'minimog' ),
			),
			'default' => Minimog_Redux::get_default_setting( 'shopping_cart_drawer_view_cart_button_enable' ),
		),
		array(
			'id'       => 'section_shopping_cart_page',
			'type'     => 'tm_heading',
			'collapse' => 'show',
			'title'    => __( 'Cart Page', 'minimog' ),
			'indent'   => true,
		),
		array(
			'id'      => 'shopping_cart_modal_customer_notes_enable',
			'type'    => 'button_set',
			'title'   => __( 'Customer Notes Modal', 'minimog' ),
			'options' => array(
				'0' => __( 'Hide', 'minimog' ),
				'1' => __( 'Show', 'minimog' ),
			),
			'default' => Minimog_Redux::get_default_setting( 'shopping_cart_modal_customer_notes_enable' ),
		),
		array(
			'id'          => 'shopping_cart_cross_sells_enable',
			'type'        => 'button_set',
			'title'       => __( 'Cross-sells products', 'minimog' ),
			'description' => __( 'Turn on to display the cross-sells products section. This is helpful if you have dozens of products with cross-sells and you don\'t want to go and edit each single page.', 'minimog' ),
			'options'     => array(
				'0' => __( 'Hide', 'minimog' ),
				'1' => __( 'Show', 'minimog' ),
			),
			'default'     => '1',
		),
		array(
			'id'       => 'section_shopping_cart_empty',
			'type'     => 'tm_heading',
			'collapse' => 'show',
			'title'    => __( 'Cart Empty', 'minimog' ),
			'indent'   => true,
		),
		array(
			'id'    => 'shopping_cart_empty_image',
			'type'  => 'media',
			'title' => __( 'Image', 'minimog' ),
		),
	),
) );