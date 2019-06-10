<?php  include 'pages/database/tutordb.php'; ?>

<!DOCTYPE html>
<hmtl>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Tutors House is more than a tutor academy; an authentic and reliable name in the field of education and home-tuitions. We provide well-qualified and professionally testified tutors in all areas of Karachi.">
        <meta name="keywords" content="tutors house, tutor, karachi, qualified, online, tutors, teachers, tuition, education, learning, maths, physics, chemistry, english, computer, home tutor, home tuition, home tutor in karachi, tutor academy, online tutor academy" />
		<meta name="author" content="Tutors House" />
		
		<meta name="google-site-verification" content="1CzoWHs3S0eS1Kbfhj151TqHs0-SBuOfi6VkjYp-1yQ" />
               <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KG4RXLN');</script>
        <!-- End Google Tag Manager -->
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124823471-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-124823471-1');
        </script>

       <title>TUTORS HOUSE - Start learning today!</title>


   
            <link rel="stylesheet" type="text/css" href="css/normalize.css">
            <link rel="stylesheet" type="text/css" href="css/grid.css">
            <link rel="stylesheet" type="text/css" href="css/animate.css">
            <link rel="stylesheet" type="text/css" href="css/footer.css">
            <link rel="stylesheet" type="text/css" href="css/resnavi.css">
             <link rel="stylesheet" type="text/css" href="css/style.css">
            <link rel="stylesheet" type="text/css" href="css/queries.css">
            <link href="https://fonts.googleapis.com/css?family=Italianno|Raleway|Mukta+Malar|Monoton|Comfortaa|Roboto" rel="stylesheet">

            <link rel="apple-touch-icon" sizes="180x180" href="css/favicons/apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="css/favicons/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="css/favicons/favicon-16x16.png">
            <link rel="manifest" href="css/favicons/site.webmanifest">
            <link rel="mask-icon" href="css/favicons/safari-pinned-tab.svg" color="#5bbad5">
            <link rel="shortcut icon" href="css/favicons/favicon.ico">
            <meta name="msapplication-TileColor" content="#da532c">
            <meta name="msapplication-config" content="css/favicons/browserconfig.xml">
            <meta name="theme-color" content="#ffffff">
                        
   
    </head>
    <body>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KG4RXLN"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
      
      <div class="scroll"></div>
        <header class="clearfix">
           
           <?php
          
            if(isset($_SESSION['id'])){
                include 'pages/templates/navi2home.php';
            }
               else{
                   include 'pages/templates/navihome.php';
               }
            ?>
            
            <div class="col span-2-of-2">
               
                <div class="welcome-text">WELCOME TO TUTORS HOUSE</div>
                <div class="hero-title">WE ENSURE BETTER EDUCATION FOR A BETTER FUTURE</div>
                <div class="hero-text">Take your first step on the academic road to success. <a href="pages/registration/sform.php" style="color: #06cc9e; font-weight: 700;">Start learning today!</a>
                </div>
                
            </div>
            <div class="col span-2-of-2">
                
           
               <div class="btn-box">
                   <a class="btn" href="pages/registration/sform.php"><div class="btn-text">FIND A TUTOR<div class="btn-arrow">&#62;</div>
                   </div></a> </div>
                
            </div>
            
            
       
        </header>

        
        
        <section class="about clearfix" id="about">
            <a href="#about"  ><div class="line wow fadeInDown" data-wow-duration="2s"><div class="line-text">&nbsp;Scroll down</div></div></a>
          
            <div class="row">
                
                <div class="watermark">Wanna Know About Us?</div>
                
                <div class="col span-2-of-2 " >
                    
                    <div class="about-title-1 wow fadeIn" data-wow-duration="2s">HELLO THERE </div> <br>
                    
                    <div class="about-title-2 wow fadeIn" data-wow-duration="2s">WE ARE TUTORS HOUSE</div><br>
                    <p class="wow fadeIn" data-wow-duration="3s">
                        We are not merely a group of tutors but inspired individuals who have been consistently engaged in imparting education and extinguishing students’ thirst for knowledge all over the nation. 
                        Located in the midst of Karachi city (former capital of Pakistan), we are engaging tutors from all over the city, with different educational backgrounds and institutes; including undergraduates, job seeker fresh graduates, as well as experienced professionals. 
                        We ensure tutor’s <strong>performance</strong>, <strong>credibility</strong> and <strong>ability</strong> to cope up with student’s weaknesses. Our tutors are tested and verified by our Online Testing and Verification System. 
                        We believe that providing tutors is not our sole purpose and objective, but to encourage students to overcome their weaknesses and pursue their goals in their respective field of learning.</p></div>
                </div>
        
        </section>
    
     
        
          <section class="how clearfix">
            
        <div class="row">
            
            <div class="how-title-1 wow fadeIn" data-wow-duration="2s">HOW IT WORKS</div>
           
            <div class="how-title-2 wow fadeIn" data-wow-duration="2s">HOW TO GET A TUTOR</div>
                
            </div>
            
            <div class="row">
                <div class="col span-1-of-4 box wow zoomIn" data-wow-duration="2s" >
                   
                    <h3>SELECT YOUR TUTOR</h3>
                    <p style="color: black; font-size: 80%; line-spacing: 10px; text-align: center;">
                        Click [FIND A TUTOR]. Set your criteria. Select A Tutor.
                        </p>
                </div>
                <div class="col span-1-of-4 box wow zoomIn" data-wow-duration="2s" data-wow-delay="0.5s">
                    
                    <h3>SEND TUITION REQUEST</h3>
                    <p style="color: black; font-size: 80%; line-spacing: 10px; text-align: center;">
                        Send tuition request to the tutor of your own choice.
                        </p>
                </div>
                <div class="col span-1-of-4 box wow zoomIn" data-wow-duration="2s" data-wow-delay="0.75s">
                    
                    <h3>TAKE TUTOR'S TRIAL</h3>
                    <p style="color: black; font-size: 80%; line-spacing: 10px; text-align: center;">
                        Tutor will give you a trial of 3 days to get your satisfaction.
                        </p>
                </div>
                <div class="col span-1-of-4 box wow zoomIn" data-wow-duration="2s" data-wow-delay="1s">
                   
                    <h3>START THE TUITION</h3>
                    <p style="color: black; font-size: 80%; line-spacing: 10px; text-align: center;">
                        If satisfied, pay the fee and start learning.
                        </p>
                </div>
            </div>   
        </section>
        
         <section class="quote clearfix">
            
             <div class="box-color"><div class="border-box"><blockquote class="wow fadeIn" data-wow-duration="5s">If a child can't learn the way we teach, maybe we should teach the way they learn.</blockquote></div></div>
            
                </section>
                <section class="wth clearfix" id="wth">
            <div class="row">
            <div class="col span-2-of-2">
                <div class="wth-title-1 wow fadeIn" data-wow-duration="2s">WHAT WE DO</div>
                <div class="watermark">Why Tutors House</div>
                <div class="wth-title-2 wow fadeIn" data-wow-duration="3s">WHY TUTORS HOUSE</div>
                
                <p class="wow fadeIn" data-wow-duration="2s">Not every child learns the same way. Some children pick up faster than others. 
For students who fall behind in a class or have trouble in a particular subject, there are well-qualified tutors available to help them.
At Tutors House, we understand the importance of tutoring as it plays a vital role in the academic life of any student. No matter what subject that your child needs help in, Tutors House can provide a tutoring program that fits your child's needs. 
Whether it is Math, English, Reading or Study Skills, there is always a tutor available to help you and your child. Among the most popular requested tutors are Maths and English tutors. 
Although your child may not be a math lover, but giving the right preparation and tutoring, he/she can excel in any subject that he is lacking behind. This is exactly why Tutors House is recognized for quality and credibility. 
When your child receives tutoring from our tutors you can rest assured they are receiving the highest quality of tutoring and understanding. This is the trademark of Tutors House way of teaching.
Getting your child the very best education can provide important foundations for all aspects of life. Take the first step on the academic road to success, <strong>call Tutors House today!</strong></p>
                
                </div>
            </div>
            
        </section>
        <section class="steps clearfix">
           
                <div class="inner-box">
                     
            <div class="box-left wow">
               <div class="row">
               <div class="watermark">LEADERSHIP</div>
                <p> Due to its competitive leadership, Tutors House is well-versed in talent hunting and career building. Not only inducting highly experienced tutors but engaging new tutors to become more competitive and fruitful.</p>
                
                    </div>
                    </div>
                    </div>
                    
                    <div class="inner-box">
                       
                            <div class="box-right wow">
                        <div class="row">
            <div class="watermark">COMMUNICATION</div>
                                <p> Efficient and fast communication is the most prominent trait of Tutors House. Our team is all-the-time ready to listen to your issues, answering your queries, and eradicating your problems. We are using multiple communication channels for this purpose, including emails, calls, sms, messengers etc.</p>
                        </div>
                    </div>
            </div>
                    <div class="inner-box">
                        
                        <div class="box-left wow">
                         <div class="row">  
          <div class="watermark">CREDIBILITY</div>
                            <p>Tutors House possesses significant credibility due to its well qualified and testified tutors. We register tutors after document verification and testing. Tutors are subscribed to only those subjects for which they have been qualified.</p>
                        </div>
                    </div>
            </div>
                    <div class="inner-box">
                       
                    <div class="box-right wow">
                        <div class="row">
             <div class="watermark">APPROACH</div>
                        <p> Tutors House has a different approach to teaching and training. We not only provide tutors to students but train them how to teach in an effective and comprehensive manner; thereby preparing them to become elegant and competitive tutors of the future.</p>
                        </div>
                    </div>
            </div>
            
                  
            
        </section>
                
       <section class="register clearfix" id="register">
            <div class="row">
            <div class="register-title-1 wow fadeIn" data-wow-duration="2s">LETS GET STARTED</div>
            <div class="register-title-2 wow fadeIn" data-wow-duration="2s">REGISTER YOURSELF</div>
            <div class="col span-2-of-2">
                <div class="col span-1-of-2"> 
                    <div class="watermark2">AS A STUDENT</div>
                    <div class="btn-box2">
                   <a class="btn" href="pages/registration/sform.php">
                       <div class="btn-text">FIND A TUTOR<div class="btn-arrow">&#62;</div></div>
                    </a> 
                    </div>
                </div>
                <div class="col span-1-of-2"> 
                    <div class="watermark1">AS A TUTOR</div>
                    <div class="btn-box1">
                   <a class="btn" href="pages/form/form.php?setform=1">
                       <div class="btn-text">BECOME A TUTOR<div class="btn-arrow">&#62;</div></div>
                    </a> 
                    </div>
                </div>            </div>
            </div>
        </section>
         
        <?php require 'pages/templates/homefooter.php';?>
       
         <?php require 'pages/templates/script.php';?>
         
             <script>
               $(document).ready(function(){
                   
                   $('.dropbtn').click(function(){
                        $('.dropdown-content').show();
                        $('.dropdown-content').fadeIn(3000);                
                    });
                    $(document).click(function(event){
                    if ($(event.target).closest("#dropdown").length == false){
                            $('.dropdown-content').hide(); 
                        }
                });
                   refresh_count(); 
                   
               // setInterval(function (){ refresh_count(); },5000);
                
                function refresh_count(){
                    $.ajax({
                    url: 'pages/notification/countall.php',
                    type: 'POST',
            		success:function(result, textStatus, jqXHR) 
            		{
                           console.log(result);
                           if(result!=="" && result > 0){
                                $("#notifbadge").attr("data-badge", result);
                           }
                            
            		},
            		error: function(jqXHR, textStatus, errorThrown) 
            		{
                           console.log(textStatus+" error: "+errorThrown);
            		}
                    });
                }
                
               });
            </script>

        
    </body>
</hmtl>