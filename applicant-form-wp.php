<?php
/**
 * Plugin Name:       Applicant Form WP
 * Plugin URI:        https://wordpress.org/plugins/application-form-wp
 * Description:       A plugin to collect applicant information via a form.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Md. Russel Hussain
 * Author URI:        https://github.com/russel07
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/shovoalways
 * Text Domain:       application-form-wp
 */

 define( 'APPLICANT_FORM_WP_VERSION', '1.0.0' );
 define( 'APPLICANT_FORM_WP_PLUGIN_PATH', __FILE__ );
 define( 'APPLICANT_FORM_WP_PLUGIN_DIR', __DIR__ );
 define( 'APPLICANT_FORM_WP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

 require 'autoloader.php';


use Rus\ApFWP\Config\PluginInit;

PluginInit::get_instance();