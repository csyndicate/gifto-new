<?php
Redux::set_section( Minimog_Redux::OPTION_NAME, array(
	'title'      => __( 'Border & Rounded', 'minimog' ),
	'id'         => 'colors',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'box_rounded',
			'type'    => 'switch',
			'title'   => __( 'Box Rounded?', 'minimog' ),
			'default' => Minimog_Redux::get_default_setting( 'box_rounded' ),
		),
		array(
			'id'            => 'small_rounded',
			'type'          => 'slider',
			'title'         => __( 'Small Rounded', 'minimog' ),
			'default'       => Minimog_Redux::get_default_setting( 'small_rounded' ),
			'min'           => 0,
			'step'          => 1,
			'max'           => 50,
			'display_value' => 'text',
			'required'      => array( 'box_rounded', '=', true ),
		),
		array(
			'id'            => 'normal_rounded',
			'type'          => 'slider',
			'title'         => __( 'Normal Rounded', 'minimog' ),
			'default'       => Minimog_Redux::get_default_setting( 'normal_rounded' ),
			'min'           => 0,
			'step'          => 1,
			'max'           => 50,
			'display_value' => 'text',
			'required'      => array( 'box_rounded', '=', true ),
		),
		array(
			'id'            => 'semi_rounded',
			'type'          => 'slider',
			'title'         => __( 'Semi Rounded', 'minimog' ),
			'default'       => Minimog_Redux::get_default_setting( 'semi_rounded' ),
			'min'           => 0,
			'step'          => 1,
			'max'           => 50,
			'display_value' => 'text',
			'required'      => array( 'box_rounded', '=', true ),
		),
		array(
			'id'            => 'large_rounded',
			'type'          => 'slider',
			'title'         => __( 'Large Rounded', 'minimog' ),
			'default'       => Minimog_Redux::get_default_setting( 'large_rounded' ),
			'min'           => 0,
			'step'          => 1,
			'max'           => 50,
			'display_value' => 'text',
			'required'      => array( 'box_rounded', '=', true ),
		),
		array(
			'id'            => 'form_input_small_rounded',
			'type'          => 'slider',
			'title'         => __( 'Form Input Small Rounded', 'minimog' ),
			'default'       => Minimog_Redux::get_default_setting( 'form_input_small_rounded' ),
			'min'           => 0,
			'step'          => 1,
			'max'           => 50,
			'display_value' => 'text',
		),
		array(
			'id'            => 'form_input_normal_rounded',
			'type'          => 'slider',
			'title'         => __( 'Form Input Normal Rounded', 'minimog' ),
			'default'       => Minimog_Redux::get_default_setting( 'form_input_normal_rounded' ),
			'min'           => 0,
			'step'          => 1,
			'max'           => 50,
			'display_value' => 'text',
		),
		array(
			'id'            => 'form_input_normal_border_thickness',
			'type'          => 'slider',
			'title'         => __( 'Form Input Border Thickness', 'minimog' ),
			'default'       => Minimog_Redux::get_default_setting( 'form_input_normal_border_thickness' ),
			'min'           => 0,
			'step'          => 1,
			'max'           => 3,
			'display_value' => 'text',
		),
		array(
			'id'            => 'form_textarea_rounded',
			'type'          => 'slider',
			'title'         => __( 'Textarea Rounded', 'minimog' ),
			'default'       => Minimog_Redux::get_default_setting( 'form_textarea_rounded' ),
			'min'           => 0,
			'step'          => 1,
			'max'           => 50,
			'display_value' => 'text',
		),
		array(
			'id'            => 'button_small_rounded',
			'type'          => 'slider',
			'title'         => __( 'Button Small Rounded', 'minimog' ),
			'default'       => Minimog_Redux::get_default_setting( 'button_small_rounded' ),
			'min'           => 0,
			'step'          => 1,
			'max'           => 50,
			'display_value' => 'text',
		),
		array(
			'id'            => 'button_rounded',
			'type'          => 'slider',
			'title'         => __( 'Button Normal Rounded', 'minimog' ),
			'default'       => Minimog_Redux::get_default_setting( 'button_rounded' ),
			'min'           => 0,
			'step'          => 1,
			'max'           => 50,
			'display_value' => 'text',
		),
		array(
			'id'            => 'button_large_rounded',
			'type'          => 'slider',
			'title'         => __( 'Button Large Rounded', 'minimog' ),
			'default'       => Minimog_Redux::get_default_setting( 'button_large_rounded' ),
			'min'           => 0,
			'step'          => 1,
			'max'           => 50,
			'display_value' => 'text',
		),
	),
) );
