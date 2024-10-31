<?php

// file security
if(!defined('ABSPATH'))
{
    exit;
}


/**
 * Register a custom menu page.
 */
function smid_register_my_custom_menu_page() {
    add_menu_page(
        'Received Messages',    // Displayed Name
        'Received Messages',    // Registered Name
        'manage_options',       // Capability
        'received_messages',   // page slug
        'smid_callback_func',        // callback
        $icon_url='dashicons-testimonial',
        $postion = 2

    );
}

// Callback Function
function smid_callback_func() {
    include plugin_dir_path(__FILE__).'menu_page.php';
}

add_action( 'admin_menu', 'smid_register_my_custom_menu_page' );
?>