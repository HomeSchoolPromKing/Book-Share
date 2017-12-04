<?php
require_once 'Model/Database.class.php';
require_once 'log_to_file.php';

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
    // UPDATE: Please use this to log the results for both fails and successes, ensuring that usernames of sender/receiver and List Item ID are incorporated (KaF 12/4)

    // Create log message with data and username
    // $message = 'Mail sent to ' . $to_name;
			
    // Call function to log results
    // logToFile('requestResultsFile.txt', $message);
		   
    
    include 'email_sent.php';
} else {
    // TODO error log?
        // Create log message with data and username
    // $message = 'Mail from ' . $to_name . 'failed to send.';
			
    // Call function to log results - if desired, change this to a separate error file or use built-in error_log() function of PHP
    // logToFile('requestResultsFile.txt', $message);
    include 'email_fail.php';
}

?>