<?php
/*
 * Plugin Name:       EcoLibSys
 * Plugin URI:        https://EcoLibSys.com/
 * Description:       Eco library Management System.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Mahbub Hussain
 * Author URI:        https://mahbub.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://EcoLibSys.com/
 * Text Domain:       
 * Domain Path:       /languages
 */

// If this file is called firectly, abort!!!
if (!defined('ABSPATH')) exit;

// Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// Define CONSTANTS
define('ECO_LIB_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('ECO_LIB_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ECO_LIB_PLUGIN', plugin_basename(__FILE__));

/**
 * The code that runs during plugin activation
 */

function activate_ecolibsys_plugin()
{
    EcoLibSys\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_ecolibsys_plugin');

/**
 * The code that runs during plugin deactivation
 */

function deactivate_ecolibsys_plugin()
{
    EcoLibSys\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_ecolibsys_plugin');

/**
 * Initialize all the core classes of the plugin
 */
if (class_exists('EcoLibSys\\Init')) {
    EcoLibSys\Init::register_services();
}
