<?php
/**
 * Plugin Name: Academy
 * Plugin URI: http://scootah.com/
 * Description: Academy
 * Version: 0.0
 * Author: Scott Grant
 * Author URI: http://scootah.com/
 */
class WP_Academy {

	/**
	 * The domain for localization.
	 */
	const DOMAIN = 'wp-academy';

	/**
	 * Instantiate and add init hook.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
	}

	public function init() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );

		add_shortcode( 'academy_profile', array( $this, 'academy_profile' ) );
	}

	/**
	 * Add a link to a settings page.
	 */
	public function admin_menu() {
		add_menu_page(
			'Academy',
			'Academy',
			'manage_options',
			'wp_academy_admin',
			array( $this, 'admin_page' )
		);
	}

	public function academy_profile( $atts ) {

	}

}

$wp_academy = new WP_Academy();
