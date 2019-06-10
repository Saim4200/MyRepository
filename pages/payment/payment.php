
<?php
include '../database/tutordb.php';

if(isset($_SESSION['id'])){
    if(isset($_GET['id']))
        $id = $_GET['id'];
?>

<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 	
        <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
        <link rel="stylesheet" type="text/css" href="../../css/grid.css">
        <link rel="stylesheet" type="text/css" href="../../css/navi.css">
        <link rel="stylesheet" type="text/css" href="../../css/resnavi.css">
        <link rel="stylesheet" type="text/css" href="../../css/footer.css">
		<link rel="stylesheet" type="text/css" href="../../css/tabs.css" />
        <link rel="stylesheet" type="text/css" href="../../css/payment.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa|Monoton" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="modernizr.custom.js"></script>
	</head>
	<body>    
	    <header>
        <?php include '../templates/navi2.php'; ?>
    </header>

    <section>
        <div class="col span-2-of-2">
        <svg class="hidden">
			<defs>
				<path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z"/>
			</defs>
		</svg>
        
        
         <div class="col span-1-of-5" style="width: 15%">
            <div class="filter" id="filter">
                <div class="container">
                    <div class="col span-2-of-2">
                    <div class="filter-title">Payments </div>
                    </div>
                  <!-- The sidebar -->
                    <div class="col span-2-of-2">
                    <div class="divider-full"></div>
                    </div>
                     <div class="col span-2-of-2">
                    <div class="sidebar">
                      <button class="tablinks active" onclick="openContent(event, 'payment-details')">New Payment</button>
                      <button class="tablinks" onclick="openContent(event, 'history')">Payment History</button>
                    </div>


                    </div>
                </div>
             </div>
        </div>
        <div class="col span-4-of-5">
        <div class="container tabcontent" id="payment-details">
            
				<div class="tabs tabs-style-shape">
					<nav>
						<ul>
							<li>
								<a href="#section-shape-1">
									<svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
									<span>Online Payment Section</span>
								</a>
							</li>
							<li class="tab-current">
								<a href="#section-shape-2">
									<svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
									<svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
									<span>Offline Payment Section</span>
								</a>
							</li>
						</ul>
					</nav>
					<div class="content-wrap">
                        <section id="section-shape-1"><p> <br><br><br><br><br><br>Not ready yet</p>
                        </section>
						
                        <section id="section-shape-2" class="content-current">
                             <button class="accordion">Select payment channel</button>
                            <div class="panel">
                                <div class="col span-2-of-2">
                                    <div class="channel-title">Pay through ATM or Online Banking </div>
                                    <div class="channel-text1">
                                    You can pay through ATM Debit/Credit card, or through Internet/Online Banking to Tutors House Official Bank account. 
                                    </div>
                                    <div class="channel-details">
                                    <div class="channel-subtitle">Account Details</div>
                                     <div class="channel-text2">                                  <ul>
                                        <li>Bank Name: <span style="padding: 0 60px">Meezan Bank</span></li>
                                         <li>Branch Name: <span style="padding: 0 44px">PIB</span></li>
                                         <li>Account Title: <span style="padding: 0 47px">SAIM AHMED</span></li>
                                         <li>Account Number: <span style="padding: 0 20px"> 0099 4701 0239 9635</span></li>
                                      </ul>
                                    </div>
                                    </div>
                                    <div class="channel-title">Pay through Mobile Banking</div>
                                    <div class="channel-text1">
                                       Paying through Mobile Account is much easier. Mobile Network companies (Ufone, Telenor, Mobilink, Zong) now offer instant money transfer to anyone having a valid CNIC. You can now pay to our official Mobile Accounts by visiting your nearest Mobile shop or via Playstore apps.  
                                    </div>
                                    <div class="channel-details">
                                    <div class="channel-subtitle">Mobilink JazzCash</div>
                                     <div class="channel-text2">                                  <ul>
                                         <li>Account Number: <span style="padding: 0 20px"> 0307 270 2722</span></li>
                                          <li>CNIC Number: <span style="padding: 0 42px"> 42201-1580761-9</span></li>
                                     </ul>
                                    </div>
                                    </div>
                                    <div class="channel-details">
                                    <div class="channel-subtitle">Telenor EasyPaisa</div>
                                     <div class="channel-text2">                                  <ul>
                                         <li>Account Number: <span style="padding: 0 20px"> 0348 221 1211</span></li>
                                          <li>CNIC Number: <span style="padding: 0 42px"> 42201-1580761-9</span></li>
                                   </ul>
                                    </div>
                                    </div>
                                    <div class="channel-details">
                                    <div class="channel-subtitle">Zong PayMax</div>
                                     <div class="channel-text2">                                  <ul>
                                         <li>Account Number: <span style="padding: 0 20px"> 0316 232 3295</span></li>
                                          <li>CNIC Number: <span style="padding: 0 42px"> 42201-1580761-9</span></li>
                                  </ul>
                                    </div>
                                    </div>
                                </div>                         
                            </div>

                            <button class="accordion">Pay through the selected channel</button>
                            <div class="panel">
                                 <div class="channel-text3">
                                     With your ATM Debit/Credit card, or through Internet/Online Banking, you can pay easily to our official Meezan Bank account. <br><br>
                                    On the other hand, paying through Mobile Account is much easier. Mobile Network companies (Ufone, Telenor, Mobilink, Zong) now offer instant money transfer to anyone having a valid CNIC. You can now pay to our official Mobile Accounts by visiting your nearest Mobile shop or via Playstore apps.
                                 
                                    </div>
                            </div>

                            <button class="accordion">Enter the Payment Details</button>
                            <div class="panel" style="padding: 5px 0 10px 0">
                                <div class="channel-text3">
                                     After paying through the selected channel, submit your payment details for verification of your payment transaction by Tutors House.
                                    </div>
                                <form action="cpayment.php" name="payment-form" method="post" enctype="multipart/form-data">
                                <div class="box" style="padding-top: 5px">
                                    <span>Payment Channel</span>
                                    <div class="channels-options">
                                        <select name="channel" required>
                                            <option  value="1">Meezan Bank</option>
                                            <option  value="2">Mobilink JazzCash</option>
                                            <option  value="3">Telenor EasyPaisa</option>
                                            <option  value="4">Zong PayMax</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box">
                                    <span>Transaction Reference</span><input type="tel" name="transactionNo" id="transNo" placeholder="xxxxxxxxxx">
                                </div>
                                    
                                 <div class="box">
                                    <span>Transaction Amount</span><input type="decimal" name="transactionAmount" id="transAmount" placeholder="0.0" required>
                                </div>
                                 <div class="box">
                                    <span>Transaction Date</span><input type="date" name="transactionDate" id="transDate" placeholder="MM/dd/yy" required>
                                </div>
                                <div class="box">
                                    <input type="hidden" id="notid" name="notid" value="<?php echo $id; ?>">
                                    <input type="submit" name="payment" id="payment" value="SUBMIT FOR VERIFICATION">
                                </div>
                                </form>
                            </div>                       
                        </section>
					</div><!-- /content -->
				</div><!-- /tabs -->
        </div>
            
            <div class="container tabcontent" id="history">
            </div>
        </div>
        </div>
    </section>
        <?php
        include '../templates/footer.php';
        include '../templates/script.php';
        ?>

        <script src="cbpFWTabs.js"></script>
		<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
		</script>
        
        <script>
        function openContent(evt, contentId) {
          // Declare all variables
          var i, tabcontent, tablinks;

          // Get all elements with class="tabcontent" and hide them
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }

          // Get all elements with class="tablinks" and remove the class "active"
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }

          // Show the current tab, and add an "active" class to the link that opened the tab
          document.getElementById(contentId).style.display = "block";
          evt.currentTarget.className += " active";
        }

        </script>
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
              acc[i].addEventListener("click", function() {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("accordion-active");

                /* Toggle between hiding and showing the active panel */
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                  panel.style.display = "none";
                } else {
                  panel.style.display = "block";
                }
              });
            }
        </script>
    </body>
</html>
<?php }
?>