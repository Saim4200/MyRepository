<?php

include'../database/tutordb.php';

if ($dbsuccess)
{

        $ppic=mysqli_query($dbConnected,"select profilepic from teacherinfopic where id='".$_SESSION['id']."'");
        $CNICpic=mysqli_fetch_array($ppic);
        $picture = mysqli_real_escape_string($dbConnected,$_FILES['profilepic']['name']);
         
        $temp = explode(".", $_FILES["profilepic"]["name"]);
        $newfilename =  $_SESSION['id']. '.' .end($temp);
        $target_dir = "../profilepic/";
        $target_file = $target_dir . $newfilename;

        // Get image file extension
        $file_extension = strtolower(pathinfo($_FILES["profilepic"]["name"], PATHINFO_EXTENSION));
        $allowed_image_extension = array("png","jpg","jpeg");
        
         // Validate file input to check if is with valid extension
         if (!in_array($file_extension, $allowed_image_extension)) {
                $text = 'PICTURE MUST BE AN IMAGE FILE! Only JPG/JPEG/PNG formats are allowed.'; 
         }
            // Check file size
         else  if ($_FILES["profilepic"]["size"] > 1024*1024) {
                $text = ' PICTURE IS TOO LARGE! Maximum 1MB allowed.'; 
        }
        else {
            if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file)) 
            {
                $changepic=mysqli_query($dbConnected,"update teacherinfopic set profilepic='".$newfilename."' where id='".$_SESSION['id']."'");

                $text = '<img src="'.$target_file.'" class="picture">'; // Send back the image...

        		$text .=  '%'.$target_file; // Also send back the image URL
            }
             else {
                $text = 'ERROR UPLOADING YOUR PROFILE PICTURE! TRY AGAIN.'; 
            }
        }
        
        echo ($text);
}
?>