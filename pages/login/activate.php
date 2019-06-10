<?php

include '../database/tutordb.php';
if ($dbsuccess){
    
    if (isset($_POST['submit']))
    {
       $password = mysqli_real_escape_string($dbConnected,$_POST['pass']);
       $id=mysqli_real_escape_string($dbConnected,$_POST['id']);
        
       if (empty($id) || empty($password)) {
            echo '<script type="text/javascript">  window.onload = function(){
                      alert("ENTER ID AND PASSWORD");
                    }</script>';
                                               exit();}
       
       else{
           
           $sqlquery=mysqli_query($dbConnected, "SELECT * FROM data WHERE id='".$id."'");
             
           $check=mysqli_num_rows($sqlquery);
           
           if ($check < 1)
             {
                echo '<script type="text/javascript">  window.onload = function(){
                      alert("YOU ARE NOT REGISTERED");
                    }</script>';
                 exit();
             }
           elseif($check >=1){
               if ($row = mysqli_fetch_assoc($sqlquery)){
                     
                     $passverify = password_verify($password, $row['pass']);
                  if ($passverify == false)
                  {
                       echo '<script type="text/javascript">  window.onload = function(){
                      alert("ENTER CORRECT PASSWORD");
                    }</script>';
                  }
                   elseif ($passverify == true) {
                       $active=1;
                       $activation=mysqli_query($dbConnected,"UPDATE data active='".$active."' where id='".$id."'");
                       
                       
                       
                       $_SESSION['id']=$row['id'];
                    
                       
                       header('Location: ../login/account.php?setaccount=1');
                       exit();
                   }
                 }
               }
             }
           }
    
    else{
        header('location: ../../index.php');
        exit();
    }
}


?>