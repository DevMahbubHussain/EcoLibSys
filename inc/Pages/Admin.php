<?php

/**
 * @package  EcoLibSys
 */

namespace EcoLibSys\Pages;

use \EcoLibSys\Base\BaseController;
use \EcoLibSys\Api\SettingsApi;
use \EcoLibSys\Api\Callbacks\AdminCallback;

class Admin extends BaseController
{
    public $settings;
    public $pages = array();
    public $subpages = array();
    public $callbacks;


    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallback();
        $this->setPages();
        $this->setSubpages();
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
}
