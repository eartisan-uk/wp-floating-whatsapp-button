# Floating WhatsApp Button

The **Floating WhatsApp Button** is a WordPress plugin that adds a floating WhatsApp button to your website. This button allows users to quickly send a message to a predefined WhatsApp number with a custom message.

## Features

- Adds a floating WhatsApp button to the bottom-right corner of your website.
- Allows the admin to configure the WhatsApp number and a custom message via the WordPress admin dashboard.
- Provides a sleek and responsive design for the button.

## Installation

1. Download the plugin files and place them in the `wp-content/plugins/floating-whatsapp-button` directory of your WordPress installation.
2. Activate the plugin through the WordPress admin dashboard by navigating to **Plugins** > **Installed Plugins** and clicking **Activate** under "Floating WhatsApp Button".

## Configuration

1. After activating the plugin, go to **Settings** > **Floating WhatsApp** in the WordPress admin dashboard.
2. Configure the following settings:
   - **WhatsApp Number**: Enter the WhatsApp number (in international format, without the `+` or `00` prefix).
   - **Custom WhatsApp Message**: Enter the default message that will be pre-filled when users click the button.
3. Click **Save Changes** to apply your settings.

## Usage

Once configured, the floating WhatsApp button will appear on all pages of your website. When clicked, it will open WhatsApp (or WhatsApp Web) with the configured number and message.

## Code Overview

### Admin Settings

The plugin adds a settings page to the WordPress admin dashboard where the admin can configure the WhatsApp number and custom message. This is implemented in the `fwa_add_admin_menu` and `fwa_settings_page` functions.

### Displaying the Button

The button is displayed on the front end using the `fwa_display_whatsapp_button` function, which:
- Retrieves the configured WhatsApp number and message.
- Generates a clickable button with a link to `https://wa.me/` including the number and message.
- Includes inline CSS for styling the button.

### Hooks Used

- `admin_menu`: Adds the settings page to the WordPress admin dashboard.
- `admin_init`: Registers the settings for the plugin.
- `wp_footer`: Outputs the floating WhatsApp button in the footer of the website.

## Styling

The button is styled with inline CSS to ensure it is visually appealing and responsive. The styles include:
- A circular green button with a WhatsApp logo.
- Hover effects for scaling and shadow enhancement.

## Example

Here’s an example of how the button will look on your website:

![Floating WhatsApp Button](https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg)

## License

This plugin is licensed under the GPL2 license. See the `LICENSE` file for more details.

## Author

Developed by [Pradeep Maheepala](https://www.eartisan.co.uk).

## Changelog

### Version 1.1
- Initial release.