<?php
error_reporting(0);
include '../database/tutordb.php';
$check=mysqli_query($dbConnected,"select id from ad");
$catch=mysqli_fetch_array($check);
if($_SESSION['id']==$catch['id']){

if(isset($_POST['add'])){
       $subject=mysqli_real_escape_string($dbConnected,$_POST['subject']);
    $sid=mysqli_query($dbConnected,"select max(sid) from subjects");
    $row=mysqli_fetch_array($sid);
    $updatedsid=$row['max(sid)']+1;

       $insertsubject= mysqli_query($dbConnected,"insert into subjects (sid,subjectname) values ('".$updatedsid."','".$subject."')");
    
       if ($insertsubject){
           header ('Location: add.php?setsubject=1');
       }
        else{
            echo "something went wrong";
        }
}
if(isset($_POST['remove']))
{
        $subject=mysqli_real_escape_string($dbConnected,$_POST['removesubject']);
        $deletesubject=mysqli_query($dbConnected,"delete from subjects where sid='".$subject."'");
    if($deletesubject){
        $sid=mysqli_query($dbConnected,"select sid from subjects");
        $i=0;
        while($row=mysqli_fetch_array($sid)){
            $i++;
            $updatesid=mysqli_query($dbConnected,"update subjects set sid='".$i."'  where sid='".$row['sid']."'");
        }
        header('Location: add.php?setsubject=1');
    }
    else{
        echo "something went wrong";
    }
}}
else{
    echo "you re not authorized";
}
?>