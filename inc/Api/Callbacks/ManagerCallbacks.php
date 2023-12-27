<?php

/**
 * @package EcoLibSys
 */

namespace EcoLibSys\Api\Callbacks;

use EcoLibSys\Base\BaseController;

class ManagerCallbacks extends BaseController
{

    // public function checkboxSanitize($input)
    // {
    //     return (isset($input) ? true : false);
    // }
    public function checkboxSanitize($input)
    {
        $output = array();

        foreach ($this->managers as $key => $value) {
            $output[$key] = isset($input[$key]) ? true : false;
        }

        return $output;
    }

    public function adminSectionManager()
    {
        _e('Manage the Sections and Features of this Plugin by activating the checkboxes from the following list.', 'eco-lib');
    }

    // public function checkboxField($args)
    // {
    //     $name = $args['label_for'];
    //     $classes = $args['class'];
    //     $checkbox = get_option($name);
    //     echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $name . '" value="1" class="" ' . ($checkbox ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
    // }

    // public function checkboxField($args)
    // {
    //     $name = $args['label_for'];
    //     $classes = $args['class'];
    //     $option_name = $args['option_name'];
    //     $checkbox = get_option($option_name);
    //     echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ($checkbox[$name] ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
    // }

    public function checkboxField($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $checkbox = get_option($option_name);
        $checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;

        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ($checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
    }
}
