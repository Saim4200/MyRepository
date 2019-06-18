<?php

include '../database/tutordb.php';
if ($dbsuccess){
    
    if (isset($_POST['login-email']) && isset($_POST['login-password']))
    {
       $email = mysqli_real_escape_string($dbConnected,$_POST['login-email']);
       $password = mysqli_real_escape_string($dbConnected,$_POST['login-password']);
        
       if (empty($email) || empty($password)) {
            echo 'ERROR-1';  
       }
       else{
           $sqlquery=mysqli_query($dbConnected, "SELECT * FROM data WHERE email='".$email."'");
             
           $check=mysqli_num_rows($sqlquery);
           
            if ($check < 1)
            {
                echo 'ERROR-2'; // not registered
            }
           else{
               if ($row = mysqli_fetch_assoc($sqlquery)){
                     
                $passverify = password_verify($password, $row['pass']);
                if ($passverify == false)
                {
                    echo 'ERROR-3';
                }
                elseif ($passverify == true) {
                           
                    $_SESSION['email']=$row['email'];
                    $_SESSION['id']=$row['id'];

                    include '../queries/checksession.php';
                        
                    if(mysqli_num_rows($checktsession)>0){
                        $_SESSION['usertype']='student';
                        echo 'SUCCESS-1';
                    }
                    elseif(mysqli_num_rows($checkssession)>0){
                        $_SESSION['usertype']='tutor';
                        echo 'SUCCESS-2';
                    }
                }
            } else {
                echo 'ERROR-4';
                }
           }
       }
    }
    else{
        echo 'ERROR-1';
    }
}
mysqli_close($dbConnected);

?>