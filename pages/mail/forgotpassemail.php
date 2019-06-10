<?php

error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$userid=mysqli_query($dbConnected,"SELECT id from data where email='".$email."'");
$catchuserid=mysqli_fetch_array($userid);
$username=mysqli_query($dbConnected,"SELECT firstname,lastname from teacherinfopersonal where id='".$catchuserid['id']."'");
$catchusername=mysqli_fetch_array($username);



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
$mail->Subject = 'Reset-Password link for your Tutors House account';
$mail->Body    = "Hello ".$catchusername['firstname']." ".$catchusername['lastname'].",<br><br>
                Your request for password change has been received. Click the link below to change your password:
                <br><br>
                www.tutors-house.com/pages/login/resetpass.php?token=".$string."
                <br><br>   
                Note: LINK WILL EXPIRE AFTER SINGLE USE.
                <br><br><br>
                For any queries, contact us on:
                <br><br>
                Email:&nbsp;help.tutorshouse@gmail.com
                <br><br>
                Phone:&nbsp;(+92) 316 2323295

                <br><br><br>
                ";
$mail->addAddress($email);


$mail->Send();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>