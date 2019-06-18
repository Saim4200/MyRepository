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
else {
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
	<title>TUTORS HOUSE - Become A Tutor</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <meta name="description" content="Build your profile to earn reputatio and to let people know more about you as a tutor.">

   <!-- Font-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans&display=swap" />
    <link rel="stylesheet" type="text/css" href="../../css/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/navi.css">
	<link rel="stylesheet" type="text/css" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/dialog.css" />
    <link rel="stylesheet" type="text/css" href="../../css/jquery-ui.min.css">
 
    <!-- Main Style Css -->
    <link rel="stylesheet" href="../../css/tform.css" />
    <link rel="stylesheet" type="text/css" href="../../css/autocomplete.css">
    <link rel="stylesheet" href="../../css/tail.select-default.css">
    
    <script src="../../js/jquery-2.2.4.min.js"></script>
    <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="../../js/jquery.steps.js"></script>
    <script src="../../js/jquery-ui.min.js"></script>
    <script src="../../js/tform.js"></script>
</head>

<body>
    <script type="text/javascript" src="../../js/tail.select.js"></script>

    <header>
    <?php
      include '../templates/navi.php';
    ?>
    </header>
   
    <div class="page-content">
        <div class="wizard-v4-content" id="wizard">
            <div class="wizard-form">
                <div class="wizard-header">
                    <h3 class="heading">Become A Tutor</h3>
                    <p>Let us know more about you as a tutor</p>
                </div>
                <form class="form-register" action="">
                    <div id="form-total">
                        <!-- SECTION 1 -->
                        <h2>
                            <span class="step-icon"><i class="zmdi zmdi-account"></i></span>
                            <span class="step-text" style="padding-left: 8px">About</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <h3>Personal Information</h3>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="fullname" name="fullname" required>
                                            <span class="label">Full Name</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="pnum" name="pnum" required>
                                            <span class="label">Phone Number</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>         
                                </div>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="address" name="address" required>
                                            <span class="label">Address</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="cnic" name="cnic" required>
                                            <span class="label">CNIC Number</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-3">
                                        <select name="tarea" id="tarea">
                                            <option value="0" disabled selected> -  select your area - </option>
                                            <?php
                                                $fareas=mysqli_query($dbConnected,"select * from area");
                                                while($area=mysqli_fetch_array($fareas))
                                                {
                                                    echo '<option value="'.$area['id'].'">'.$area['areaname'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row form-row-date">
                                    <div class="form-holder form-holder-2">
                                        <label for="date" class="special-label">Date of Birth:</label>
                                        <select name="year" id="year">
                                            <option value="0" disabled selected>- year -</option>
                                             <?php
                                                $year = date("Y")-18;
                                                while($year>1950){
                                                    echo '<option value="'.$year.'">'.$year.'</option>';
                                                    $year--;
                                                }
                                            ?>
                                        </select>
                                        <select name="month" id="month">
                                            <option value="0" disabled selected>- month -</option>
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Mar</option>
                                            <option value="4">Apr</option>
                                            <option value="5">May</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Jul</option>
                                            <option value="8">Aug</option>
                                            <option value="9">Sep</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option>
                                            
                                        </select>
                                        <select name="day" id="day">
                                            <option value="0" disabled selected>- day -</option>
                                            <?php
                                                $day = 1;
                                                while($day<31){
                                                    echo '<option value="'.$day.'">'.$day.'</option>';
                                                    $day++;
                                                }
                                            ?>                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row form-row-gender">
                                    <div class="form-holder form-holder-2">
                                        <label for="date" class="special-label">Gender:</label>
                                        <select name="gender" id="gender">
                                            <option value="0" disabled selected>- select -</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- SECTION 2 -->
                        <h2>
                            <span class="step-icon"><i class="zmdi zmdi-book"></i></span>
                            <span class="step-text" style="margin-left: -8px">Academics</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <h3>What's your highest qualification?</h3>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <select name="qualification" id="qualification">
                                            <option value="0" disabled selected>- select -</option>
                                            <option value="1">Intermediate</option>
                                            <option value="2">Bachelors</option>
                                            <option value="3">Masters</option>
                                            <option value="">Doctorate</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="form-row-inner autocomplete">
                                            <input type="text" class="form-control" id="institute" name="institute" required>
                                            <span class="label">Name of Institute</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="field" name="field" required>
                                            <span class="label">Field of Specialization</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <select name="passingyear" id="passingyear">
                                            <option value="Year" disabled selected>Passing Year</option>
                                            <?php
                                                $year = date("Y");
                                                while($year>1970){
                                                    echo '<option value="'.$year.'">'.$year.'</option>';
                                                    $year--;
                                                }
                                            ?>                                        
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </section>
                        <!-- SECTION 3 -->
                        <h2>
                            <span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
                            <span class="step-text" style="margin-left: -10px">Preferences</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <h3>Tutoring Preferences</h3>
                                <div class="form-row">
                                    <div class="options">
                                        <div class="inline-label">Preferred Tutoring Place</div>
                                        <div class="option">
                                            <input type="radio" id="choice1" name="tplace" value="2">
                                            <label for="choice1" id="lb-choice1">At My Home</label>
                                        </div>
                                        <div class="option">
                                            <input type="radio" id="choice2" name="tplace" value="1">
                                            <label for="choice2" id="lb-choice2">At Nearby Location</label>
                                        </div>
                                        <div class="option">
                                            <input type="radio" id="choice3" name="tplace" value="3">
                                            <label for="choice3" id="lb-choice3">Online Tutoring</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="error" id="tplace-error" style="display: block"></div>

                                <div class="form-row">
                                <div class="inline-label-2" style="margin-top: 20px; padding-left: 8px">What subjects are you interested in?</div>
                                <div style="width: 100%; margin-top: 20px; padding-left: 10px">
                                    <select class="select-subjects" name="subjects[]" id="subjects" multiple required>
                                        <optgroup label="Subjects">
                                        <?php $sub=mysqli_query($dbConnected,"select * from subjects");
                                        while ($subn=mysqli_fetch_array($sub)){
                                            echo '<option value="'.$subn['sid'].'">'.$subn['subjectname'].'</option>';
                                        }
                                        ?>
                                        </optgroup>
                                    </select>
                                 </div>
                                </div>
                                    <div class="error" id="subjects-error" style="display: block"></div>
                                
                                <div class="form-row">
                                <div class="inline-label" style="margin-top: 20px; padding-left: 8px">Which areas do you want to target?</div>
                                <div style="width: 100%; margin-top: 20px; padding-left: 10px">
                                    <select class="select-areas" name="areas[]" id="areas" multiple required>
                                        <optgroup label="Karachi">
                                            <?php
                                                $fareas=mysqli_query($dbConnected,"select * from area");
                                                while($area=mysqli_fetch_array($fareas))
                                                {
                                                    echo '<option value="'.$area['id'].'">'.$area['areaname'].'</option>';
                                                }
                                            ?>
                                        </optgroup>
                                    </select>
                                 </div>
                               </div>
                                <div class="error" id="areas-error" style="display: block"></div>
                                
                            </div>
                        </section>
                        <!-- SECTION 4 -->
                        <h2>
                            <span class="step-icon"><i class="zmdi zmdi-account-box"></i></span>
                            <span class="step-text">Account</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <h3>Create Account</h3>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="form-row-inner">
                                            <input type="text" name="email" id="email" class="form-control" required autocomplete="username">
                                            <span class="label">Enter Email</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="password" name="pass" id="pass" class="form-control" required autocomplete="new-password">
                                            <span class="label">Enter Password</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="password" name="cpass" id="cpass" class="form-control" required autocomplete="new-password">
                                            <span class="label">Comfirm Password</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 25px; padding-left: 10px">
                                    <input type="checkbox" name="agree" id="agree" value="1" class="form-control">
                                    <span class="label-checkbox">I accept and abide by the <a href="#">terms and conditions</a> of Tutors House.</span>
                                    <div class="div-error" id="agreeTermsError"></div>
                                </div>
                            </div>
                        </section>

                    </div>
                </form>
            </div>
        </div>
        <div class="success" id="success">
            <div class="success-message">
            <img src="../../css/img/success-icon.png">
                <h1>Congratulations!</h1>
            <p class="content"> Your account is created successfully.</p>
            <p class="content2">You will shortly recieve an email for the confirmation of your registration.</p>
            </div>
            <div class="next-to-do">
            <h3>What's Next</h3>
            <p class="content3"> In order to get your account approved and activated, following documents are required to be uploaded, or submitted via email.</p>
            <p class="content3"><span> 1.  Picture of your CNIC Card (Front only) <br> </span> <span>2. Picture of your latest degree/certificate/marksheet etc.</span> </p>
            <p class="content3"><span><a href="">Upload Now</a> </span>|<span><a href="">Learn More</a></span> </p>  
            </div>
        </div>

    </div>

<?php include '../dialog/dialog.php'; ?>


    <script src="../../js/nav.js"></script>
    <script src="autocomplete.js"></script>
    <script src="../dialog/dialog.js" type="text/javascript"></script>

<script>

document.addEventListener("DOMContentLoaded", function(){

tail.select(".select-subjects", {
    search: true,
    multiLimit: 4,
    placeholder: 'Select upto 4 subjects ...',
    height: 200,
    width:250,
    multiPinSelected: true
});     

tail.select(".select-areas", {
    search: true,
    multiLimit: 6,
    placeholder: 'Select upto 6 areas ...',
    height: 200,
    width:250,
    multiPinSelected: true
}); 
    
autocomplete(document.getElementById("institute"), institutes);

$("#agree").change(function(){
        $("#agreeTermsError").text("");
});
$("#dialogbtn").click(function(){
    hideDialog();
    if(loc!==null) window.location.href = loc;
});

});
</script>
<script src="https://unpkg.com/ionicons@4.5.9-1/dist/ionicons.js"></script>
</body>
</html>

<?php 
}}
?>