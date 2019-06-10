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
      header ('Location: ..\requests\request.php');
  }
else{
?>

<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="sregister.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/sregister.css" />
    <link rel="stylesheet" href="../../css/choices.css">
    <script src="../../js/choices.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="../../css/dialog.css" />
    
    <link href="../../css/login-dialog.css" rel="stylesheet" />
    <script src="../../js/login-dialog.js" type="text/javascript"></script>
</head>

<body>
    <div class="image-container set-full-height" style="background-image: url('../../css/img/stdnt.jpg')">

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <!-- Wizard container -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="green" id="wizard">
                            <form action="">
                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        Find A Tutor
                                    </h3>
                                    <h5>Let us know about your specific requirements.</h5>
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#details" data-toggle="tab">Tuition Criteria</a></li>
                                        <li><a href="#personal" data-toggle="tab">Personal Info</a></li>
                                        <li><a href="#description" data-toggle="tab">Create Account</a></li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="details">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text">Let's start with your basic requirements.</h4>
                                            </div>

                                
                                             <div class="col-sm-12 top"></div>
                                            
                                            <div class="col-sm-6 left">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="level">Class/Level</label>
                                                    <select class="form-control" name="level" required>
                                                        <option disabled="" selected=""></option>
                                                        <?php
                                                            $fclass=mysqli_query($dbConnected,"select * from grade");
                                                        while($fgrade=mysqli_fetch_array($fclass))
                                                        {
                                                        echo '<option value="'.$fgrade['gid'].'">'.$fgrade['gradename'].'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="div-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 right">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Tutoring Place</label>
                                                    <select class="form-control" id="tplace" name="tplace" required>
                                                        <option disabled="" selected=""></option>
                                                        <option value="1"> I want tutor at my home </option>
                                                        <option value="2"> I can go to tutor's place </option>
                                                        <option value="3"> I want online tutoring </option>
                                                    </select>
                                                    <div class="div-error"></div>
                                                </div>
                                            </div>
                                                <div class="col-sm-12 middle top">
                                                <select name="subjects[]" id="subjects" multiple required>
                                                <?php $sub=mysqli_query($dbConnected,"select * from subjects");
                                                while ($subn=mysqli_fetch_array($sub)){
                                                    echo '<option value="'.$subn['sid'].'">'.$subn['subjectname'].'</option>';
                                                }
                                                ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="personal">
                                        <h4 class="info-text"> Let us know about yourself. </h4>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons"></i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Your Full Name</label>
                                                    <input name="studentname" type="text" class="form-control" required>
                                                    <div class="div-error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Choose Your Gender</label>
                                                <select class="form-control" name="gender" required>
                                                    <option disabled="" selected=""></option>
                                                    <option value="1">Male </option>
                                                    <option value="2">Female </option>
                                                </select>
                                                <div  class="div-error"></div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons"></i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Your Phone Number</label>
                                                    <input name="phone" type="tel" class="form-control" required>
                                                     <div  class="div-error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Choose Your Area</label>
                                                <select class="form-control" name="area" required>
                                                    <option disabled="" selected=""></option>
                                                    <?php
                                                    $area=mysqli_query($dbConnected,"select * from area");
                                                    while($rowarea=mysqli_fetch_array($area)){
                                                        echo '<option value='.$rowarea['id'].'>'.$rowarea['areaname'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <div class="div-error"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons"></i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label" >Your Full Address </label>
                                                    <input name="saddress" type="text" class="form-control" aria-describedby="addressHelp">
                                                    <small id="addressHelp" class="form-text  text-muted">(This field is required only if you want tutor at your home)</small>
                                                    <div class="div-error"></div>
                                                </div>
                                            </div> 
                                        </div>                                       
                                    </div>
                                    <div class="tab-pane" id="description">
                                        <div class="row">
                                            <h4 class="info-text" style="margin-bottom: 20px">Now, it's time to create your account.</h4>
                                            <div class="col-sm-12 top middle" style="padding-right: 80px">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label" >Enter Your Email</label>
			                                          	<input name="email" type="email" class="form-control" autocomplete ="username">
                                                        <div class="div-error"></div>
			                                        </div>
												</div>
                                            </div>
                                            <div class="col-sm-6 left">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock_outline</i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Enter Your Password</label>
			                                          	<input name="pass" id="pass" type="password" class="form-control" autocomplete ="new-password">
                                                        <div class="div-error"></div>
			                                        </div>
												</div>

		                                	</div>
                                            <div class="col-sm-6 right" style="padding-right: 80px; padding-left: 0px">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons"></i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Confirm Your Password</label>
			                                          	<input name="cpass" id="cpass" type="password" class="form-control" autocomplete ="new-password">
                                                        <div class="div-error"></div>
			                                        </div>
												</div>
		                                	</div>
                                            <div class="col-sm-12" style="padding-left: 100px">
                                                <p class="sub-text">Already have an account? <button class="inline-btn" id="loadloginform" onclick="openLoginModal()">Login here</button></p>
                                            </div>
                                            <div class="col-sm-12 top middle" id="agree">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" id="agreeTerms" value="1">
                                                    </label>
                                                    I accept and abide by the <a href="#">terms and conditions</a> of Tutors House.
                                                    <div  class="div-error" id="agreeTermsError"></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' id="Next" value='Next' />
                                        <input type='button' class='btn btn-finish btn-fill btn-danger btn-wd' name='submit' id="Submit" value='Submit' />
                                    </div>
                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />

                                        <div class="footer-checkbox">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes">
                                                    </label>
                                                    Subscribe for Email alerts <br><small id="optionHelp" class="form-text  text-muted">(You will recieve email alerts when tutors accept your request)</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div> <!-- row -->
        </div> <!--  big container -->

        <div class="footer">
            <div class="container text-center">
            </div>
        </div>
    </div>
    

<?php include 'login-dialog.php'; ?>   
<?php include '../dialog/dialog.php'; ?>
    
    <script>
        var secondElement = new Choices('#subjects', {
            allowSearch: false,
            removeItemButton: true,
            addItems: true,
            removeItems: true,
            removeButton: true,
            maxItems: true,
            maxItemCount: 4,
            delimiter: ',',
            allowDuplicates: false,
            allowPaste: false,
            placeholder: true,
            placeholderValue: 'Select Subjects',
            selectAll: false,
            shouldSort: false
        });
        
    </script>

<script src="../dialog/dialog.js" type="text/javascript"></script>
<script src="sform.js" type="text/javascript"></script>
    
 
</body>
</html>
<?php 
}}
?>