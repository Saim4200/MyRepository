<?php

$filters = array();

$tgrade=0;
if(!empty($grade)){
    $fminqualif=mysqli_query($dbConnected,"SELECT minqualification from grade where gid='".$grade."'");
$tgrade = mysqli_fetch_array($fminqualif);
$filters['0'] = "(teacherinfoprofessional.qualification >= ".$tgrade['minqualification'].")";
}


$matchsub  = array();

if(!empty($sub1) && $sub1 > 0)
    $matchsub['str'] = "(teachersubjects.sub1=".$sub1." or teachersubjects.sub2=".$sub1." or teachersubjects.sub3=".$sub1." or teachersubjects.sub4=".$sub1.")";
if(!empty($sub2) && $sub2 > 0)
    $matchsub['str2'] = "(teachersubjects.sub1=".$sub2." or teachersubjects.sub2=".$sub2." or teachersubjects.sub3=".$sub2." or teachersubjects.sub4=".$sub2.")";
if(!empty($sub3) && $sub3 > 0)
    $matchsub['str3'] = "(teachersubjects.sub1=".$sub3." or teachersubjects.sub2=".$sub3." or teachersubjects.sub3=".$sub3." or teachersubjects.sub4=".$sub3.")";
if(!empty($sub4) && $sub4 > 0)
    $matchsub['str4'] = "(teachersubjects.sub1=".$sub4." or teachersubjects.sub2=".$sub4." or teachersubjects.sub3=".$sub4." or teachersubjects.sub4=".$sub4.")";

$filters['1'] = "(".implode(" and ",$matchsub).")";

if(!empty($area) && $area>0){
if(!empty($location) && $location==2)
    $filters['2'] = "(teacherinfopersonal.area=".$area." or teacherareas.varea1=".$area." or teacherareas.varea2=".$area." or teacherareas.varea3=".$area." or teacherareas.varea4=".$area." or teacherareas.varea5=".$area." or teacherareas.varea6=".$area.")"; 
else if(!empty($location) && $location==1)
    $filters['2'] = "(teacherinfopersonal.area=".$area.")"; 
}

if(!empty($location) && $location>0){
    $filters['3'] = "(teacherinfoprofessional.location=".$location.")";
}
if(!empty($gender) && $gender>0)
    $filters['4'] = "(teacherinfopersonal.gender = ".$gender.")";

   
   $query = "select * from data
    inner join teacherinfopersonal on data.id=teacherinfopersonal.id
    inner join teachersubjects on data.id=teachersubjects.id
    inner join teacherareas on data.id=teacherareas.id
    inner join teacherinfoprofessional on data.id=teacherinfoprofessional.id 
    where (data.active=1 and data.accepted=1) 
    and 
    ".implode(" and ", $filters);
    
   
    $tsearch=mysqli_query($dbConnected,$query);
    