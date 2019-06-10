
<?php
include '../database/tutordb.php';

    $check=mysqli_query($dbConnected,"select email from data");
    while($checke=mysqli_fetch_array($check)){
    echo $checke['email']."<br/>";
}
 ?>
































<?php
/*include 'pages/database/tutordb.php';
$join=mysqli_query($dbConnected,"select * from request inner join response on request.nid=response.nid where request.tid='".$_SESSION['id']."'");

while($row=mysqli_fetch_array($join)){
    echo $row['nid']."<br><br>";
}




/*include 'pages/database/tutordb.php';


$match=mysqli_query($dbConnected,"select * from demo where sid='741258' ");

$row=mysqli_fetch_array($match);


$sub=mysqli_query($dbConnected,"select * from teachersubjects where sub1 or sub2 or sub3 or sub4 in ('".$row['sub1']."','".$row['sub2']."','".$row['sub3']."','".$row['sub4']."','".$row['sub5']."','".$row['sub6']."') ");

while($row2=mysqli_fetch_array($sub))
{
    
    echo $row2['id']." ".$row2['sub1']." ".$row2['sub2']." ".$row2['sub3']." ".$row2['sub4']."<br><br>";
}




echo "<script>
alert('There are no fields to generate a report');
window.location.href='index.php';
</script>";*/



?>