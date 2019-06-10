<?php
include '../database/tutordb.php';

$token=$_GET['link'];
$checkstring=mysqli_query($dbConnected,"select * from activationlink where string='".$token."'");

if(mysqli_num_rows($checkstring)>0){
$fdata=mysqli_fetch_array($checkstring);

$deletelink=mysqli_query($dbConnected,"DELETE FROM activationlink WHERE id='".$fdata['id']."'");

   $checkactive=mysqli_fetch_array(mysqli_query($dbConnected,"select active from data where id='".$fdata['id']."'"));

        if($checkactive['active']==0){
            $activation=mysqli_query($dbConnected,"UPDATE data set active='1' where id='".$fdata['id']."'");
            if($activation==true){
                echo "<script>
               alert('ACCOUNT ACTIVATED SUCCESSFULLY.');
               window.location.href='login.php?setlogin=1';
               </script>";
            }
        } else {
                echo "<script>
               alert('ACCOUNT ALREADY ACTIVATED.');
               window.location.href='login.php?setlogin=1';
               </script>";
        }
}
else {
        echo "<script>
       alert('ACTIVATION LINK HAS EXPIRED!');
       window.location.href='../../index.php';
       </script>";

}
?>