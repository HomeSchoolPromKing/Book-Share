<?php
require_once 'Mail.php';

function send_email($to_address, $to_name, $from_address, $from_name, 
        $subject, $body, $is_body_html = false) {

    $mail = new PHPMailer();
    // need to match SMTP Host, username and pw.    
    $mail->isSMTP();                             // Set mailer to use SMTP
    $mail->Host = '';              // TODO
    $mail->SMTPSecure = 'tls';                   // Set encryption type
    $mail->Port = 587;                           // Set TCP port-NEED TO CONFIRM
    $mail->SMTPAuth = true;                      // Enable SMTP authentication
    $mail->Username = ''; // TODO
    $mail->Password = '';           // TODO
    
    // Set From address, To address, subject, and body
    $mail->setFrom($from_address, $from_name);
    $mail->addAddress($to_address, $to_name);
    $mail->Subject = $subject;
    $mail->Body = $body;                  // Body with HTML
    $mail->AltBody = strip_tags($body);   // Body without HTML
    if ($is_body_html) {
        $mail->isHTML(true);              // Enable HTML
    }
    
    if(!$mail->send()) {
        throw new Exception('Error sending email: ' .
                            htmlspecialchars($mail->ErrorInfo) );        
    }    
}
?>