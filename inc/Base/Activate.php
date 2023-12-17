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
    }
}
