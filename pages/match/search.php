<?php
//error_reporting(0);
include '../database/tutordb.php';
if(isset($_SESSION['id'])){include '../queries/checksession.php';}

if(isset($_POST['manual'])){
 $level=$sub1=$sub2=$sub3=$sub4=$area=$location=$gender=0;
$sub=$_POST['sub'];
if(!empty($sub[0])){$sub1=$sub[0];}else{$sub1=0;}
if(!empty($sub[1])){$sub2=$sub[1];}else{$sub2=0;}
if(!empty($sub[2])){$sub3=$sub[2];}else{$sub3=0;}
if(!empty($sub[3])){$sub4=$sub[3];}else{$sub4=0;}
$location=$_POST['tplace'];
$level=$_POST['grade'];
if(mysqli_num_rows($checkssession)>0){
    $_SESSION['user'] = "student";
    $insertreq=mysqli_query($dbConnected,"INSERT INTO request (sid,grade,tlocation,tarea,tgender,ntime) values ('".$_SESSION['id']."','".$level."','".$location."','".$area."','".$gender."', now())");
    $_SESSION['req_id'] = mysqli_insert_id($dbConnected);
    $insertsub=mysqli_query($dbConnected,"INSERT INTO studentsubjects (reqid,sub1,sub2,sub3,sub4) values('".$_SESSION['req_id']."','".$sub1."','".$sub2."','".$sub3."','".$sub4."')");
}
else if(mysqli_num_rows($checktsession)>0){
    $_SESSION['user'] = "tutor";
}
require '../queries/search.php';
$search_results= mysqli_num_rows($tsearch);
}
elseif(isset($_POST['filterapply'])){
 $level=$sub1=$sub2=$sub3=$sub4=$area=$location=$gender=0;
$level=$_POST['grade'];
$sub=$_POST['sub'];
if(!empty($sub[0])){$sub1=$sub[0];}else{$sub1=0;}
if(!empty($sub[1])){$sub2=$sub[1];}else{$sub2=0;}
if(!empty($sub[2])){$sub3=$sub[2];}else{$sub3=0;}
if(!empty($sub[3])){$sub4=$sub[3];}else{$sub4=0;}
$area=$_POST['area'];
$location=$_POST['tplace'];
$gender=$_POST['gender'];
if(mysqli_num_rows($checkssession)>0){
if($_SESSION['req_id'] !==null && $_SESSION['req_id'] !==""){
    $insertreq=mysqli_query($dbConnected,"UPDATE request SET sid = '".$_SESSION['id']."' grade = '".$level."', tlocation = '".$location."', tarea = '".$area."', tgender = '".$gender."', ntime = now() WHERE reqid = '".$_SESSION['req_id']."'");
    $insertsub=mysqli_query($dbConnected,"UPDATE studentsubjects SET sub1 = ".$sub1."', sub2='".$sub2."', sub3='".$sub3."', sub4='".$sub4."' WHERE reqid = '".$_SESSION['req_id']."'");
}
}
require '../queries/search.php';
    $search_results= mysqli_num_rows($tsearch);
}
elseif(isset($_POST['res-filterapply'])){
     $level=$sub1=$sub2=$sub3=$sub4=$area=$location=$gender=0;
$level=$_POST['grade'];
$sub=$_POST['sub'];
if(!empty($sub[0])){$sub1=$sub[0];}else{$sub1=0;}
if(!empty($sub[1])){$sub2=$sub[1];}else{$sub2=0;}
if(!empty($sub[2])){$sub3=$sub[2];}else{$sub3=0;}
if(!empty($sub[3])){$sub4=$sub[3];}else{$sub4=0;}
$area=$_POST['area'];
$location=$_POST['tplace'];
$gender=$_POST['gender'];

if(mysqli_num_rows($checkssession)>0){
if($_SESSION['req_id'] !==null && $_SESSION['req_id'] !==""){
    $insertreq=mysqli_query($dbConnected,"UPDATE request SET sid = '".$_SESSION['id']."' grade = '".$level."', tlocation = '".$location."', tarea = '".$area."', tgender = '".$gender."', ntime = now() WHERE reqid = '".$_SESSION['req_id']."'");
    $insertsub=mysqli_query($dbConnected,"UPDATE studentsubjects SET sub1 = ".$sub1."', sub2='".$sub2."', sub3='".$sub3."', sub4='".$sub4."' WHERE reqid = '".$_SESSION['req_id']."'");
}
}
require '../queries/search.php';
    $search_results= mysqli_num_rows($tsearch);
}

?>

<html>
    <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/grid.css">
    <link rel="stylesheet" type="text/css" href="../../css/navi.css">
    <link rel="stylesheet" type="text/css" href="../../css/resnavi.css">
    <link rel="stylesheet" type="text/css" href="../../css/headsup.css">
    <link rel="stylesheet" type="text/css" href="../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../css/search.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Monoton" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>
    <header>
    <?php
        if(isset($_SESSION['id'])){include '../templates/navi2.php';}
        else{include '../templates/navi.php';}
        ?>
        <div id="no"></div>
    </header>
    <section>
        <div class="col res-box-2-of-12">
        <?php include 'filter.php'; ?>
        </div>
        <div class="col res-box-7-of-12">
            <div class="col span-2-of-2">
            <div class="search"><?php if($search_results>0){ echo 'Matched Tutors ('.$search_results.')'; } else { echo 'No tutors match found'; } ?>
            </div>
            </div>
           
            <div class="col span-2-of-2" style="margin-top: 0px">
                    <div class="divider-main"></div>
            </div>
            
            <form id="requestform" action="ajax.php" enctype="application/x-www-form-urlencoded" method="post">
            
                <input type="hidden" id="level" name="level" value="<?php echo $level; ?>">
                <input type="hidden" id="area" name="area" value="<?php echo $area; ?>">
                <input type="hidden" id="tplace" name="tplace" value="<?php echo $location; ?>">
                <input type="hidden" id="gender" name="gender" value="<?php echo $gender; ?>">
                <input type="hidden" id="sub1" name="sub1" value="<?php echo $sub1; ?>">
                <input type="hidden" id="sub2" name="sub2" value="<?php echo $sub2; ?>">
                <input type="hidden" id="sub3" name="sub3" value="<?php echo $sub3; ?>">
                <input type="hidden" id="sub4" name="sub4" value="<?php echo $sub4; ?>">
            
            </form>
            <div class="container" id="display">
            <?php   include 'condition.php'; ?>
            </div>
        </div>
        <div class="col res-box-3-of-12">
            <div class="side-bar">
            <div class="inner-box">
                <div class="signup-box">
<?php 
                    if($_SESSION['user'] == "tutor"){
                        $fdata=mysqli_fetch_array($checktsession);
                         if($fdata['gender']==2){ echo '<div class="image-tutor-female"></div>'; }else{ echo '<div class="image-tutor-male"></div>';}
                        echo '<div class="some-text">'.$fdata['firstname'].' '.$fdata['lastname'].'</div>';
                        echo '<div class="some-text1">Registered as Tutor</div>';
                        echo '<a href="../profile/profile.php?setprofile=1"><div class="button">My Profile</div></a>';
                    } elseif($_SESSION['user'] == "student"){
                        $fdata=mysqli_fetch_array($checkssession);
                         echo '<div class="image"></div>';
                        echo '<div class="some-text">'.$fdata['firstname'].' '.$fdata['lastname'].'</div>';
                        echo '<div class="some-text1">Registered as Student</div>';
                        echo '<a href="../profile/profile.php?setprofile=1"><div class="button">My Profile</div></a>';
                    } else {
                        echo '<div class="image"></div>';
                         echo '<div class="some-text">Are you a student?</div>';
                        echo '<div class="some-text1">Login here</div>';
                        echo '<a href="../login/login.php?setlogin=1"><div class="button">Login</div></a>';
                        echo '<a href="../form/sform.php"><div class="button">Signup</div></a>';
                    }
                    
?>
            </div>
            </div>
             <div class="col span-2-of-2">
                        <div class="top-tutor">
                            <div class="heading">top tutors</div>
                            <div class="under-line"></div>
                            <div class="inner-box"></div>
                            <div class="inner-box"></div>
                            <div class="inner-box"></div>
                        </div>
                    </div>
            <div class="col span-2-of-2">
                        <div class="top-tutor">
                            <div class="heading">most requested</div>
                            <div class="under-line"></div>
                            <div class="inner-box"></div>
                            <div class="inner-box"></div>
                            <div class="inner-box"></div>
                        </div>
            </div>
            </div>
        </div>
    
    </section>
    
    <?php
    include '../templates/footer.php';
    include '../templates/script.php';
    ?>
    <script type="text/javascript" src="scrolling.js"></script>
    <script type="text/javascript" src="sendrequest.js"></script>

    <script>
    //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
          dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
              dropdownContent.style.display = "none";
            } else {
              dropdownContent.style.display = "block";
            }
          });
        }
    </script>
    </body>
</html>
