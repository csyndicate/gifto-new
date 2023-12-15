<?php
Redux::set_section( Minimog_Redux::OPTION_NAME, array(
	'title'      => __( 'Advanced', 'minimog' ),
	'id'         => 'advanced',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'          => 'scroll_top_enable',
			'type'        => 'switch',
			'title'       => __( 'Go To Top Button', 'minimog' ),
			'description' => __( 'Turn on to show go to top button.', 'minimog' ),
			'default'     => false,
		),
		array(
			'id'          => 'image_lazy_load_enable',
			'type'        => 'switch',
			'title'       => __( 'Image Lazy Load?', 'minimog' ),
			'description' => __( 'Turn on to make images load on scroll.', 'minimog' ),
			'default'     => true,
		),
		array(
			'id'          => 'retina_display_enable',
			'type'        => 'switch',
			'title'       => __( 'Retina Display?', 'minimog' ),
			'description' => __( 'Turn on to make images retina on high screen revolution.', 'minimog' ),
			'default'     => false,
		),
		array(
			'id'          => 'smooth_scroll_enable',
			'type'        => 'switch',
			'title'       => __( 'Smooth Scroll', 'minimog' ),
			'description' => __( 'Smooth scrolling experience for websites.', 'minimog' ),
			'default'     => false,
		),
	),
) );
