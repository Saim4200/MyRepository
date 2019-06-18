<?php
error_reporting(0);
      
require '../database/tutordb.php';
    
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);

        
function gen(){	$x = 5; // Amount of digits
    $min = pow(10,$x);
    $max = pow(10,$x+1)-1;
    $value = rand($min, $max);
    $firstnum =$value;
    return $firstnum;
}


if ($dbsuccess)
{
if(isset($_SESSION['id'])){
    header('Location: ../../index.php');
}
else{

 $fullname=mysqli_real_escape_string($dbConnected,$_POST['fullname']);
 $email=mysqli_real_escape_string($dbConnected,$_POST['email']);
 $password=mysqli_real_escape_string($dbConnected,$_POST['pass']);
 $pass= password_hash($password, PASSWORD_DEFAULT);
 $CNIC=mysqli_real_escape_string($dbConnected,$_POST['cnic']);
 $address=mysqli_real_escape_string($dbConnected,$_POST['address']);
 $area=mysqli_real_escape_string($dbConnected,$_POST['tarea']);
 $pnum=mysqli_real_escape_string($dbConnected,$_POST['pnum']);
 $gender=mysqli_real_escape_string($dbConnected, $_POST['gender']); 
 $day=mysqli_real_escape_string($dbConnected, $_POST['day']); 
 $month=mysqli_real_escape_string($dbConnected, $_POST['month']); 
 $year=mysqli_real_escape_string($dbConnected, $_POST['year']); 
 $dob = $day.'/'.$month.'/'.$year;
    
 $qualification=mysqli_real_escape_string($dbConnected,$_POST['qualification']);
 $institute=mysqli_real_escape_string($dbConnected,$_POST['institute']);
 $major=mysqli_real_escape_string($dbConnected,$_POST['field']);    
 $passingyear=mysqli_real_escape_string($dbConnected,$_POST['passingyear']);    

 $location=$_POST['tplace'];    
 $subjects = $_POST['subjects'];
 $areas=$_POST['areas'];
 
 
    $subjects =  array_unique($subjects, SORT_NUMERIC);
    $areas = array_unique($areas,SORT_NUMERIC);
     

    $id=gen();
    $fi=mysqli_query($dbConnected,"select id from data where id='".$id."' ");
    $fe=mysqli_query($dbConnected,"select email from data where email='".$email."' ");
    $fc=mysqli_query($dbConnected,"select CNIC from teacherinfo where CNIC='".$CNIC."'");
        
    if(mysqli_num_rows($fe)>0) { 
          echo "ERROR-1";
            exit();
    }
    if(mysqli_num_rows($fc)>0){
          echo "ERROR-2";
            exit();
    }
    elseif(mysqli_num_rows($fi)>0)
    {
        $id=gen();
    }
    else
    {                
        $subn = array(0,0,0,0);
        $i=0;
        foreach ($subs as $sub) {
            $subn[$i] =  $sub;
            $i+=1;
        }
        $arean = array(0,0,0,0,0,0);
        $i=0;
        foreach ($areas as $a) {
            $arean[$i] =  $a;
            $i+=1;
        }

         $insert1 ="INSERT INTO  teacherinfo (id,fullname,CNIC,pnum,address,area,dob,gender) VALUES ('{$id}', '{$fullname}','{$CNIC}','{$pnum}','{$address}','{$area}','{$dob}','{$gender}')";
          
         $insert2 ="INSERT INTO  teacherqualification (ID,qualification,institute,specialization,passingyear,location) VALUES ('{$id}', '{$qualification}','{$institute}','{$major}','{$passingyear}','{$location}')";
                        
         $insert3 ="INSERT INTO  teachersubjects (id,sub1,sub2,sub3,sub4) VALUES ('{$id}', '".$subn[0]."','".$subn[1]."','".$subn[2]."','".$subn[3]."')";
          
         $insert4 ="INSERT INTO data (id,email,pass) VALUES ('{$id}', '{$email}','{$pass}')";
         
         $insert5 = "INSERT INTO teacherareas (id,varea1,varea2,varea3,varea4,varea5,varea6) VALUES ('{$id}', '".$arean[0]."', '".$arean[1]."', '".$arean[2]."', '".$arean[3]."', '".$arean[4]."', '".$arean[5]."')";
                   
                   
         if(mysqli_query($dbConnected, $insert1) && mysqli_query($dbConnected, $insert2) && mysqli_query($dbConnected, $insert3) && mysqli_query($dbConnected, $insert4) && mysqli_query($dbConnected, $insert5))
         {
            // include '../mail/registration.php';
            echo "SUCCESS";
        }
        else
        {
            echo "ERROR-3";
        }
    }
}
    
}
else{
    header('Location: ../../index.php');
}
?>
