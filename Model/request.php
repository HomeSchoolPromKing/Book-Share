<?php
require_once 'Model/Database.class.php';

$to_name; //TODO first name from db
$to_email; //TODO email from db
$message = filter_input(INPUT_POST, $message);
$email_from; //TODO website email address
$requester_email; //TODO email from db
$subject = filter_input(INPUT_POST, $subject);

$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $requester_email \r\n";
if (mail($to_email, $subject, $message, $headers)) {
    //TODO flat file log
    include 'email_sent.php';
} else {
    // TODO error log?
    include 'email_fail.php';
}

?>