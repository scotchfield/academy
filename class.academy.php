<?php

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

		register_activation_hook( __FILE__, array( $this, 'add_roles' ) );
	}

	public function add_roles() {
		add_role(
			'Student',
			__( 'Student' ),
			array(
				'read' => true,
			)
		);
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

	public function admin_page() {
?>
<h1><?php _e( 'Academy', 'wp-academy' ); ?></h1>
<?php
	}

	public function academy_profile( $atts ) {
		return 'Academy Profile.';
	}

}
