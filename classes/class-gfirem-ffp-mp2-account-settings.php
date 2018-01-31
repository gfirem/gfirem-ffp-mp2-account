<?php

/**
 * @package    WordPress
 * @author     GFireM
 * @copyright  2018
 * @link       http://www.gfirem.com
 * @license    http://www.apache.org/licenses/
 *
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * This class contain all the implementation to show the setting space
 *
 * Class GFireMFfpMp2AccountSettings
 */
class GFireMFfpMp2AccountSettings {
	public function __construct() {
		$this->settings = get_option( GFireMFfpMp2AccountManager::get_slug() );
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_sections' ) );
		$this->section_name = GFireMFfpMp2AccountManager::get_slug() . '_section';
		$this->positions    = array(
			'before_profile' => __( 'Before Profile', 'gfirem-ffp-m2-account-locale' ),
			'after_profile'  => __( 'After Profile', 'gfirem-ffp-m2-account-locale' )
		);
	}

	/**
	 * Adding the Admin Page
	 */
	public function admin_menu() {
		add_menu_page( __( 'GFireM FFP-MP2', 'gfirem-ffp-m2-account-locale' ), __( 'GFireM FFP-MP2', 'gfirem-ffp-m2-account-locale' ), 'manage_options', 'gfirem_ffp_mp2_account', array( $this, 'render_menu' ), 'dashicons-redo' );
	}

	public function register_sections() {
		register_setting( GFireMFfpMp2AccountManager::get_slug(), GFireMFfpMp2AccountManager::get_slug() );

		add_settings_section( $this->section_name, '', null, GFireMFfpMp2AccountManager::get_slug() );
		add_settings_field( 'form', __( '<b>Select Formidable Form</b>', 'gfirem-ffp-m2-account-locale' ), array( $this, 'select_form_render' ), GFireMFfpMp2AccountManager::get_slug(), $this->section_name );
		add_settings_field( 'position', __( '<b>Select Formidable Position</b>', 'gfirem-ffp-m2-account-locale' ), array( $this, 'select_position_render' ), GFireMFfpMp2AccountManager::get_slug(), $this->section_name );

	}

	public function render_menu() {
		include_once( GFireMFfpMp2Account::$view_path . 'html_admin_screen.php' );
	}

	public function select_form_render() {
		include_once( GFireMFfpMp2Account::$view_path . 'html_select_form_render.php' );
	}

	public function select_position_render() {
		include_once( GFireMFfpMp2Account::$view_path . 'html_select_position_render.php' );
		submit_button();
	}
}