
<?php 
include '../database/tutordb.php';
if(isset($_SESSION['id'])){

    $countfilter=mysqli_fetch_array(mysqli_query($dbConnected,"select count(seen) from notifications
    where seen='0' and userid='".$_SESSION['id']."'"));

    echo $countfilter[0];
} else {
    echo "";
}
?>