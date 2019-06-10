<?php
include '../database/tutordb.php';
include '../queries/checksession.php';
if(isset($_POST['id']) && isset($_POST['status'])){
    
    $id = mysqli_real_escape_string($dbConnected,$_POST['id']);
    $status = mysqli_real_escape_string($dbConnected,$_POST['status']);
    
    $fetchnid=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT nid, userid FROM notifications where id='".$id."'"));
    $nid = $fetchnid['nid'];
    
    $update=mysqli_query($dbConnected,"update response set status='".$status."' where nid='".$nid."'");
    $updatenoti=mysqli_query($dbConnected,"update notifications set notification='".$status."' where id='".$id."'");
    
    if(isset($_POST['demand'])){ 
        $demandfee=mysqli_real_escape_string($dbConnected,$_POST['demand']);
        $updatefee=mysqli_query($dbConnected,"update tuitionfee set demand='".$demandfee."' where nid='".$nid."'");
    }
    if(isset($_POST['bargain'])){ 
        $bargainfee=mysqli_real_escape_string($dbConnected,$_POST['bargain']);
        $updatefee=mysqli_query($dbConnected,"update tuitionfee set bargain='".$bargainfee."' where nid='".$nid."'");
    }
    if(isset($_POST['accepted'])){ 
        $acceptedfee=mysqli_real_escape_string($dbConnected,$_POST['accepted']);
        $updatefee=mysqli_query($dbConnected,"update tuitionfee set accepted='".$acceptedfee."' where nid='".$nid."'");
    }
    if(isset($_POST['startdate'])){ 
        $startdate=mysqli_real_escape_string($dbConnected,$_POST['startdate']);
        $updatefee=mysqli_query($dbConnected,"update tuitionfee set startdate='".$startdate."' where nid='".$nid."'");
    }
    
    if ($update==true && $updatenoti==true){
         echo "<script>
        alert('your request have been send');
        window.location.href='../notification/notification.php';
        </script>";
    }
    else{
         echo "<script>
        alert('SOMETHING WENT WRONG');
        window.location.href='../notification/notification.php';
        </script>";
    }
}
elseif(isset($_POST['bargainsend'])){
    
    $bargainfees=mysqli_real_escape_string($dbConnected,$_POST['bargain']);
    $nid=mysqli_real_escape_string($dbConnected,$_POST['nid']);
    $updatenoti=mysqli_query($dbConnected,"update notistatus set status='3',seen='0' where nid='".$nid."'");
    $bupdate=mysqli_query($dbConnected,"update request set proposed='".$bargainfees."' where nid='".$nid."'");
    
    if ($bupdate==true){
         echo "<script>
        alert('your request have been send');
        window.location.href='../notification/notification.php';
        </script>";
    }
    else{
         echo "<script>
        alert('SOMETHING WENT WRONG');
        window.location.href='../notification/notification.php';
        </script>";
    }
}
elseif(isset($_POST['agree'])){
    $nid=mysqli_real_escape_string($dbConnected,$_POST['nid']);
    if(mysqli_num_rows($checktsession)>=1){
    $aupdate=mysqli_query($dbConnected,"update request set taccepted='1' where nid='".$nid."'");
    $updatenoti=mysqli_query($dbConnected,"update notistatus set status='4',seen='0' where nid='".$nid."'");
    }
    if(mysqli_num_rows($checkssession)>=1){
    $aupdate=mysqli_query($dbConnected,"update response set saccepted='1' where nid='".$nid."'");
    $updatenoti=mysqli_query($dbConnected,"update notistatus set status='4',seen='0' where nid='".$nid."'");
    }
    
    if ($aupdate==true){
         echo "<script>
        alert('your request have been send');
        window.location.href='../notification/notification.php';
        </script>";
    }
    else{
         echo "<script>
        alert('SOMETHING WENT WRONG');
        window.location.href='../notification/notification.php';
        </script>";
    }
}
elseif(isset($_POST['proceed'])){
    $nid=mysqli_real_escape_string($dbConnected,$_POST['nid']);
    $pupdate=mysqli_query($dbConnected,"update response set saccepted='1' where nid='".$nid."'");
    $updatenoti=mysqli_query($dbConnected,"update notistatus set status='4',seen='0' where nid='".$nid."'");
    
    if ($pupdate==true){
         echo "<script>
        alert('your request have been send');
        window.location.href='../notification/notification.php';
        </script>";
    }
    else{
         echo "<script>
        alert('SOMETHING WENT WRONG');
        window.location.href='../notification/notification.php';
        </script>";
    }
}
elseif(isset($_POST['decline'])){
     $nid=mysqli_real_escape_string($dbConnected,$_POST['nid']);
    $sdupdate=mysqli_query($dbConnected,"update requestdecision set decline='1' where nid='".$nid."'");
    $updatenoti=mysqli_query($dbConnected,"update notistatus set status='0',seen='0' where nid='".$nid."'");
    
    if ($sdupdate==true){
         echo "<script>
        alert('request have been declined');
        window.location.href='../notification/notification.php';
        </script>";
    }
    else{
         echo "<script>
        alert('SOMETHING WENT WRONG');
        window.location.href='../notification/notification.php';
        </script>";
    }
}
elseif(isset($_POST['rebargain'])){
     $nid=mysqli_real_escape_string($dbConnected,$_POST['nid']);
     $requpdate=mysqli_query($dbConnected,"update request set proposed='0' where nid='".$nid."'");
     $updatetnoti=mysqli_query($dbConnected,"update notistatus set status='2',seen='0' where nid='".$nid."'");
     $resupdate=mysqli_query($dbConnected,"update response set bargain='0' where nid='".$nid."'");
     $updatesnoti=mysqli_query($dbConnected,"update notistatus set status='2',seen='0' where nid='".$nid."'");
    if ($requpdate==true && $resupdate==true){
         echo "<script>
        alert('request have been send');
        window.location.href='../notification/notification.php';
        </script>";
    }
    else{
         echo "<script>
        alert('SOMETHING WENT WRONG');
        window.location.href='../notification/notification.php';
        </script>";
}}

?>