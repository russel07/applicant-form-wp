# Applicant Form WP Plugin

A WordPress plugin that allows applicants to submit their information and CV through a form. Admins can view submissions in the admin panel and a dashboard widget shows the latest 5 submissions.

## Features

- **Shortcode:** `[applicant_form]` to display the applicant submission form.
- **Form Fields:** First Name, Last Name, Email Address, Mobile Number, Present Address, Post Name and CV upload.
- **Admin Page:** View a list of submitted applications sort by first name, last name, email address and submission date. Also have option to search and delete functionality
- **Dashboard Widget:** Display the latest 5 submissions.

## Installation

1. **Download the Plugin:**
   - Download the latest release from the [releases page](https://github.com/russel07/applicant-form-wp).

2. **Upload the Plugin:**
   - Go to your WordPress admin panel.
   - Navigate to `Plugins > Add New Plugin`.
   - Click on `Upload Plugin` and select the downloaded zip file.
   - Click `Install Now` and then `Activate`.

3. **Activate the Plugin:**
   - After installation, activate the plugin from the `Plugins` menu.

## Usage

1. **Add the Form to a Page or Post:**
   - Use the shortcode `[applicant_form]` in any post or page to display the applicant submission form.

2. **View Submissions:**
   - Go to `Admin Dashboard > Applicant Submissions` to view the list of submitted applications.

3. **Dashboard Widget:**
   - View the latest 5 submissions on the WordPress dashboard.

## Shortcode

- `[applicant_form]`: Displays the applicant submission form.


## Development

### Prerequisites

- WordPress 5.2+
- PHP 7.2+

### Installation for Development

1. Clone the repository under plugins directory:
    ```sh
    git clone git@github.com:russel07/applicant-form-wp.git
    ```
2. Activate the plugin from the WordPress admin panel.