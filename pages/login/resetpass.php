<?php
include '../database/tutordb.php';

$token=$_GET['token'];
$checkstring=mysqli_query($dbConnected,"select * from forgotpass where string='".$token."'");

if(mysqli_num_rows($checkstring)>0){
$fdata=mysqli_fetch_array($checkstring);
  

?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/grid.css">
    <link rel="stylesheet" type="text/css" href="../../css/navi.css">
    <link rel="stylesheet" type="text/css" href="../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../css/resnavi.css">
    <link rel="stylesheet" type="text/css" href="../../css/login.css">
    </head>
    
    <body>
    <header>
        <?php include '../templates/navi.php'; ?>
        </header>
         <section class="form clearfix">
        <div class="col span-2-of-2">
        <div class="row">
            <form action="cforgotpass.php" method="post" enctype="multipart/form-data">
          
               <div class="label">reset password</div>
                    <div class="row">
                       
                        <div class="box">
                            <input type="password" name="password" id="password" placeholder="Enter New Password" required>
                        </div>
                        
                        <div class="box">
                            <input type="password" name="cpassword" id="cpassword" placeholder="Re-Enter Password" required>
                        </div>
                           
                        
                        <div class="box1">
                        <?php   echo '<input type="hidden" name="id" value="'.$fdata['id'].'">'; ?>
                        <input type="submit" name="change" value="CHANGE">
                        </div>
                    
                       
                </div>
            </form>
    </div>
            </div>
        </section>
        <?php 
        include '../templates/footer.php';
        include '../templates/script.php';
        ?>
          <script>
              var password = document.getElementById("password")
              , confirm_password = document.getElementById("cpassword");

              function validatePassword(){
                  if(password.value != confirm_password.value) {
                      confirm_password.setCustomValidity("Password Didn't Match");
                  } else {
                      confirm_password.setCustomValidity('');
                  }
                    }

                    password.onchange = validatePassword;
                    confirm_password.onkeyup = validatePassword;
        
        </script>
    </body>
</html>

<?php }
else{
     echo "<script>
                alert('LINK HAVE EXPIRED!!');
                window.location.href='resetpass.php';
                </script>";
            exit();
}
?>