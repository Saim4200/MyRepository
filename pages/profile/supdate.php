<?php
if(isset($_GET['setupdate'])==1)
{
    
include'../database/tutordb.php';
if ($dbsuccess)
{
    if(isset($_POST['subsaddress'])){
        
        $address=mysqli_real_escape_string($dbConnected,$_POST['saddress']);
        if(empty($address)){
            header('Location: profile.php?setprofile=1&error=1');
        }
        else {
        $changeaddress=mysqli_query($dbConnected,"UPDATE students SET address='".$address."' WHERE id='".$_SESSION['id']."'");
        
        if ($changeaddress){
                header ('Location: profile.php?setprofile=1');
            }
            
            else{
                 echo '<script type="text/javascript">  window.onload = function(){
                      alert("SOMETHING WENT WRONG! TRY AGAIN.");
                    }</script>';
            }
        }
    }
     elseif(isset($_POST['subsarea'])){
        
        $area=mysqli_real_escape_string($dbConnected,$_POST['sarea']);
        if(empty($area)){
            header('Location: profile.php?setprofile=1&error=1');
        }
        else {
        $changearea=mysqli_query($dbConnected,"UPDATE students SET area='".$area."' WHERE id='".$_SESSION['id']."'");
        
        if ($changearea){
                header ('Location: profile.php?setprofile=1');
        }
        else{
                 echo '<script type="text/javascript">  window.onload = function(){
                      alert("SOMETHING WENT WRONG!!");
                    }</script>';
            }
        }
    }
    elseif(isset($_POST['subspnum'])){
        
        $pnum=mysqli_real_escape_string($dbConnected,$_POST['spnum']);
        if(empty($pnum))
        {header('Location: profile.php?setprofile=1&error=2');
        }
        else{
         $changepnum=mysqli_query($dbConnected," UPDATE students SET pnum='".$pnum."' WHERE id='".$_SESSION['id']."' ");
          if($changepnum)
          {
              header ('Location: profile.php?setprofile=1');
          }
            else{
                 echo '<script type="text/javascript">  window.onload = function(){
                      alert("SOMETHING WENT WRONG! TRY AGAIN.");
                    }</script>';
            }
    }
    }
        elseif(isset($_POST['subsgender'])){

        $gender=mysqli_real_escape_string($dbConnected,$_POST['sgender']);
        if($gender==0){
            header('Location: profile.php?setprofile=1&error=3');
        }
        else {
        $changegender=mysqli_query($dbConnected,"update students set gender='".$gender."' where id='".$_SESSION['id']."'");
         if ($changegender){
                header ('Location: profile.php?setprofile=1');
            }
            else{
                 echo '<script type="text/javascript">  window.onload = function(){
                      alert("SOMETHING WENT WRONG! TRY AGAIN.");
                    }</script>';
            }
    }
    }
    elseif(isset($_POST['subspass'])){
        $fetchpass=mysqli_query($dbConnected,"select pass from data where id='".$_SESSION['id']."'");
        $row=mysqli_fetch_array($fetchpass);
        
        $oldpassword=mysqli_real_escape_string($dbConnected,$_POST['soldpass']);
        $password=mysqli_real_escape_string($dbConnected,$_POST['spass']);
        $passverify=password_verify($oldpassword, $row['pass']); 
        
                if ($passverify == false)
                  {
                       echo '<script type="text/javascript">  window.onload = function(){
                      alert("INCORRECT OLD PASSWORD!");
                    }</script>';
                  }
                   elseif ($passverify == true) {
                        $pass=password_hash($password, PASSWORD_DEFAULT);
                        $changepass=mysqli_query($dbConnected,"update data set pass='".$pass."' where id='".$_SESSION['id']."'");
                        
                        if($changepass){
                            
                            header('location: profile.php?setprofile=1');
                        }
                   }
        else{
            
             echo '<script type="text/javascript">  window.onload = function(){
                      alert("SOMETHING WENT WRONG! TRY AGAIN.");
                    }</script>';
        }
    }
    
    
}}


else{
    header('Location: ../../index.php');
}


?>
