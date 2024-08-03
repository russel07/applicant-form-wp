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
        wp_enqueue_style( 'apfwp_css', APPLICANT_FORM_WP_PLUGIN_URL.'assets/css/style.css' );
    }

    public static function applicant_form_submission_handle() {
        if ( isset( $_POST['applicant_submit'] ) ) {
            global $wpdb;
    
            // Sanitize form inputs
            $first_name         = sanitize_text_field( $_POST['first_name'] );
            $last_name          = sanitize_text_field( $_POST['last_name'] );
            $present_address    = sanitize_textarea_field( $_POST['present_address'] );
            $email_address      = sanitize_email( $_POST['email_address'] );
            $mobile_no          = sanitize_text_field( $_POST['mobile_no'] );
            $post_name          = sanitize_text_field( $_POST['post_name'] );
            
            $cv_url = "";

            // Handle file upload
            if ( isset( $_FILES['cv'] ) && !$_FILES['cv']['error'] ) {
                $upload_dir = wp_upload_dir();
                $uploaded_file = $_FILES['cv'];
                $upload_path = $upload_dir['basedir'] . '/' . basename( $uploaded_file['name'] );
                
                if ( move_uploaded_file( $uploaded_file['tmp_name'], $upload_path ) ) {
                    $cv_url = $upload_dir['baseurl'] . '/' . basename( $uploaded_file['name'] );
                } else {
                    // Handle file upload error
                    return;
                }
            }

            $data = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'present_address' => $present_address,
                'email_address' => $email_address,
                'mobile_no' => $mobile_no,
                'post_name' => $post_name,
                'cv' => $cv_url
            ];

            // Filter data before storing
            $filtered_data = apply_filters( 'apfwp/before_store_application_data', $data );
    
            // Insert data into database
            $table_name = $wpdb->prefix . 'applicant_submissions';
            $wpdb->insert( $table_name, $filtered_data );

            // Get the inserted data ID
            $inserted_id = $wpdb->insert_id;
            
            // Fetch the inserted data
            $stored_data = $wpdb->get_row( $wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $inserted_id ), ARRAY_A );

            // Filter data after storing
            $stored_data = apply_filters( 'apfwp/after_store_application_data', $stored_data );

            // Trigger action hook to send email
            do_action('apfwp/action_after_store_application_data', $stored_data);

        }
    }
}