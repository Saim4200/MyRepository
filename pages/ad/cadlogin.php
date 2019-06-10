<?php

include '../database/tutordb.php';
if ($dbsuccess){
    
    if (isset($_POST['submit']))
    {
       $id=mysqli_real_escape_string($dbConnected,$_POST['id']);
       $password = mysqli_real_escape_string($dbConnected,$_POST['pass']);
        
       if (empty($password) || empty($id)) {
            echo '<script type="text/javascript">  window.onload = function(){
                      alert("ENTER ID AND PASSWORD");
                    }</script>';
            exit();}
       
       else{
           
            $sqlquery=mysqli_query($dbConnected, "SELECT * FROM ad");
             
            $row=mysqli_fetch_array($sqlquery);
            $idverify = password_verify($id, $row['id']);       
            $passverify = password_verify($password, $row['hash']);
            
           
                  if ($passverify == false || $idverify == false)
                  {
                    echo '<script type="text/javascript">  window.onload = function(){
                    alert("ENTER CORRECT PASSWORD");
                    }</script>';
                  }
                   elseif ($passverify == true && $idverify==true) {
                       
                       $_SESSION['id']=$row['id'];
                       header('Location: admin.php');
                       exit();
    }
}}}


?>