<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              pablo.martinez-perez.com
 * @since             1.0.0
 * @package           Gist_Embedder
 *
 * @wordpress-plugin
 * Plugin Name:       gist embedder
 * Plugin URI:        pablo.martinez-perez.com/gist-embedder
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            xhiena
 * Author URI:        pablo.martinez-perez.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gist-embedder
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'GIST_EMBEDDER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gist-embedder-activator.php
 */
function activate_gist_embedder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gist-embedder-activator.php';
	Gist_Embedder_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gist-embedder-deactivator.php
 */
function deactivate_gist_embedder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gist-embedder-deactivator.php';
	Gist_Embedder_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gist_embedder' );
register_deactivation_hook( __FILE__, 'deactivate_gist_embedder' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gist-embedder.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gist_embedder() {

	$plugin = new Gist_Embedder();
	$plugin->run();

}
run_gist_embedder();
