
<?php


    include '../database/tutordb.php';
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Connection: close");
if ($dbsuccess){
  if (isset($_SESSION['id'])){
      header ('Location: ..\..\index.php');
  }
else{
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../../css/styleform.css">
        <link rel="stylesheet" type="text/css" href="../../css/navi.css">
        <link rel="stylesheet" type="text/css" href="../../css/footer.css">
        <link rel="stylesheet" type="text/css" href="../../css/resnavi.css">
        <link rel="stylesheet" type="text/css" href="../../css/grid.css">
        <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
        <link rel="stylesheet" type="text/css" href="../../css/formqueries.css">

    </head>
   <header>
    <?php
        include '../templates/navi.php';
       ?>
    </header>
    <body>
        
        <section class="form clearfix">
        <div class="col span-2-of-2">

            <div class="row">
                    <div class="col span-2-of-2">
                        <div class="heading"> Personal Details </div>
                    </div>
            </div>

            <form action="sregister.php?setreg=1" method="post" enctype="multipart/form-data">
          
                    <div class="row">
                        <div class="col span-2-of-2">
                            <div class="col span-1-of-2">
                        <div class="col span-2-of-2">
                            <input type="text" name="firstname" id="firstanme" placeholder="First Name"  required>
                        </div>
                            </div>
                    <div class="col span-1-of-2">
                        <div class="col span-2-of-2">
                            <input type="text" name="lastname" id="lastname" placeholder="Last Name">
                        </div>
                    </div>
                        </div>
                </div>
                
            <div class="row"  style="padding:4% 0 0 0">
                <div class="col span-2-of-2" >
                    <div class="col span-1-of-2" >
                        <label for="gender">Select Gender</label>
                        <div>
                            <label></label>
                            <label for="gender">Male</label>
                             <input type="radio" name="gender" id="gender" value="1" checked>
                            <label for="gender">Female</label>
                            <input type="radio" name="gender" id="gender" value="2">
                       </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col span-2-of-2">
                    <div class="col span-1-of-2">
                        <input type="text" name="address" placeholder="Address" style="margin-top:6px;">
                    </div>
                    <div class="col span-1-of-2">
                    <select name="area" required style="margin-top:1.4%;">
                        <option value="0">Select Your Area</option>
                        <?php
                        $area=mysqli_query($dbConnected,"select * from area");
                        while($rowarea=mysqli_fetch_array($area)){
                            echo '<option value='.$rowarea['id'].'>'.$rowarea['areaname'].'</option>';
                        }
                        ?>
                    </select>
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="col span-2-of-2">
                    <div class="col span-1-of-2">
                        <input type="number" name="phone" placeholder="Phone No" minlength="11" maxlength="11" style="margin-top:6px;" required>
                    </div>
                </div>
            </div>
                
            <div class="row">
                    <div class="col span-2-of-2">
                        <div class="heading"> Login Details </div>
                    </div>
            </div>

            <div class="row">
                       
                        <div class="col span-2-of-2">
                            <input type="text" name="email" id="email" placeholder="Enter email address" required>
                        </div>
            </div>

            <div class="row">
                    <div class="col span-2-of-2">
                        <div class="col span-1-of-2">
                    <div class="col span-2-of-2">
                        <input type="password" name="pass" id="password" placeholder="Enter password" required>
                    </div>
                        </div>
                <div class="col span-1-of-2">
                
                   
                    <div class="col span-2-of-2">
                        <input type="password" name="cpass" id="confirm_password" placeholder="Confirm password" required>
                    
                    </div>
                </div>
                    </div>
            </div>
                
                <div class="col span-2-of-2">
                <div class="terms"><p><input type="checkbox" required>I read and abide by the <a href="../terms&condition/terms&conditions.php">Terms and Conditions</a> of Tutors House.</p>
                </div></div>

                     <div class="row">
                         <div class="button">
                        <div class="col span-2-of-2">
                            <input type="submit" name="submit" value="SUBMIT" >
                        </div>
                    </div>
                     </div>
                
            </form></div>
          
        </section>
     <?php
        include '../templates/footer.php';
        include '../templates/script.php';
        ?>
        <script src="../../js/nav.js"></script>
        <script>
        var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
        
        </script>
       <script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}    
</script>
        
        <script>
            
function isCharKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode >65 && (charCode < 90 || charCode >122))
        return true;
    return false;
}    
</script>
       
     
    </body>
</html>

<?php 

    }}
?>