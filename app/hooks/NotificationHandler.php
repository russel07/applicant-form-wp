<?php

namespace Rus\ApFWP\Hooks;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class NotificationHandler
{
    public function __construct() {
        add_action( 'apfwp/action_after_store_application_data', [ $this, 'send_form_submission_email'] );
    }

    public function send_form_submission_email( $form_data ) {
        if ( ! isset( $form_data['email_address'] ) ) {
            return;
        }

        $to      = sanitize_email( $form_data['email_address'] );
        $subject = 'Application Received';
        $body    = 'Thank you for your application. We have received your details and will get back to you soon.';
        $headers = array('Content-Type: text/html; charset=UTF-8');

        wp_mail($to, $subject, $body, $headers);
    }
}