<?php
class astrocare_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof astrocare_import_dummy_data ) ) {
			self::$instance = new astrocare_import_dummy_data;
			self::$instance->astrocare_setup_actions();
		}
	}

	/**
	 * Setup the class props based on the config array.
	 */
	
	/**
	 * Setup the actions used for this class.
	 */
	public function astrocare_setup_actions() {

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'astrocare_import_customize_scripts' ), 0 );
	}

	public function astrocare_import_customize_scripts() {

	wp_enqueue_script( 'astrocare-import-customizer-js', ASTROCARE_PARENT_INC_URI . '/customizer/customizer-notify/js/astrocare-import-customizer-options.js', array( 'customize-controls' ) );
	}
}

$astrocare_import_customizers = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
astrocare_import_dummy_data::init( apply_filters( 'astrocare_import_customizer', $astrocare_import_customizers ) );