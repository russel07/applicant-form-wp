<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    $results = Rus\ApFWP\Config\PluginAdmin::load_data();

    $results = is_array( $results ) && ! empty( $results ) ? $results : [];
    $message = get_transient( "applicant_submission_deleted" );

    if ( $message ):
        delete_transient( "applicant_submission_deleted" );
?>
<div class="notice notice-success is-dismissible">
    <p><?php echo esc_html( $message );?></p>
</div>
<?php endif;?>
<div class="wrap">
    <h1 class="wp-heading-inline">Applicant Submissions</h1>

    <table class="wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Present Address</th>
                <th scope="col">Email Address</th>
                <th scope="col">Mobile No</th>
                <th scope="col">Post Name</th>
                <th scope="col">CV</th>
                <th scope="col">Submission Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php if ($results): ?>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo esc_html($row->first_name); ?></td>
                        <td><?php echo esc_html($row->last_name); ?></td>
                        <td><?php echo esc_html($row->present_address); ?></td>
                        <td><?php echo esc_html($row->email_address); ?></td>
                        <td><?php echo esc_html($row->mobile_no); ?></td>
                        <td><?php echo esc_html($row->post_name); ?></td>
                        <td><a href="<?php echo esc_url($row->cv); ?>" target="_blank">Download</a></td>
                        <td><?php echo esc_html($row->submission_date); ?></td>
                        <td><a href="?page=applicant-submissions&delete=<?php echo intval($row->id); ?>" onclick="return confirm('Are you sure you want to delete this submission?');">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">No submissions found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>