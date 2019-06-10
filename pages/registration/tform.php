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
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto|Open-Sans" />
    <link rel="stylesheet" type="text/css" href="../../css/fonts/iconic/css/material-design-iconic-font.min.css">
    
        <link rel="stylesheet" type="text/css" href="../../css/navi.css">
        <link rel="stylesheet" type="text/css" href="../../css/footer.css">
        <link rel="stylesheet" type="text/css" href="../../css/resnavi.css">

    <!-- datepicker -->
    <link rel="stylesheet" type="text/css" href="../../css/jquery-ui.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="../../css/tform.css" />
</head>

<body>
    <header>
    <?php
       include '../templates/navi.php';
       ?>
    </header>
   
    <div class="page-content">
        <div class="wizard-v4-content">
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
                                            <input type="text" class="form-control" id="name" name="name" required>
                                            <span class="label">Full Name</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="phone" name="phone" required>
                                            <span class="label">Phone Number</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>                                    
                                    
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="" name="last-name" required>
                                            <span class="label">Last Name</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="cnic" name="cnic" required>
                                            <span class="label">CNIC Number</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row form-row-date">
                                    <div class="form-holder form-holder-2">
                                        <label for="date" class="special-label">Date of Birth:</label>
                                        <select name="year" id="year">
                                            <option value="Year" disabled selected>- year -</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                        </select>
                                        <select name="month" id="month">
                                            <option value="Month" disabled selected>- month -</option>
                                            <option value="Feb">Feb</option>
                                            <option value="Mar">Mar</option>
                                            <option value="Apr">Apr</option>
                                            <option value="May">May</option>
                                        </select>
                                        <select name="date" id="date">
                                            <option value="Day" disabled selected>- day -</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row form-row-gender">
                                    <div class="form-holder form-holder-2">
                                        <label for="gender" class="special-label">Gender:</label>
                                        <select name="gender" id="gender">
                                            <option value="0" disabled selected> - select - </option>
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
                            <span class="step-text">Academics</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <h3>What's your highest qualification?</h3>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <select name="position" id="position">
                                            <option value="Position" disabled selected>- select -</option>
                                            <option value="Manager">Intermediate</option>
                                            <option value="Employee">Bachelors</option>
                                            <option value="Director">Masters</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="last-name-1" name="last-name-1" required>
                                            <span class="label">Name of Institute</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="" name="" required>
                                            <span class="label">Field of Specialization</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="" name="" required>
                                            <span class="label">Major Subjects</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </section>
                        <!-- SECTION 3 -->
                        <h2>
                            <span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
                            <span class="step-text">Preferences</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <h3>Tutoring Preferences</h3>
                                <div class="form-row">
                                    <div class="options">
                                        <div class="inline-label">Preferred Tutoring Place</div>
                                        <div class="option">
                                            <input type="radio" id="choice1" name="radio-group" value="2">
                                            <label for="choice1" id="lb-choice1">At My Home</label>
                                        </div>
                                        <div class="option">
                                            <input type="radio" id="choice2" name="radio-group" value="1">
                                            <label for="choice2" id="lb-choice2">At Nearby Location</label>
                                        </div>
                                        <div class="option">
                                            <input type="radio" id="choice3" name="radio-group" value="3">
                                            <label for="choice3" id="lb-choice3">Online Tutoring</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <select name="subjects[]" id="subjects" multiple required>
                                        <option value="Dropdown item 1">Mathematics</option>
                                        <option value="Dropdown item 2">Physics</option>
                                        <option value="Dropdown item 3">Chemistry</option>
                                        <option value="Dropdown item 4">Biology</option>
                                        <option value="Dropdown item 5">English</option>
                                        <option value="Dropdown item 6">Urdu</option>
                                        <option value="Dropdown item 7">Islamiat</option>
                                        <option value="Dropdown item 8">Computer</option>
                                    </select>

                                </div>
                                <div class="form-row">
                                </div>
                                <div class="form-row">
                                </div>
                            </div>
                        </section>
                        <!-- SECTION 4 -->
                        <h2>
                            <span class="step-icon"><i class="zmdi zmdi-account-box"></i></span>
                            <span class="step-text">Account</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <h3>Account Information</h3>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="form-row-inner">
                                            <input type="text" name="your_email_1" id="your_email_1" class="form-control" required>
                                            <span class="label">Email</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="password" name="password_1" id="password_1" class="form-control" required>
                                            <span class="label">Password</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="password" name="comfirm_password_1" id="comfirm_password_1" class="form-control" required>
                                            <span class="label">Comfirm Password</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/jquery.steps.js"></script>
    <script src="../../js/jquery-ui.min.js"></script>
    <script src="../../js/tform.js"></script>
</body></html>