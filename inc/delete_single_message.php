<?php
   global $wpdb;
   $table_name = $wpdb->prefix."messages";

   $id = sanitize_text_field( $_GET['id'] );

  
   $removeMessage = "DELETE FROM {$table_name} WHERE id={$id}";
   if($wpdb->query($removeMessage)) {
      $home_url=home_url();
      header("Location: {$home_url}/wp-admin/admin.php?page=received_messages");
   }
?>