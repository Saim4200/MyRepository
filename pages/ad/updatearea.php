<?php
error_reporting(0);
include '../database/tutordb.php';
$check=mysqli_query($dbConnected,"select id from ad");
$catch=mysqli_fetch_array($check);
if($_SESSION['id']==$catch['id']){

if(isset($_POST['add'])){
       $subject=mysqli_real_escape_string($dbConnected,$_POST['subject']);
    $id=mysqli_query($dbConnected,"select max(id) from area");
    $row=mysqli_fetch_array($id);
    $updatedid=$row['max(id)']+1;

       $insertsubject= mysqli_query($dbConnected,"insert into area (id,areaname) values ('".$updatedid."','".$subject."')");
    
       if ($insertsubject){
           header ('Location: add.php?setarea=1');
       }
        else{
            echo "something went wrong";
        }
}
if(isset($_POST['remove']))
{
        $subject=mysqli_real_escape_string($dbConnected,$_POST['removesubject']);
        $deletesubject=mysqli_query($dbConnected,"delete from area where id='".$subject."'");
    if($deletesubject){
        $id=mysqli_query($dbConnected,"select id from area");
        $i=0;
        while($row=mysqli_fetch_array($id)){
            $i++;
            $updateid=mysqli_query($dbConnected,"update area set id='".$i."'  where id='".$row['id']."'");
        }
        header('Location: add.php?setarea=1');
    }
    else{
        echo "something went wrong";
    }
}}
else{
    echo" you are not authorized";
}
?>