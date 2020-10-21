<?php

require_once "PHPMailer/PHPMailerAutoload.php";

$mail = new PHPMailer;

//Enable SMTP debugging. 
//$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.hostinger.in";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "info@poornimahackathon.tech";                 
$mail->Password = "eshop@786";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587 ;                                   

$mail->From = "info@poornimahackathon.tech";
$mail->FromName = "Hackathon";

$mail->addAddress("2016pietcenirmal072@poornima.org", "Nirmal sir");

$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<h1>Sir Ram Ram</h1>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}