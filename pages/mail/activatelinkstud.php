<?php
error_reporting(E_ALL);

include '../database/tutordb.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);
try{
$mail->isSMTP();
$mail->SMTPAuth = true; 
$mail->SMTPSecure='tls';
$mail->Host='smtp.gmail.com';
$mail->Port = 587;
$mail->isHTML(true);
$mail->Username='help.tutorshouse@gmail.com';
$mail->Password='masi4201';
$mail->SetFrom('help.tutorshouse@gmail.com');
$mail->Subject = 'Account Activation ID for Tutors House website';
$mail->Body    = "Dear ".$firstname.",<br><br>
                Thank you for registering with us. We have received your registration. Thank you!
                <br><br>
                Please login with following ID using the given link:
                <br><br>
                ID:  <strong>".$id."</strong> 
                <br><br>
                Login here: www.tutors-house.com/pages/login/account.php?setaccount=1
                <br><br>
                Note: It is a One-Time generated ID, only used once for email verification and account activation only.
                <br><br><br>
                <strong>Tutors House Team</strong> <br>
                Twitter: twitter.com/tutors_house <br>
                Facebook: www.facebook.com/TUTORS.HOUSE.FOR.STUDENTS <br>
                Email: mail@tutors-house.com <br>
                Phone:&nbsp;(+92) 3162323295
                <br><br><br>
                ";
$mail->addAddress($email);


$mail->Send();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>