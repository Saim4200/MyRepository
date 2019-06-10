
<?php

while($req=mysqli_fetch_array($join))
        { 
   
   
if(($req['proposed']==0 && $req['bargain']==0) && ($req['decline']==0)){
      if(mysqli_num_rows($checktsession)==1){ 
?>
<a href="notification.php?ns=new"><div class="noti-box clearfix">
    <div class="col span-1-of-12">
        <ion-icon name="book"></ion-icon></div>
    <div class="col span-11-of-12">
        <div class="noti-text"><strong><?php sname($dbConnected,$req['sid']);  ?></strong>  wants to learn <strong><?php ssub($dbConnected,$req['sub1'],$req['sub2'],$req['sub3'],$req['sub4']) ?></strong> of <strong>intermediate</strong> </div>
        <div class="noti-date"><?php timedate($req['ntime']); ?></div></div>
    </div></a>
<?php }}
if($req['decline']==1){
      if(mysqli_num_rows($checktsession)==1){ 
?>
<a href="notification.php?ns=decline">
<div class="noti-box clearfix">
    <div class="col span-1-of-12">
        <ion-icon name="close-circle" style="color:#D75A4A;"></ion-icon></div>
    <div class="col span-11-of-12">
        <div class="noti-text"><strong><?php sname($dbConnected,$req['sid']); ?></strong> <strong>denied</strong> your request </div>
        <div class="noti-date"><?php timedate($req['ntime']) ?></div></div>
</div>
</a>
<?php }
if(mysqli_num_rows($checkssession)==1){ 
?>
<a href="notification.php?ns=decline">
<div class="noti-box clearfix">
    <div class="col span-1-of-12">
        <ion-icon name="close-circle" style="color:#D75A4A;"></ion-icon></div>
    <div class="col span-11-of-12">
        <div class="noti-text"><strong><?php sname($dbConnected,$req['tid']); ?></strong> <strong>denied</strong> your your request </div>
        <div class="noti-date"><?php timedate($req['ntime']) ?></div></div>
</div>
</a>
<?php }
}
if($req['saccepted']==1){
      if(mysqli_num_rows($checktsession)==1){ 
?>
<a  href="notification.php?ns=accepted">
<div class="noti-box clearfix">
    <div class="col span-1-of-12">
        <ion-icon name="checkmark-circle" style="color:#4ad78b;"></ion-icon></div>
    <div class="col span-11-of-12">
        <div class="noti-text"><strong><?php sname($dbConnected,$req['sid']); ?></strong> <strong>accepted</strong> your proposed fees </div>
        <div class="noti-date"><?php timedate($req['ntime']) ?></div></div>
</div>
</a>
<?php }
if(mysqli_num_rows($checkssession)==1 && mysqli_num_rows($checktsession)==0){ 
?>
<a href="notification.php?ns=accepted">
<div class="noti-box clearfix">
    <div class="col span-1-of-12">
        <ion-icon name="checkmark-circle" style="color:#4ad78b;"></ion-icon></div>
    <div class="col span-11-of-12">
        <div class="noti-text"><strong><?php sname($dbConnected,$req['tid']); ?></strong> <strong>accepted</strong> your requested fees </div>
        <div class="noti-date"><?php timedate($req['ntime']) ?></div></div>
</div>
</a>
<?php }}
    
if(($req['proposed']>0 && $req['bargain']>0) && ($req['decline']==0) && $req['taccepted']==0 && $req['saccepted']==0){
      if(mysqli_num_rows($checktsession)==1){ 
?>
<a href="notification.php?ns=waiting">
<div class="noti-box clearfix">
    <div class="col span-1-of-12">
        <ion-icon name="chatbubbles"></ion-icon></div>
    <div class="col span-11-of-12">
        <div class="noti-text"><strong><?php sname($dbConnected,$req['sid']); ?></strong> sends a <strong>bargain</strong> request </div>
        <div class="noti-date"><?php timedate($req['ntime']) ?></div></div>
    </div></a>
<?php }}
if(($req['proposed']==0 && $req['bargain']>0) && ($req['decline']<=0)){
if(mysqli_num_rows($checkssession)==1 && mysqli_num_rows($checktsession)==0){ ?>
<a href="notification.php?ns=waiting">
<div class="noti-box clearfix">
    <div class="col span-1-of-12">
        <ion-icon name="chatbubbles"></ion-icon></div>
    <div class="col span-11-of-12">
        <div class="noti-text"><strong><?php sname($dbConnected,$req['sid']); ?></strong> sends a <strong>fees</strong> request </div>
        <div class="noti-date"><?php timedate($req['ntime']) ?></div></div>
    </div></a>
<?php }} }?>