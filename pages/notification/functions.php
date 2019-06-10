<?php

function notif_tutor($dbConnected, $userid, $filter)
{
    if($filter==""){
        $notif=mysqli_query($dbConnected,"SELECT * FROM notifications
        inner join response on notifications.nid=response.nid
        inner join notificationtxt on notifications.notification=notificationtxt.id
        where notifications.userid=".$userid."");
    } else {
        $notif=mysqli_query($dbConnected,"SELECT * FROM notifications
        inner join response on notifications.nid=response.nid
        inner join notificationtxt on notifications.notification=notificationtxt.id
        where notifications.userid=".$userid." and ".$filter);
    }
    return $notif;
}
function notif_student($dbConnected, $userid, $filter)
{
    if($filter==""){
        $notif=mysqli_query($dbConnected,"SELECT * FROM notifications
        inner join response on notifications.nid=response.nid
        inner join notificationtxt on notifications.notification=notificationtxt.id
        where notifications.userid=".$userid."");
    } else {
        $notif=mysqli_query($dbConnected,"SELECT * FROM notifications
        inner join response on notifications.nid=response.nid
        inner join notificationtxt on notifications.notification=notificationtxt.id
        where notifications.userid=".$userid." and ".$filter);
    }
    return $notif;
}

function squery($dbConnected, $sid)
{
        $fstudent=mysqli_query($dbConnected,"select * from students where id ='".$sid."'");
        
    return mysqli_fetch_assoc($fstudent);
}
function tuition_request($dbConnected, $reqid)
{
        $freq=mysqli_query($dbConnected,"select * from request
        inner join studentsubjects on request.reqid = studentsubjects.reqid
        where request.reqid ='".$reqid."'");
    return mysqli_fetch_assoc($freq);
}

function tquery($dbConnected, $tid)
{
    $fteacher=mysqli_query($dbConnected,"select * from teacherinfopersonal where id ='".$tid."'");
    return mysqli_fetch_assoc($fteacher);
}
function sname($dbConnected,$sname)
{
$stuname=mysqli_fetch_array(mysqli_query($dbConnected,"select * from students where id='".$sname."'"));
echo $stuname['firstname'];
}
function ssub($dbConnected,$sub1,$sub2,$sub3,$sub4)
{
    $fetchsub=(mysqli_query($dbConnected,"SELECT subjectname FROM subjects WHERE sid IN ('".$sub1."', '".$sub2."', '".$sub3."', '".$sub4."')"));
    $studsub = mysqli_fetch_array($fetchsub);
    if(mysqli_num_rows($fetchsub)>1)
     return implode(", ", $studsub);    
    else 
     return $studsub['subjectname'];
}
function gradename($dbConnected,$grade)
{
     if($grade>0){
       $gname =   mysqli_fetch_array(mysqli_query($dbConnected,"select gradename from grade where gid='".$grade."'"));
        return $gname['gradename'];
    } 
    else{
        return "";
    }

}
function areaname($dbConnected,$area)
{
    if($area>0){
        $name =   mysqli_fetch_array(mysqli_query($dbConnected,"select areaname from area where id='".$area."'"));
        return $name['areaname'];
    } 
    else{
        return "";
    }
}
function locationname($dbConnected,$location)
{
    $name =   mysqli_fetch_array(mysqli_query($dbConnected,"select locationname from locatoin where lid='".$location."'"));
    return $name['locationname'];
}
function gendername($dbConnected,$gender)
{
    if($gender>0){
    $name =   mysqli_fetch_array(mysqli_query($dbConnected,"select gender from gender where gid='".$gender."'"));
    return $name['gender'];
    } 
    else{
        return "";
    }
}
function feedetails($dbConnected,$nid)
{
    if($nid>0){
     $details =   mysqli_fetch_array(mysqli_query($dbConnected,"select * from tuitionfee where nid='".$nid."'"));
    return $details;
    } 
    else{
        return array();
    }
}
function timedate($date)
{
    $ndate=date('d M Y', strtotime($date));
    $current=date('d M Y');
    if($ndate!==$current)
    {echo $ndate=date('d M', strtotime($date));}
    else{echo date('h:i a', strtotime($date));}
}
function isToday($date)
{
    $ndate=date('d M Y', strtotime($date));
    $current=date('d M Y');
    if($ndate==$current)
    { return true; }
    else
    { return false; }
}


?>