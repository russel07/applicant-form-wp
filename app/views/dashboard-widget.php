<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    $results = Rus\ApFWP\Config\PluginAdmin::load_data( 'submission_date', 'DESC', '', 5);

    if ($results): ?>
    <ol>
        <?php foreach ($results as $key=> $row): ?>
            <li>
                <strong><?php echo esc_html($row->first_name . ' ' . $row->last_name); ?></strong> ( <?php echo esc_html($row->email_address); ?> )<br>
                <?php echo esc_html($row->submission_date); ?> <a href="<?php echo esc_url($row->cv); ?>" target="_blank">Download CV</a>
            </li>
        <?php endforeach; ?>
    </ol>
    <?php else: ?>
        <p>No submissions found.</p>
    <?php endif;
