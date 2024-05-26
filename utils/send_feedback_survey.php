<?php
function send_feedback_survey($email, $ticket_id) {

    $rating_link = "http://localhost/ENSAM-Helpdesk/rateus.php?ticket_id=" . urlencode($ticket_id) ;


    $subject = "Nous aimerions connaître votre avis - ENSAM Helpdesk";
    $message = "Bonjour,\n\n";
    $message .= "Merci d'avoir contacté ENSAM Helpdesk. Nous sommes heureux de vous informer que votre ticket (ID: $ticket_id) a été résolu avec succès.\n\n";
    $message .= "Nous accordons une grande importance à votre avis et nous aimerions connaître votre expérience avec notre service. Veuillez cliquer sur le lien ci-dessous pour nous faire part de vos commentaires :\n";
    $message .= $rating_link . "\n\n";
    $message .= "Vos retours nous aident à nous améliorer et à mieux vous servir.\n\n";
    $message .= "Cordialement,\n";
    $message .= "ENSAM Helpdesk";

    $headers = "From: y9032910@gmail.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    
    return mail($email, $subject, $message, $headers);
   
}
