<?php
/*
Plugin Name: Custom Form Plugin
Description: A custom form plugin for WordPress.
Version: 1.0
Author: Your Name
*/


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';
require_once plugin_dir_path(__FILE__) . 'config/config.php';

use CustomFormPlugin\Controller\FormController;

function custom_form_enqueue_styles() {
    wp_enqueue_style('custom-form-styles', plugin_dir_url(__FILE__) . 'assets/css/styles.css');
}
add_action('wp_enqueue_scripts', 'custom_form_enqueue_styles');

function custom_form_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . 'view/form.php';
    return ob_get_clean();
}
add_shortcode('custom_form', 'custom_form_shortcode');

add_action('init', [new FormController(), 'handleFormSubmission']);
