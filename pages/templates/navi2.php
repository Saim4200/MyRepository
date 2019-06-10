
<?php include 'rndm.php'; 
$gen=gen();
?>
<nav>
    
            
                    <ul class="main-nav js--main-nav clearfix">
                     <li><a href="../profile/profile.php?setprofile=1">
                         <?php 
                    $srcpic='../profilepic/'.$_SESSION['id'].'.jpg';
                    if(file_exists($srcpic)){
                        echo "<img src=".$srcpic."?dummy=".$gen." class='proimg'>";}
                    else{
                        echo '<img src="../css/img/PersonPlaceholder.png" class="proimg"';}
                         ?>
                         </a></li>
                        <li><a href="../notification/notification.php" id="notification">
                            
                           <ion-icon name="notifications-outline" id="notification-1"></ion-icon>
                            
                            </a></li>
                        <li><a href="../login/logout.php?setlogout=1">logout</a></li>
                        <li><a href="../../index.php#contact">CONTACT US</a></li>
                        <li><a href="../../index.php#wth">WHY TUTORS HOUSE</a></li>
                        <li><a href="../../index.php#about">ABOUT US</a></li>
                        <li><a href="../../index.php">HOME</a></li>
                        <li><a href="../../index.php"> <img src="../../css/img/logowhite.png" alt="tutorshouse logo" class="logo clearfix">
                        <img src="../../css/img/4220115807619.png" alt="tutorshouse logo" class="logo-black">
                        </a></li>
                        
                        
                        
                        
                       
                       
                       
                    </ul>
                   
                 <ion-icon name="menu" onclick="openNav()" style="cursor: pointer;"></ion-icon>
    
                        <div id="myNav" class="overlay">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            <div class="cal res-box-1-of-6">
                            <div class="side-bar">
                                <a href="https://www.facebook.com/TUTORS.HOUSE.FOR.STUDENTS"><ion-icon name="logo-facebook"></ion-icon></a>
                                <a href="https://www.linkedin.com/showcase/tutors-house-page/"><ion-icon name="logo-linkedin"></ion-icon></a>
                                <a href="https://twitter.com/tutors_house"><ion-icon name="logo-twitter"></ion-icon></a>

                                </div>
                            </div>
                            <div class="cal res-box-5-of-6">
                      
                            
                      <div class="overlay-content">
                           <a href="../../index.php">HOME</a>
                           <a href="../../index.php#about">ABOUT US</a>
                           <a href="../../index.php#wth">WHY TUTORS HOUSE</a>
                           <a href="../../index.php#contact">CONTACT US</a>
                           <a href="../login/logout.php?setlogout=1">logout</a>
                           <a href="../notification/notification.php"> <ion-icon name="notifications-outline"></ion-icon></a>
                           <a href="../profile/profile.php?setprofile=1"><?php 
                    $srcpic='../profilepic/'.$_SESSION['id'].'.jpg';
                    if(file_exists($srcpic)){
                        echo "<img src=".$srcpic."?dummy=".$gen." class='res-proimg'>";}
                    else{
                        echo '<img src="../css/img/PersonPlaceholder.png" class="res-proimg"';}
                            ?></a>
                          
                     
                      </div>
                    </div>
                    </div>
                 
            </nav>