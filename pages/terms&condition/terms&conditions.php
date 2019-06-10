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
            <div class="heading">terms and conditions
            <div class="bottom-border"></div>
            </div>
            <div class="updated">Last updated: Jan 01, 2019
                <br/><br/>
                Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the Tutors House website and the eTutor mobile application (the "Service") operated by Tutors House ("us", "we", or "our").
                <br/><br/>
                Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.
                <br/><br/></br>
            </div>
            <div class="highlighted">
                By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</div>
        </div>
        </section>
        
        <section>
            <div class="row">
         <div class="color-title" id="students">For Students</div>
            <div class="col span-2-of-2">
                <p>
                    1. If you wish to acquire any tutor through our Service, you may be asked to supply certain information relevant to your personal and academic background including your name, address, phone number, email, date of birth, name of your school, class/level, and subjects you want to learn.
                    All of your data will remain secure as per our Privacy Policy.
                    <br/><br/>
                    2. Before normal starting of tuition classes, <strong>Tutor is bound to give a Trial of 3 days</strong> in order to get satisfaction and acceptance of the student.
                    <br/><br/>
                    3. At the start of trial period, students have to <strong>inform Tutors House</strong> about the arrival of Tutor.
                    <br/><br/>
                    4. After the completion of trial period, student has to accept/reject the tutor <strong>within 24 hrs</strong>. 
                    <br/><br/>
                    5. Student has to <strong>pay full fee in advance</strong> immediately after the completion of trial period.
                    <br/><br/>
                    6. Tutors House will not be held responsible for any confusion or inconvenience caused between tutor and the parents, after successful completion of the trial period.
                </p>
            </div>
            </div>
        </section>
        <section>
            <div class="row">
        <div class="col span-2-of-2"><div class="color-title" id="tutors">For Tutors</div></div>
            <div class="col span-2-of-2">
                <p>
                1.  The minimum eligibility criteria for a tutor to be a part of Tutors House is that he/she must have atleast passed Intermediate or A'level qualified and may be some University undergraduate student with good teaching skills.
                <br/><br/>
                2.  In special cases, female tutors with good grades and percentages, who have left studies after intermediate, can still apply.
                <br/><br/>
                3. If you wish to acquire any tuition through our Service, you are required to supply valid and correct information relevant to your personal and professional background including your name, address, phone number, email, date of birth, CNIC, name of your institute, your highest qualification, and subjects you want to teach. 
                All of your data will remain secure as per our Privacy Policy.
                <br/><br/>
                4.  All Tutors must have their own and valid CNIC in order to get registered. <strong>Provision of CNIC Front picture is mandatory.</strong>
                <br/><br/>
                5.  Tuition details (student’s address, contacts etc.) will be provided to the tutor only after the <strong>settlement of tuition fees</strong> between the tutor and the student, and after the <strong>payment of service charges</strong> through this website.
                <br/><br/>
                6.  <strong>Completion of trial period (3 Days) is necessary</strong> for every tutor, in order to get response and satisfaction of the student and his parents.
                <br/><br/>
                7.  After the completion of trial period, student has to accept/reject the tutor <strong>within 24 hrs</strong>. 
                <br/><br/>
                8.  Tutors House will not be held responsible for any confusion or inconvenience caused between tutor and the parents, after successful completion of the trial period.</p></div>
            </div>
            
            <div class="row">
            <div class= "col span-2-of-2"></div>
            </div>
            
            <div class="highlighted">
                    We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 15 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.
            </div>
            <div class="bottom-border"></div>

        </section>
        <?php
        include '../templates/footer.php';
        include '../templates/script.php';
        ?>
    </body>
</html>