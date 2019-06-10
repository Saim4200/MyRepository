<?php

$gettinfo=mysqli_query($dbConnected,
            "select * from teacherinfoprofessional
            inner join teacherinfopersonal on teacherinfoprofessional.id=teacherinfopersonal.id
            inner join qualification on teacherinfoprofessional.qualification=qualification.qid
            inner join locatoin on teacherinfoprofessional.location=locatoin.lid 
            inner join teacherinfopic on teacherinfopic.ID=teacherinfoprofessional.id 
            where teacherinfoprofessional.id='".$row2['id']."'");

            
$fetchtinfo=mysqli_fetch_array($gettinfo);

$tsubjects=mysqli_query($dbConnected,"select * from teachersubjects where id='".$row2['id']."'");
$tarea=mysqli_query($dbConnected,"select areaname from area where id='".$fetchtinfo['area']."'");

$srcpic='../profilepic/'.$fetchtinfo['profilepic'];
             
            

?>