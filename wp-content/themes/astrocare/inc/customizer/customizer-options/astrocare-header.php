<?php
function astrocare_header_settings( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'astrocare'),
		) 
	);
	
	/*=========================================
	Astrocare Site Identity
	=========================================*/
	$wp_customize->add_section(
		'title_tagline',
		array(
			'priority'      => 1,
			'title' 		=> __('Site Identity','astrocare'),
			'panel'  		=> 'header_section',
		)
	);

/*=========================================
	Above Header Section
	=========================================*/	
	$wp_customize->add_section(
		'above_header',
		array(
			'priority'      => 2,
			'title' 		=> __('Above Header','astrocare'),
			'panel'  		=> 'header_section',
		)
	);

	// Header Opening Hour Section
	$wp_customize->add_setting(
		'abv_hdr_ohour_head'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_text',
			'priority'          => 2
		)
	);

	$wp_customize->add_control(
		'abv_hdr_ohour_head',
		array(
			'type' => 'hidden',
			'label' => __('Opening Hour','astrocare'),
			'section' => 'above_header'
		)
	);

	// hide/show
	$wp_customize->add_setting( 
		'hs_above_opening', 
		array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_checkbox',
			'priority'  => 1
		) 
	);
	$wp_customize->add_control(
		'hs_above_opening', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'astrocare' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);

	// icon // 
	$wp_customize->add_setting(
		'abv_hdr_opening_icon',
		array(
			'default' => 'fa-clock-o',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority'   => 2
		)
	);	
	$wp_customize->add_control(new Astrocare_Icon_Picker_Control($wp_customize, 
		'abv_hdr_opening_icon',
		array(
			'label'   		=> __('Icon','astrocare'),
			'section' 		=> 'above_header',
			'iconset' => 'fa'
		))  
);
	// above header opening title // 
	$wp_customize->add_setting(
		'abv_hdr_opening_content',
		array(
			'default' => __('Mon - Sat 8:00 - 6:30, Sunday - CLOSED','astrocare'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_html',
			'transport'         => $selective_refresh,
			'priority'          => 3
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_opening_content',
		array(
			'label'   		=> __('Content','astrocare'),
			'section'		=> 'above_header',
			'type' 			=> 'textarea'
		)  
	);

	// Header Email 
	$wp_customize->add_setting(
		'abv_hdr_email_heads'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_text',
			'priority'  => 3
		)
	);

	$wp_customize->add_control(
		'abv_hdr_email_heads',
		array(
			'type' => 'hidden',
			'label' => __('Email Us','astrocare'),
			'section' => 'above_header'
		)
	);

	$wp_customize->add_setting( 
		'hide_show_hdr_email' , 
		array(
			'default'           => '1',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_checkbox',
			'priority'    => 1
		) 
	);
	
	$wp_customize->add_control(
		'hide_show_hdr_email', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'astrocare'),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting(
		'hdr_email_icon',
		array(
			'default' => 'fa-envelope',   
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority'   => 2,
		)
	);	

	$wp_customize->add_control(new Astrocare_Icon_Picker_Control($wp_customize, 
		'hdr_email_icon',
		array(
			'label'   		=> __('Icon','astrocare'),
			'section' 		=> 'above_header',
			'iconset'       => 'fa'
		))  
);

	$wp_customize->add_setting(
		'hdr_email_ttl',
		array(
			'default'			=> __('info@example.com','astrocare'),
			'sanitize_callback' => 'astrocare_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority'   => 3
		)
	);	

	$wp_customize->add_control( 
		'hdr_email_ttl',
		array(
			'label'   		=> __('Text','astrocare'),
			'section' 		=> 'above_header',
			'type'		    =>	'text'
		)  
	);

	 /*=========================================
	 Header Button
	 =========================================*/	
	 $wp_customize->add_section(
	 	'button_header',
	 	array(
	 		'priority'      => 3,
	 		'title' 		=> __('Header Button','astrocare'),
	 		'panel'  		=> 'header_section',
	 	)
	 );

	  // Button Hide/Show // 
	 $wp_customize->add_setting( 
	 	'hide_show_hdr_btn' , 
	 	array(
	 		'default' => '1',
	 		'capability'        => 'edit_theme_options',
	 		'sanitize_callback' => 'astrocare_sanitize_checkbox'
	 	) 
	 );
	 $wp_customize->add_control(
	 	'hide_show_hdr_btn', 
	 	array(
	 		'label'	      => esc_html__( 'Hide/Show', 'astrocare' ),
	 		'section'     => 'button_header',
	 		'type'        => 'checkbox',
	 		'priority'    => 1,
	 	) 
	 );

	 // Button Label // 
	 $wp_customize->add_setting(
	 	'hdr_btn_lbl',
	 	array(
	 		'default'			=> __('Book Appointment','astrocare'),
	 		'sanitize_callback' => 'astrocare_sanitize_text',
	 		'transport'         => $selective_refresh,
	 		'capability'        => 'edit_theme_options',
	 	)
	 );	

	 $wp_customize->add_control( 
	 	'hdr_btn_lbl',
	 	array(
	 		'label'   		=> __('Label','astrocare'),
	 		'section' 		=> 'button_header',
	 		'type'		    =>	'text',
	 		'priority'      => 2,
	 	)  
	 );

	 // Button URL // 
	 $wp_customize->add_setting(
	 	'hdr_btn_url',
	 	array(
	 		'default'			=> '',
	 		'sanitize_callback' => 'astrocare_sanitize_url',
	 		'transport'         => $selective_refresh,
	 		'capability'        => 'edit_theme_options',
	 	)
	 );	

	 $wp_customize->add_control( 
	 	'hdr_btn_url',
	 	array(
	 		'label'   		=> __('Link','astrocare'),
	 		'section' 		=> 'button_header',
	 		'type'		    =>	'text',
	 		'priority'      => 3,
	 	)  
	 );

	 $wp_customize->add_setting( 
	 	'hdr_btn_open_new_tab' , 
	 	array(
	 		'capability'        => 'edit_theme_options',
	 		'sanitize_callback' => 'astrocare_sanitize_checkbox',
	 	) 
	 );
	 
	 $wp_customize->add_control(
	 	'hdr_btn_open_new_tab', 
	 	array(
	 		'label'	      => esc_html__( 'Open in New Tab ?', 'astrocare' ),
	 		'section'     => 'button_header',
	 		'type'        => 'checkbox',
	 		'priority'    => 4,
	 	) 
	 );			

	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
		'sticky_header_set',
		array(
			'priority'      => 4,
			'title' 		=> __('Sticky Header','astrocare'),
			'panel'  		=> 'header_section',
		)
	);
	
	// Heading
	$wp_customize->add_setting(
		'sticky_head'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
		'sticky_head',
		array(
			'type' => 'hidden',
			'label' => __('Sticky Header','astrocare'),
			'section' => 'sticky_header_set',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_sticky' , 
		array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
		'hide_show_sticky', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'astrocare' ),
			'section'     => 'sticky_header_set',
			'type'        => 'checkbox'
		) 
	);	
}
add_action( 'customize_register', 'astrocare_header_settings' );

// Header selective refresh
function astrocare_header_partials( $wp_customize ){
	
	// abv_hdr_opening_content
	$wp_customize->selective_refresh->add_partial( 'abv_hdr_opening_content', array(
		'selector'            => '.main-header .ast_column_left span',
		'settings'            => 'abv_hdr_opening_content',
		'render_callback'     => 'astrocare_abv_hdr_opening_content_render_callback',
	) );

	// hdr_email_ttl
	$wp_customize->selective_refresh->add_partial( 'hdr_email_ttl', array(
		'selector'            => '.main-header .ast_column_right span',
		'settings'            => 'hdr_email_ttl',
		'render_callback'     => 'astrocare_abv_hdr_email_ttl_render_callback',
	) );

	// hdr_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'hdr_btn_lbl', array(
		'selector'            => '.main-header .ast_book_btn',
		'settings'            => 'hdr_btn_lbl',
		'render_callback'     => 'astrocare_hdr_btn_lbl_render_callback',
	) );
	
}

add_action( 'customize_register', 'astrocare_header_partials' );

// abv_hdr_opening_content
function astrocare_abv_hdr_opening_content_render_callback() {
	return get_theme_mod( 'abv_hdr_opening_content' );
}

// hdr_email_ttl
function astrocare_abv_hdr_email_ttl_render_callback() {
	return get_theme_mod( 'hdr_email_ttl' );
}

// hdr_btn_lbl
function astrocare_hdr_btn_lbl_render_callback() {
	return get_theme_mod( 'hdr_btn_lbl' );
}