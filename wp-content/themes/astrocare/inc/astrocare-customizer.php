<?php
/**
 * Astrocare Theme Customizer.
 *
 * @package Astrocare
 */

if ( ! class_exists( 'Astrocare_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0
	 */
	class Astrocare_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'astrocare_customize_preview_js' ) );
			add_action( 'customize_register',                      array( $this, 'astrocare_customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'astrocare_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function astrocare_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';			
			
			/**
			 * Helper files
			 */
			require ASTROCARE_PARENT_INC_DIR . '/customizer/controls/font-control.php';
			require ASTROCARE_PARENT_INC_DIR . '/customizer/sanitization.php';
		}
		
		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function astrocare_customize_preview_js() {
			wp_enqueue_script( 'astrocare-customizer', ASTROCARE_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}

		// Include customizer customizer settings.
		
		function astrocare_customizer_settings() {	
			require ASTROCARE_PARENT_INC_DIR . '/customizer/customizer-options/astrocare-header.php';
			require ASTROCARE_PARENT_INC_DIR . '/customizer/customizer-options/astrocare-blog.php';
			require ASTROCARE_PARENT_INC_DIR . '/customizer/customizer-options/astrocare-general.php';
			require ASTROCARE_PARENT_INC_DIR . '/customizer/customizer-options/astrocare-footer.php';
			require ASTROCARE_PARENT_INC_DIR . '/customizer/customizer-options/astrocare_recommended_plugin.php';
			require ASTROCARE_PARENT_INC_DIR . '/customizer/customizer-options/astrocare_customizer_import_data.php';
			require ASTROCARE_PARENT_INC_DIR . '/customizer/customizer-pro/class-customize.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Astrocare_Customizer::get_instance();