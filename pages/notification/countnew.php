<?php

    
    $countfilter=mysqli_fetch_array(mysqli_query($dbConnected,"select count(seen) from notifications
    where seen='0' and userid='".$_SESSION['id']."'"));

    if ($countfilter[0]<=0){
        echo " ";
    }
    else {
        echo $countfilter[0];
    }
?>