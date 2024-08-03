<?php

namespace Rus\ApFWP\Config;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


use Rus\ApFWP\Hooks\ActivationHandler;

class PluginInit {
    private static $instance;

    public static function get_instance() {

        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
            self::$instance = new PluginInit();
        }

        return self::$instance;

    }

    public function __construct() {

        $this->activate_me();

        add_shortcode('applicant_form', function ($args) {
            return (new PluginClient())->renderPortal();
        });

    }

    public function activate_me() {
        register_activation_hook( APPLICANT_FORM_WP_PLUGIN_PATH, function () {
            ( new ActivationHandler )->handle();
        });
    }
}