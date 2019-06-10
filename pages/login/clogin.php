<?php

include '../database/tutordb.php';
if ($dbsuccess){
    
    if (isset($_POST['submit']))
    {
       $email = mysqli_real_escape_string($dbConnected,$_POST['email']);
       $password = mysqli_real_escape_string($dbConnected,$_POST['pass']);
        
       if (empty($email) || empty($password)) {
            echo '<script type="text/javascript">  window.onload = function(){
                      alert("ENTER EMAIL AND PASSWORD");
                    }</script>';
                                               exit();}
       
       else{
           
           $sqlquery=mysqli_query($dbConnected, "SELECT * FROM data WHERE email='".$email."'");
             
           $check=mysqli_num_rows($sqlquery);
           
           if ($check < 1)
             {
                echo '<script type="text/javascript">  window.onload = function(){
                      alert("EMAIL NOT REGISTERED.");
                    }</script>';
           
                 exit();
             }
           else{
               if ($row = mysqli_fetch_assoc($sqlquery)){
                     
                $passverify = password_verify($password, $row['pass']);
                  if ($passverify == false)
                  {
                       echo '<script type="text/javascript">  window.onload = function(){
                      alert("ENTER CORRECT PASSWORD");
                    }</script>';
                  }
                   elseif ($passverify == true) {
                           
                       $_SESSION['email']=$row['email'];
                       $_SESSION['id']=$row['id'];

                        include '../queries/checksession.php';
                        
                        if(mysqli_num_rows($checktsession)>0){
                            header('Location: ../../index.php');
                        }
                        elseif(mysqli_num_rows($checkssession)>0){
                            header('Location: ../match/autosearch.php');
                        }
                   }
                } else {
                    echo '<script type="text/javascript">  window.onload = function(){
                      alert("SOMETHING WENT WRONG! TRY AGAIN.");
                    }</script>';

                }
           }
       }
    }
    
    else{
        header('Location: ../../index.php');
        exit();
    }
}


?>