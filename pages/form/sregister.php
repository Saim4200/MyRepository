<?php  
require '../database/tutordb.php';

function gen(){	$x = 5; // Amount of digits
$min = pow(10,$x);
$max = pow(10,$x+1)-1;
$value = rand($min, $max);
		 $firstnum =$value;
		 return $firstnum;	
}
$response = array();

if ($dbsuccess)
{
    if(isset($_POST['submit'])){
          
    /*---------------personal info----------------------*/
     $name=mysqli_real_escape_string($dbConnected,$_POST['name']);

     $email=mysqli_real_escape_string($dbConnected,$_POST['email']);
     $password=mysqli_real_escape_string($dbConnected,$_POST['pass']);
     $pass= password_hash($password, PASSWORD_DEFAULT);

     $address=mysqli_real_escape_string($dbConnected,$_POST['saddress']);
     $area=$_POST['area'];

     $gender=$_POST['gender'];
     $phone=mysqli_real_escape_string($dbConnected,$_POST['phone']);

     $id=gen();
    
        $idresult=mysqli_query($dbConnected,"select id from data where id='".$id."'");
        $fe=mysqli_query($dbConnected,"select email from data where email='".$email."'");
    
    if (mysqli_num_rows($idresult)>0)
    {
        $id=gen();
    }
        
    if(mysqli_num_rows($fe)>0)
    {
        $response["result"] = "ERROR-1";
        echo json_encode($response);
    }
    else{
             
        $inserttinfo =mysqli_query($dbConnected,"INSERT INTO students (id,name,address,area,pnum,gender) VALUES ('".$id."','".$name."','".$address."','".$area."','".$phone."','".$gender."')");
                  
        $insertdata =mysqli_query($dbConnected,"INSERT INTO data (id,email,pass,accepted) VALUES ('".$id."', '".$email."','".$pass."','1')");

        if($inserttinfo && $insertdata)
        {
            $_SESSION['id'] = $id;
            include '../mail/activatelinkstud.php';
            $response["result"] = "SUCCESS";
            echo json_encode($response);
         }
         else
         {
            $response["result"] = "ERROR-2";
            echo json_encode($response);
        }

    }
    }
}
else{
        $response["result"] = "ERROR-2";
        echo json_encode($response);
}
mysqli_close($dbConnected);
?>
