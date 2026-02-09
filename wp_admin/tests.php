<?php
include 'email/mailer.php';
$email = "gornezjonard@gmail.com";
$subject = "approval";
$message = "La pLanta";

$sent = sendEmail($email, $subject, $message);
if($sent){
    echo "Email sent successfully!";
}else{
    echo "Failed to send email!";
}
?>
