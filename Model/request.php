<?php
require_once('message.php');
require_once 'Database.class.php';

$action = filter_input(INPUT_POST, 'action');
if ($action === 'cancel') {
    $action = 'cancel';
} else {
    $action = 'request';
}

switch ($action) {
    case 'cancel':
        include index.php;
        break;
    
    case 'request':
        
        // Set up email variables
        $to_address = $email;
        $to_name = $first_name;
        $from_address = ''; //TODO
        $from_name = ''; //TODO
        $subject = ''; //TODO
        $body = ''; //TODO
        $is_body_html = false;
        
        // Send email
        try {
            send_email($to_address, $to_name, 
                    $from_address, $from_name, 
                    $subject, $body, $is_body_html);
            // TODO: flat log
            include 'mail_success.php';
            
        } catch (Exception $ex) {
            $error = $ex->getMessage();
            // TODO: Error log
            include 'mail_fail.php';
        }        
        break;
}
?>