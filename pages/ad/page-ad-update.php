<?php

error_reporting(0);
include '../database/tutordb.php';
$check=mysqli_query($dbConnected,"select id from ad");
$catch=mysqli_fetch_array($check);
if($_SESSION['id']==$catch['id']){

if (isset($_POST['activate']) || isset($_POST['activate2'])){
    $id=mysqli_real_escape_string($dbConnected,$_POST['id']);
    $active=1;
    $update= mysqli_query($dbConnected, "update data set active = '".$active."' where id='".$id."' ");
    if($_POST['activate']){
    header('location: page-ad.php?teachers=teachers');
    }
    if($_POST['activate2']){
        header('Location: adminnotification.php');
    }
}
if (isset($_POST['deactivate']) || isset($_POST['deactivate2'])){
     $id=mysqli_real_escape_string($dbConnected,$_POST['id']);
    $active=0;
    $update= mysqli_query($dbConnected, "update data set active = '".$active."' where id='".$id."' ");
    if($_POST['deactivate']){
    header('location: page-ad.php');
    }
    if($_POST['deactivate2']){
        header('Location: adminnotification.php');
    }
}
if (isset($_POST['accepted'])){
    $id=mysqli_real_escape_string($dbConnected,$_POST['id']);
    $accepted=1;
    $update= mysqli_query($dbConnected, "update data set accepted = '".$accepted."' where id='".$id."' ");
    
    $email=mysqli_query($dbConnected,"select email from data where id='".$id."'");
    $name=mysqli_query($dbConnected,"select firstname,lastname from teacherinfopersonal where id='".$id."'");
    $fetchemail=mysqli_fetch_array($email);
    $fetchname=mysqli_fetch_array($name);

   if($_POST['accepted']){
    header ('location: ../mail/activatelink.php?email='.urlencode($fetchemail['email']).'&firstname='.urlencode($fetchname['firstname']).'&lastname='.urlencode($fetchname['lastname']).'&id='.urlencode($id));
    }
}

if(isset($_POST['decline'])){
    $id=mysqli_real_escape_string($dbConnected,$_POST['id']);
    $accepted=2;
    $update= mysqli_query($dbConnected, "update data set accepted = '".$accepted."' where id='".$id."' ");
    $email=mysqli_query($dbConnected,"select email from data where id='".$id."'");
    $name=mysqli_query($dbConnected,"select firstname,lastname from teacherinfopersonal where id='".$id."'");
    $fetchemail=mysqli_fetch_array($email);
    $fetchname=mysqli_fetch_array($name);
    $reason=mysqli_real_escape_string($dbConnected,$_POST['reason']);
    
    if (empty($reason)){
    header ('location: ../mail/declinemail.php?setdecline=1&email='.urlencode($fetchemail['email']).'&firstname='.urlencode($fetchname['firstname']).'&lastname='.urlencode($fetchname['lastname']));
    }
    
    elseif(!empty($reason)){
    header ('location: ../mail/declinemail.php?setdecline=2&reason='.urlencode($reason).'&firstname='.urlencode($fetchname['firstname']).'&lastname='.urlencode($fetchname['lastname']).'&email='.urlencode($fetchemail['email']));
    }
}}
else{
    echo "you are not authorized";
}
   
?>