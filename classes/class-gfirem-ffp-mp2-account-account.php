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
 * This class contain all the implementation to inject the form into Membership Pro 2 My Account
 *
 * Class GFireMFfpMp2AccountAccount
 */
class GFireMFfpMp2AccountAccount {
	public function __construct() {
		$this->settings = get_option( GFireMFfpMp2AccountManager::get_slug() );
		$hook           = 'ms_view_account_profile_top';

		if ( empty( $this->settings['form'] ) ) {
			return;
		}

		if ( ! empty( $this->settings['position'] ) ) {
			if ( $this->settings['position'] === 'after_profile' ) {
				$hook = 'ms_view_account_profile_bottom';
			}
		}
		$this->options = array(
			'id' => $this->settings['form'],
		);
		add_action( apply_filters( 'gfirem_ffp_mp2_account_hook', $hook ), array( $this, 'inject_form' ) );
	}

	public function inject_form() {
		$attr = array();
		foreach ( $this->options as $key => $option ) {
			$attr[ $key ] = $option;
		}
		echo FrmFormsController::get_form_shortcode( apply_filters( 'gfirem_ffp_mp2_account_frm_args', $attr ) );
	}
}