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
$mail->Subject = "New Tutor Registration - ".$catchuserid['id']."";
$mail->Body    = "
                    <h2>New Tutor Registration</h2>
                    
                    Name:  ".$catchusername['firstname']." ".$catchusername['lastname']."<br><br>
                    Email: ".$email."<br><br>
                    ID: ".$catchuserid['id']."<br><br>
                
                Login here: https://www.tutors-house.com/pages/ad/adlog.php?setadlog=1
                <br><br>  <br><br>

                Tutors House Team <br>
                Phone:&nbsp;(+92) 3162323295

                
                <br><br><br>
                ";
$mail->addAddress('mail@tutors-house.com');


$mail->Send();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>