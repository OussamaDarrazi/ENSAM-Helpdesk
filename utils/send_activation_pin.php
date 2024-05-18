<?php
function send_activation_pin($email){
    // Generate a random 4-digit PIN
    $pin = mt_rand(1000, 9999);

    // Verification link with the generated PIN and email
    $verification_link = "http://localhost/ENSAM-Helpdesk/confirm.php?email=" . urlencode($email);

    // Email subject and body
    $subject = "Verification - ENSAM Helpdesk";
    $message = "Bienvenue à ENSAM Helpdesk,\n\n";
    $message .= "Votre pin de verification est: " . $pin . "\n";
    $message .= "Veuillez cliquer sur le lien suivant pour vérifier votre adresse email :\n";
    $message .= $verification_link . "\n\n";
    $message .= "Cordialement,\n";
    $message .= "ENSAM Helpdesk";

    // Email headers
    $headers = "From: y9032910@gmail.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    if(mail($email, $subject, $message, $headers)){
        return $pin; // Email sent successfully
    } else {
        return false; // Failed to send email
    }
}
