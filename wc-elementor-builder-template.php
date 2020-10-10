<?php

/**
 * Plugin Name:       WooCommerce Elementor Builder Template
 * Plugin URI:        https://muel.ml/
 * Description:       Effortlessly layout & design your WooCommerce Pages endpoints and more, bring your Woocommerce Elementor store closer to perfection
 * Version:           0.0.1
 * Author:            SamuelChuck
 * Author URI:        https://muel.ml/
 * License:           License GNU General Public License version 2 or later
 * Text-domain:       webt
 * WC tested up to:   4.5.1
 *
 * @package WEBT
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

// Define
define('WEBT_VERSION', '1.0.5');
define('WEBT_PLUGIN_FILE', wp_normalize_path(__FILE__));
define('WEBT_PLUGIN_BASENAME', plugin_basename(__FILE__));

/**
 * Defines Paths
 */
define('WEBT_PATH', dirname(__FILE__) . '/');

define('WEBT_CORE_PATH', WEBT_PATH . 'core' . '/');
define('WEBT_INCLUDES_PATH', WEBT_PATH . 'includes' . '/');
define('WEBT_CLASSES_PATH', WEBT_PATH . 'classes' . '/');
define('WEBT_MODULES_PATH', WEBT_PATH . 'modules' . '/');
define('WEBT_WIDGETS_PATH', WEBT_INCLUDES_PATH . 'widgets' . '/');
define('WEBT_TEMPLATE_PATH', WEBT_INCLUDES_PATH . 'templates' . '/');

/**
 * Defines URLs
 */
define('WEBT_PATH_URL', plugin_dir_url(__FILE__));
define('WEBT_URL', plugins_url('/', __FILE__));
define('WEBT_ASSETS_URL', WEBT_URL . 'assets/');

add_action( 'plugins_loaded', 'webt_load_plugin_textdomain' );

require( WEBT_INCLUDES_PATH.'plugin.php');


/**
 * Load WEBT textdomain.
 *
 * Load gettext translate for WooCommerce Elementor Builder Template text domain.
 *
 * @since 1.0.0
 *
 * @return void
 */
function webt_load_plugin_textdomain() {
	load_plugin_textdomain( 'webt' );
}