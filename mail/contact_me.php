<?php
ini_set('display_errors', 1);

$fname = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['message'];
/**
 * This example shows making an SMTP connection with authentication.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require '../PHPMailer-master/PHPMailerAutoload.php';
require_once '../PHPMailer-master/class.phpmailer.php';
require_once '../PHPMailer-master/class.smtp.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "ByyIsrael@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "l'toelesharabim";
//Set who the message is to be sent from
$mail->setFrom('ByyIsrael@gmail.com', 'BYY Israel');
//Set an alternative reply-to address
$mail->addReplyTo('ByyIsrael@gmail.com', 'BYY Israel');
//Set who the message is to be sent to
$mail->addAddress('ByyIsrael@gmail.com', 'BYY Israel');
//Set the subject line
$mail->Subject = 'New question from BYY-HaKotel';

$mail->Body = "New question:\n\nName: {$fname}\nEmail: {$email}\nMessage: {$msg}";
//send the message, check for errors
if (!$mail->send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	echo "Message sent!";
}
