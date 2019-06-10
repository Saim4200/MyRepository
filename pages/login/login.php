<?php
error_reporting(0);
if(isset($_GET['setlogin'])==1)
{
    if(isset($_SESSION['id'])){
        header ('Location :../../index.php');
    }
    else{
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>TUTORS HOUSE - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../../css/fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="../../css/login.css">
    
    <link rel="stylesheet" type="text/css" href="../../css/dialog.css" />
    <link href="../../css/login-dialog.css" rel="stylesheet" />
    <script src="../../js/login-dialog.js" type="text/javascript"></script>
</head>
<body> 
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title" style="padding-bottom: 15px">
						Login
					</span>
                    <div class="errorMessage">
                    </div>
					<div class="wrap-input100 validate-input" data-validate = "Invalid email address">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password" style="margin-bottom: 3px">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
                    <div style="text-align: right; margin-bottom: 25px">
                        <button class="txt3" onclick="openLoginModal()">Forget Password</button>
                    </div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div style="text-align: center; margin-top: 15px">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="#">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    
    <?php include 'resetpassword.php'; ?> 
    <?php include '../dialog/dialog.php'; ?> 
    
	<script src="../../js/jquery-2.2.4.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/main.js"></script>
    <script src="../dialog/dialog.js" type="text/javascript"></script>
    <script src="login.js" type="text/javascript"></script>
    <script src="reset.js" type="text/javascript"></script>
</body>
</html>
<?php
}}
else{header('Location : ../../index.php');}
?>