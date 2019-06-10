<?php
error_reporting(E_ALL);

include '../database/tutordb.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function generateRandomString($length = 60) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if (isset($_POST['id'])){
    $id=mysqli_real_escape_string($dbConnected,$_POST['id']);
    
    $fetchemail=mysqli_fetch_array(mysqli_query($dbConnected,"select email from data where id='".$id."'"));
    $email=$fetchemail['email'];
    
 $string=generateRandomString();
 $checkid=mysqli_num_rows(mysqli_query($dbConnected,"select id from activationlink where id='".$id."'"));
if($checkid>0){
    $linkgenerated=mysqli_query($dbConnected,"update activationlink set string='".$string."' where id='".$id."'");
}
else {
    $linkgenerated=mysqli_query($dbConnected,"insert into activationlink (id,string) values ('".$id."','".$string."')");
}

if($linkgenerated){
    
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
$mail->Subject = 'ACTIVATION LINK - Tutors House Account Activation';
$mail->Body    = "Hi there,<br><br>
                We're delighted to inform you that your account at our website (www.tutors-house.com) is successfully approved and is now awaiting your activation. 
                <br><br>
                Please follow the activation link given below:
                <br><br>
                https://www.tutors-house.com/pages/login/activation.php?link=".$string."
                <br><br>   
                Note: LINK WILL EXPIRE AFTER SINGLE USE.
                <br><br><br>
                For any queries, contact us at this email: mail@tutors-house.com
                <br><br>
                Tutors House Team <br>
                Phone:&nbsp;(+92) 3162323295

                
                <br><br><br>
                ";
$mail->addAddress($email);


$mail->Send();

     echo "SUCCESS";

} catch (Exception $e) {
    echo "ERROR_1";
}
}
else {
             echo "ERROR_2";
}
}
else {
             echo "ERROR_3";

}

?>