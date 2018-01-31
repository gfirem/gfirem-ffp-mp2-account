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

class GFireMFfpMp2AccountManager {
	private static $version = '1.0.0';
	private static $plugin_slug = 'gfirem_ffp_mp2_account';

	public function __construct() {
		require_once dirname( __FILE__ ) . '/class-gfirem-ffp-mp2-account-log.php';
		new GFireMFfpMp2AccountLog();
		require_once dirname( __FILE__ ) . '/class-gfirem-ffp-mp2-account-account.php';
		require_once dirname( __FILE__ ) . '/class-gfirem-ffp-mp2-account-settings.php';
		new GFireMFfpMp2AccountAccount();
		new GFireMFfpMp2AccountSettings();
		add_filter( 'ms_frontend_handle_registration', array( $this, 'mp2_handle_registration' ) );
	}

	function mp2_handle_registration() {
		return false;
	}

	/**
	 * Get plugins version
	 *
	 * @return mixed
	 */
	static function get_version() {
		return self::$version;
	}

	/**
	 * Get plugins slug
	 *
	 * @return string
	 */
	static function get_slug() {
		return self::$plugin_slug;
	}
}