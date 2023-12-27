<?php

/**
 * @package  EcoLibSys
 */

namespace EcoLibSys\Base;

class Activate
{

    public static function activate()
    {
        flush_rewrite_rules();
        if (get_option('ecolibsys_plugin')) {
            return;
        }

        $default = array();

        update_option('ecolibsys_plugin', $default);
    }
}
