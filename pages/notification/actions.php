<?php
include '../database/tutordb.php';

if(isset($_POST['id']) && isset($_POST['status'])){
    
    $id = $_POST['id'];
    $status = $_POST['status'];
    
//    echo 'id = '.$id.' status = '.$status;
    $fetch=mysqli_fetch_assoc(mysqli_query($dbConnected,"SELECT * FROM notifications where notifid='".$id."'"));
    $nid = $fetch['nid'];
    $fetchres=mysqli_fetch_assoc(mysqli_query($dbConnected,"SELECT * FROM response where nid='".$nid."'"));

    $update=mysqli_query($dbConnected,"update response set status='".$status."' where nid='".$nid."'");
    if($update){
        $updatenoti=mysqli_query($dbConnected,"update notifications set seen='1' where notifid='".$id."'");
        
        switch($status){
            case 1:
            case 3:
            case 5:
            case 7:
                $insertnotif=mysqli_query($dbConnected,"INSERT INTO notifications (nid,userid,notification,seen,ntime) values ('".$nid."','".$fetchres['tid']."','".$status."','0',now())");
            break;
            case 2:
            case 4:
            case 6:
            case 8:
                $insertnotif=mysqli_query($dbConnected,"INSERT INTO notifications (nid,userid,notification,seen,ntime) values ('".$nid."','".$fetchres['sid']."','".$status."','0',now())");
            break;
        }            
        if(isset($_POST['demand'])){
        $demandfee=$_POST['demand'];
        $updatefee=mysqli_query($dbConnected,"update tuitionfee set demand='".$demandfee."' where nid='".$nid."'");
        }
        if(isset($_POST['bargain'])){
        $bargainfee=$_POST['bargain'];
        $updatefee=mysqli_query($dbConnected,"update tuitionfee set bargain='".$bargainfee."' where nid='".$nid."'");
        }
        if(isset($_POST['accepted'])){
        $accepted=mysqli_real_escape_string($dbConnected,$_POST['accepted']);
        if($accepted=='demand'){  $fetch=mysqli_fetch_assoc(mysqli_query($dbConnected,"SELECT demand FROM tuitionfee where nid='".$nid."'")); $acceptedfee=$fetch['demand']; } 
        if($accepted=='bargain'){ $fetch=mysqli_fetch_assoc(mysqli_query($dbConnected,"SELECT bargain FROM tuitionfee where nid='".$nid."'")); $acceptedfee=$fetch['bargain']; } 
        $updatefee=mysqli_query($dbConnected,"update tuitionfee set accepted='".$acceptedfee."' where nid='".$nid."'");
        }
        if(isset($_POST['startdate'])){
        $startdate = $_POST['startdate'];
        $updatefee=mysqli_query($dbConnected,"update tuitionfee set startdate='".$startdate."' where nid='".$nid."'");
        exit();
        }
    }
    
    if ($updatenoti && $insertnotif){
         echo "SUCCESS";
    }
    else{
         echo "ERROR_1";
    }
} else {
         echo "ERROR_2";
    
}


?>