<?php

namespace Rus\ApFWP\Config;

class PluginAdmin
{
    public function __construct() {
        add_action('admin_menu', [$this, 'applicant_form_admin_menu']);
    }

    public function applicant_form_admin_menu() {
        add_menu_page(
            'Applicant Submissions',
            'Applicant Submissions',
            'manage_options',
            'applicant-submissions',
            array(&$this, 'applicant_form_admin_page'),
            'dashicons-welcome-widgets-menus',
            20
        );
    }

    public function enqueueScripts(){
        wp_enqueue_style( 'apfwp_css', APPLICANT_FORM_WP_PLUGIN_URL.'assets/css/style.css' );
    }

    public function applicant_form_admin_page() {
        $this->enqueueScripts();

        require_once APPLICANT_FORM_WP_PLUGIN_DIR . '/app/views/applicant-list.php';

    }

}