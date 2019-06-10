<?php
error_reporting(0);
if(isset($_GET['setreg'])==1){
      
require '../database/tutordb.php';
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);

if ($dbsuccess)
{
if(isset($_POST['submit'])){
        
    function gen(){	$x = 5; // Amount of digits
            $min = pow(10,$x);
            $max = pow(10,$x+1)-1;
            $value = rand($min, $max);
                     $firstnum =$value;
                     return $firstnum;
		
    }
 $firstname=mysqli_real_escape_string($dbConnected,$_POST['firstname']);
 $lastname=mysqli_real_escape_string($dbConnected,$_POST['lastname']);
 $email=mysqli_real_escape_string($dbConnected,$_POST['email']);
 $password=mysqli_real_escape_string($dbConnected,$_POST['pass']);
 $pass= password_hash($password, PASSWORD_DEFAULT);
 $institute=mysqli_real_escape_string($dbConnected,$_POST['institute']);
 $CNIC=mysqli_real_escape_string($dbConnected,$_POST['CNIC']);
 $institute=mysqli_real_escape_string($dbConnected,$_POST['institute']);
 $address=mysqli_real_escape_string($dbConnected,$_POST['address']);
 $area=mysqli_real_escape_string($dbConnected,$_POST['area']);
 $pnum=mysqli_real_escape_string($dbConnected,$_POST['pnum']);
 $wnum=mysqli_real_escape_string($dbConnected,$_POST['wnum']);
 $skypeid=mysqli_real_escape_string($dbConnected,$_POST['skypeid']);
 $intersub=mysqli_real_escape_string($dbConnected,$_POST['intersub']);    
 $majorsub=mysqli_real_escape_string($dbConnected,$_POST['majorsub']);    
 $location=mysqli_real_escape_string($dbConnected,$_POST['location']);    
 $qualification=mysqli_real_escape_string($dbConnected,$_POST['qualification']);
 $subs = array();
 $subs[0]=mysqli_real_escape_string($dbConnected,$_POST['sub1']);
 $subs[1]=mysqli_real_escape_string($dbConnected,$_POST['sub2']);
 $subs[2]=mysqli_real_escape_string($dbConnected,$_POST['sub3']);
 $subs[3]=mysqli_real_escape_string($dbConnected,$_POST['sub4']);
 $degree = mysqli_real_escape_string($dbConnected,$_FILES['degree']['name']);
 $CNICpic = mysqli_real_escape_string($dbConnected,$_FILES['CNICpic']['name']);
 $gender=mysqli_real_escape_string($dbConnected, $_POST['gender']); 
 $areas = array();
 $areas[0]=mysqli_real_escape_string($dbConnected,$_POST['area1']);
 $areas[1]=mysqli_real_escape_string($dbConnected,$_POST['area2']);
 $areas[2]=mysqli_real_escape_string($dbConnected,$_POST['area3']);
 $areas[3]=mysqli_real_escape_string($dbConnected,$_POST['area4']);
 $areas[4]=mysqli_real_escape_string($dbConnected,$_POST['area5']);
 $areas[5]=mysqli_real_escape_string($dbConnected,$_POST['area6']);

 
 
    if($area==0 || $intersub==0 || $location==0 || $qualification==0 ){
           echo "<script>
                alert('FORM INCOMPLETE!!');
                window.location.href='form.php?setform=1';
                </script>";
                exit();
    }
    $subs =  array_unique($subs, SORT_NUMERIC);
    $areas = array_unique($areas,SORT_NUMERIC);
    
    if($location==2 && count($areas)==1){
           echo "<script>
                alert('FORM INCOMPLETE!!');
                window.location.href='form.php?setform=1';
                </script>";
                exit();
    }      

    $id=gen();
    $fi=mysqli_query($dbConnected,"select id from data where id='".$id."' ");
    $fe=mysqli_query($dbConnected,"select email from data where email='".$email."' ");
    $fc=mysqli_query($dbConnected,"select CNIC from teacherinfopersonal where CNIC='".$CNIC."'");
        
    if(mysqli_num_rows($fe)>0) { 
          echo "<script>
                alert('EMAIL ALREADY REGISTERED!');
                window.location.href='form.php?setform=1?setform=1';
                </script>";
            exit();
    }
    if(mysqli_num_rows($fc)>0){
          echo "<script>
                alert('CNIC ALREADY REGISTERED!');
                window.location.href='form.php?setform=1?setform=1';
                </script>";
            exit();
    }
    elseif(mysqli_num_rows($fi)>0)
    {
        $id=gen();
    }
    else
    {
        if (! file_exists($_FILES["degree"]["tmp_name"])) {
                   echo "<script>
                        alert('DEGREE PICTURE NOT UPLOADED!');
                        window.location.href='form.php?setform=1';
                        </script>";
                    exit();
        }
        else {
        
        $temp = explode(".", $_FILES["degree"]["name"]);
        $newfilename =  $CNIC.'.' . end($temp);
        $target_dir = "../degree/";
        $target_file = $target_dir . $newfilename;

        // Get image file extension
        $file_extension = strtolower(pathinfo($_FILES["degree"]["name"], PATHINFO_EXTENSION));
        $allowed_image_extension = array("png","jpg","jpeg");
        
         // Validate file input to check if is with valid extension
         if (! in_array($file_extension, $allowed_image_extension)) {
                echo "<script>
                alert('DEGREE MUST BE AN IMAGE FILE! Only 'JPG/JPEG/PNG' formats are allowed.');
                window.location.href='form.php?setform=1';
                </script>";
                exit();
         }
            // Check file size
            if ($_FILES["degree"]["size"] > 10485760) {
               echo "<script>
                    alert('DEGREE IMAGE IS TOO LARGE! Maximum 10MB allowed.');
                    window.location.href='form.php?setform=1';
                    </script>";
                exit();
            }
            if (move_uploaded_file($_FILES["degree"]["tmp_name"], $target_file)) 
            { }
             else {
                 echo "<script>
                        alert('ERROR UPLOADING YOUR DEDREE PICTURE! TRY AGAIN');
                        window.location.href='form.php?setform=1';
                        </script>";
                exit();
            }
        }
/*--------------------cnic-file--------------------------------------------------------*/
       
        if (! file_exists($_FILES["CNICpic"]["tmp_name"])) {
                   echo "<script>
                        alert('CNIC PICTURE NOT FOUND!');
                        window.location.href='form.php?setform=1';
                        </script>";
                    exit();
        }
        else {
       
        $temp1 = explode(".", $_FILES["CNICpic"]["name"]);
        $newfilename1 =  $CNIC. '.' . end($temp1);
        $target_dir1 = "../CNICpic/";
        $target_file1 = $target_dir1 . $newfilename1;

        // Get image file extension
        $file_extension = strtolower(pathinfo($_FILES["CNICpic"]["name"], PATHINFO_EXTENSION));
        $allowed_image_extension = array("png","jpg","jpeg");
        
         // Validate file input to check if is with valid extension
         if (! in_array($file_extension, $allowed_image_extension)) {
                echo "<script>
                alert('CNIC PICTURE MUST BE AN IMAGE FILE! Only 'JPG/JPEG/PNG' formats are allowed.');
                window.location.href='form.php?setform=1';
                </script>";
                exit();
         }
            // Check file size
            if ($_FILES["CNICpic"]["size"] > 10485760) {
               echo "<script>
                    alert('CNIC PICTURE IS TOO LARGE! Maximum 10MB allowed.');
                    window.location.href='form.php?setform=1';
                    </script>";
                exit();
            }

            if (move_uploaded_file($_FILES["CNICpic"]["tmp_name"], $target_file1)) 
            {}
             else {
               echo "<script>
                alert('ERROR UPLOADING YOUR CNIC PICTURE! TRY AGAIN.');
                window.location.href='form.php?setform=1';
                </script>";
                exit();
            }
        }
        
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

         $inserttinfo ="INSERT INTO  teacherinfopersonal (id,firstname,lastname,CNIC,address,area,pnum,wnum,skype,gender) VALUES ('{$id}', '{$firstname}','{$lastname}','{$CNIC}','{$address}','{$area}','{$pnum}','{$wnum}','{$skypeid}','{$gender}')";
          
         $inserttpinfo="INSERT INTO  teacherinfoprofessional (id,qualification,intersub,majorsub,location,institute) VALUES ('{$id}', '{$qualification}','{$intersub}','{$majorsub}','{$location}','".$institute."')";
          
         $inserttpic  ="INSERT INTO  teacherinfopic(id,degree,CNICpic) VALUES ('{$id}','{$newfilename}','{$newfilename1}')";
              
         $inserttsub  ="INSERT INTO  teachersubjects (id,sub1,sub2,sub3,sub4) VALUES ('{$id}', '".$subn[0]."','".$subn[1]."','".$subn[2]."','".$subn[3]."')";
          
         $insertdata  ="INSERT INTO data (id,email,pass) VALUES ('{$id}', '{$email}','{$pass}')";
         
         $insertareas= "INSERT INTO teacherareas (id,varea1,varea2,varea3,varea4,varea5,varea6) VALUES ('{$id}', '".$arean[0]."', '".$arean[1]."', '".$arean[2]."', '".$arean[3]."', '".$arean[4]."', '".$arean[5]."')";
                   
                   
         if(mysqli_query($dbConnected, $inserttinfo) && mysqli_query($dbConnected, $inserttpinfo) && mysqli_query($dbConnected, $inserttpic) && mysqli_query($dbConnected, $inserttsub) && mysqli_query($dbConnected, $insertdata) && mysqli_query($dbConnected, $insertareas))
         {
            include '../mail/registration.php';
            echo "<script>
                alert('YOU ARE SUCCESSFULLY REGISTERED.');
                window.location.href='../../index.php';
                </script>";
        }
        else
        {
               $deletecnic=unlink($target_file);
               $deletedegree=unlink($target_file1);
            echo "<script>
                alert('SOMETHING WENT WRONG! TRY AGAIN.');
                window.location.href='form.php?setform=1';
                </script>";
        }
    }
}
    else{
    header("Location: ../../index.php");
}
}

else{
    header('Location: ../../index.php');
}
    
}else{
    header('Location: ../../index.php');
}
?>