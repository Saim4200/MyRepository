<?php 
include '../database/tutordb.php';
if(isset($_SESSION['id'])){
 include '../queries/checksession.php';
if(mysqli_num_rows($checktsession)==1){
$check=mysqli_fetch_array(mysqli_query($dbConnected,"select * from notistatus
                                inner join request on notistatus.nid=request.nid 
                                where notistatus.seen='0' and request.tid='".$_SESSION['id']."' ORDER BY notistatus.ntime DESC"));
   
}
 elseif(mysqli_num_rows($checkssession)==1){
     $check=mysqli_fetch_array(mysqli_query($dbConnected,"select * from notistatus
                                inner join response on notistatus.nid=response.nid 
                                where notistatus.seen='0' and response.sid='".$_SESSION['id']."'  ORDER BY notistatus.ntime DESC"));
  
 }   
      

 if(($_COOKIE['status']!==$check['status'] || $_COOKIE['nid']!==$check['nid']) && $check['seen']==0){
     if(filterCountAll($dbConnected)>0){
?>
<div class="headsup-container" id="notification">
    <div class="meter"></div>
    <a href="../notification/notification.php">
         

        <div class="col span-2-of-2">
       
            
       
  
   <div class="noti-count"><?php filterCountAll($dbConnected);?> new notification </div>

    </div>
    </a>
        
    </div>

<?php
setcookie( 'status', $check['status'], 0);
setcookie( 'nid', $check['nid'], 0);
                                                                                                            
                           }}
}

function filterCountAll($dbConnected){
  if(isset($_SESSION['id'])){
    include '../queries/checksession.php';
if(mysqli_num_rows($checktsession)==1){
    
    $countfilter=mysqli_fetch_array(mysqli_query($dbConnected,"select count(notistatus.seen) from notistatus
    inner join request on notistatus.nid=request.nid
    where notistatus.seen='0' and request.tid='".$_SESSION['id']."'"));
}
elseif(mysqli_num_rows($checkssession)==1)
{   
    $countfilter=mysqli_fetch_array(mysqli_query($dbConnected,"select count(notistatus.seen) from notistatus
   
    where seen='0' "));
}
    if ($countfilter[0]<=0){echo " ";}
    elseif($countfilter[0]>0){echo $countfilter[0];}
      
      return $countfilter[0];

}}



?>
