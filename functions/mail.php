<?php 
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
include('../phpmailer/src/Exception.php');
/* The main PHPMailer class. */
include('../phpmailer/src/PHPMailer.php');

/* SMTP class, needed if you want to use SMTP. */
include('../phpmailer/src/SMTP.php');

//Create a new PHPMailer instance
$mail = new PHPMailer(TRUE);

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = ""; //isi sama email lu

//Password to use for SMTP authentication
$mail->Password = "bfkpktkqfhaqvzjv";

//Set who the message is to be sent from
$mail->setFrom('', 'Developer'); //yang kosong isi sama email lu

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($_SESSION['email'], $_SESSION['name']);

$mail->isHTML(false);                                  
// Set email format to HTML
$mail->Subject = 'Verifying your account ';
$mail->Body = 'Hello '.$_SESSION['name'].', please this click this following link in order to verify your account http://localhost:8080/regist/functions/verify.php.';

    if(!$mail->send()) {
        echo 'Message could not be sent. ';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }else{
       header('location:../index.php');
    }
?>