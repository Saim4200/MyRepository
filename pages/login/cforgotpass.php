<?php
include '../database/tutordb.php';

function generateRandomString($length = 60) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }

if(isset($_POST['submit'])){
    
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        $check=mysqli_query($dbConnected,"select email,id from data where email='".$email."'");
        
        $fid=mysqli_fetch_array($check);
        
        if($checkemail=mysqli_num_rows($check)>0){
        
        $string=generateRandomString();
        if($checkstring=mysqli_num_rows(mysqli_query($dbConnected,"select string from forgotpass where string='".$string."'"))>0)
        {$string=generateRandomString();}
        
        else{
           
        if($checkfid=mysqli_num_rows(mysqli_query($dbConnected,"select id from forgotpass where id='".$fid['id']."'"))>0){
            $updateforgotpass=mysqli_query($dbConnected,"update forgotpass set string='".$string."' where id='".$fid['id']."'");
            if($updateforgotpass==true){
                require '../mail/forgotpassemail.php';
                 echo "<script>
               alert('RESET-LINK HAS BEEN SENT TO YOUR EMAIL');
               window.location.href='../../index.php';
               </script>";
            exit();
            }
            else{
                 /*echo "<script>
               alert('SOMETHING WENT WRONG');
               window.location.href='../../index.php';
               </script>";
            exit();*/
            }
        }
            else{
        $insertnew=mysqli_query($dbConnected,"insert into forgotpass (id,string) values ('".$fid['id']."','".$string."')");
        if($insertnew==true){
           require '../mail/forgotpassemail.php';
         echo "<script>
               alert('RESET-LINK HAS BEEN SENT TO YOUR EMAIL');
               window.location.href='../../index.php';
               </script>";
            exit();
        }
            else{
               echo "<script>
               alert('SOMETHING WENT WRONG! TRY AGAIN.');
               window.location.href='forgot%20pass.php';
               </script>";
            exit();
            }
        }
        }
        
    }
    else{
         echo "<script>
                alert('YOU ARE NOT REGISTERED');
                window.location.href='../../index.php';
                </script>";
            exit();
    }
}
if(isset($_POST['change'])){
    $id=mysqli_real_escape_string($dbConnected,$_POST['id']);
    $password=mysqli_real_escape_string($dbConnected,$_POST['password']);
    $pass= password_hash($password, PASSWORD_DEFAULT);
    $insert=mysqli_query($dbConnected,"update data set pass='".$pass."' where id='".$id."'");
    if($insert==true)
    {
    
         echo "<script>
                alert('PASSWORD SUCCESSFULLY UPDATED');
                window.location.href='login.php?setlogin=1';
                </script>";
            exit();
        }
    else{
        /* echo "<script>
                alert('SOME THING WENT WRONG');
                window.location.href='resetpass.php';
                </script>";
            exit();*/
    }
}

?>