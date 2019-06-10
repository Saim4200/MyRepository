<?php
if(isset($_GET['setupdate'])==1)
{
    
include'../database/tutordb.php';
if ($dbsuccess)
{
     
    if(isset($_POST['pic-submit'])){
        $ppic=mysqli_query($dbConnected,"select profilepic from teacherinfopic where id='".$_SESSION['id']."'");
        $profilepic=mysqli_fetch_array($ppic);
        $picture = mysqli_real_escape_string($dbConnected,$_FILES['picsubmit']['name']);
         $temp = explode(".", $_FILES["picsubmit"]["name"]);
                $newfilename =  $_SESSION['id']. '.' .end($temp);
                $target_dir = "../profilepic/";
                $target_file = $target_dir . $newfilename;
                $uploadOk = 1;
                $degreeFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if degree file is a actual degree or fake degree
                if(isset($_POST["save"])) {
                    $check = getdegreesize($_FILES["picsubmit"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "<script>
                alert('FILE IS NOT AN IMAGE');
                window.location.href='profile.php?setprofile=1';
                </script>";
                        $uploadOk = 0;
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                   $path='../profilepic/'.$profilepic['profilepic'];
                  if(unlink($path))
                  {$uploadOk = 1;}
                    else{
                        $uploadOK=0;
                    }
                }
                // Check file size
                if ($_FILES["picsubmit"]["size"] > 50000000) {
                   echo "<script>
                alert('SORRY! FILE IS TOO LARGE.');
                window.location.href='profile.php?setprofile=1';
                </script>";
                    $uploadOk = 0;
                }
                if ($_FILES["picsubmit"]["size"] == 0) {
                   echo "<script>
                        alert('NO FILE CHOSEN!! ATTACH AN IMAGE TO UPLOAD.');
                        window.location.href='profile.php?setprofile=1';
                </script>";
                    $uploadOk = 0;
                }
                // Allow certain file formats

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                     echo "<script>
                alert('SORRY! UNABLE TO UPLOAD PROFILE IMAGE');
                window.location.href='profile.php?setprofile=1';
                </script>";
                // if everything is ok, try to upload file
                } else {

                    if (move_uploaded_file($_FILES["picsubmit"]["tmp_name"], $target_file)) 
                    {}
                     else {
                         echo "<script>
                alert('THERE WAS AN ERROR UPLOADING YOUR FILE');
                window.location.href='profile.php?setprofile=1';
                </script>";
                    }
                }
        
        $changepic=mysqli_query($dbConnected,"update teacherinfopic set profilepic='".$newfilename."' where id='".$_SESSION['id']."'");
        if($changepic)
        {
            header('location: profile.php?setprofile=1');
            exit();
        }
        else{
            echo "<script>
        alert('SOMETHING WENT WRONG! TRY AGAIN.');
        window.location.href='../notification/notification.php';
        </script>";
        }
    }    
    elseif(isset($_POST['res-pic-submit'])){
        $ppic=mysqli_query($dbConnected,"select profilepic from teacherinfopic where id='".$_SESSION['id']."'");
        $profilepic=mysqli_fetch_array($ppic);
        $picture = mysqli_real_escape_string($dbConnected,$_FILES['res-picsubmit']['name']);
         $temp = explode(".", $_FILES["res-picsubmit"]["name"]);
                $newfilename =  $_SESSION['id'].'.' . end($temp);
                $target_dir = "../profilepic/";
                $target_file = $target_dir . $newfilename;
                $uploadOk = 1;
                $degreeFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if degree file is a actual degree or fake degree
                if(isset($_POST["save"])) {
                    $check = getdegreesize($_FILES["res-picsubmit"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "<script>
                alert('FILE IS NOT AN IMAGE');
                window.location.href='profile.php?setprofile=1';
                </script>";
                        $uploadOk = 0;
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                   $path='../profilepic/'.$profilepic['profilepic'];
                  if(unlink($path))
                  {$uploadOk = 1;}
                    else{
                        $uploadOK=0;
                    }
                }
                // Check file size
                if ($_FILES["res-picsubmit"]["size"] > 5000000000000000000) {
                   echo "<script>
                alert('SORRY YOUR FILE IS TOO LARGE');
                window.location.href='profile.php?setprofile=1';
                </script>";
                    $uploadOk = 0;
                }
                // Allow certain file formats

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                     echo "<script>
                alert('SORRY! UNABLE TO UPLOAD DEGREE IMAGE.');
                window.location.href='profile.php?setprofile=1';
                </script>";
                // if everything is ok, try to upload file
                } else {

                    if (move_uploaded_file($_FILES["res-picsubmit"]["tmp_name"], $target_file)) 
                    {}
                     else {
                         echo "<script>
                alert('THERE WAS AN ERROR UPLOADING YOUR FILE.');
                window.location.href='profile.php?setprofile=1';
                </script>";
                    }
                }
        
        $changepic=mysqli_query($dbConnected,"update teacherinfopic set profilepic='".$newfilename."' where id='".$_SESSION['id']."'");
        if($changepic)
        {
            header('location: profile.php?setprofile=1');
            exit();
        }
        else{
            echo "<script>
        alert('SOMETHING WENT WRONG! TRY AGAIN.');
        window.location.href='../notification/notification.php';
        </script>";
        }
    }
    
    elseif(isset($_POST['subpic'])){
        
        $catchpicquery=mysqli_query($dbConnected,"SELECT profilepic from teacherinfopic where id='".$_SESSION['id']."' ");     
        
        $catch=mysqli_fetch_array($catchpicquery);
        
                $path="../profilepic/".$catch['profilepic'];

        
               unlink($path);
        
        $profilepic = mysqli_real_escape_string($dbConnected,$_FILES['profilepic']['name']);
                
                $temp = explode(".", $_FILES["profilepic"]["name"]);
                $newfilename =  $_SESSION['id'].'.' . end($temp);
                $target_dir = "../profilepic/";
                $target_file = $target_dir . $newfilename;
                $uploadOk = 1;
                $degreeFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if degree file is a actual degree or fake degree
                if(isset($_POST["save"])) {
                    $check = getdegreesize($_FILES["profilepic"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                     echo '<script type="text/javascript">  window.onload = function(){
                      alert("CNIC ALREADY EXIST");
                    }</script>';
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["profilepic"]["size"] > 5000000000000000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                     echo '<script type="text/javascript">  window.onload = function(){
                      alert("SORRY UNABLE TO REGISTER");
                    }</script>';
                // if everything is ok, try to upload file
                } else {

                    if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file)) 
                    {}
                     else {
                         echo '<script type="text/javascript">  window.onload = function(){
                      alert("SORRY! THERE WAS AN ERROR UPLOADING YOUR FILE");
                    }</script>';
                    }
                }
        
        $uploadprofilepic = mysqli_query($dbConnected, "update teacherinfopic set profilepic='".$newfilename."' where id='".$_SESSION['id']."'");
        
        if($uploadprofilepic)
        {
            header ('Location: profile.php?setprofile=1');
        }
        else{
                 echo '<script type="text/javascript">  window.onload = function(){
                      alert("SOMETHING WENT WRONG! TRY AGAIN.");
                    }</script>';
            }
    }
    elseif(isset($_POST['subpass'])){
        $fetchpass=mysqli_query($dbConnected,"select pass from data where id='".$_SESSION['id']."'");
        $row=mysqli_fetch_array($fetchpass);
        
        $oldpassword=mysqli_real_escape_string($dbConnected,$_POST['oldpass']);
        $password=mysqli_real_escape_string($dbConnected,$_POST['pass']);
        $passverify=password_verify($oldpassword, $row['pass']); 
        
                if ($passverify == false)
                  {
                       echo '<script type="text/javascript">  window.onload = function(){
                      alert("INCORRECT OLD PASSWORD!");
                    }</script>';
                  }
                   elseif ($passverify == true) {
                        $pass=password_hash($password, PASSWORD_DEFAULT);
                        $changepass=mysqli_query($dbConnected,"update data set pass='".$pass."' where id='".$_SESSION['id']."'");
                        
                        if($changepass){
                            
                            header('location: profile.php?setprofile=1');
                        }
                   }
        else{
            
             echo '<script type="text/javascript">  window.onload = function(){
                      alert("SOMETHING WENT WRONG! TRY AGAIN.");
                    }</script>';
        }
    }
    elseif(isset($_POST['cnic-pic-submit'])){
    }    
    elseif(isset($_POST['degree-pic-submit'])){
    }    

    
}}


else{
    header('Location: ../../index.php');
}


?>
