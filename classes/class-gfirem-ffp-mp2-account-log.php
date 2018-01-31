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
 * Show a log into a plugin
 *
 * Class GFireMFfpMp2AccountLog
 */
class GFireMFfpMp2AccountLog {

	function __construct() {
		add_filter( 'aal_init_roles', array( $this, 'aal_init_roles' ) );
	}

	public function aal_init_roles( $roles ) {
		$roles_existing          = $roles['manage_options'];
		$roles['manage_options'] = array_merge( $roles_existing, array( GFireMFfpMp2AccountManager::get_slug() ) );

		return $roles;
	}

	public static function log( $args ) {
		if ( function_exists( "aal_insert_log" ) ) {
			aal_insert_log( $args );
		}
	}
}