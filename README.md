# Custom Form Plugin

Custom Form Plugin is a WordPress plugin that allows you to create a custom contact form and integrate with HubSpot CRM for contact creation.

## Installation

1. Upload the `custom-form-plugin` directory to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.

## Features

- Create a custom contact form with fields such as First Name, Last Name, Subject, Message, and Email.
- Validate email input and handle form submission.
- Send email notifications using WP Mail SMTP.
- Create contacts in HubSpot CRM using their API.
- Log messages to a text file for debugging purposes.

## Configuration

### WP Mail SMTP Integration

Make sure WP Mail SMTP plugin is installed and configured to ensure reliable email delivery. Configure your SMTP settings under WordPress Dashboard -> WP Mail SMTP -> Settings.

### HubSpot API Integration

1. Obtain your HubSpot API key from HubSpot Developer account.
2. Define your HubSpot API key in `config/config.php` file:

   ```php
   define('HUBSPOT_API_KEY', 'your_hubspot_api_key_here');
