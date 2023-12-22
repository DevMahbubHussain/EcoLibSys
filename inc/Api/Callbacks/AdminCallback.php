<?php

/**
 * @package EcoLibSys
 */

namespace EcoLibSys\Api\Callbacks;

use EcoLibSys\Base\BaseController;

class AdminCallback extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }
    public function adminCpt()
    {
        return require_once("$this->plugin_path/templates/cpt.php");
    }

    public function adminTaxonomy()
    {
        return require_once("$this->plugin_path/templates/taxonomy.php");
    }

    public function adminWidget()
    {
        return require_once("$this->plugin_path/templates/widget.php");
    }
}