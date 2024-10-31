<?php

if(isset($_POST['send'])) {

    // table variables
    global $wpdb;
    $table_name = $wpdb->prefix."messages";

    $name = sanitize_text_field( $_POST['name'] );
    $email = sanitize_email( $_POST['email'] );
    $subject = sanitize_text_field( $_POST['subject'] );
    $message = sanitize_text_field( $_POST['message'] );
    

    // putting 1 dummy record in table 
    $data = array(
        'name' => $name,
        'subject' => $subject,
        'email' => $email,
        'message' => $message,
        'date_added' => current_time('mysql'),
    ); 

    $wpdb->insert($table_name, $data);

    	
    function smid_redirect_to_home() {
        
          wp_redirect(home_url());
          exit();
        
    }
    add_action('template_redirect', 'smid_redirect_to_home');
    

}
?>