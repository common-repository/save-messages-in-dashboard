// script runs after dom is loaded
document.addEventListener('DOMContentLoaded', function() {

    // Form Fields
    const name = document.getElementById('name');
    const subject = document.getElementById('subject');
    const email = document.getElementById('email');
    const message = document.getElementById('message');
    const errorElement = document.getElementById('error');

    // Verification field
    const verify = document.getElementById('verification');

    // script should run after form element is found
    if(document.getElementById('form') !== null) {

        // Whole Form
        const form = document.getElementById('form');

        // Form Processing
        form.addEventListener('submit', (e) => {

            let messages = [];

            // Name is empty
            if (name.value.length == '' || name.value == null) {
                messages.push('Name is required');
            }
            
            // if user types name in the name field
            if (name.value == 'name') {
                messages.push('Name cannot be name');
            }

            // if a subject is empty
            if (subject.value.length == '' || subject.value == null) {
                messages.push('Subject cannot be empty');
            }

            // user type subject in the subject field
            if (subject.value == 'subject') {
                messages.push('Subject cannot be subject');
            }

            // if a email is empty
            if(email.value.length == '' || email.value == null) {
                messages.push("Email cannot be empty");
            }

            // if a message is empty
            if(message.value.length == '' || message.value == null) {
                messages.push('Message cannot be empty');
            }

            if(message.value.length > 250) {
                messages.push('Message length cannot exceed 250 characters');
            }


            // Verification (Spam Protection)
            if (verify.value != 'contact-form') {
                messages.push('Please Renter the value');
            }

            // if verification field is empty
            if (verify.value.length == '' | verify.value == null) {
                messages.push('Verification field is empty');
            }

            // display error
            if(messages.length > 0) {
                e.preventDefault();
                errorElement.innerText = messages.join(', ');
            }


            });
    }
    
    console.log("Kuality Contact Form");

});
