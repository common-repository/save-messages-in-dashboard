<?php

// action hook
add_action('init', 'smid_shortcode_for_form');

require_once ('data-processing.php');

function smid_shortcode_for_form()
{
    add_shortcode('message_form', 'smid_get_form_html');
}

// Callback Function
function smid_get_form_html()
{
    ?>

    <div id="error"></div>
    <form method='post' id='form' class='kuality-form'>

        <label>Name</label>
        <input type="text" id="name" name='name'  placeholder='Enter Your Name'>

        <label>Subject</label>
        <input type="text" id="subject" name='subject'    placeholder='Enter Your Subject'>

        <label>Email</label>
        <input type="email" id="email" name='email'    placeholder='Enter Your Email'>

        <label>Message</label>
        <textarea type="text"  id="message" name='message'  placeholder='Enter Your Message'></textarea>

        <label>Verify Yourself</label>
        <input type="text" id="verification" name='verify'    placeholder="Enter contact-form in this field">

        <input type="submit" id="send"  name='send' style='width: 100%;' value="Send Message">

    </form>

    <?php
}
?>