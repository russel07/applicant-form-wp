<?php

namespace Rus\ApFWP\Config;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

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

    public static function load_data( $orderby, $order ) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'applicant_submissions';

        // Handle deletion
        if ( isset( $_GET['delete'] ) ) {
            $delete_id = intval( $_GET['delete'] );
            $table_name = $wpdb->prefix . 'applicant_submissions';

            $record = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM $table_name WHERE id = %d", $delete_id ) );

            if ($record) {
                // ID exists, proceed with deletion
                $wpdb->delete( $table_name, array( 'id' => $delete_id ) );
                set_transient( 'applicant_submission_deleted', 'Record deleted successfully!', 30 );
            }
        }

        $query = "SELECT * FROM $table_name ORDER BY $orderby $order";

        return $wpdb->get_results($query);

    }

}