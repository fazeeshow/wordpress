<?php
function astrocare_footer( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'astrocare'),
		) 
	);
     // Footer Top // 
	$wp_customize->add_section(
		'footer_top',
		array(
			'title' 		=> __('Footer Top','astrocare'),
			'panel'  		=> 'footer_section',
			'priority'      => 3,
		)
	);

	// Footer Top Left // 
	$wp_customize->add_setting(
		'footer_top_left_head'
		,array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_text',
			'priority' => 1
		)
	);

	$wp_customize->add_control(
		'footer_top_left_head',
		array(
			'type'   => 'hidden',
			'label'  => __('Footer Top Left','astrocare'),
			'section'=> 'footer_top',
		)
	);

	// Footer Logo // 
	$wp_customize->add_setting( 
		'footer_top_logo' , 
		array(
			'default' 			=> get_template_directory_uri() .'/assets/images/logo/footer-logo.png',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_url',	
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_top_logo',
		array(
			'label'          => esc_html__( 'Footer Logo', 'astrocare'),
			'section'        => 'footer_top',
		) 
	));

	// Footer Copyright 
	$astrocare_foo_copy = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'astrocare' );
	$wp_customize->add_setting(
		'footer_copyright',
		array(
			'default' => $astrocare_foo_copy,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'  => 2,
			'transport' => $selective_refresh
		)
	);	

	$wp_customize->add_control( 
		'footer_copyright',
		array(
			'label'   		=> __('Copytight','astrocare'),
			'section'		=> 'footer_top',
			'type' 			=> 'textarea'
		)  
	);

	// Footer Top Right // 
	$wp_customize->add_setting(
		'footer_top_right_head'
		,array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_text',
			'priority' => 2
		)
	);

	$wp_customize->add_control(
		'footer_top_right_head',
		array(
			'type'   => 'hidden',
			'label'  => __('Footer Top Right','astrocare'),
			'section'=> 'footer_top',
		)
	);

	// Footer Right Description // 
	$wp_customize->add_setting(
		'footer_right_description',
		array(
			'default'			=> __('Privacy Policy - Terms & Conditions','astrocare'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 1
			
		)
	);	
	
	$wp_customize->add_control( 
		'footer_right_description',
		array(
			'label'   => __('Footer Right Description','astrocare'),
			'section' => 'footer_top',
			'type'    => 'textarea'
		)  
	);

	// Background section // 
	$wp_customize->add_setting(
		'footer_bg_head'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
		'footer_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background Color','astrocare'),
			'section' => 'footer_background',
		)
	);

	// Background Color // 
	$wp_customize->add_setting(
		'footer_bg_color', 
		array(
			'default'    => '#0b2038',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'   => 1
		));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_bg_color', 
			array(
				'label'      => __( 'Background Color', 'astrocare'),
				'section'    => 'footer_background',
			) 
		) 
	); 
	
}
add_action( 'customize_register', 'astrocare_footer' );
// Footer selective refresh
function astrocare_footer_partials( $wp_customize ){

	// footer_top_logo
	$wp_customize->selective_refresh->add_partial( 'footer_top_logo', array(
		'selector'            => '.ast_footer_wrapper .ast_footer_top .footer_top_left',
		'settings'            => 'footer_top_logo',
		'render_callback'     => 'astrocare_footer_top_logo_render_callback',
	) );

	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.ast_footer_wrapper .ast_footer_top .ast_ft_copyright',
		'settings'            => 'footer_copyright',
		'render_callback'     => 'astrocare_footer_copyright_render_callback',
	) );

	// footer_right_description
	$wp_customize->selective_refresh->add_partial( 'footer_right_description', array(
		'selector'            => '.ast_footer_wrapper .footer_top_right .ast_ft_policy',
		'settings'            => 'footer_right_description',
		'render_callback'     => 'astrocare_footer_right_description_render_callback',
	) );
}
add_action( 'customize_register', 'astrocare_footer_partials' );

// footer_top_logo
function astrocare_footer_top_logo_render_callback() {
	return get_theme_mod( 'footer_top_logo' );
}

// footer_copyright
function astrocare_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}

// footer_right_description
function astrocare_footer_right_description_render_callback() {
	return get_theme_mod( 'footer_right_description' );
}