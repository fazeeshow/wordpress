<?php
/* Notifications in customizer */

require ASTROCARE_PARENT_INC_DIR . '/customizer/customizer-notify/astrocare-notify.php';
$astrocare_config_customizer = array(
	'recommended_plugins' => array(
		'burger-companion'=> array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>Burger Companion</strong> plugin for taking full advantage of all the features this theme has to offer Astrocare.', 'astrocare')),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'astrocare' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'astrocare' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'astrocare' ),
	'activate_button_label'     => esc_html__( 'Activate', 'astrocare' ),
	'astrocare_deactivate_button_label'   => esc_html__( 'Deactivate', 'astrocare' ),
);
Astrocare_Customizer_Notify::init( apply_filters( 'astrocare_customizer_notify_array', $astrocare_config_customizer ) );
