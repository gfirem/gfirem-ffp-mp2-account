<?php
/**
 * @since             1.0.0
 * @package           GFireMFfpMp2Account
 *
 * @wordpress-plugin
 * Plugin Name:       GFireM Formidable to Membership 2 Account
 * Description:       Replace Profile Account section inside Membership Pro 2 with a Formidable Pro Form
 * Version:           1.0.0
 * Author:            gfirem
 * License:           Apache License 2.0
 * License URI:       http://www.apache.org/licenses/
 *
 *
 * Copyright 2018 Guillermo Figueroa Mesa (email: gfirem@gmail.com)
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'GFireMFfpMp2Account' ) ) {

	require_once dirname( __FILE__ ) . '/classes/class-gfirem-ffp-mp2-account-fs.php';
	GFireMFfpMp2AccountFs::get_instance();

	class GFireMFfpMp2Account {
		/**
		 * Instance of this class.
		 *
		 * @var object
		 */
		protected static $instance = null;
		/**
		 * @var string Url to the CSS assets folder
		 */
		public static $css_url;
		/**
		 * @var string Url to the JS assets folder
		 */
		public static $js_url;
		/**
		 * @var string Path to the view folder
		 */
		public static $view_path;

		/**
		 * Initialize the plugin.
		 */
		private function __construct() {
			self::$css_url   = plugin_dir_url( __FILE__ ) . 'assets/css/';
			self::$js_url    = plugin_dir_url( __FILE__ ) . 'assets/js/';
			self::$view_path = dirname( __FILE__ ) . '/view/';

			$this->load_plugin_text_domain();
			require_once dirname( __FILE__ ) . '/classes/class-gfirem-ffp-mp2-account-manager.php';
			new GFireMFfpMp2AccountManager();
		}

		/**
		 * Load the plugin text domain for translation.
		 */
		public function load_plugin_text_domain() {
			load_plugin_textdomain( 'gfirem-ffp-m2-account-locale', false, basename( dirname( __FILE__ ) ) . '/languages' );
		};

		/**
		 * Return an instance of this class.
		 *
		 * @return object A single instance of this class.
		 */
		public static function get_instance() {
			// If the single instance hasn't been set, set it now.
			if ( null === self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}
	}

	add_action( 'plugins_loaded', array( 'GFireMFfpMp2Account', 'get_instance' ), 1 );
}
