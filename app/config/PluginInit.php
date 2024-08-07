<?php

namespace Rus\ApFWP\Config;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


use Rus\ApFWP\Hooks\ActivationHandler;
use Rus\ApFWP\Hooks\NotificationHandler;
use Rus\ApFWP\Config\PluginAdmin;

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

        add_shortcode( 'applicant_form', function () {
            return ( new PluginClient() )->renderPortal();
        });

        new NotificationHandler();

        add_action( 'wp', [ PluginClient::class, 'applicant_form_submission_handle'] );

        new PluginAdmin();

    }

    public function activate_me() {
        register_activation_hook( APPLICANT_FORM_WP_PLUGIN_PATH, function () {
            ( new ActivationHandler )->handle();
        });
    }
}