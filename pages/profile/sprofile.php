<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/profilegrid.css">
    <link rel="stylesheet" type="text/css" href="../../css/resnavi.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../css/navi.css">
    <link rel="stylesheet" type="text/css" href="../../css/profile.css">
</head>


<body>

<?php
   $approved=mysqli_query($dbConnected, "select active from data where id='".$_SESSION['id']."'");
    $approve=mysqli_fetch_array($approved);
    if($approve['active']==0){
    $pass=0;
    }
    elseif($approve['active']==1){
        $pass=1;
    }

?>
    <header>
    <?php    include '../templates/navi2.php'; ?>
    </header>

<section class="container">
            
    <form action="supdate.php?setupdate=1" method="post" enctype="multipart/form-data" id="form">
    <div class="row">
    <div class="s-container-profile clearfix">
               <ion-icon name="arrow-back" onclick="goBack()"></ion-icon>
                <div class="deco-line"></div>
    <div class="col span-2-of-2">
			<div class="col span-1-of-7">
                <div class="container-picture">
                    <?php 
                    if(isset($_SESSION['id'])){
                         $propic=mysqli_query($dbConnected,"SELECT profilepic from studentinfopic where id='".$_SESSION['id']."'");
                         while($rowpic=mysqli_fetch_array($propic)){
                            $srcpic='../profilepic/'.$rowpic['profilepic'];
                        }
                         echo "<img src=".$srcpic."?dummy=".$gen." class='picture-box'>";
                    }
                    else    {echo '<img src="../../css/img/PersonPlaceholder.png" class="picture-box">';} 
                    ?>
                    <div class='pic-box'>
                        <input type='file' name='picsubmit'>
                        <input type="submit" name="spic-submit" value=''>
                    </div>
                </div>
			</div>
      
    <div class="container-set">
        <div class="col span-2-of-7">
            <div class="name">
            <?php 
                $showtinfo=mysqli_query($dbConnected, "SELECT * from students where id='".$_SESSION['id']."'");
                $email=mysqli_query($dbConnected,"select * from data where id='".$_SESSION['id']."'");
                $fetchemail=mysqli_fetch_array($email);
                $row=mysqli_fetch_array($showtinfo);
                    echo $row['firstname']." ".$row['lastname'];?>
            </div>
                    
            <div class="id">ID: <?php echo $row['id']; ?></div>
               
        </div>
              
                <div class="col span-2-of-7">
                    <div class="col span-1-of-2">
                    <div class="icon"></div>
                    </div>
                    <div class="col span-1-of-2">
                        <div class="col span-2-of-2"><div class="font"></div></div>
                        <div class="col span-2-of-2"><div class="font"></div></div>
                    </div>
                </div>
                
                <div class="col span-2-of-7"><a href="../notification/notification.php"><ion-icon name="notifications-outline"></ion-icon></a></div>
    </div>
    <div class="container-res">
        <div class="box">
            <div class="box">
            <div class="name">
            <?php 
                $showtinfo=mysqli_query($dbConnected, "SELECT * from students where id='".$_SESSION['id']."'");
                $email=mysqli_query($dbConnected,"select * from data where id='".$_SESSION['id']."'");
                $fetchemail=mysqli_fetch_array($email);
                $row=mysqli_fetch_array($showtinfo);
                echo $row['firstname']." ".$row['lastname'];?></div>
                </div>
                <div class="box"><div class="id">ID: <?php echo $row['id']; ?></div></div>
               
                </div>
                    <div class="box">
                    <div class="col span-1-of-2"> 
                    <div class="icon"></div>
                        </div>
                   
                        <div class="col span-1-of-2"><a href="../notification/notification.php"><ion-icon name="notifications-outline"></ion-icon></a></div>
                    </div>
    </div>
    </div>
    <div class="col span-2-of-2">
    <div class="container-view">
        <div class="col span-1-of-4 color" style="margin-top:4%;">
                    <div class="col span-2-of-2">
                    <div class="sub-title">teachers</div>
                        <?php
                        $fetchdetail=mysqli_query($dbConnected,"select sid from tdetailstudents where tid='".$_SESSION['id']."'");
                        if(mysqli_num_rows($fetchdetail)<=0)
                        {
                            echo ' <div class="list1"></div>';
                        }
                        elseif(mysqli_num_rows($fetchdetail)>=1)
                        {
                            
                            echo ' <div class="list">';
                            while($detail=mysqli_fetch_array($fetchdetail)){
                                $showstudent=mysqli_query($dbConnected,"select firstname,lastname from students where id='".$detail['sid']."'");
                                
                                $showname=mysqli_fetch_array($showstudent);
                                
                                echo $showname['firstname']." ".$showname['lastname'];
                            }
                            
                            echo '</div>';
                        }
                        ?>
                    </div>
        </div>
                    
        <div class="col span-3-of-4">
                    
            <div class="col span-2-of-2 color">
                <div class="title">about</div>
                <div class="box">
                    <table class="table">
					<tr>
                        <td>Gender</td>
                        <td><div id="sgendata" style="display:block">
                        <?php
                        $gen=mysqli_query($dbConnected,"select gender from gender where gid='".$row['gender']."'");
                        $gender=mysqli_fetch_array($gen);
                        echo $gender['gender'];
                        ?>
                        </div>
                        <select name="sgender" id="sgenform" style="display:none;">
                         <?php $genlist=mysqli_query($dbConnected,"select * from gender");
                            while($genitem=mysqli_fetch_array($genlist))
                            {
                            echo '<option value='.$genitem['gid'].'> '.$genitem['gender'].'</option> ';
                            }
                        ?>
                        </select>
                        </td>
                        <td style="display:flex;">
                          <ion-icon name="create" onclick="sgenreplace();return false" id="sgenedit" style="display:block;"></ion-icon>
                          <div class="close" id="sgencancel"  onclick="sgenreturned();return false" style="display:none;"></div>
                            <input type="submit" id="sgensubmit" name="subsgender" value=""> 
                        </td>
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td>
                            <div id="sadata" style="display:block">
                            <?php echo $row['address']; ?></div>
                            <?php echo' <input type="text" name="saddress" value='.$row['address'].'  style="display:none" id="saform">';?>
                        </td>
                        <td style="display:flex;">
                          <ion-icon name="create" onclick="sareplace();return false" id="saedit" style="display:block;"></ion-icon>
                          <div class="close" id="sacancel"  onclick="sareturned();return false" ></div>
                         <input type="submit" id="sasubmit" name="subsaddress" value=""> 
                        </td>
                    </tr>
                    <tr>
                        <td>Area</td>
                        <td>
                            <div id="sareadata" style="display:block">
                            <?php 
                            $fetch=mysqli_query($dbConnected,"select areaname from area where id='".$row['area']."'");
                            $area=mysqli_fetch_array($fetch);
                            echo $area['areaname'];
                            ?></div>
                            <select name="sarea" id="sareaform" style="display:none;">
                             <?php $class=mysqli_query($dbConnected,"select * from area");
                                while($fetchclass=mysqli_fetch_array($class))
                                {  echo '<option value='.$fetchclass['id'].'> '.$fetchclass['areaname'].'</option> ';  }
                            ?>
                            </select>
                        </td>
                        <td style="display:flex;">
                          <ion-icon name="create" onclick="sareareplace();return false" id="sareaedit" style="display:block;"></ion-icon>
                          <div class="close" id="sareacancel"  onclick="sareareturned();return false" ></div>
                          <input type="submit" id="sareasubmit" name="subsarea" value=""> 
                        </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>
                            <div id="spdata" style="display:block">
                            <?php echo "&#40;&#43;92&#41;".$row['pnum']; ?></div>
                            <form>
                                <?php echo' <input type="tel" name="spnum" value="&#40;&#43;92&#41;'.$row['pnum'].'"  style="display:none" id="spform" min="11" maxlength="11">';?>
                            </form>
                        </td>
                        <td style="display:flex;">
                            <ion-icon name="create" onclick="spreplace();return false" id="spedit" style="display:block;"></ion-icon>
                            <div class="close" id="spcancel"  onclick="spreturned();return false" style="display:none;"></div>
                            <input type="submit" id="spsubmit" name="subspnum" value=""> 
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <div id="edata" style="display:block">
                                <?php echo $fetchemail['email']; ?></div></td>
                        <td></td>
                    </tr>
					
                    </table>
                </div>
                
				<div class="title">User Credentials</div>

                <div class="box">
				
                    <table class="table1">
                    <tr>
                        <td style="color: #9c9b98;">password</td>
                        <td>

                         <div class="col span-1-of-3">
                         <input type="password" name="soldpass" placeholder="enter old password"  style="display:none" id="sopassform">
                         </div>
                         <div class="col span-1-of-3">
                            
                            <input type="password" id="spassform" name="spass" placeholder="enter new password" style="display:none">
                            </div>
                            
                            <div class="col span-1-of-3">
                            <input type="password" id="scpassform" name="scpass" placeholder="re enter password" style="display:none">
                            </div>
                        </td>
                        <td style="display:flex;">
                          <ion-icon name="create" onclick="spassreplace();return false" id="spassedit" style="display:block;"></ion-icon>
                          <div class="close" id="spasscancel"  onclick="spassreturned();return false" style="display:none;"></div>
                          <input type="submit" id="spasssubmit" name="subspass" value=""> 
                        </td>
                       
                     </tr>
                    </table>
                        
                </div>

                  
            </div> 
                    
        </div>
                
                
    </div>
    </div>
    </div>
    </div>
    </form>
                 
</section>

    <?php include '../templates/footer.php';?>
    <?php include '../templates/script.php';?>
    <script src="../../js/nav.js"></script>

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
    var password = document.getElementById("pass-update");
    var confirm_password = document.getElementById("cpass-update");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Not Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
<script>
        function sgenreplace() { 
document.getElementById("sgendata").style.display="none"; 
document.getElementById("sgenform").style.display="block"; 
document.getElementById("sgenedit").style.display="none"; 
document.getElementById("sgencancel").style.display="block"; 
document.getElementById("sgen-submit").style.display="block"; 
} 
        function sgenreturned(){
document.getElementById("sgendata").style.display="block"; 
document.getElementById("sgenform").style.display="none"; 
document.getElementById("sgenedit").style.display="block"; 
document.getElementById("sgencancel").style.display="none"; 
document.getElementById("sgen-submit").style.display="none"; 
        }
        function sareplace() { 
document.getElementById("sadata").style.display="none"; 
document.getElementById("saform").style.display="block"; 
document.getElementById("saedit").style.display="none"; 
document.getElementById("sacancel").style.display="block"; 
document.getElementById("sa-submit").style.display="block"; 
} 
        function sareturned(){
document.getElementById("sadata").style.display="block"; 
document.getElementById("saform").style.display="none"; 
document.getElementById("saedit").style.display="block"; 
document.getElementById("sacancel").style.display="none"; 
document.getElementById("sa-submit").style.display="none"; 
        }
        function sareareplace() { 
document.getElementById("sareadata").style.display="none"; 
document.getElementById("sareaform").style.display="block"; 
document.getElementById("sareaedit").style.display="none"; 
document.getElementById("sareacancel").style.display="block"; 
document.getElementById("sarea-submit").style.display="block"; 
} 
        function sareareturned(){
document.getElementById("sareadata").style.display="block"; 
document.getElementById("sareaform").style.display="none"; 
document.getElementById("sareaedit").style.display="block"; 
document.getElementById("sareacancel").style.display="none"; 
document.getElementById("sarea-submit").style.display="none"; 
        }
        function spreplace() { 
document.getElementById("spdata").style.display="none"; 
document.getElementById("spform").style.display="block"; 
document.getElementById("spedit").style.display="none"; 
document.getElementById("spcancel").style.display="block"; 
document.getElementById("sp-submit").style.display="block"; 
} 
        function spreturned(){
document.getElementById("spdata").style.display="block"; 
document.getElementById("spform").style.display="none"; 
document.getElementById("spedit").style.display="block"; 
document.getElementById("spcancel").style.display="none"; 
document.getElementById("sp-submit").style.display="none"; 
        }
        function spassreplace() { 
document.getElementById("sopassform").style.display="block"; 
document.getElementById("spassform").style.display="block"; 
document.getElementById("scpassform").style.display="block"; 
document.getElementById("spassedit").style.display="none"; 
document.getElementById("spasscancel").style.display="block"; 
document.getElementById("spass-submit").style.display="block"; 
} 
        function spassreturned(){ 
document.getElementById("sopassform").style.display="none"; 
document.getElementById("spassform").style.display="none"; 
document.getElementById("scpassform").style.display="none"; 
document.getElementById("spassedit").style.display="block"; 
document.getElementById("spasscancel").style.display="none"; 
document.getElementById("spass-submit").style.display="none"; 
        }
</script>
<script>
function goBack() {
    window.history.back()
}
</script>

</body>
</html>