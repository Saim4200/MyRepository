<?php

    function gen(){	$x = 5; // Amount of digits
            $min = pow(10,$x);
            $max = pow(10,$x+1)-1;
            $value = rand($min, $max);
                     $firstnum =$value;
                     return $firstnum;  
    }

include'../database/tutordb.php';
if($dbsuccess){

if(isset($_SESSION['id'])){

if($_SESSION['user'] == "tutor"){
        echo "ERROR-3";
        exit();
    }
elseif($_SESSION['user'] == "student"){

if(isset($_POST['tid']) && isset($_POST['reqid'])){
    $tid=mysqli_real_escape_string($dbConnected,$_POST['tid']);
    $reqid=mysqli_real_escape_string($dbConnected,$_POST['reqid']);
    $sid = $_SESSION['id'];

    $nid=gen();
    
    $checknid=mysqli_query($dbConnected,"select nid from response where nid='".$nid."'");
    if (mysqli_num_rows($checknid)>0)
    {
        $nid=gen();
    }
    else{
        if ($reqid!==""){
            $insertres=mysqli_query($dbConnected,"INSERT INTO response (nid,sid,reqid,tid,status) values ('".$nid."','".$sid."','".$reqid."','".$tid."','1')");
            $insertnotif=mysqli_query($dbConnected,"INSERT INTO notifications (nid,userid,notification,ntime) values ('".$nid."','".$tid."','1',now())");
            $insertfee=mysqli_query($dbConnected,"INSERT INTO tuitionfee (nid) values ('".$nid."')");
        }
       if(($insertres) && ($insertnotif) && $insertfee){
           echo "SUCCESS";
        }
        else{
           echo "ERROR-1";
        }
    }
}
else {
    echo "NO_DATA";
}
}
}
else {
    echo "ERROR-2";
}
}
?>