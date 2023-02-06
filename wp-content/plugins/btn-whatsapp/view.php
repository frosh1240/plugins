<?php

function wp_whatsapp_settings_page() {
    // Check if user is allowed to access the page
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }
    
    // Handle form submissions
    if (isset($_POST['wp_whatsapp_submit'])) {
        // Validate and sanitize form data
        $phone_number = sanitize_text_field($_POST['wp_whatsapp_phone_number']);
        
        // Update the option in the database
        update_option('wp_whatsapp_phone_number', $phone_number);
        
        // Show a success message
        ?>
        <div class="notice notice-success is-dismissible">
            <p><?php _e('Settings saved successfully.', 'wp-whatsapp'); ?></p>
        </div>
        <?php
    }
    
    // Load the saved phone number from the database
    $phone_number = get_option('wp_whatsapp_phone_number', '');
    ?>
    <div class="wrap">
        <h1><?php _e('WhatsApp Settings', 'wp-whatsapp'); ?></h1>
        <form method="post">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="wp_whatsapp_phone_number"><?php _e('Phone Number', 'wp-whatsapp'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="wp_whatsapp_phone_number" name="wp_whatsapp_phone_number" value="<?php echo esc_attr($phone_number); ?>" class="regular-text">
                            <p class="description"><?php _e('Enter your WhatsApp phone number including the country code (e.g. +1 555 555 555).', 'wp-whatsapp'); ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="submit">
                <input type="submit" name="wp_whatsapp_submit" id="wp_whatsapp_submit" class="button button-primary" value="<?php _e('Save Changes', 'wp-whatsapp'); ?>">
            </p>
        </form>
    </div>
    <?php
}

function wp_whatsapp_add_settings_page() {
    add_options_page(
        __('WhatsApp Settings', 'wp-whatsapp'),
        __('WhatsApp', 'wp-whatsapp'),
        'manage_options',
        'wp-whatsapp-settings',
        'wp_whatsapp_settings_page'
    );
}
add_action('admin_menu', 'wp_whatsapp_add_settings_page');

