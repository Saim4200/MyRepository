<?php
include '../database/tutordb.php';
if(isset($_SESSION['id'])){
       include '../queries/checksession.php';
if(mysqli_num_rows($checktsession)==1){
    
    $countfilter=mysqli_fetch_array(mysqli_query($dbConnected,"select count(notistatus.seen) from notistatus
    inner join request on notistatus.nid=request.nid
    where notistatus.seen='0' and notistatus.status='3' and request.tid='".$_SESSION['id']."'"));
}
elseif(mysqli_num_rows($checkssession)==1)
{   
    $countfilter=mysqli_fetch_array(mysqli_query($dbConnected,"select count(notistatus.seen) from notistatus
    inner join response on notistatus.nid=response.nid
    where notistatus.seen='0' and notistatus.status='3' and response.sid='".$_SESSION['id']."'"));
}}
    if ($countfilter[0]<=0){echo " ";}
    elseif($countfilter[0]>0){echo $countfilter[0];}

?>