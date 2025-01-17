<?php
function kundoo_typography( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

	$wp_customize->add_panel(
		'kundoo_typography', array(
			'priority' => 38,
			'title' => esc_html__( 'Typography', 'kundoo' ),
		)
	);	
	
	/*=========================================
	Kundoo Typography
	=========================================*/
	$wp_customize->add_section(
		'kundoo_typography',
		array(
			'priority'      => 1,
			'title' 		=> __('Body Typography','kundoo'),
			'panel'  		=> 'kundoo_typography',
		)
	);
	
	// Body Font Size // 
	if ( class_exists( 'Burger_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'kundoo_body_font_size',
			array(
				'default'     	=> '16',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'kundoo_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
			new Burger_Customizer_Range_Control( $wp_customize, 'kundoo_body_font_size', 
				array(
					'label'      => __( 'Size', 'kundoo' ),
					'section'  => 'kundoo_typography',
					'priority'      => 2,
					'input_attr'    => array(
						'min'           => 0,
						'max'           => 50,
						'step'          => 1,
					),
				) ) 
		);
	}
	
	// Body Font Size // 
	if ( class_exists( 'Burger_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'kundoo_body_line_height',
			array(
				'default'  =>'1.5',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'kundoo_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
			new Burger_Customizer_Range_Control( $wp_customize, 'kundoo_body_line_height', 
				array(
					'label'      => __( 'Line Height', 'kundoo' ),
					'section'  => 'kundoo_typography',
					'priority'      => 3,
					'input_attrs' => array(
						'min'    => 0,
						'max'    => 3,
						'step'   => 0.1,
					//'suffix' => 'px', //optional suffix
					),
				) ) 
		);
	}
	
	// Body Font style // 
	$wp_customize->add_setting( 'kundoo_body_font_style', array(
		'capability'        => 'edit_theme_options',
		'default'           => 'inherit',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'kundoo_sanitize_select',
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'kundoo_body_font_style', array(
				'label'       => __( 'Font Style', 'kundoo' ),
				'section'     => 'kundoo_typography',
				'type'        =>  'select',
				'priority'    => 6,
				'choices'     =>  array(
					'inherit'   =>  __( 'Inherit', 'kundoo' ),
					'normal'       =>  __( 'Normal', 'kundoo' ),
					'italic'       =>  __( 'Italic', 'kundoo' ),
					'oblique'       =>  __( 'oblique', 'kundoo' ),
				),
			)
		)
	);
	// Body Text Transform // 
	$wp_customize->add_setting( 'kundoo_body_text_transform', array(
		'capability'        => 'edit_theme_options',
		'default'           => 'inherit',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'kundoo_sanitize_select',
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'kundoo_body_text_transform', array(
				'label'       => __( 'Transform', 'kundoo' ),
				'section'     => 'kundoo_typography',
				'type'        => 'select',
				'priority'    => 7,
				'choices'     => array(
					'inherit'       =>  __( 'Default', 'kundoo' ),
					'uppercase'     =>  __( 'Uppercase', 'kundoo' ),
					'lowercase'     =>  __( 'Lowercase', 'kundoo' ),
					'capitalize'    =>  __( 'Capitalize', 'kundoo' ),
				),
			)
		)
	);
	/*=========================================
	 Kundoo Typography Headings
	 =========================================*/
	 $wp_customize->add_section(
	 	'kundoo_headings_typography',
	 	array(
	 		'priority'      => 2,
	 		'title' 		=> __('Headings','kundoo'),
	 		'panel'  		=> 'kundoo_typography',
	 	)
	 );

	/*=========================================
	 Kundoo Typography H1
	 =========================================*/
	 for ( $i = 1; $i <= 6; $i++ ) {
	 	if($i  == '1'){$j=36;}elseif($i  == '2'){$j=32;}elseif($i  == '3'){$j=28;}elseif($i  == '4'){$j=24;}elseif($i  == '5'){$j=20;}else{$j=16;}
	 	$wp_customize->add_setting(
	 		'h' . $i . '_typography'
	 		,array(
	 			'capability'     	=> 'edit_theme_options',
	 			'sanitize_callback' => 'kundoo_sanitize_text',
	 		)
	 	);

	 	$wp_customize->add_control(
	 		'h' . $i . '_typography',
	 		array(
	 			'type' => 'hidden',
	 			'label' => esc_html('H' . $i .'','kundoo'),
	 			'section' => 'kundoo_headings_typography',
	 		)
	 	);

	// Heading Font Size // 
	 	if ( class_exists( 'Burger_Customizer_Range_Control' ) ) {
	 		$wp_customize->add_setting(
	 			'kundoo_h' . $i . '_font_size',
	 			array(
	 				'default'     	=> $j,
	 				'capability'     	=> 'edit_theme_options',
	 				'sanitize_callback' => 'kundoo_sanitize_range_value',
	 				'transport'         => 'postMessage'
	 			)
	 		);
	 		$wp_customize->add_control( 
	 			new Burger_Customizer_Range_Control( $wp_customize, 'kundoo_h' . $i . '_font_size', 
	 				array(
	 					'label'      => __( 'Font Size', 'kundoo' ),
	 					'section'  => 'kundoo_headings_typography',
	 					'input_attr'    => array(
	 						'min'           => 1,
	 						'max'           => 100,
	 						'step'          => 1,
	 					)	
	 				) ) 
	 		);
	 	}

	// Heading Font Size // 
	 	if ( class_exists( 'Burger_Customizer_Range_Control' ) ) {
	 		$wp_customize->add_setting(
	 			'kundoo_h' . $i . '_line_height',
	 			array(
	 				'capability'     	=> 'edit_theme_options',
	 				'sanitize_callback' => 'kundoo_sanitize_range_value',
	 				'transport'         => 'postMessage',
	 			)
	 		);
	 		$wp_customize->add_control( 
	 			new Burger_Customizer_Range_Control( $wp_customize, 'kundoo_h' . $i . '_line_height', 
	 				array(
	 					'label'      => __( 'Line Height', 'kundoo' ),
	 					'section'  => 'kundoo_headings_typography',
	 					'input_attrs' => array(
	 						'min'    => 0,
	 						'max'    => 5,
	 						'step'   => 0.1,
					//'suffix' => 'px', //optional suffix
	 					),
	 					'input_attr'    => array(
	 						'min'           => 0,
	 						'max'           => 3,
	 						'step'          => 0.1,
	 					)	
	 				) ) 
	 		);
	 	}

	// Heading Font style // 
	 	$wp_customize->add_setting( 'kundoo_h' . $i . '_font_style', array(
	 		'capability'        => 'edit_theme_options',
	 		'default'           => 'inherit',
	 		'transport'         => 'postMessage',
	 		'sanitize_callback' => 'kundoo_sanitize_select',
	 	) );

	 	$wp_customize->add_control(
	 		new WP_Customize_Control(
	 			$wp_customize, 'kundoo_h' . $i . '_font_style', array(
	 				'label'       => __( 'Font Style', 'kundoo' ),
	 				'section'     => 'kundoo_headings_typography',
	 				'type'        =>  'select',
	 				'choices'     =>  array(
	 					'inherit'   =>  __( 'Inherit', 'kundoo' ),
	 					'normal'       =>  __( 'Normal', 'kundoo' ),
	 					'italic'       =>  __( 'Italic', 'kundoo' ),
	 					'oblique'       =>  __( 'oblique', 'kundoo' ),
	 				),
	 			)
	 		)
	 	);

	// Heading Text Transform // 
	 	$wp_customize->add_setting( 'kundoo_h' . $i . '_text_transform', array(
	 		'capability'        => 'edit_theme_options',
	 		'default'           => 'inherit',
	 		'transport'         => 'postMessage',
	 		'sanitize_callback' => 'kundoo_sanitize_select',
	 	) );

	 	$wp_customize->add_control(
	 		new WP_Customize_Control(
	 			$wp_customize, 'kundoo_h' . $i . '_text_transform', array(
	 				'label'       => __( 'Text Transform', 'kundoo' ),
	 				'section'     => 'kundoo_headings_typography',
	 				'type'        => 'select',
	 				'choices'     => array(
	 					'inherit'       =>  __( 'Default', 'kundoo' ),
	 					'uppercase'     =>  __( 'Uppercase', 'kundoo' ),
	 					'lowercase'     =>  __( 'Lowercase', 'kundoo' ),
	 					'capitalize'    =>  __( 'Capitalize', 'kundoo' ),
	 				),
	 			)
	 		)
	 	);
	 }
	}
	add_action( 'customize_register', 'kundoo_typography' );