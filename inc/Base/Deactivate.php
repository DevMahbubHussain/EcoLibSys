<?php

/**
 * @package  EcoLibSys
 */

namespace EcoLibSys\Base;

class Deactivate
{

    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
