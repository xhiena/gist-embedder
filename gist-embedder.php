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
 * Description:       Embed gists from github in your posts and pages
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
 * gist url structure: https://gist.github.com/[USER]/[ID]
 */
wp_embed_register_handler( 'gist-file', '#https://gist.github.com/(.+)/(.+)', 'wp_embed_handler_gdrive' );

function wp_embed_handler_gdrive( $matches, $attr, $url, $rawattr ) {

    $embed = sprintf(
		'<script src="https://gist.github.com/%1$s/%2$s.js"></script>',
		esc_attr($matches[1]),
		esc_attr($matches[2])
    );

    return apply_filters( 'embed_gdrive', $embed, $matches, $attr, $url, $rawattr );
}

