<?php
function astrocare_general_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'astrocare_general', array(
			'priority' => 31,
			'title' => esc_html__( 'General', 'astrocare' ),
		)
	);
	
	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'breadcrumb_setting', array(
			'title' => esc_html__( 'Breadcrumb Section', 'astrocare' ),
			'priority' => 1,
			'panel' => 'astrocare_general',
		)
	);
	
	// Settings
	$wp_customize->add_setting(
		'breadcrumb_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','astrocare'),
			'section' => 'breadcrumb_setting',
			'priority' => 1,
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'astrocare_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		) 
	);
	
	$wp_customize->add_control(
	'hs_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'astrocare' ),
			'section'     => 'breadcrumb_setting',
			'settings'    => 'hs_breadcrumb',
			'type'        => 'checkbox',
			'priority' => 2,
		) 
	);
		
	// Background // 
	$wp_customize->add_setting(
		'breadcrumb_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','astrocare'),
			'section' => 'breadcrumb_setting',
			'priority' => 9,
		)
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'breadcrumb_bg_img' , 
    	array(
			'default' 			=> get_template_directory_uri() .'/assets/images/bg/breadcrumbs-bg.png',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_url',
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'breadcrumb_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'astrocare'),
			'section'        => 'breadcrumb_setting',
			'priority' => 10,
		) 
	));
	
	// Breadcrumbs Heading Image // 
	$wp_customize->add_setting( 
		'breadcrumb_heading_img', 
		array(
			'default' 			=> get_template_directory_uri() .'/assets/images/bg/breadcrumbs-heading.png',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_url',	
			'priority'          => 11,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'breadcrumb_heading_img' ,
		array(
			'label'          => esc_html__( 'Breadcrumbs Heading Image', 'astrocare'),
			'section'        => 'breadcrumb_setting',
		) 
	));

  /*=========================================
	Title Image Section
	=========================================*/
	$wp_customize->add_section(
		'title_image', array(
			'title' => esc_html__( 'Title Image', 'astrocare' ),
			'priority' => 2,
			'panel' => 'astrocare_general',
		)
	);
	// Title Image // 
	$wp_customize->add_setting( 
		'ge_title_img', 
		array(
			'default' 			=> get_template_directory_uri() .'/assets/images/general/earth.png',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_url',	
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'ge_title_img' ,
		array(
			'label'          => esc_html__( 'Image', 'astrocare'),
			'section'        => 'title_image',
		) 
	));
}

add_action( 'customize_register', 'astrocare_general_setting' );