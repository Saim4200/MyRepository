<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/grid.css">
    <link rel="stylesheet" type="text/css" href="../../css/navi.css">
    <link rel="stylesheet" type="text/css" href="../../css/resnavi.css">
    <link rel="stylesheet" type="text/css" href="../../css/privacy.css">
    <link rel="stylesheet" type="text/css" href="../../css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
    <body>
    <header>
        <?php
        if (isset($_SESSION['id'])){include '../templates/navi2.php';}
        else {include '../templates/navi.php';}
        ?>
        </header>
        <section>
            
        <div class="col span-2-of-2">
            <div class="heading">Exchange and Refund Policy
            <div class="bottom-border"></div>
            </div>
            <div class="updated">Thanks for working with Tutors House
                <br/><br/>
                If you are not satisfied with your tuition, or student rejects you after taking the trial, we're here to help.
                <br/><br/>
            </div>
        </section>
        
        <section>
            <div class="highlighted">
               Exchange
			</div>
            <div class="row">
            <div class="col span-2-of-2">
                <p>
                    You have 03 working days (trial period) to accept/reject a student.
                    <br/><br/>
					To be eligible for an exchange, we require following conditions to be met: 
					<br/>
                </p>
				<p>
				   >   You have to complete the trial of three days. <br/>
				   >   You must have a valid reason of denial for rejecting a student. <br/>
				   >   You must have not received any fees/charges from the student. <br/>
				   >   Your rejection must be declared and notified to the student by admin.  <br/>
				</p>
            </div>
            </div>
        </section>
        <section>
            <div class="highlighted">
               Refunds
			</div>

            <div class="row">
            <div class="col span-2-of-2">
                <p>
				Once we exchange your tuition, you have to set your new fee/charges for the exchanged student and student have the right to bargain your fee/charges. 
                <br/><br/>
				If we are not able to provide you an exchange within TWO months, we will initiate a refund to your bank account, if available, or wallet your money (if no account information is available).
				</p>
            </div>
        </section>
		<section>
			<div class="highlighted">
               Contact Us
			</div>
            <div class="row">
            <div class="col span-2-of-2">
                <p>
					If you have any questions regarding this policy, contact us at mail@tutors-house.com
				</p>
            </div>
        </section>
            <div class="bottom-border"></div>

        <?php
        include '../templates/footer.php';
        include '../templates/script.php';
        ?>
    </body>
</html>