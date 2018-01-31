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
 * Class GFireMFfpMp2AccountFs
 */
class GFireMFfpMp2AccountFs {

	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	protected static $instance = null;

	public function __construct() {
		$this->gfirem_ffp_mp2_account();
	}

	/**
	 * @return Freemius
	 */
	public static function getFreemius() {
		global $gfirem_ffp_mp2_account;

		return $gfirem_ffp_mp2_account;
	}

	// Create a helper function for easy SDK access.
	public function gfirem_ffp_mp2_account() {
		global $gfirem_ffp_mp2_account;

		if ( ! isset( $gfirem_ffp_mp2_account ) ) {
			// Include Freemius SDK.
			require_once dirname( __FILE__ ) . '/includes/freemius/start.php';

			try {
				$gfirem_ffp_mp2_account = fs_dynamic_init( array(
					'id'                  => '1658',
					'slug'                => 'gfirem_ffp_mp2_account',
					'type'                => 'plugin',
					'public_key'          => 'pk_87d164b71497930a10e47eb0ac05f',
					'is_premium'          => true,
					'is_premium_only'     => true,
					'has_addons'          => false,
					'has_paid_plans'      => true,
					'is_org_compliant'    => false,
					'trial'               => array(
						'days'               => 14,
						'is_require_payment' => true,
					),
					'menu'                => array(
						'first-path'     => 'plugins.php',
						'support'        => false,
					),
					// Set the SDK to work in a sandbox mode (for development & testing).
					// IMPORTANT: MAKE SURE TO REMOVE SECRET KEY BEFORE DEPLOYMENT.
					'secret_key'          => 'sk_zIRx=d>8FvVS^:a4Sw!:vGX(aZM$F',
				) );
				do_action( 'gfirem_ffp_mp2_account_loaded' );
			} catch ( Freemius_Exception $ex ) {
				GFireMFfpMp2AccountLog::log( array(
					'action'         => get_class( $this ),
					'object_type'    => GFireMFfpMp2AccountManager::get_slug(),
					'object_subtype' => 'loading_freemius',
					'object_name'    => $ex->getMessage(),
				) );
				$gfirem_ffp_mp2_account = false;
			}
		}

		return $gfirem_ffp_mp2_account;
	}

	/**
	 * Return an instance of this class.
	 *
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}