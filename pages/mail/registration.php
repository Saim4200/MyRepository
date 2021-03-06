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
$mail->Body    = '<div style=" font-family:  sans-serif; margin: 20px;">
<div style="border: 1px solid #c9c9c9; padding: 30px; ">
<h1 style="text-align: center">WELCOME TO TUTORS HOUSE</h1>
    <br><br>
    
Dear <span style="text-transform: uppercase">'.$fullname.'</span>,<br><br>
                Thank you for registering with us. We have received your registration. Thank you!
                <br><br>
                <h2>What\'s Next</h2>
    <ul style="line-height: 2">
    <li>Please note that your account is NOT ACTIVATED yet and is under review.</li>
    <li>In order to get your account approved and activated, following documents are required to be uploaded, or submitted via email.</li>
        <ol>
        <li>Picture of your CNIC Card (Front only)</li>
        <li>Picture of your latest degree/certificate/marksheet.</li>
        </ol>
    <li>After reviewing your documents, we will send you an account-activation email on your registered email address.</li>
    </ul>
    <br>
    <a href="" style="background-color: #4caf50; color: white; padding: 10px 20px; text-decoration: none; margin-left: 20px">Upload Now</a>
<br><br><br>
    
    <p style="margin: 5px 20px 30px; border: 1px solid #e6e6e6; background-color: #f8f8f8; padding: 15px; font-size: 14px; color: #999; text-align: center; line-height: 1.5; border-radius: 3px">
        Meanwhile, we would love it if you could spread the word about our website with your friends and neighbors! You can send them links to our <a href="https://www.tutors-house.com">website</a> and social pages. We firmly believe every child has the greatest capacity to excel in any subject if given the right preparation and tutoring.
    </p>
</div>
<table bgcolor="#f7f6f4" border="0" cellpadding="10" cellspacing="0" id="x_templateFooter" width="100%" style="background-color:#f7f6f4; border-top:0; margin: 0">
<tbody>
<tr>
<td class="x_footerContent" valign="top" style="border-collapse:collapse; padding:24px 30px">
<table border="0" cellpadding="10" cellspacing="0" width="100%">
<tbody>
<tr>
<td valign="top" style="border-collapse:collapse; padding:0px">
<div align="left" style="color:#666; font-family:Arial; font-size:11px; line-height:125%; text-align:left">
<center>
<p style="font-family:Arial; font-size:11px; color:#999; display:block; line-height:12px; font-weight:normal; margin:0; padding:0px">
If you have any questions, feel free to <a href="mailto:help.tutorshouse@gmail.com" style="color:#3bb3bd; text-decoration:underline">contact us</a></p>
</center>
</div>
</td>
</tr>
<tr>
<td align="center" width="50%" style="border-collapse:collapse; max-width:560px!importan">
<p style="font-family:Arial; font-size:11px; color:#999; display:block; line-height:12px; font-weight:normal; margin:0; padding:0px">
Please do not forward or share this email as it is intended to be used only by you.
</p>    
<p style="font-family:Arial; font-size:14px; color:#999; display:block; line-height:1; font-weight:bold; margin:15px 0px 0px 0px; padding:0px">
    Tutors House  </p>
</td>
</tr>
<tr>
<td align="center" style="border-collapse:collapse; text-align:center; vertical-align:top; padding-top:0px; padding-bottom:0px; padding-right:0px">
    <a href="https://www.facebook.com/TUTORS.HOUSE.FOR.STUDENTS"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#95a5a6"><path d="M121.83333,21.5h-71.66667c-15.83117,0 -28.66667,12.8355 -28.66667,28.66667v71.66667c0,15.83117 12.8355,28.66667 28.66667,28.66667h40.28383v-49.88717h-16.7915v-19.52917h16.7915v-14.36917c0,-16.65533 10.18383,-25.7355 25.0475,-25.7355c5.0095,-0.01433 10.01183,0.24367 14.99267,0.7525v17.415h-10.234c-8.09833,0 -9.675,3.827 -9.675,9.47433v12.43417h19.35l-2.5155,19.52917h-16.94917v49.91583h11.36633c15.83117,0 28.66667,-12.8355 28.66667,-28.66667v-71.66667c0,-15.83117 -12.8355,-28.66667 -28.66667,-28.66667z"></path></g></g></svg></a>
    <a href="https://twitter.com/tutors_house"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#95a5a6"><path d="M155.04367,28.88883c-5.84083,2.75917 -15.781,7.9335 -20.77617,8.9225c-0.1935,0.05017 -0.35117,0.11467 -0.5375,0.16483c-5.8265,-5.74767 -13.81017,-9.3095 -22.64667,-9.3095c-17.80917,0 -32.25,14.44083 -32.25,32.25c0,0.93883 -0.07883,2.666 0,3.58333c-23.06233,0 -39.904,-12.03283 -52.51017,-27.4985c-1.68417,-2.07833 -3.47583,-0.99617 -3.8485,0.48017c-0.8385,3.33967 -1.12517,8.9225 -1.12517,12.90717c0,10.0405 7.8475,19.90183 20.06667,26.015c-2.25033,0.5805 -4.73,0.99617 -7.31,0.99617c-3.03867,0 -6.536,-0.7955 -9.59617,-2.40083c-1.13233,-0.59483 -3.57617,-0.43 -2.85233,2.46533c2.9025,11.60283 16.1465,19.75133 27.97867,22.1235c-2.6875,1.58383 -8.42083,1.26133 -11.05817,1.26133c-0.97467,0 -4.3645,-0.22933 -6.5575,-0.50167c-1.9995,-0.24367 -5.074,0.27233 -2.50117,4.171c5.5255,8.3635 18.02417,13.61667 28.78133,13.81733c-9.90433,7.76867 -26.101,10.60667 -41.61683,10.60667c-3.139,-0.07167 -2.98133,3.5045 -0.4515,4.83033c11.44517,6.00567 30.19317,9.56033 43.58767,9.56033c53.24833,0 83.51317,-40.58483 83.51317,-78.8405c0,-0.61633 -0.01433,-1.90633 -0.03583,-3.2035c0,-0.129 0.03583,-0.25083 0.03583,-0.37983c0,-0.1935 -0.05733,-0.37983 -0.05733,-0.57333c-0.0215,-0.97467 -0.043,-1.88483 -0.0645,-2.35783c4.22117,-3.04583 10.6855,-8.33483 13.9535,-12.384c1.11083,-1.376 0.215,-3.04583 -1.29717,-2.52267c-3.8915,1.3545 -10.621,3.9775 -14.835,4.47917c8.43517,-5.58283 12.60617,-10.44183 16.1895,-15.83833c1.2255,-1.84183 -0.30817,-3.71233 -2.17867,-2.82367z"></path></g></g></svg></a>
    <a href="mailto:mail@tutors-house.com"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20" viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#95a5a6"><path d="M143.33333,28.66667h-114.66667c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v86c0,7.91917 6.41417,14.33333 14.33333,14.33333h114.66667c7.91917,0 14.33333,-6.41417 14.33333,-14.33333v-86c0,-7.91917 -6.41417,-14.33333 -14.33333,-14.33333zM140.47383,59.11783l-50.6755,31.67667c-2.322,1.45483 -5.27467,1.45483 -7.59667,0l-50.6755,-31.67667c-1.77733,-1.11083 -2.8595,-3.06017 -2.8595,-5.15283v0c0,-4.773 5.25317,-7.68267 9.29517,-5.15283l48.03817,30.02117l48.03817,-30.02117c4.042,-2.52983 9.29517,0.37983 9.29517,5.15283v0c0,2.09267 -1.08217,4.042 -2.8595,5.15283z"></path></g></g></svg></a>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>';
    
$mail->addAddress($email);


$mail->Send();

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>