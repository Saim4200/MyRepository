<?php
if (isset($_SESSION['id'])){
    header('Location :../../index.php');
}
else{
    
include '../database/tutordb.php';
if ($dbsuccess){
    
    if (isset($_POST['submit']))
    {
       $password = mysqli_real_escape_string($dbConnected,$_POST['pass']);
       $id=mysqli_real_escape_string($dbConnected,$_POST['id']);
        
       if (empty($id) || empty($password)) {
           header('Location: account.php?setaccount=1&error=1');
                                               exit();}
       
       else{
           
           $sqlquery=mysqli_query($dbConnected, "SELECT * FROM data WHERE id='".$id."'");
             
           $check=mysqli_num_rows($sqlquery);
           
           if ($check < 1)
             {
               header('Location: account.php?setaccount=1&error=2');
                 exit();
             }
           elseif($check >=1){
               if ($row = mysqli_fetch_assoc($sqlquery)){
                     
                     $passverify = password_verify($password, $row['pass']);
                  if ($passverify == false)
                  {
                      header('Location: account.php?setaccount=1&error=3');
                      exit();
                  }
                   elseif ($passverify == true) {
                       $checkactive=mysqli_query($dbConnected,"select active from data where id='".$id."'");
                       $chk=mysqli_fetch_array($checkactive);
                       
                       
                       if($chk['active']==1)
                       {
                           header('location: ../../index.php');
                       }
                       elseif($chk['active']==0)
                       {
                       $active=1;
                       
                       $activation=mysqli_query($dbConnected,"UPDATE data set active='".$active."' where id='".$id."'");
                       
                       
                       $_SESSION['id']=$row['id'];
                    
                       
                       header('Location: ../../index.php');
                       exit();
                       }
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
}


?>