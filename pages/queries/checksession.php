<?php
$checktsession=mysqli_query($dbConnected,"select * from teacherinfo where id='".$_SESSION['id']."'");
$checkssession=mysqli_query($dbConnected,"select * from students where id='".$_SESSION['id']."'");
?>