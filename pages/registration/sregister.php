<?php  
require '../database/tutordb.php';

function gen(){	$x = 5; // Amount of digits
$min = pow(10,$x);
$max = pow(10,$x+1)-1;
$value = rand($min, $max);
		 $firstnum =$value;
		 return $firstnum;	
}

if ($dbsuccess)
{
    $sub=$_POST['subjects'];    
    if(!empty($sub[0])){$sub1=$sub[0];}else{$sub1=0;}
    if(!empty($sub[1])){$sub2=$sub[1];}else{$sub2=0;}
    if(!empty($sub[2])){$sub3=$sub[2];}else{$sub3=0;}
    if(!empty($sub[3])){$sub4=$sub[3];}else{$sub4=0;}
    $location=$_POST['tplace'];
    $level=$_POST['level'];
    $optionAlerts=$_POST['optionsCheckboxes'];
          
    /*---------------personal info----------------------*/
     $name=mysqli_real_escape_string($dbConnected,$_POST['studentname']);

     $email=mysqli_real_escape_string($dbConnected,$_POST['email']);
     $password=mysqli_real_escape_string($dbConnected,$_POST['pass']);
     $pass= password_hash($password, PASSWORD_DEFAULT);

     $address=mysqli_real_escape_string($dbConnected,$_POST['saddress']);
     $area=$_POST['area'];

     $gender=$_POST['gender'];
     $phone=mysqli_real_escape_string($dbConnected,$_POST['phone']);

        $fpass=mysqli_query($dbConnected,"select * from data where email='".$email."'");
        if(mysqli_num_rows($fpass)>0) {
            echo "ERROR-1"; //EMAIL exists!
        } 
        else {
        
        $id=gen();
        
        while (mysqli_num_rows(mysqli_query($dbConnected,"select id from data where id='".$id."'"))>0)     
            $id=gen();
    
        $inserttinfo = mysqli_query($dbConnected,"INSERT INTO students (id,name,address,area,pnum,gender) VALUES ('".$id."','".$name."','".$address."','".$area."','".$phone."','".$gender."')");
        $insertdata  = mysqli_query($dbConnected,"INSERT INTO data (id,email,pass,accepted) VALUES ('".$id."', '".$email."','".$pass."','1')");
    
        $_SESSION['user'] = "student";
        $insertreq=mysqli_query($dbConnected,"INSERT INTO request (sid, grade, tlocation, emails, ntime) values ('".$id."','".$level."','".$location."', '".$optionAlerts."', now())");
        $_SESSION['req_id'] = mysqli_insert_id($dbConnected);
        $insertsub=mysqli_query($dbConnected,"INSERT INTO studentsubjects (reqid,sub1,sub2,sub3,sub4) values('".$_SESSION['req_id']."','".$sub1."','".$sub2."','".$sub3."','".$sub4."')");
        $insertoptions=mysqli_query($dbConnected,"INSERT INTO requestoptions (reqid,emails) values('".$_SESSION['req_id']."','".$optionAlerts."')");
 
        if($inserttinfo && $insertdata)
        { 
            $_SESSION['id'] = $id;
            include '../mail/activatelinkstud.php';
            echo "SUCCESS";
        }
        else
        {
            echo "ERROR-2";  // something went wrong
        }
        }
}
else{
    echo "ERROR-2";
}
mysqli_close($dbConnected);
?>
