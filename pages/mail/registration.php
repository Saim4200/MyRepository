<?php
error_reporting(E_ALL);

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
$mail->Subject = 'REGISTRATION CONFIRMATION - You are successfully registered with Tutors House';
$mail->Body    = "Dear ".$firstname.",<br><br>
                Thank you for registering with us. We have received your registration. Thank you!
                <br><br>
                <h2>What Next</h2>
                        &#8226;&#32;&#32;&#32;  Please note that your account is NOT ACTIVATED yet and is under review.
                                                We will soon send you an account activation email (within 3 days).
                    	&#8226;&#32;&#32;&#32;  If you would like to view/edit your registration again, please login <a href='https://www.tutors-house.com/pages/login/login.php?setlogin=1'>here</a> with your email and password and view your profile. <br>

                <br><br>
               In the meantime, we would love it if you could SPREAD THE WORD about our website with your friends and neighbors! 
               You can find links to our Facebook and Twitter pages below.
               We firmly believe every child has the greatest capacity to excel in any subject if given the right preparation and tutoring.
                <br><br>
                Thank you again for your registration. 
                <br><br>
                If you have any questions, please let us know! 
                <br><br>
                Regards,
                <br><br>

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