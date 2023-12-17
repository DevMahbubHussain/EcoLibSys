<?php

/**
 * @package  EcoLibSys
 */

namespace EcoLibSys\Base;

class Enqueue
{

    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public function enqueue()
    {
        wp_enqueue_style('mypluginstyle', ECO_LIB_PLUGIN_URL . 'assets/mystyle.css');
        wp_enqueue_script('mypluginscript', ECO_LIB_PLUGIN_URL . 'assets/myscript.js');
    }
}
