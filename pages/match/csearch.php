<?php

    function gen(){	$x = 5; // Amount of digits
            $min = pow(10,$x);
            $max = pow(10,$x+1)-1;
            $value = rand($min, $max);
            $firstnum =$value;
            return $firstnum;  
    }

include'../database/tutordb.php';

if (isset($_POST['auto'])){
        
     $level=$sub1=$sub2=$sub3=$sub4=$area=$location=$gender=0;
    $sub=$_POST['sub'];
    if(!empty($sub[0])){$sub1=$sub[0];}else{$sub1=0;}
    if(!empty($sub[1])){$sub2=$sub[1];}else{$sub2=0;}
    if(!empty($sub[2])){$sub3=$sub[2];}else{$sub3=0;}
    if(!empty($sub[3])){$sub4=$sub[3];}else{$sub4=0;}
    $location=$_POST['tplace'];
    $level=$_POST['grade'];


if(isset($_SESSION['id'])){
    include '../queries/checksession.php';

if(mysqli_num_rows($checktsession)>0){
            echo "<script>
                alert('TUTORS ARE NOT ALLOWED TO SEND REQUEST!');
                window.location.href='../../index.php';
                </script>";
        exit();
    }
elseif(mysqli_num_rows($checkssession)>0){
    
    $sid = $_SESSION['id'];
    
    $nid=gen();
    
    $checknid=mysqli_query($dbConnected,"select nid from response where nid='".$nid."'");
    if (mysqli_num_rows($checknid)>0)
    {
        $nid=gen();
    }
    else{
    
        $checksid=mysqli_query($dbConnected,"SELECT sid FROM automatch WHERE sid=".$sid);
        if (mysqli_num_rows($checksid)>0)
            $insertreq=mysqli_query($dbConnected,"UPDATE automatch SET grade='".$level."',sub1='".$sub1."',sub2='".$sub2."',sub3=".$sub3.",sub4='".$sub4."',tplace='".$location."' WHERE sid=".$sid);
        else
            $insertreq=mysqli_query($dbConnected,"INSERT INTO automatch (sid,grade,sub1,sub2,sub3,sub4,tplace) 
                                            values ('".$sid."','".$level."','".$sub1."','".$sub2."','".$sub3."','".$sub4."','".$location."')");
    if($insertreq){
        $insertnotif=mysqli_query($dbConnected,"INSERT INTO adnotifications (nid,userid,notification) values ('".$nid."','".$sid."','New Tuition Request for %subjects% of %grade% %area%. %location%')");
    }
       if(($insertreq) && ($insertnotif)){
            echo "<script>
                alert('YOUR REQUEST SENT SUCCESSFULLY.');
                window.location.href='autosearch.php';
                </script>";
        }
        else{
            echo "<script>
                alert('UNABLE TO SEND YOUR REQUEST! TRY AGAIN.');
                window.location.href='autosearch.php';
                </script>";
        }
    }
}
}
else{
            echo "<script>
                alert('YOU ARE NOT LOGGED IN!');
                window.location.href='../login/login.php?setlogin=1';
                </script>";
}
}

?>