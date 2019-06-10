<?php
include '../database/tutordb.php';

$insert=mysqli_query($dbConnected,"insert into teacherareas(id) select id from data");
if($insert==true){
    echo 'copied';
}
else {
    echo 'failed';
}

?>