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

    public function ecolibOptionsGroup($input)
    {
        return $input;
    }

    public function ecolibAdminSection()
    {
        echo 'Check this beautiful section!';
    }

    public function ecolibTextExample()
    {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" id = "text_example" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">';
    }

    public function ecolibFirstName()
    {
        $value = esc_attr(get_option('first_name'));
        echo '<input type="text" id="first_name" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write First Name Here!">';
    }
}
