<?php

/**
 * @package EcoLibSys
 */

namespace EcoLibSys\Base;

class BaseController
{
    public $plugin_path;

    public $plugin_url;

    public $plugin;

    public $managers = array();

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin = plugin_basename(dirname(__FILE__, 3)) . '/eco-lib-sys.php';

        $this->managers = array(
            'cpt_manager' => __('Activate CPT Manager', 'eco-lib'),
            'taxonomy_manager' => __('Activate Taxonomy Manager', 'eco-lib'),
            'media_widget' => __('Activate Media Widget', 'eco-lib'),
            'gallery_manager' => __('Activate Gallery Manager', 'eco-lib'),
            'testimonial_manager' => __('Activate Testimonial Manager', 'eco-lib'),
            'templates_manager' => __('Activate Templates Manager', 'eco-lib'),
            'login_manager' => __('Activate Ajax Login/Signup', 'eco-lib'),
            'membership_manager' => __('Activate Membership Manager', 'eco-lib'),
            'chat_manager' => __('Activate Chat Manager', 'eco-lib')
        );
    }
}
