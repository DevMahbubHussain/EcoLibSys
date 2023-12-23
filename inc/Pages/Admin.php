<?php

/**
 * @package  EcoLibSys
 */

namespace EcoLibSys\Pages;

use \EcoLibSys\Base\BaseController;
use \EcoLibSys\Api\SettingsApi;
use \EcoLibSys\Api\Callbacks\AdminCallback;
use \EcoLibSys\Api\Callbacks\ManagerCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $pages = array();
    public $subpages = array();
    public $callbacks;
    public $callbacks_mngr;


    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallback();
        $this->callbacks_mngr = new ManagerCallbacks();
        $this->setPages();
        $this->setSubpages();
        $this->setAdminSettings();
        $this->setAdminSections();
        $this->setAdminFields();
        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    /**
     * Admin Paged function
     *
     * @return void
     */
    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'EcoLibSys Plugin',
                'menu_title' => 'Ecolibsys',
                'capability' => 'manage_options',
                'menu_slug' => 'ecolibsys_plugin',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'ecolibsys_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'ecolibsys_cpt',
                'callback' => array($this->callbacks, 'adminCpt'),
            ),
            array(
                'parent_slug' => 'ecolibsys_plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'ecolibsys_taxonomies',
                'callback' => array($this->callbacks, 'adminTaxonomy'),
            ),
            array(
                'parent_slug' => 'ecolibsys_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'ecolibsys_widgets',
                'callback' => array($this->callbacks, 'adminWidget'),
            )
        );
    }


    // set admin settings options with options name 
    public function setAdminSettings()
    {
        $args = array(
            array(
                'option_group' => 'ecolib_plugin_options',
                'option_name' => 'cpt_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'ecolib_plugin_options',
                'option_name' => 'taxonomy_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'ecolib_plugin_options',
                'option_name' => 'media_widget',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'ecolib_plugin_options',
                'option_name' => 'gallery_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'ecolib_plugin_options',
                'option_name' => 'testimonial_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'ecolib_plugin_options',
                'option_name' => 'templates_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'ecolib_plugin_options',
                'option_name' => 'login_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'ecolib_plugin_options',
                'option_name' => 'membership_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'ecolib_plugin_options',
                'option_name' => 'chat_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            )

        );
        $this->settings->setSettings($args);
    }

    // set admin panel sections
    public function setAdminSections()
    {
        $args = array(
            array(
                'id' => 'ecolib_admin_index', // unique id
                'title' => __('Settings Manager', 'eco-lib'),
                'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
                'page' => 'ecolibsys_plugin' // which page belongs it 
            ),
        );
        $this->settings->setSections($args);
    }

    // set admin panel Fileds
    public function setAdminFields()
    {
        $args = array(
            array(
                'id' => 'cpt_manager',
                'title' => 'Activate CPT Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'ecolibsys_plugin',
                'section' => 'ecolib_admin_index',
                'args' => array(
                    'label_for' => 'cpt_manager',
                    'class' => 'ui-toggle'
                )
            ),
            array(
                'id' => 'taxonomy_manager',
                'title' => 'Activate Taxonomy Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'ecolibsys_plugin',
                'section' => 'ecolib_admin_index',
                'args' => array(
                    'label_for' => 'taxonomy_manager',
                    'class' => 'ui-toggle'
                )
            ),
            array(
                'id' => 'media_widget',
                'title' => 'Activate Media Widget',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'ecolibsys_plugin',
                'section' => 'ecolib_admin_index',
                'args' => array(
                    'label_for' => 'media_widget',
                    'class' => 'ui-toggle'
                )
            ),
            array(
                'id' => 'gallery_manager',
                'title' => 'Activate Gallery Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'ecolibsys_plugin',
                'section' => 'ecolib_admin_index',
                'args' => array(
                    'label_for' => 'gallery_manager',
                    'class' => 'ui-toggle'
                )
            ),
            array(
                'id' => 'testimonial_manager',
                'title' => 'Activate Testimonial Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'ecolibsys_plugin',
                'section' => 'ecolib_admin_index',
                'args' => array(
                    'label_for' => 'testimonial_manager',
                    'class' => 'ui-toggle'
                )
            ),
            array(
                'id' => 'templates_manager',
                'title' => 'Activate Templates Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'ecolibsys_plugin',
                'section' => 'ecolib_admin_index',
                'args' => array(
                    'label_for' => 'templates_manager',
                    'class' => 'ui-toggle'
                )
            ),
            array(
                'id' => 'login_manager',
                'title' => 'Activate Ajax Login/Signup',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'ecolibsys_plugin',
                'section' => 'ecolib_admin_index',
                'args' => array(
                    'label_for' => 'login_manager',
                    'class' => 'ui-toggle'
                )
            ),
            array(
                'id' => 'membership_manager',
                'title' => 'Activate Membership Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'ecolibsys_plugin',
                'section' => 'ecolib_admin_index',
                'args' => array(
                    'label_for' => 'membership_manager',
                    'class' => 'ui-toggle'
                )
            ),
            array(
                'id' => 'chat_manager',
                'title' => 'Activate Chat Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'ecolibsys_plugin',
                'section' => 'ecolib_admin_index',
                'args' => array(
                    'label_for' => 'chat_manager',
                    'class' => 'ui-toggle'
                )
            )
        );

        $this->settings->setFields($args);
    }
}
