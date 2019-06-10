
<?php
   
    error_reporting(0);
    include '../database/tutordb.php';
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Connection: close");


if (isset($_GET['setform'])==1){


if ($dbsuccess){
  if (isset($_SESSION['id'])){
      header ('Location: ../../index.php');
  }
else{

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../../css/grid.css">
        <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
        <link rel="stylesheet" type="text/css" href="../../css/resnavi.css">
        <link rel="stylesheet" type="text/css" href="../../css/navi.css">
        <link rel="stylesheet" type="text/css" href="../../css/footer.css">
        <link rel="stylesheet" type="text/css" href="../../css/styleform.css">
        <link rel="stylesheet" type="text/css" href="../../css/formqueries.css">
        <link rel="stylesheet" type="text/css" href="../../css/autocomplete.css">
        

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
            <form action="register.php?setreg=1" method="post" enctype="multipart/form-data">
          
               
                    <div class="row">
                        <div class="col span-2-of-2">
                            <div class="col span-1-of-2">
                        <div class="col span-2-of-2">
                            <input type="text" name="firstname" id="firstanme" placeholder="First Name" required>
                        </div>
                            </div>
                    <div class="col span-1-of-2">
                        <div class="col span-2-of-2">
                            <input type="text" name="lastname" id="lastname" placeholder="Last Name" required>
                        
                        </div>
                    </div>
                        </div>
                </div>
                      
                            <div class="row">
                       
                        <div class="col span-2-of-2">
                            <input type="email" name="email" id="email" placeholder="Enter email address" required>
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
                
                            <div class="row">
                     
                        <div class="col span-2-of-2">
                            <input type="tel" name="CNIC" id="CNIC" placeholder="CNIC number" min="13" maxlength="13" required>
                        </div>
                    </div>
                   
                      <div class="row" style="padding-top: 20px;">
                    <div class="col span-2-of-2" >
                       
                            <label>Gender</label>
                            <div>
                            <input type="radio" name="gender" value="1" checked>
                            <span>Male</span>
                            <input type="radio" name="gender" value="2" >
                            <span>Female</span>
                          
                        </div>
                    </div>   
                </div>
                
        
                <div class="row">
                    <div class="col span-2-of-2">
                        <div class="heading"> Education </div>
                    </div>
                </div>
                <div class="row">
                <div class="col span-2-of-2">
                        <select name="intersub" required>
                            <option value="0">Select intermediate group</option>
                         <?php $group=mysqli_query($dbConnected,"select * from intergroup");
                            while($fetchgroup=mysqli_fetch_array($group))
                            {
                            echo '<option class="color" value='.$fetchgroup['intid'].'> '.$fetchgroup['intergroupname'].'</option> ';
                            }
      
                        ?>
                     </select>
                </div>
                </div>
                <div class="row">
                <div class="col span-2-of-2">
                           <select name="qualification" required>
                            <option value="0">Select your highest qualification</option>
                         <?php $class=mysqli_query($dbConnected,"select * from qualification");
                            while($fetchclass=mysqli_fetch_array($class))
                            {
                            echo '<option value='.$fetchclass['qid'].'> '.$fetchclass['qualificationname'].'</option> ';
                            }
                               ?>
                        </select>
                </div>
                </div>
    
                <div class="row">
                    <div class="col span-2-of-2">
                            <input type="text" name="majorsub" placeholder="Field of Specialization" required style="margin-top:9px;">
                    </div>
                </div>
                 <div class="row">
                        <div class="col span-2-of-2">
                            <div class="autocomplete" style="width:100%;">
                            <input type="text" name="institute" id="institute" placeholder="Name of Institute" minlength="5" maxlength="60" required>
                            </div>
                        </div>
                </div>
               
               <div class="row">
                    <div class="col span-2-of-2">
                        <div class="heading"> Subjects Of Interest </div>
                    </div>
            </div> 
                 <div class="row">
                <div class="col span-2-of-2">
                    <div class="col span-1-of-2">
                      
                        <div class="col span-2-of-2">
                           <select name="sub1" required>
                               <option value="0">Select Subject #1</option>
                                <?php
                               $sub1=mysqli_query($dbConnected,"select * from subjects");

                               while($row1=mysqli_fetch_array($sub1))
                               {
                                   echo '<option value='.$row1['sid'].'>'.$row1['subjectname'].'</option>';
                               }
                               ?>
                              </select>
                        </div>
                    </div><div class="col span-1-of-2">
                        
                        <div class="col span-2-of-2">
                           <select name="sub2">
                               <option value="0">Select Subject #2</option>
                             <?php  $sub2=mysqli_query($dbConnected,"select * from subjects");
                                
                               while($row2=mysqli_fetch_array($sub2))
                               {
                                   echo '<option value='.$row2['sid'].'>'.$row2['subjectname'].'</option>';
                               }
                               ?>
                              </select>
                        </div>
                    </div>
                </div>
                    </div>
                
                 <div class="row">
                <div class="col span-2-of-2">
                    <div class="col span-1-of-2">
                      
                        <div class="col span-2-of-2">
                           <select name="sub3">
                               <option value="0">Select Subject #3</option>
                                 <?php  $sub3=mysqli_query($dbConnected,"select * from subjects");
                                
                               while($row3=mysqli_fetch_array($sub3))
                               {
                                   echo '<option value='.$row3['sid'].'>'.$row3['subjectname'].'</option>';
                               }
                               ?>
                              </select>
                        </div>
                    </div><div class="col span-1-of-2">
                        
                        <div class="col span-2-of-2">
                           <select name="sub4">
                                <option value="none">Select Subject #4</option>
                                 <?php  $sub4=mysqli_query($dbConnected,"select * from subjects");
                                
                               while($row4=mysqli_fetch_array($sub4))
                               {
                                   echo '<option value='.$row4['sid'].'>'.$row4['subjectname'].'</option>';
                               }
                               ?>
                              </select>
                        </div>
                    </div>
                </div>
                    </div>
            
                  <div class="row">
                    <div class="col span-2-of-2">
                        <div class="heading"> Contact Details </div>
                    </div>
            </div>
                <div class="row">
                    <div class="col span-2-of-2">
                        <div class="col span-1-of-2">
                       
                        <div class="col span-2-of-2">
                            <input type="tel" name="pnum" id="pnum" placeholder="Phone number" minlength="11" maxlength="11" required>
                        </div>
                        </div>
                        <div class="col span-1-of-2">
                        
                        <div class="col span-2-of-2">
                            <input type="tel" name="wnum" id="wnum" placeholder="Whatsapp number" minlength="11" maxlength="11" required>
                        </div>
                        </div>
                    </div>
                    </div>
                
                <div class="row">
                <div class="col span-2-of-2">
                    <div class="col span-1-of-2">
                        <div class="col span-2-of-2">
                            <input type="text" name="skypeid" id="skypeid" placeholder="Skype ID (optional)">
                        </div>
                    </div>
                    <div class="col span-1-of-2">
                           <select name="location" required>
                               <option value="0">Select preferred place of tuition</option>
                                <?php $status=mysqli_query($dbConnected,"select * from locatoin");
                                while($fetchlocation=mysqli_fetch_array($status))
                                {
                                echo '<option  value='.$fetchlocation['lid'].'> '.$fetchlocation['locationname'].'</option> ';
                                }?>
                            </select>
                    </div>
                </div>
                </div>
 
                <div class="row">
                        
                        <div class="col span-2-of-2">
                            <div class="col span-1-of-2">
                                <input type="text" name="address" placeholder="Address (house/street/block/area)" required>
                            </div>
                            <div class="col span-1-of-2">
                            <select name="area" required style="margin-top:-2px;">
                                <option value="0">Select your town</option>
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
                        <div class="heading"> Target Areas </div>
                    </div>
                </div>
                <div class="row">
                <div class="col span-2-of-2">
                    <div class="col span-1-of-2">
                      
                        <div class="col span-2-of-2">
                           <select name="area1" required>
                               <option value="0">Select Area</option>
                                <?php
                               $area1=mysqli_query($dbConnected,"select * from area");

                               while($a1=mysqli_fetch_array($area1))
                               {
                                   echo '<option value='.$a1['id'].'>'.$a1['areaname'].'</option>';
                               }
                               ?>
                              </select>
                        </div>
                    </div>
                    
                    <div class="col span-1-of-2">
                        <div class="col span-2-of-2">
                           <select name="area2">
                               <option value="0">Select Area</option>
                             <?php  $area2=mysqli_query($dbConnected,"select * from area");
                                
                               while($a2=mysqli_fetch_array($area2))
                               {
                                   echo '<option value='.$a2['id'].'>'.$a2['areaname'].'</option>';
                               }
                               ?>
                              </select>
                        </div>
                    </div>
                </div>
                    </div>
                <div class="row">
                <div class="col span-2-of-2">
                    <div class="col span-1-of-2">
                        <div class="col span-2-of-2">
                           <select name="area3" required>
                               <option value="0">Select Area</option>
                                <?php
                               $area3=mysqli_query($dbConnected,"select * from area");

                               while($a3=mysqli_fetch_array($area3))
                               {
                                   echo '<option value='.$a3['id'].'>'.$a3['areaname'].'</option>';
                               }
                               ?>
                              </select>
                        </div>
                    </div>
                    
                    <div class="col span-1-of-2">
                        <div class="col span-2-of-2">
                           <select name="area4">
                               <option value="0">Select Area</option>
                             <?php  $area4=mysqli_query($dbConnected,"select * from area");
                                
                               while($a4=mysqli_fetch_array($area4))
                               {
                                   echo '<option value='.$a4['id'].'>'.$a4['areaname'].'</option>';
                               }
                               ?>
                              </select>
                        </div>
                    </div>
                </div>
                    </div>
                <div class="row">
                <div class="col span-2-of-2">
                    <div class="col span-1-of-2">
                      
                        <div class="col span-2-of-2">
                           <select name="area5" required>
                               <option value="0">Select Area</option>
                                <?php
                               $area5=mysqli_query($dbConnected,"select * from area");

                               while($a5=mysqli_fetch_array($area5))
                               {
                                   echo '<option value='.$a5['id'].'>'.$a5['areaname'].'</option>';
                               }
                               ?>
                              </select>
                        </div>
                    </div>
                    
                    <div class="col span-1-of-2">
                        <div class="col span-2-of-2">
                           <select name="area6">
                               <option value="0">Select Area</option>
                             <?php  $area6=mysqli_query($dbConnected,"select * from area");
                                
                               while($a6=mysqli_fetch_array($area6))
                               {
                                   echo '<option value='.$a6['id'].'>'.$a6['areaname'].'</option>';
                               }
                               ?>
                              </select>
                        </div>
                    </div>
                </div>
                    </div>

                
                <div class="row">
                    <div class="col span-2-of-2">
                        <div class="heading"> Documents Required (Mandatory) </div>
                    </div>
                </div>
                     <div class="row">
                        <div class="col span-2-of-2">
                        <div class="col span-1-of-2">
                        <div>
                            <label>Degree/Marksheet/Certificate</label>
                        </div>
                        <input type="file" name="degree" id="degree" required>
                        </div>
                        <div class="col span-1-of-2">
                        <div>
                            <label>CNIC Front Picture</label>
                        </div>
                        <input type="file" name="CNICpic" id="CNIpic" required>
                        </div>
                        </div>
                    </div>
                    
                <div class="col span-2-of-2">
                <div class="terms"><p><input type="checkbox" required>I read and abide by the <a href="../terms&condition/terms&conditions.php#tutors">Terms and Conditions</a> of Tutors House.</p>
                </div></div>
                            
                     <div class="row">
                         <div class="col span-1-of-2" >
                             <div class="sub-process" id="sub-process" style="display:none;"><div class="sub-pic"></div>submitting...</div>
                         </div>
                        <div class="col span-1-of-2">
                            <input type="submit" name="submit" id="submit" value="SUBMIT" onsubmit="submit();return false">
                        </div>
                    
                     </div>
                        </form></div>
               
        </section>
     <?php
        include '../templates/footer.php';
        include '../templates/script.php';
        ?>
        <script src="../../js/nav.js"></script>
        <script src="autocomplete.js"></script>
        <script>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
        if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
        confirm_password.setCustomValidity('');
        }}

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
       
     <script>
$(document).ready(function(){
  $("#submit").click(function(){
    $(".sub-process").show();
  });
});
</script>
    </body>
</html>

<?php 

    }}}
else{
    header('Location: ../../index.php');
}
?>