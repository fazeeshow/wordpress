<?php
 /**
 * Enqueue scripts and styles.
 */
 function astrocare_scripts() {

	// Styles	
 	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css');

 	wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/assets/css/owl.carousel.min.css');

 	wp_enqueue_style('bootstrap-icons',get_template_directory_uri().'/assets/css/webfonts/bootstrap-icons/font/bootstrap-icons.min.css');

 	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/webfonts/font-awesome/css/font-awesome.min.css');

 	wp_enqueue_style('animate',get_template_directory_uri().'/assets/css/animation.css');

 	wp_enqueue_style('astrocare-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

 	wp_enqueue_style('astrocare-animation-min', get_template_directory_uri() . '/assets/css/animate.min.css');

 	wp_enqueue_style('astrocare-widgets',get_template_directory_uri().'/assets/css/widget.css');

 	wp_enqueue_style('astrocare-main', get_template_directory_uri() . '/assets/css/main.css');

 	wp_enqueue_style('astrocare-magnific-min', get_template_directory_uri() . '/assets/css/magnific-popup.min.css');

 	wp_enqueue_style('astrocare-media-query', get_template_directory_uri() . '/assets/css/responsive.css');

 	wp_enqueue_style( 'astrocare-style', get_stylesheet_uri() );

	// Scripts
 	wp_enqueue_script( 'jquery' );

 	wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true);

 	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), false, true);

 	wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), false, true);

 	wp_enqueue_script('isotope-pkgd', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), false, true);

 	wp_enqueue_script('wow-min', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), false, true);

 	wp_enqueue_script('astrocare-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);

 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
 		wp_enqueue_script( 'comment-reply' );
 	}
 }
 add_action( 'wp_enqueue_scripts', 'astrocare_scripts' );

//Admin Enqueue for Admin
 function astrocare_admin_enqueue_scripts(){
 	wp_enqueue_style('astrocare-admin-style', get_template_directory_uri() . '/inc/customizer/assets/css/admin.css');
 	wp_enqueue_script( 'astrocare-admin-script', get_template_directory_uri() . '/inc/customizer/assets/js/astrocare-admin-script.js', array( 'jquery' ), '', true );
 	wp_localize_script( 'astrocare-admin-script', 'astrocare_ajax_object',
 		array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
 	);
 }
 add_action( 'admin_enqueue_scripts', 'astrocare_admin_enqueue_scripts' );