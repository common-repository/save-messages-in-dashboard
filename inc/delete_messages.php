<?php
if(isset( $_POST['delete']  )) {
        
    // table variables
    global $wpdb;
    $table_name = $wpdb->prefix."messages";

    $truncateQuery = "TRUNCATE TABLE {$table_name}";
    $wpdb->query($truncateQuery);
}
?>
