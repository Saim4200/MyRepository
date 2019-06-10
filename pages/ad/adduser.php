<?php
error_reporting(0);
if(isset($_GET['setadduser'])==1){
      
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
 $dob=mysqli_real_escape_string($dbConnected,$_POST['dob']);
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
 $sub1=mysqli_real_escape_string($dbConnected,$_POST['sub1']);
 $sub2=mysqli_real_escape_string($dbConnected,$_POST['sub2']);
 $sub3=mysqli_real_escape_string($dbConnected,$_POST['sub3']);
 $sub4=mysqli_real_escape_string($dbConnected,$_POST['sub4']);
 $degree = mysqli_real_escape_string($dbConnected,$_FILES['degree']['name']);
 $CNICpic = mysqli_real_escape_string($dbConnected,$_FILES['CNICpic']['name']);
 $gender=mysqli_real_escape_string($dbConnected, $_POST['gender']); 
 
 
 
    if($area==0 || $intersub==0 || $location==0 || $qualification==0 ){
           echo "<script>
                alert('INCOMPLETE FORM SUBMISSION!!');
                window.location.href='form.php?setform=1?setform=1';
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
             
                 $inserttinfo ="INSERT INTO  teacherinfopersonal (id,firstname,lastname,CNIC,address,area,pnum,wnum,dob,skype,gender) VALUES ('{$id}', '{$firstname}','{$lastname}','{$CNIC}','{$address}','{$area}','{$pnum}','{$wnum}','{$dob}','{$skypeid}','{$gender}')";
                  
                 $inserttpinfo="INSERT INTO  teacherinfoprofessional (id,qualification,intersub,majorsub,location,institute) VALUES ('{$id}', '{$qualification}','{$intersub}','{$majorsub}','{$location}','".$institute."')";
                  
                 $inserttpic  ="INSERT INTO  teacherinfopic(id,degree,CNICpic) VALUES ('{$id}','','')";
                      
                 $inserttsub  ="INSERT INTO  teachersubjects (id,sub1,sub2,sub3,sub4) VALUES ('{$id}', '{$sub1}','{$sub2}','{$sub3}','{$sub4}')";
                  
                 $insertdata  ="INSERT INTO  data (id,email,pass,active,accepted) VALUES ('{$id}', '{$email}','{$pass}','1','1')";
                   
                   

                 if(mysqli_query($dbConnected, $inserttinfo) && mysqli_query($dbConnected, $inserttpinfo) && mysqli_query($dbConnected, $inserttpic) && mysqli_query($dbConnected, $inserttsub) && mysqli_query($dbConnected, $insertdata))
                 {
                    echo "<script>
                            alert('TUTOR ADDED SUCCESSFULLY.');
                            window.location.href='page-ad.php?teachers=teachers';
                            </script>";
                }
                else
                {
                         echo "<script>
                                alert('SOMETHING WENT WRONG! TRY AGAIN.');
                                window.location.href='adduserform.php?adduserform=1';
                                </script>";
                }
            
    }
}
    else{
    header("Location: page-ad.php?teachers=teachers");
}
}

else{
    header('Location: page-ad.php?teachers=teachers');
}
    
}else{
    header('Location: page-ad.php?teachers=teachers');
}
?>