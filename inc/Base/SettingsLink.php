<?php

/**
 * @package  EcoLibSys
 */

namespace EcoLibSys\Base;

use \EcoLibSys\Base\BaseController;

class SettingsLink extends BaseController
{
    public function register()
    {
        add_filter("plugin_action_links_$this->plugin", [$this, 'plugin_action_links']);
    }

    public function plugin_action_links($links)
    {
        $links[] = '<a href="' . admin_url('admin.php?page=ecolibsys_plugin') . '">' . __('Settings', ' eco-lib') . '</a>';
        return $links;
    }
}
