<?php
function astrocare_blog_setting( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Frontpage Panel
	=========================================*/
	$wp_customize->add_panel(
		'astrocare_frontpage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Frontpage Sections', 'astrocare' ),
		)
	);
	
	/*=========================================
	Blog Section
	=========================================*/
	$wp_customize->add_section(
		'blog_setting', array(
			'title'    => esc_html__( 'Blog Section', 'astrocare' ),
			'priority' => 18,
			'panel'    => 'astrocare_frontpage_sections',
		)
	);
	
	// Blog Settings Section // 
	
	$wp_customize->add_setting(
		'blog_setting_head'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
		'blog_setting_head',
		array(
			'type'    => 'hidden',
			'label'   => __('Settings','astrocare'),
			'section' => 'blog_setting',
		)
	);
	// hide/show
	$wp_customize->add_setting( 
		'hs_blog' , 
		array(
			'default' => '1',
			'capability'  => 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_checkbox',
			'priority' => 6,
		) 
	);
	
	$wp_customize->add_control(
		'hs_blog', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'astrocare' ),
			'section'     => 'blog_setting',
			'type'        => 'checkbox',
		) 
	);	
	
	// Blog Header Section // 
	$wp_customize->add_setting(
		'blog_headings'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
		'blog_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','astrocare'),
			'section' => 'blog_setting',
		)
	);
	
	// Blog Title // 
	$wp_customize->add_setting(
		'blog_title',
		array(
			'default' => __('Latest News','astrocare'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_title',
		array(
			'label'   => __('Title','astrocare'),
			'section' => 'blog_setting',
			'type'    => 'text',
		)  
	);
	
	// Blog Subtitle // 
	$wp_customize->add_setting(
		'blog_subtitle',
		array(
			'default' => __('Latest From Article','astrocare'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_subtitle',
		array(
			'label'   => __('Subtitle','astrocare'),
			'section' => 'blog_setting',
			'type'    => 'textarea',
		)  
	);
}

add_action( 'customize_register', 'astrocare_blog_setting' );

// service selective refresh
function astrocare_blog_section_partials( $wp_customize ){	
	// blog_title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.ast_blog_section .astro_theme_titles h5',
		'settings'            => 'blog_title',
		'render_callback'     => 'astrocare_blog_title_render_callback',
	) );

	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.ast_blog_section .astro_theme_titles h2',
		'settings'            => 'blog_subtitle',
		'render_callback'     => 'astrocare_blog_subtitle_render_callback',
	) );
	
	
}
add_action( 'customize_register', 'astrocare_blog_section_partials' );

// blog_title
function astrocare_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}
// blog_subtitle
function astrocare_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}
