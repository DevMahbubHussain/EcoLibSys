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
 * Text Domain:       eco-lib
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) exit;

// load autoload 
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// defined constants 
define('ECO_LIB_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('ECO_LIB_PLUGIN_URL', plugin_dir_url(__FILE__));

//load plugin main file
if (class_exists('EcoLibSys\\Init')) {
    EcoLibSys\Init::register_services();
}
