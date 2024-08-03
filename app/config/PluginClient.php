<?php

namespace Rus\ApFWP\Config;

class PluginClient
{
    public function renderPortal(){
        $this->enqueueScripts();

        ob_start();

        require_once APPLICANT_FORM_WP_PLUGIN_DIR . '/app/views/shortcode.php';

        return ob_get_clean();
    }

    public function enqueueScripts(){
        wp_enqueue_style('apfwp_css', APPLICANT_FORM_WP_PLUGIN_URL.'assets/css/style.css');
    }
}