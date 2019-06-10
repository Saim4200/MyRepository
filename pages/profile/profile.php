<?php

    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Connection: close");
  


if(isset($_GET['setprofile'])==1){
    
include '../database/tutordb.php';

if ($dbsuccess)
{
        if (isset($_SESSION['id'])){
            $tcheck=mysqli_query($dbConnected,"select id from teacherinfopersonal where id='".$_SESSION['id']."'");
            $scheck=mysqli_query($dbConnected,"select id from students where id='".$_SESSION['id']."'");
            if(mysqli_num_rows($tcheck)>0){include "tprofile.php";}
            elseif(mysqli_num_rows($scheck)>0){include "sprofile.php";}
        } else {
                header('Location: ../login/login.php?setlogin=1');
        }
    
}
else{
    header('Location: ../../index.php');
}
}
else{
    header ('Location :../../index.php');
}
?>