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
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
	<title>TUTORS HOUSE - Find A Tutor</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <meta name="description" content="Prepare a tuition request to let the tutors know about your specific requirements.">

	<!-- CSS Files -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../css/trequest.css" rel="stylesheet" />


	<!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="../../css/themify-icons.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../../css/choices.css">
    <script src="../../js/choices.min.js"></script>
    
    <link rel="stylesheet" href="../../css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-datepicker.css">


	</head>

<body>
    
	<div class="image-container set-full-height" style="background-image: url('../../css/img/college.jpg')">


	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">

		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="green" id="wizard">
		                <form action="" method="">
		                <!--        You can switch " data-color="green" "  with one of the next bright colors: "blue", "azure", "orange", "red"       -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">Find A Tutor</h3>
		                        	<p class="category">This information will let us know about your specific requirements.</p>
		                    	</div>
								<div class="wizard-navigation">
									<div class="progress-with-circle">
									    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="4" style="width: 15%;"></div>
									</div>
									<ul>
			                            <li>
											<a href="#location" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-smallcap"></i>
												</div>
												Basics
											</a>
										</li>
			                            <li>
											<a href="#type" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-map-alt"></i>
												</div>
												Location
											</a>
										</li>
			                            <li>
											<a href="#facilities" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-panel"></i>
												</div>
												Timetable
											</a>
										</li>
			                            <li>
											<a href="#description" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-align-left"></i>
												</div>
												Description
											</a>
										</li>
			                        </ul>
								</div>
		                        <div class="tab-content">
		                            <div class="tab-pane" id="location">
		                            	<div class="row">
		                                	<div class="col-sm-12">
		                                    	<h5 class="info-text"> Let's start with the basic requirements</h5>
		                            		</div>
		                                	<div class="col-sm-12 middle">
		                                    	<div class="form-group label-floating">
                                                    <label class="control-label" for="level">Class/Level</label>
                                                    <select class="form-control" name="level" required>
                                                        <option disabled="" selected="">  -  select class/level -  </option>
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
		                                	
		                                      <div class="col-sm-12 middle top">
                                                <select name="subjects" id="subjects" multiple required>
                                                    <?php $sub=mysqli_query($dbConnected,"select * from subjects");
                                                    while ($subn=mysqli_fetch_array($sub)){
                                                        echo '<option value="'.$subn['sid'].'">'.$subn['subjectname'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
		                                	
                                            <div class="col-sm-12 middle top"></div>
		                            	</div>
		                            </div>
		                            <div class="tab-pane" id="type">
		                                <h5 class="info-text">Where do you want to learn? </h5>
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                        <div class="col-sm-3" style="margin-left: 12%">
													<div class="choice" data-toggle="wizard-radio">
		                                                <input type="radio" name="tplace" value="1">
		                                                <div class="card card-checkboxes card-hover-effect">
		                                                    <i class="ti-home"></i>
															<p>At My Home</p>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-3">
													<div class="choice" data-toggle="wizard-radio">
		                                                <input type="radio" name="tplace" value="2">
		                                                <div class="card card-checkboxes card-hover-effect">
		                                                    <i class="ti-map"></i>
															<p>At Tutor's Place</p>
		                                                </div>
		                                            </div>
		                                        </div>
                                                <div class="col-sm-3">
													<div class="choice" data-toggle="wizard-radio">
		                                                <input type="radio" name="tplace" value="3">
		                                                <div class="card card-checkboxes card-hover-effect">
		                                                    <i class="ti-headphone-alt"></i>
															<p>Online</p>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="facilities">
		                                <h5 class="info-text">When do you want to start? </h5>
		                                <div class="row">
		                                    <div class="col-sm-12 middle" id="date-container">
		                                    	<div class="form-group">
		                                        	<label>Start Date</label>
		                                        	<div class="input-append date">
                                                      <input type="text" class="form-control" name="startdate"><span class="add-on"><i class="icon-th"></i></span>
                                                    </div>
                                                </div>
		                                    </div>
		                                    <div class="col-sm-12 middle">
		                                    	<div class="form-group">
		                                        	<label>Preferred Timings</label>
		                                        	<select class="form-control" name="timings">
			                                            <option disabled="" selected="">- select a time slot -</option>
			                                            <option value="1">9 AM - 12 PM  (morning)</option>
			                                            <option value="2">3 PM - 5 PM   (afternoon)</option>
                                                        <option value="3">5 PM - 7 PM   (evening)</option>
                                                        <option value="4">7 PM - 9 PM   (after-sunset)</option>
		                                        	</select>
		                                    	</div>
		                                    </div>
                                            <div class="col-sm-12 middle">
		                                    	<div class="form-group">
		                                        	<label>Number of days</label>
		                                        	<select class="form-control" name="ndays">
			                                            <option disabled="" selected="">- select number of days per week -</option>
			                                            <option value="1">1 day</option>
			                                            <option value="2">2 days</option>
                                                        <option value="3">3 days</option>
                                                        <option value="4">4 days</option>
                                                        <option value="5">5 days</option>
                                                        <option value="6">6 days</option>
		                                        	</select>
		                                    	</div>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="description">
		                                <div class="row">
		                                    <h5 class="info-text"> Describe your specfic needs. </h5>
		                                    <div class="col-sm-6 col-sm-offset-1">
		                                        <div class="form-group">
		                                            <label>Add description</label>
		                                            <textarea class="form-control" placeholder="" rows="9" name="description"></textarea>
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-4">
		                                        <div class="form-group">
		                                            <label>Example</label>
		                                            <p class="description">"Tutor must be good in mathematics. He can speak English very fluently. He must have passed his high school in A grade. He must be atleast graduate. He can handle multiple subjects at a time."</p>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' />
	                                    <input type='button' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' id="Submit" value='Finish' />
									</div>

	                                <div class="pull-left">
	                                    <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
	                                </div>
	                                <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div> <!-- row -->
	    </div> <!--  big container -->
	</div>
    
    <script>

       
    </script>
</body>

	<!--   Core JS Files   -->
	<script src="../../js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="../../js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="../../js/request.js" type="text/javascript"></script>

	<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
	<script src="../../js/jquery.validate.min.js" type="text/javascript"></script>

    <script src="../../js/bootstrap-datepicker.min.js"></script>   
    <script src="../../js/bootstrap-datepicker.js"></script>
        <script src="dialog.js"></script>

<script> 

    

</script>
</html>
<?php 
  } else
        header('Location: ../login/login.php?setlogin=1');
  
}
else{
    header ('Location :../../index.php');
}
?>