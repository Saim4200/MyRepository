<?php
include '../database/tutordb.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/src/POP3.php';

if (isset($_POST['id'])){
    $id=mysqli_real_escape_string($dbConnected,$_POST['id']);
    $reason=mysqli_real_escape_string($dbConnected,$_POST['reason']);
    
    $fetchemail=mysqli_fetch_array(mysqli_query($dbConnected,"select email from data where id='".$id."'"));
    $email=$fetchemail['email'];

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
    $mail->Subject = 'REGISTRATION UNSUCCESSFUL';
    if($reason==""){
    $mail->Body    = "Hi there,                        
                    <br><br>
                    Thank you for registering with us!
                    <br><br>
                    We would like to inform you that your registration has been reviewed and some discrepancies were found in your account information.
                    <br><br>
                
                    At your earliest convenience, please <a href='https://www.tutors-house.com/pages/login/login.php?setlogin=1'>login</a> to your account with your registered email and password, 
                    and re-enter incorrect field values in your <a href='https://www.tutors-house.com/pages/profile/profile.php?setprofile=1'>profile</a>. 
                    <br><br>
                    
                    Your account will remain OPEN for 7 days, after which it will be closed automatically if above issues are not rectified. 
                    <br><br>
                    Please feel free to contact us (by replying to this email) if you have any questions. 
                    <br><br>
                    Regards,
                    <br>
                    Tutors House Team

                    <br><br><br>
                    ";
    }
    else
    {
        $mail->Body = "Hi there,                        
                    <br><br>
                    Thank you for registering with us!
                    <br><br>
                    We would like to inform you that your registration has been reviewed and following discrepancies were found in your account information.
                    <br><br>
                    <strong>".$reason."</strong>
                    <br><br>
                    At your earliest convenience, please <a href='https://www.tutors-house.com/pages/login/login.php?setlogin=1'>login</a> to your account with your registered email and password, 
                    and go to your <a href='https://www.tutors-house.com/pages/profile/profile.php?setprofile=1'>profile</a> to rectify above-mentioned issues. 
                    <br><br>
                    Your account will remain accessable for 7 days, after which it will be closed automatically if above issues are not rectified. 
                    <br><br>
                    Please feel free to contact us (by replying to this email) if you have any questions. 
                    <br><br>
                    Regards,
                    <br>
                    Tutors House Team
                    <br><br><br>";
        }
        
    $mail->addAddress($email);


    $mail->Send();
        
     echo "SUCCESS";
        
    } catch (Exception $e) {
    echo "ERROR_1";
    }
} else {
    echo "ERROR_2";

}
?>