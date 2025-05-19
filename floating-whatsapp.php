<?php
/*
Plugin Name: Floating WhatsApp Button
Plugin URI: https://www.eartisan.co.uk
Description: Adds a floating WhatsApp button on the page, allowing the admin to add a WhatsApp number, custom message, and choose position through the settings. Based on the Floating WhatsApp plugin by Yoki Rahmada.
Version: 1.2
Author: Pradeep Maheepala
Author URI: https://www.eartisan.co.uk
License: GPL2
*/

// Adding a menu to the dashboard
function fwa_add_admin_menu() {
    add_options_page(
        'Floating WhatsApp Settings',  
        'Floating WhatsApp',           
        'manage_options',              
        'fwa_settings',               
        'fwa_settings_page'            
    );
}
add_action('admin_menu', 'fwa_add_admin_menu');


function fwa_settings_page() {
    ?>
    <div class="wrap">
        <h1>Floating WhatsApp Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('fwa_settings_group');  
            do_settings_sections('fwa_settings');  
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">WhatsApp Number</th>
                    <td><input type="text" name="fwa_whatsapp_number" value="<?php echo esc_attr(get_option('fwa_whatsapp_number')); ?>" style="width: 250px;" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Custom WhatsApp Message</th>
                    <td><input type="text" name="fwa_whatsapp_message" value="<?php echo esc_attr(get_option('fwa_whatsapp_message')); ?>" style="width: 250px;" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Button Position</th>
                    <td>
                        <select name="fwa_button_position" style="width: 250px;">
                            <option value="right" <?php selected(get_option('fwa_button_position', 'right'), 'right'); ?>>Bottom Right</option>
                            <option value="left" <?php selected(get_option('fwa_button_position', 'right'), 'left'); ?>>Bottom Left</option>
                        </select>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Registering settings
function fwa_register_settings() {
    register_setting('fwa_settings_group', 'fwa_whatsapp_number');  
    register_setting('fwa_settings_group', 'fwa_whatsapp_message');
    register_setting('fwa_settings_group', 'fwa_button_position');
}
add_action('admin_init', 'fwa_register_settings');


function fwa_display_whatsapp_button() {
    
    $whatsapp_number = get_option('fwa_whatsapp_number');
    $whatsapp_message = get_option('fwa_whatsapp_message');
    $button_position = get_option('fwa_button_position', 'right'); // Default to right if not set

    if ($whatsapp_number) {
        
        $encoded_message = urlencode($whatsapp_message);

        // Add position class to the button
        $position_class = ($button_position === 'left') ? 'fwa-position-left' : 'fwa-position-right';
        
        echo '<a href="https://wa.me/' . esc_attr($whatsapp_number) . '?text=' . $encoded_message . '" target="_blank" class="fwa-floating-btn ' . $position_class . '">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" />
              </a>';
        
        echo '
        <style>
            .fwa-floating-btn {
                position: fixed;
                bottom: 30px;
                border-radius: 50%;
                padding: 15px;
                background-color: #25D366;
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
                z-index: 9999;
                transition: all 0.3s ease;
            }
            .fwa-position-right {
                right: 30px;
            }
            .fwa-position-left {
                left: 30px;
            }
            .fwa-floating-btn img {
                width: 30px;
                height: 30px;
                border-radius: 50%;
            }
            .fwa-floating-btn:hover {
                transform: scale(1.1);
                box-shadow: 0 8px 18px rgba(0, 0, 0, 0.3);
            }
        </style>';
    }
}
add_action('wp_footer', 'fwa_display_whatsapp_button');  
?>