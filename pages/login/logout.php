<?php
if(isset($_GET['setlogout'])==1)
{
    

include '../database/tutordb.php';
if ($dbsuccess){
    session_unset();
    session_destroy();
    header("Cache-Control: no-cache");
header("Pragma: no-cache");
    header ('Location: login.php?setlogin=1');
    exit();
}
}
else{
    header('Location: login.php?setlogin=1');
}
?>