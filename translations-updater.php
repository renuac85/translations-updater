<?php
/**
 * Translations Updater
 *
 * @package   Fragen\Translations_Updater
 * @author    Andy Fragen
 * @license   MIT
 * @link      https://github.com/afragen/translations-updater
 */

/**
 * Plugin Name:       Translations Updater
 * Plugin URI:        https://github.com/afragen/translations-updater
 * Description:       A plugin to automatically update GitHub, Bitbucket, or GitLab hosted language packs.
 * Version:           0.0.1
 * Author:            Andy Fragen
 * License:           GNU General Public License v2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:       /languages
 * Text Domain:       translations-updater
 * Network:           true
 * GitHub Plugin URI: https://github.com/afragen/translations-updater
 * GitHub Branch:     develop
 * Requires WP:       4.4
 * Requires PHP:      5.3
 */

/*
 * Exit if called directly.
 * PHP version check and exit.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( version_compare( '5.3.0', PHP_VERSION, '>=' ) ) {
	?>
	<div class="error notice is-dismissible">
		<p>
			<?php esc_html_e( 'Translations Updater cannot run on PHP versions older than 5.3.0. Please contact your hosting provider to update your site.', 'translations-updater' ); ?>
		</p>
	</div>
	<?php

	return false;
}

// Load textdomain.
load_plugin_textdomain( 'translations-updater' );

// Plugin namespace root.
$root = array( 'Fragen\\Translations_Updater' => __DIR__ . '/src/Translations_Updater' );

// Add extra classes.
$extra_classes = array(
);

// Load Autoloader.
require_once( __DIR__ . '/src/Translations_Updater/Autoloader.php' );
$loader = 'Fragen\\Translations_Updater\\Autoloader';
new $loader( $root, $extra_classes );

// Instantiate class Fragen\Translations_Updater.
$instantiate = 'Fragen\\Translations_Updater\\Base';
new $instantiate;

//delete_site_transient('update_plugins');