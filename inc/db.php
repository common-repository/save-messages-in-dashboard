<?php

// file security
if(!defined('ABSPATH'))
{
    exit;
}


// this hook executes when everything is initialized
add_action('init', 'smid_create_table');
function smid_create_table() {

    // variables for table
    global $wpdb;
    $table_name = $wpdb->prefix . 'messages';
    $wpdb_collate = $wpdb->collate;

    // creating table
    $sql =
        "CREATE TABLE {$table_name} (
        id mediumint(8) unsigned NOT NULL auto_increment ,
        name varchar(255) ,
        subject varchar(255) ,
        email varchar(255) ,
        message varchar(2048) ,
        date_added timestamp,
        PRIMARY KEY  (id),
        KEY name (name)
        )
        COLLATE {$wpdb_collate}";

        $wpdb->query($sql);

    }


    // when plugin deactivates 
    register_deactivation_hook(SMID_PLUGIN_FILE, function() {
        global $wpdb;
        $prefix = $wpdb->prefix;
        $table_name = $wpdb->prefix . 'messages';
        $sql = "DROP TABLE {$table_name}";
        $wpdb->query($sql);
    });
?>