<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Save Messages In Dashboard
 * Plugin URI:        
 * Description:       Contact form in which you can access data from wp dashboard
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Khurraim 
 * Author URI:        https://example.com
 * Text Domain:       save-messages-in-dashboard
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */



// Prevent Direct Access
if (!defined('ABSPATH')) {
    exit;
}

// constants
define('SMID_PLUGIN_FILE', __FILE__);

// Loads Shortcodes file
require plugin_dir_path(__FILE__).'inc/kuality-shortcode.php';

// Loads Admin Menu 
require plugin_dir_path(__FILE__).'inc/admin-menu.php';

// Loads Database File and Activation / Deactivation Methods
require plugin_dir_path(__FILE__).'inc/db.php';

require plugin_dir_path(__FILE__).'inc/delete_single_message.php';

/* Custom script with no dependencies, enqueued in the header */
add_action('wp_enqueue_scripts', 'smid_add_scripts');
function smid_add_scripts() {
    wp_enqueue_script('form-validation',plugin_dir_url( __FILE__ ). "js/form-validation.js", true);
}

function smid_add_admin_css() {
    wp_enqueue_style('admin',plugin_dir_url( __FILE__ ). "css/style.css", true);
}
add_action('admin_print_styles', 'smid_add_admin_css');

function smid_form_css() {
    wp_enqueue_style('form',plugin_dir_url( __FILE__ ). "css/form.css", true);
}

add_action('init', 'smid_form_css');