<?php

include'../database/tutordb.php';

if ($dbsuccess)
{
        $fCNIC=mysqli_query($dbConnected,"select CNIC from teacherinfopersonal where id='".$_SESSION['id']."'");
        $CNIC=mysqli_fetch_array($fCNIC);

        $ppic=mysqli_query($dbConnected,"select degree from teacherinfopic where id='".$_SESSION['id']."'");
        $degreepic=mysqli_fetch_array($ppic);
        $picture = mysqli_real_escape_string($dbConnected,$_FILES['degreepicsubmit']['name']);
                
        $temp = explode(".", $_FILES["degreepicsubmit"]["name"]);
        $newfilename =  $CNIC['CNIC']. '.' .end($temp);
        $target_dir = "../degree/";
        $target_file = $target_dir . $newfilename;

        // Get image file extension
        $file_extension = strtolower(pathinfo($_FILES["degreepicsubmit"]["name"], PATHINFO_EXTENSION));
        $allowed_image_extension = array("png","jpg","jpeg");
        
         // Validate file input to check if is with valid extension
         if (!in_array($file_extension, $allowed_image_extension)) {
                $text = '<div class="alert-danger" >PICTURE MUST BE AN IMAGE FILE! Only JPG/JPEG/PNG formats are allowed.</div>'; 
         }
            // Check file size
         else  if ($_FILES["degreepicsubmit"]["size"] > 10485760) {
                $text = '<div class="alert-danger" >PICTURE IS TOO LARGE! Maximum 10MB allowed.</div>'; 
        }
        else  if ($_FILES["degreepicsubmit"]["size"] == 0) {
                $text = '<div class="alert-danger" >NO FILE CHOSEN! Select an image to upload.</div>'; 
        }
        else {
            if (move_uploaded_file($_FILES["degreepicsubmit"]["tmp_name"], $target_file)) 
            {
                $changepic=mysqli_query($dbConnected,"update teacherinfopic set degree='".$newfilename."' where id='".$_SESSION['id']."'");
                $changedata=mysqli_query($dbConnected,"update data set accepted='0' where id='".$_SESSION['id']."'");
                
                $text = '<img src="'.$target_file.'" class="cnic-picture-box" alt="" id="degree">'; // Send back the image...
        		$text .= '<div class="alert-success" >Image uploaded successfully.</div>'; //...and a successfull text
        		
        		$text .=  '%'.$target_file; // Also send back the image URL
            }
             else {
                $text = '<div class="alert-danger" >ERROR UPLOADING YOUR DEGREE PICTURE! TRY AGAIN.</div>'; 
            }
        }
        
        echo ($text);
}
?>