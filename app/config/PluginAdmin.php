<?php

namespace Rus\ApFWP\Config;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class PluginAdmin
{
    public function __construct() {
        add_action('admin_menu', [$this, 'applicant_form_admin_menu']);
        add_action('wp_dashboard_setup', [$this, 'apfwp_register_dashboard_widget']);
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

    public function apfwp_register_dashboard_widget() {
        wp_add_dashboard_widget(
            'apfwp_dashboard_widget',
            'Latest Applicant Submissions',
            array(&$this, 'apfwp_dashboard_widget_display')
        );
    }

    public function enqueueScripts(){
        wp_enqueue_style( 'apfwp_css', APPLICANT_FORM_WP_PLUGIN_URL.'assets/css/style.css' );
    }

    public function applicant_form_admin_page() {
        $this->enqueueScripts();

        require_once APPLICANT_FORM_WP_PLUGIN_DIR . '/app/views/applicant-list.php';

    }

    public function apfwp_dashboard_widget_display() {
        require_once APPLICANT_FORM_WP_PLUGIN_DIR . '/app/views/dashboard-widget.php';
    }

    public static function load_data( $orderby, $order, $search_query = '', $limit = '') {
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

        if( $search_query ) {
            $query = $wpdb->prepare( "SELECT * FROM $table_name WHERE first_name LIKE %s OR last_name LIKE %s OR email_address LIKE %s",
                '%' . $wpdb->esc_like( $search_query ) . '%',
                '%' . $wpdb->esc_like( $search_query ) . '%',
                '%' . $wpdb->esc_like( $search_query ) . '%'
            );
        } else {
            $query = "SELECT * FROM $table_name ORDER BY $orderby $order";

            if( $limit ) {
                $query .= " LIMIT $limit";
            }
        }

        return $wpdb->get_results($query);

    }

}