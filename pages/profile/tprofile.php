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
    <link rel="stylesheet" type="text/css" href="../../css/loading.css">
    <link rel="stylesheet" type="text/css" href="../../css/ratings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif|Roboto" rel="stylesheet">
</head>
    
<?php
   $approved=mysqli_query($dbConnected, "select active from data where id='".$_SESSION['id']."'");
    $approve=mysqli_fetch_array($approved);
?>

<body style="<?php if($approve['active']==0){ echo 'background: linear-gradient(#ff000f,#ffffff,#ffffff,#ffffff,#ffffff,#ffffff,#ffffff)'; } ?>">

<?php if($approve['active']==0){
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
            <?php
            if($pass==0){
                echo '<div class="container-alert"><div class="alert">ACCOUNT NOT ACTIVATED</div>
                <div class="note">Note: Check your email inbox for account activation link.</div></div>';
            }
            ?>
            
    <div class="row">
    <div class="container-profile clearfix">
               <ion-icon name="arrow-back" onclick="goBack()"></ion-icon>
                <div class="deco-line"></div>
    
    <div class="col span-2-of-2" style="margin: 10px 5%; ">
    <div class="col span-1-of-7">
    <div class="container-picture">
        <div class="lds-default" style="display: none"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        <div id="picture-box">
        <?php 
        if(isset($_SESSION['id'])){
             $propic=mysqli_query($dbConnected,"SELECT profilepic from teacherinfopic where id='".$_SESSION['id']."'");
             while($rowpic=mysqli_fetch_array($propic)){
                $srcpic='../profilepic/'.$rowpic['profilepic'];
            }
             echo "<img src=".$srcpic."?dummy=".$gen." class='picture'>";
        }
        else    {echo '<img src="../../css/img/PersonPlaceholder.png" class="picture">';} 
        ?>
        </div>
        <div class='pic-box'>
            <input type="file" name="picsubmit" id="profile" class="inputprofile" />
            <label for="profile"><span>Change Picture</span></label>        
        </div>
    </div>
    <!--<input type="button" id="pic-submit" value='Upload Picture'>-->

    </div>
    <div class="container-set">
        <div class="col span-2-of-7">
            <div class="name">
            <?php 
                $showtinfo=mysqli_query($dbConnected, "SELECT * from teacherinfopersonal where id='".$_SESSION['id']."'");
                $email=mysqli_query($dbConnected,"select * from data where id='".$_SESSION['id']."'");
                $fetchemail=mysqli_fetch_array($email);
                $row=mysqli_fetch_array($showtinfo);
                    echo $row['firstname']." ".$row['lastname'];?>
            </div>
                    <?php  if($pass==1){  
                            echo '<div class="id">ID: '.$row['id'].'</div>';
                    } ?>
        </div>
              
                <div class="col span-2-of-7"></div>
                
                <div class="col span-2-of-7"></div>
    </div>
    <div class="container-res">
        <div class="box">
            <div class="box">
            <div class="name">
            <?php 
                $showtinfo=mysqli_query($dbConnected, "SELECT * from teacherinfopersonal where id='".$_SESSION['id']."'");
                $email=mysqli_query($dbConnected,"select * from data where id='".$_SESSION['id']."'");
                $fetchemail=mysqli_fetch_array($email);
                $row=mysqli_fetch_array($showtinfo);
                echo $row['firstname']." ".$row['lastname'];?></div>
                </div>
                <?php  if($pass==1){  
                        echo '<div class="box"><div class="id">ID: '.$row['id'].'</div></div>';
                } ?>
    
                </div>
                    <div class="box"></div>
    </div>
    </div>
    
    <div class="col span-2-of-2">
    <div class="container-view">
        <div class="col span-1-of-4 color" style="margin-top:4%;">
                <div class="filter" id="filter">
                <div class="container">
                    <div class="sidebar">
                        <button class="tablinks active" onclick="openContent(event, 'about')">About</button>
                        <button class="tablinks" onclick="openContent(event, 'preferences')">Preferences</button>
                        <button class="tablinks" onclick="openContent(event, 'documents')">Documents</button>
                        <button class="tablinks" onclick="openContent(event, 'ratings')">Ratings</button>
                        <button class="tablinks" onclick="openContent(event, 'tests')">Tests</button>
                        <button class="tablinks" onclick="openContent(event, 'achievements')">Achievements</button>
                        <button class="tablinks" onclick="openContent(event, 'tuitions')">Tuition History</button>
                    </div>
                </div>
                </div>     
        </div>
                    
        <div class="col span-3-of-4">
                    
            <div class="tabcontent" id="about">
                <div class="title">about</div>
                <div class="sub-title">contact information</div>    
                <div class="box">
                    <table class="table">
                    <tr>
                        <td>Address</td>
                        <td>
                            <div id="addrdata" style="display:block">
                            <?php echo $row['address']; ?></div>
                            <?php echo' <input type="text" name="address" value='.$row['address'].'  style="display:none" id="addr-update">';?>
                        </td>
                        <td style="display:flex;">
                          <ion-icon name="create" onclick="areplace();return false" id="addredit" style="display:block;"></ion-icon>
                          <div class="close" id="addrcancel"  onclick="areturned();return false" ></div>
                         <input type="button" id="addr-submit" name="subaddress" value=""> 
                            <img src="../../css/img/progress-loading.gif" id="loading-addr">
                        </td>
                    </tr>
                    <tr>
                        <td>area</td>
                        <td>
                            <div id="areadata" style="display:block">
                            <?php 
                            $fetch=mysqli_query($dbConnected,"select areaname from area where id='".$row['area']."'");
                            $area=mysqli_fetch_array($fetch);
                            echo $area['areaname'];
                            ?></div>
                            <select name="area" id="area-update" style="display:none;">
                             <?php $class=mysqli_query($dbConnected,"select * from area");
                                while($fetchclass=mysqli_fetch_array($class))
                                {  echo '<option value='.$fetchclass['id'].'> '.$fetchclass['areaname'].'</option> ';  }
                            ?>
                            </select>
                        </td>
                        <td style="display:flex;">
                          <ion-icon name="create" onclick="areareplace();return false" id="areaedit" style="display:block;"></ion-icon>
                          <div class="close" id="areacancel"  onclick="areareturned();return false" ></div>
                          <input type="button" id="area-submit" name="subarea" value=""> 
                            <img src="../../css/img/progress-loading.gif" id="loading-area">
                        </td>
                    </tr>
                    <tr>
                        <td>phone</td>
                        <td>
                            <div id="pnumdata" style="display:block">
                            <?php echo "&#40;&#43;92&#41;".$row['pnum']; ?></div>
                            <form>
                                <?php echo' <input type="tel" name="pnum" placeholder="Enter New Number"  style="display:none" id="pnum-update" min="11" maxlength="11">';?>
                            </form>
                        </td>
                        <td style="display:flex;">
                            <ion-icon name="create" onclick="preplace();return false" id="pnumedit" style="display:block;"></ion-icon>
                            <div class="close" id="pnumcancel"  onclick="preturned();return false" style="display:none;"></div>
                            <input type="button" id="pnum-submit" name="subpnum" value=""> 
                            <img src="../../css/img/progress-loading.gif" id="loading-pnum">
                        </td>
                    </tr>
                    <tr>
                        <td>whatsapp</td>
                        <td>
                            <div id="wnumdata" style="display:block">
                            <?php echo "&#40;&#43;92&#41;".$row['wnum']; ?></div>
                            <form>
                            <?php echo' <input type="tel" name="wnum" placeholder="Enter New Number"  style="display:none" id="wnum-update" min="11" maxlength="11">';?>
                            </form>
                        </td>
                        <td style="display:flex;">
                          <ion-icon name="create" onclick="wreplace();return false" id="wnumedit" style="display:block;"></ion-icon>
                          <div class="close" id="wnumcancel"  onclick="wreturned();return false" style="display:none;"></div>
                            <input type="button" id="wnum-submit" name="subwnum" value=""> 
                            <img src="../../css/img/progress-loading.gif" id="loading-wnum">
                        </td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td>
                            <div id="edata" style="display:block">
                                <?php echo $fetchemail['email']; ?></div></td>
                        <td></td>
                    </tr>
                    </table>
                </div>
                
                <div class="sub-title">Basic Information</div>
                <div class="box">
                    <table class="table">
                    <tr>
                        <td>gender</td>
                        <td><div id="gendata" style="display:block">
                        <?php
                        $gen=mysqli_query($dbConnected,"select gender from gender where gid='".$row['gender']."'");
                        $gender=mysqli_fetch_array($gen);
                        echo $gender['gender'];
                        ?>
                        </div>
                        <select name="gender" id="gen-update" style="display:none;">
                         <?php $genlist=mysqli_query($dbConnected,"select * from gender");
                            while($genitem=mysqli_fetch_array($genlist))
                            {
                            echo '<option value='.$genitem['gid'].'> '.$genitem['gender'].'</option> ';
                            }
                        ?>
                        </select>
                        </td>
                        <td style="display:flex;">
                          <ion-icon name="create" onclick="genreplace();return false" id="genedit" style="display:block;"></ion-icon>
                          <div class="close" id="gencancel"  onclick="genreturned();return false" style="display:none;"></div>
                            <input type="button" id="gen-submit" name="subgender" value=""> 
                            <img src="../../css/img/progress-loading.gif" id="loading-gen">
                        </td>
                    </tr>
                    <tr>
                        <td>CNIC</td>
                        <td>
                            <div id="cnicdata" style="display:block">
                            <?php echo $row['CNIC']; ?></div>
                        </td>
                        <td></td>
                        </td>
                    </tr>
                    </table>
                    <table class="table1">
                    <tr>
                        <td style="color: #9c9b98;">password</td>
                        <td>

                         <div class="col span-1-of-3">
                         <input type="password" name="oldpass" placeholder="Old Password"  style="display:none" id="opass-update">
                         </div>
                         <div class="col span-1-of-3">
                            
                            <input type="password" id="pass-update" name="pass" placeholder="New Password" style="display:none">
                            </div>
                            
                            <div class="col span-1-of-3">
                            <input type="password" id="cpass-update" name="cpass" placeholder="Confirm Password" style="display:none">
                            </div>
                        </td>
                        <td style="display:flex;">
                          <ion-icon name="create" onclick="passreplace();return false" id="passedit" style="display:block;"></ion-icon>
                          <div class="close" id="passcancel"  onclick="passreturned();return false" style="display:none;"></div>
                          <input type="button" id="pass-submit" name="subpass" value=""> 
                            <img src="../../css/img/progress-loading.gif" id="loading-pass">
                        </td>
                     </tr>
                     <tr>
                        <td></td>
                        <td id="passdata"></td>
                    </tr>
                    </table>
                        
                  <div class="res-box">
                    <div class="col span-1-of-3">
                        <div class="td-title">profile-pic</div>
                        </div>
                    <div class="col span-1-of-3"><div class="td-title">
                        <input type="file" name="res-pic-submit" id='pictureform'  style="display:none;"><ion-icon name="create" onclick="picturereplace();return false" id="pictureedit" style="display:block;"></ion-icon></div>
                        </div>
                    <div class="col span-1-of-3"><div class="td-title">
                          <div class="close" id="picturecancel"  onclick="picturereturned();return false" style="display:none;"></div>
                          <input type="button" id="picture-submit" name="res-pic-submit" value="">
                        </div></div>
                    
                    
                    </div>
                </div>
                <?php
                     $pro=mysqli_query($dbConnected,"select * from teacherinfoprofessional where id='".$_SESSION['id']."'");
                      $fetchpro=mysqli_fetch_array($pro);
    
                      $qual=mysqli_query($dbConnected,"select * from qualification where qid='".$fetchpro['qualification']."' ");
                      $fetchquali=mysqli_fetch_array($qual);
                      
                        $current=mysqli_query($dbConnected,"select * from intergroup where intid='".$fetchpro['intersub']."'");
                        $inter=mysqli_fetch_array($current);
                  ?>
 
                <div class="sub-title">Education</div>
                <div class="box">
                <table class="table">
                    <tr>
                    <td>institute</td>
                    <td>
                        <div id="instdata" style="display:block">
                            <?php echo $fetchpro['institute']; ?></div>
                    <?php echo '<input type="text" name="institute1" value="'.$fetchpro['institute'].'"  style="display:none" id="inst-update">';?>
                    </td>
                    <td style="display:flex;">
                      <ion-icon name="create" onclick="instreplace();return false" id="instedit" style="display:block;"></ion-icon>
                      <div class="close" id="instcancel"  onclick="instreturned();return false" style="display:none;"></div>
                      <input type="button" id="inst-submit" name="submitinst" value="">
                      <img src="../../css/img/progress-loading.gif" id="loading-inst">
                    </td>
                    </tr>
                      <tr>
                        <td>qualification</td>
                        <td>
                            <div id="qualifdata" style="display:block">
                            <?php echo $fetchquali['qualificationname']; ?></div>
                            
                        <select name="qualification" id="qualif-update" style="display:none;">
                         <?php $class=mysqli_query($dbConnected,"select * from qualification");
                            while($fetchclass=mysqli_fetch_array($class))
                            {
                            echo '<option value='.$fetchclass['qid'].'> '.$fetchclass['qualificationname'].'</option> ';
                            }
      
                        ?>
                         </select>
                            
                                </td>
                            <td style="display:flex;">
                            
                            
                          <ion-icon name="create" onclick="qreplace();return false" id="qualifedit" style="display:block;"></ion-icon>
                          <div class="close" id="qualifcancel"  onclick="qreturned();return false" style="display:none;"></div>
                          <input type="button" id="qualif-submit" name="subquali" value="">
                          <img src="../../css/img/progress-loading.gif" id="loading-qualif">
                            </td>
                      </tr>

                      <tr>
                        <td>Specialization</td>
                        <td>
                            <div id="specdata" style="display:block">
                            <?php echo $fetchpro['majorsub']; ?></div>
                            <form>
                            <?php echo' <input type="text" name="specnum" placeholder="'.$fetchpro['majorsub'].'"  style="display:none" id="spec-update">';?>
                            </form>
                        </td>
                        <td style="display:flex;">
                          <ion-icon name="create" onclick="specreplace();return false" id="specedit" style="display:block;"></ion-icon>
                          <div class="close" id="speccancel"  onclick="specreturned();return false" style="display:none;"></div>
                            <input type="button" id="spec-submit" name="subspec" value=""> 
                            <img src="../../css/img/progress-loading.gif" id="loading-spec">
                        </td>
                       
                      </tr>

                      <tr>
                        <td>intergroup</td>
                        <td>
                            <div id="interdata" style="display:block">
                            <?php echo $inter['intergroupname']; ?></div>
                           
                             <select name="inter" id="inter-update" style="display:none;">
                             <?php $group=mysqli_query($dbConnected,"select * from intergroup");
                            while($fetchgroup=mysqli_fetch_array($group))
                            {
                            echo '<option class="color" value='.$fetchgroup['intid'].'> '.$fetchgroup['intergroupname'].'</option> ';
                            }
                            ?>
                            </select>
                            </td>
                            <td style="display:flex;">
                              <ion-icon name="create" onclick="intreplace();return false" id="interedit" style="display:block;"></ion-icon>
                              <div class="close" id="intercancel"  onclick="intreturned();return false" style="display:none;"></div>
                              <input type="button" id="inter-submit" name="submitint" value="">
                                <img src="../../css/img/progress-loading.gif" id="loading-inter">
                           </td>
                       
                      </tr>

                        
                    </table>
                    
                </div>
            </div>
                    

                <?php
                  $subjects=mysqli_query($dbConnected,"select * from subjects");

                  $tsub=mysqli_query($dbConnected,"select * from teachersubjects where id='".$_SESSION['id']."'");
                  $tsubjects=mysqli_fetch_array($tsub);

                  $loc=mysqli_query($dbConnected,"select * from locatoin where lid='".$fetchpro['location']."'");
                  $location=mysqli_fetch_array($loc);
    
                ?>
            
            <div class="tabcontent" id="preferences">
                <div class="title">Preferences</div>
                <div class="sub-title">subjects</div>
                <div class="box"> 
                    <table class="table">
                    <?php 
                        $sub1name=''; 
                        if ($tsubjects['sub1']!=0){
                        $checksub=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT subjectname from subjects where sid='".$tsubjects['sub1']."'")); 
                        $sub1name=  $checksub['subjectname'];
                        }
                        ?>
                        <tr>
                            <td>Subject 1</td>
                            <td>
                            <div id="sub1data" style="display:block">
                            <?php echo $sub1name; ?></div>
                            <select name="sub1" id="sub1-update" style="display:none;">
                                 <?php
                                    while($fetchsubject=mysqli_fetch_array($subjects))
                                    {
                                    echo '<option value='.$fetchsubject['sid'].'> '.$fetchsubject['subjectname'].'</option> ';
                                    }
                                ?>
                             </select>
                            </td>
                            <td style="display:flex;">
                              <ion-icon name="create" onclick="sub1replace();return false" id="sub1edit" style="display:block;"></ion-icon>
                              <div class="close" id="sub1cancel"  onclick="sub1returned();return false" style="display:none;"></div>
                              <input type="button" id="sub1-submit" name="submitsub1" value="">
                          <img src="../../css/img/progress-loading.gif" id="loading-qualif">
                            </td>
                        </tr>
                    <?php 
                        $sub2name=''; 
                        if ($tsubjects['sub2']!=0){
                        $checksub=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT subjectname from subjects where sid='".$tsubjects['sub2']."'")); 
                        $sub2name=  $checksub['subjectname'];
                        }
                        ?>
                        <tr>
                            <td>Subject 2</td>
                            <td>
                            <div id="sub2data" style="display:block">
                            <?php echo $sub2name; ?></div>
                            <select name="sub2" id="sub2-update" style="display:none;">
                                 <?php
                                    $subjects=mysqli_query($dbConnected,"select * from subjects");
                                   while($fetchsubject=mysqli_fetch_array($subjects))
                                    {
                                    echo '<option value='.$fetchsubject['sid'].'> '.$fetchsubject['subjectname'].'</option> ';
                                    }
                                ?>
                             </select>
                            </td>
                            <td style="display:flex;">
                              <ion-icon name="create" onclick="sub2replace();return false" id="sub2edit" style="display:block;"></ion-icon>
                              <div class="close" id="sub2cancel"  onclick="sub2returned();return false" style="display:none;"></div>
                              <input type="button" id="sub2-submit" name="submitsub2" value="">
                           <img src="../../css/img/progress-loading.gif" id="loading-qualif">
                           </td>
                        </tr>
                    <?php 
                        $sub3name=''; 
                        if ($tsubjects['sub3']!=0){
                        $checksub=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT subjectname from subjects where sid='".$tsubjects['sub3']."'")); 
                        $sub3name=  $checksub['subjectname'];
                        }
                        ?>
                        <tr>
                            <td>Subject 3</td>
                            <td>
                            <div id="sub3data" style="display:block">
                            <?php echo $sub3name; ?></div>
                            <select name="sub3" id="sub3-update" style="display:none;">
                                 <?php
                                    $subjects=mysqli_query($dbConnected,"select * from subjects");
                                    while($fetchsubject=mysqli_fetch_array($subjects))
                                    {
                                    echo '<option value='.$fetchsubject['sid'].'> '.$fetchsubject['subjectname'].'</option> ';
                                    }
                                ?>
                             </select>
                            </td>
                            <td style="display:flex;">
                              <ion-icon name="create" onclick="sub3replace();return false" id="sub3edit" style="display:block;"></ion-icon>
                              <div class="close" id="sub3cancel"  onclick="sub3returned();return false" style="display:none;"></div>
                              <input type="button" id="sub3-submit" name="submitsub3" value="">
                          <img src="../../css/img/progress-loading.gif" id="loading-qualif">
                            </td>
                        </tr>
                    <?php 
                        $sub4name=''; 
                        if ($tsubjects['sub4']!=0){
                        $checksub=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT subjectname from subjects where sid='".$tsubjects['sub4']."'")); 
                        $sub4name=  $checksub['subjectname'];
                        }
                        ?>
                        <tr>
                            <td>Subject 4</td>
                            <td>
                            <div id="sub4data" style="display:block">
                            <?php echo $sub4name; ?></div>
                            <select name="sub4" id="sub4-update" style="display:none;">
                                 <?php
                                    $subjects=mysqli_query($dbConnected,"select * from subjects");
                                    while($fetchsubject=mysqli_fetch_array($subjects))
                                    {
                                    echo '<option value='.$fetchsubject['sid'].'> '.$fetchsubject['subjectname'].'</option> ';
                                    }
                                ?>
                             </select>
                            </td>
                            <td style="display:flex;">
                              <ion-icon name="create" onclick="sub4replace();return false" id="sub4edit" style="display:block;"></ion-icon>
                              <div class="close" id="sub4cancel"  onclick="sub4returned();return false" style="display:none;"></div>
                              <input type="button" id="sub4-submit" name="submitsub4" value="">
                          <img src="../../css/img/progress-loading.gif" id="loading-qualif">
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="sub-title">Tutoring Place</div>
                <div class="box" >
                    <table class="table">
                        <tr>
                            <td>I want to teach </td>
                            <td>
                            <div id="locdata" style="display:block">
                            <?php echo $location['locationname']; ?></div>
                            <select name="location" id="loc-update" style="display:none;">
                                 <?php $loc=mysqli_query($dbConnected,"select * from locatoin");
                                    while($fetchloc=mysqli_fetch_array($loc))
                                    {
                                    echo '<option value='.$fetchloc['lid'].'> '.$fetchloc['locationname'].'</option> ';
                                    }
              
                                ?>
                                </select>
                            
                            </td>
                            <td style="display:flex;">
                              <ion-icon name="create" onclick="locreplace();return false" id="locedit" style="display:block;"></ion-icon>
                              <div class="close" id="loccancel"  onclick="locreturned();return false" style="display:none;"></div>
                              <input type="button" id="loc-submit" name="loc" value="">
                          <img src="../../css/img/progress-loading.gif" id="loading-loc">
                            </td>
                        </tr>
                        </table>
                    </div>

                <div class="sub-title">Target Areas</div>
                <div class="box" >
                    <table class="table">
                        <?php 
                        $checkvarea=mysqli_fetch_array(mysqli_query($dbConnected,"
                        select * from teacherareas
                        inner join area on teacherareas.varea1=area.id
                        where teacherareas.id='".$_SESSION['id']."'"));
                       // if(empty($checkvarea['id'])) 
                        ?>
                        <tr>
                            <td>Area1</td>
                            <td>
                            <div id="va1data" style="display:block">
                            <?php echo $checkvarea['areaname']; ?></div>
                            <select name="varea1" id="va1-update" style="display:none;">
                                 <?php $class=mysqli_query($dbConnected,"select * from area");
                                    while($fetchclass=mysqli_fetch_array($class))
                                    {
                                    echo '<option value='.$fetchclass['id'].'> '.$fetchclass['areaname'].'</option> ';
                                    }
              
                                ?>
                                </select>
                            
                            </td>
                            <td style="display:flex;">
                              <ion-icon name="create" onclick="va1replace();return false" id="va1edit" style="display:block;"></ion-icon>
                              <div class="close" id="va1cancel"  onclick="va1returned();return false" style="display:none;"></div>
                              <input type="button" id="va1-submit" name="va1" value="">
                          <img src="../../css/img/progress-loading.gif" id="loading-qualif">
                            </td>
                        </tr>
                        <tr>
                                <?php 
                        $checkvarea=mysqli_fetch_array(mysqli_query($dbConnected,"
                        select * from teacherareas
                        inner join area on teacherareas.varea2=area.id
                        where teacherareas.id='".$_SESSION['id']."'"));
                       // if(empty($checkvarea['id'])) 
                            ?>
                            <td>Area2</td>
                            <td>
                            <div id="va2data" style="display:block">
                            <?php echo $checkvarea['areaname']; ?></div>
                            
                                <select name="varea2" id="va2-update" style="display:none;">
                         <?php $class=mysqli_query($dbConnected,"select * from area");
                            while($fetchclass=mysqli_fetch_array($class))
                            {
                            echo '<option value='.$fetchclass['id'].'> '.$fetchclass['areaname'].'</option> ';
                            }
      
                        ?>
                                </select>
                            
                            </td>
                            <td style="display:flex;">
                            
                            
                          <ion-icon name="create" onclick="va2replace();return false" id="va2edit" style="display:block;"></ion-icon>
                          <div class="close" id="va2cancel"  onclick="va2returned();return false" style="display:none;"></div>
                          <input type="button" id="va2-submit" name="va2" value="">
                          <img src="../../css/img/progress-loading.gif" id="loading-qualif">
                            </td>
                        </tr>
                        <tr>
                                <?php 
                        $checkvarea=mysqli_fetch_array(mysqli_query($dbConnected,"
                        select * from teacherareas
                        inner join area on teacherareas.varea3=area.id
                        where teacherareas.id='".$_SESSION['id']."'"));
                       // if(empty($checkvarea['id'])) 
                            ?>
                            <td>Area3</td>
                            <td>
                            <div id="va3data" style="display:block">
                            <?php echo $checkvarea['areaname']; ?></div>
                            
                                <select name="varea3" id="va3-update" style="display:none;">
                         <?php $class=mysqli_query($dbConnected,"select * from area");
                            while($fetchclass=mysqli_fetch_array($class))
                            {
                            echo '<option value='.$fetchclass['id'].'> '.$fetchclass['areaname'].'</option> ';
                            }
      
                        ?>
                                </select>
                            
                                </td>
                             <td style="display:flex;">
                            
                            
                          <ion-icon name="create" onclick="va3replace();return false" id="va3edit" style="display:block;"></ion-icon>
                          <div class="close" id="va3cancel"  onclick="va3returned();return false" style="display:none;"></div>
                          <input type="button" id="va3-submit" name="va3" value="">
                          <img src="../../css/img/progress-loading.gif" id="loading-qualif">
                            </td>
                        </tr>
                        <tr>
                                <?php 
                        $checkvarea=mysqli_fetch_array(mysqli_query($dbConnected,"
                        select * from teacherareas
                        inner join area on teacherareas.varea4=area.id
                        where teacherareas.id='".$_SESSION['id']."'"));
                       // if(empty($checkvarea['id'])) 
                            ?>
                            <td>Area4</td>
                            <td>
                            <div id="va4data" style="display:block">
                            <?php echo $checkvarea['areaname']; ?></div>
                            
                                <select name="varea4" id="va4-update" style="display:none;">
                         <?php $class=mysqli_query($dbConnected,"select * from area");
                            while($fetchclass=mysqli_fetch_array($class))
                            {
                            echo '<option value='.$fetchclass['id'].'> '.$fetchclass['areaname'].'</option> ';
                            }
      
                        ?>
                                </select>
                            
                                </td>
                             <td style="display:flex;">
                            
                            
                          <ion-icon name="create" onclick="va4replace();return false" id="va4edit" style="display:block;"></ion-icon>
                          <div class="close" id="va4cancel"  onclick="va4returned();return false" style="display:none;"></div>
                          <input type="button" id="va4-submit" name="va4" value="">
                          <img src="../../css/img/progress-loading.gif" id="loading-va4">
                            </td>
                        </tr>
                        <tr>
                                <?php 
                        $checkvarea=mysqli_fetch_array(mysqli_query($dbConnected,"
                        select * from teacherareas
                        inner join area on teacherareas.varea5=area.id
                        where teacherareas.id='".$_SESSION['id']."'"));
                       // if(empty($checkvarea['id'])) 
                            ?>
                            <td>Area5</td>
                            <td>
                            <div id="va5data" style="display:block">
                            <?php echo $checkvarea['areaname']; ?></div>
                            
                                <select name="varea5" id="va5-update" style="display:none;">
                         <?php $class=mysqli_query($dbConnected,"select * from area");
                            while($fetchclass=mysqli_fetch_array($class))
                            {
                            echo '<option value='.$fetchclass['id'].'> '.$fetchclass['areaname'].'</option> ';
                            }
      
                        ?>
                                </select>
                            
                                </td>
                             <td style="display:flex;">
                            
                            
                          <ion-icon name="create" onclick="va5replace();return false" id="va5edit" style="display:block;"></ion-icon>
                                
                          <div class="close" id="va5cancel"  onclick="va5returned();return false" style="display:none;"></div>
                            
                          <input type="button" id="va5-submit" name="va5" value="">
                          <img src="../../css/img/progress-loading.gif" id="loading-va5">
                            </td>
                        </tr>
                        <tr>
                        <?php 
                        $checkvarea=mysqli_fetch_array(mysqli_query($dbConnected,"
                        select * from teacherareas
                        inner join area on teacherareas.varea6=area.id
                        where teacherareas.id='".$_SESSION['id']."'"));
                       // if(empty($checkvarea['id'])) 
                            ?>
                            <td>Area6</td>
                            <td>
                            <div id="va6data" style="display:block">
                            <?php echo $checkvarea['areaname']; ?></div>
                            
                                <select name="varea6" id="va6-update" style="display:none;">
                         <?php $class=mysqli_query($dbConnected,"select * from area");
                            while($fetchclass=mysqli_fetch_array($class))
                            {
                            echo '<option value='.$fetchclass['id'].'> '.$fetchclass['areaname'].'</option> ';
                            }
      
                        ?>
                                </select>
                            
                                </td>
                             <td style="display:flex;">
                            
                            
                          <ion-icon name="create" onclick="va6replace();return false" id="va6edit" style="display:block;"></ion-icon>
                          <div class="close" id="va6cancel"  onclick="va6returned();return false" style="display:none;"></div>
                          <input type="button" id="va6-submit" name="va6" value="">
                          <img src="../../css/img/progress-loading.gif" id="loading-vs6">
                            </td>
                        </tr>
                        </table>
                    </div>
            </div> 


            <div class="tabcontent" id="documents">
                <div class="title">Documents</div>
                <div class="sub-title">CNIC Picture (Front Only)</div>         
                <div class="container-cnic-picture">
                    <div id="resultCnicImage">
                    <?php 
                    if(isset($_SESSION['id'])){
                         $pic=mysqli_query($dbConnected,"SELECT CNICpic from teacherinfopic where ID='".$_SESSION['id']."'");
                        if(mysqli_num_rows($pic) > 0){
                            $rowpic=mysqli_fetch_array($pic);
                            if($rowpic['CNICpic'] != ""){
                                $srcpic='../CNICpic/'.$rowpic['CNICpic'];
                                echo "<img src=".$srcpic." class='cnic-picture-box'>";
                            }
                            else
                                echo "<img src='../../css/img/cniccard.jpg' class='cnic-picture-box'>";
                        } else {
                                echo "<img src='../../css/img/cniccard.jpg' class='cnic-picture-box'>";
                        }
                    }
                    else    {
                                echo "<img src='../../css/img/cniccard.jpg' class='cnic-picture-box'>";
                    } 
                    ?>
                    </div>
                    <div class = "cnic-pic-change" style="<?php if($approve['active']==1) echo 'display: none'; else echo ''; ?>">
                        <div class="col span-1-of-2 ">
                                <form action="" method="post" enctype="multipart/form-data" id="cnicpicform">
            					<input type="file" name="cnicpicsubmit" id="file-2" class="inputfile inputfile-2" />
            					<label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
                                </form>
                        </div>
                        <div class="col span-1-of-2 "><input type='button' id="upload-file-2" name='cnic-pic-submit' value='Upload'></div>
                    </div>
            
                </div>
                <div class="sub-title">Degree / Diploma / Certificate</div>         
                <div class="container-cnic-picture">
                    <div id="resultDegreeImage">
                    <?php 
                    if(isset($_SESSION['id'])){
                         $pic=mysqli_query($dbConnected,"SELECT degree from teacherinfopic where ID='".$_SESSION['id']."'");
                        if(mysqli_num_rows($pic) > 0){
                            $rowpic=mysqli_fetch_array($pic);
                            if($rowpic['degree'] != ""){
                                $srcpic='../degree/'.$rowpic['degree'];
                                echo "<img src=".$srcpic." class='cnic-picture-box'>";
                            }
                            else
                                echo "<img src='../../css/img/cniccard.jpg' class='cnic-picture-box'>";
                        } else {
                                echo "<img src='../../css/img/cniccard.jpg' class='cnic-picture-box'>";
                        }
                    }
                    else    {
                                echo "<img src='../../css/img/cniccard.jpg' class='cnic-picture-box'>";
                    } 
                    ?>
                    </div>
                    <div class = "cnic-pic-change" style="<?php if($approve['active']==1) echo 'display: none'; else echo ''; ?>">
                        <div class="col span-1-of-2 ">
                                <form action="" method="post" enctype="multipart/form-data" id="degreepicform">
            					<input type="file" name="degreepicsubmit" id="file-1" class="inputfile inputfile-2" />
            					<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
                                </form>
                        </div>
                        <div class="col span-1-of-2 "><input type='button' id="upload-file-1" name='degree-pic-submit' value='Upload'></div>
                    </div>
            
                </div>
            </div>
            
            <div class="tabcontent" id="ratings">
                <div class="title">ratings</div>
                <div class="box" >
                <?php 
                  $tratngs=mysqli_query($dbConnected,"select * from ratings where tid='".$_SESSION['id']."'");
                  $count = mysqli_num_rows($tratngs);

                  if($count==0){
                    ?>
                    <table class="table">
                        <tr>
                            <td>No ratings yet</td>
                        </tr>
                    </table>
                    <?php 
                    } else {
                        include 'rating.php';
                    }
                    ?>
                </div>
            </div>
            <div class="tabcontent" id="tests">
                <div class="title">Tests</div>
                <?php 
                  $ttests=mysqli_query($dbConnected,"SELECT * from teachertests WHERE tid='".$_SESSION['id']."' ORDER BY test");
                  $count = mysqli_num_rows($ttests);
                include 'tests.php';
                ?>
            </div>
            <div class="tabcontent" id="achievements">
                <div class="title">achievements</div>
                <div class="box" >
                    <table class="table">
                        <tr>
                            <td>No achievement yet</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="tabcontent" id="tuitions">
                <div class="title">tuitions</div>
                <div class="box" >
                    <table class="table">
                        <tr>
                            <td>No tuitions yet</td>
                        </tr>
                    </table>
                </div>
            </div>
                
        </div>
    </div>
    </div>
    </div>
    </div>
                 
</section>

    <?php include '../templates/footer.php';?>
    <?php include '../templates/script.php';?>
    <script src="../../js/nav.js"></script>
 	<script src="../../js/custom-file-input.js"></script>
   <script type="text/javascript" src="changecnic.js"></script>
   <script type="text/javascript" src="changedegree.js"></script>
   <script type="text/javascript" src="changepicture.js"></script>
   <script type="text/javascript" src="updatedata.js"></script>

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
        confirm_password.setCustomValidity("Passwords Do Not Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
<script>
    function wreplace() { 
document.getElementById("wnumdata").style.display="none"; 
document.getElementById("wnum-update").style.display="block"; 
document.getElementById("wnumedit").style.display="none"; 
document.getElementById("wnumcancel").style.display="block"; 
document.getElementById("wnum-submit").style.display="block"; 
} 
        function wreturned(){
document.getElementById("wnumdata").style.display="block"; 
document.getElementById("wnum-update").style.display="none"; 
document.getElementById("wnumedit").style.display="block"; 
document.getElementById("wnumcancel").style.display="none"; 
document.getElementById("wnum-submit").style.display="none"; 
        }
        
        function preplace() { 
document.getElementById("pnumdata").style.display="none"; 
document.getElementById("pnum-update").style.display="block"; 
document.getElementById("pnumedit").style.display="none"; 
document.getElementById("pnumcancel").style.display="block"; 
document.getElementById("pnum-submit").style.display="block"; 
} 
        function preturned(){
document.getElementById("pnumdata").style.display="block"; 
document.getElementById("pnum-update").style.display="none"; 
document.getElementById("pnumedit").style.display="block"; 
document.getElementById("pnumcancel").style.display="none"; 
document.getElementById("pnum-submit").style.display="none"; 
        }
        function areplace() { 
document.getElementById("addrdata").style.display="none"; 
document.getElementById("addr-update").style.display="block"; 
document.getElementById("addredit").style.display="none"; 
document.getElementById("addrcancel").style.display="block"; 
document.getElementById("addr-submit").style.display="block"; 
} 
        function areturned(){
document.getElementById("addrdata").style.display="block"; 
document.getElementById("addr-update").style.display="none"; 
document.getElementById("addredit").style.display="block"; 
document.getElementById("addrcancel").style.display="none"; 
document.getElementById("addr-submit").style.display="none"; 
        }
        function areareplace() { 
document.getElementById("areadata").style.display="none"; 
document.getElementById("area-update").style.display="block"; 
document.getElementById("areaedit").style.display="none"; 
document.getElementById("areacancel").style.display="block"; 
document.getElementById("area-submit").style.display="block"; 
} 
        function areareturned(){
document.getElementById("areadata").style.display="block"; 
document.getElementById("area-update").style.display="none"; 
document.getElementById("areaedit").style.display="block"; 
document.getElementById("areacancel").style.display="none"; 
document.getElementById("area-submit").style.display="none"; 
        }
    function genreplace() { 
document.getElementById("gendata").style.display="none"; 
document.getElementById("gen-update").style.display="block"; 
document.getElementById("genedit").style.display="none"; 
document.getElementById("gencancel").style.display="block"; 
document.getElementById("gen-submit").style.display="block"; 
} 
        function genreturned(){
document.getElementById("gendata").style.display="block"; 
document.getElementById("gen-update").style.display="none"; 
document.getElementById("genedit").style.display="block"; 
document.getElementById("gencancel").style.display="none"; 
document.getElementById("gen-submit").style.display="none"; 
        }
    function cnicreplace() { 
document.getElementById("cnicdata").style.display="none"; 
document.getElementById("cnic-update").style.display="block"; 
document.getElementById("cnicedit").style.display="none"; 
document.getElementById("cniccancel").style.display="block"; 
document.getElementById("cnic-submit").style.display="block"; 
} 
        function cnicreturned(){
document.getElementById("cnicdata").style.display="block"; 
document.getElementById("cnic-update").style.display="none"; 
document.getElementById("cnicedit").style.display="block"; 
document.getElementById("cniccancel").style.display="none"; 
document.getElementById("cnic-submit").style.display="none"; 
        }

        function qreplace() { 
document.getElementById("qualifdata").style.display="none"; 
document.getElementById("qualif-update").style.display="block"; 
document.getElementById("qualifedit").style.display="none"; 
document.getElementById("qualifcancel").style.display="block"; 
document.getElementById("qualif-submit").style.display="block"; 
} 
        function qreturned(){
document.getElementById("qualifdata").style.display="block"; 
document.getElementById("qualif-update").style.display="none"; 
document.getElementById("qualifedit").style.display="block"; 
document.getElementById("qualifcancel").style.display="none"; 
document.getElementById("qualif-submit").style.display="none"; 
        }
        function passreplace() { 
document.getElementById("opass-update").style.display="block"; 
document.getElementById("pass-update").style.display="block"; 
document.getElementById("cpass-update").style.display="block"; 
document.getElementById("passedit").style.display="none"; 
document.getElementById("passcancel").style.display="block"; 
document.getElementById("pass-submit").style.display="block"; 
} 
        function passreturned(){ 
document.getElementById("opass-update").style.display="none"; 
document.getElementById("pass-update").style.display="none"; 
document.getElementById("cpass-update").style.display="none"; 
document.getElementById("passedit").style.display="block"; 
document.getElementById("passcancel").style.display="none"; 
document.getElementById("pass-submit").style.display="none"; 
        }
        function intreplace() { 
document.getElementById("interdata").style.display="none"; 
document.getElementById("inter-update").style.display="block"; 
document.getElementById("interedit").style.display="none"; 
document.getElementById("intercancel").style.display="block"; 
document.getElementById("inter-submit").style.display="block"; 
} 
        function intreturned(){
document.getElementById("interdata").style.display="block"; 
document.getElementById("inter-update").style.display="none"; 
document.getElementById("interedit").style.display="block"; 
document.getElementById("intercancel").style.display="none"; 
document.getElementById("inter-submit").style.display="none"; 
}
        function instreplace() { 
document.getElementById("instdata").style.display="none"; 
document.getElementById("inst-update").style.display="block"; 
document.getElementById("instedit").style.display="none"; 
document.getElementById("instcancel").style.display="block"; 
document.getElementById("inst-submit").style.display="block"; 
} 
        function instreturned(){
document.getElementById("instdata").style.display="block"; 
document.getElementById("inst-update").style.display="none"; 
document.getElementById("instedit").style.display="block"; 
document.getElementById("instcancel").style.display="none"; 
document.getElementById("inst-submit").style.display="none"; 
}
        function specreplace() { 
document.getElementById("specdata").style.display="none"; 
document.getElementById("spec-update").style.display="block"; 
document.getElementById("specedit").style.display="none"; 
document.getElementById("speccancel").style.display="block"; 
document.getElementById("spec-submit").style.display="block"; 
} 
        function specreturned(){
document.getElementById("specdata").style.display="block"; 
document.getElementById("spec-update").style.display="none"; 
document.getElementById("specedit").style.display="block"; 
document.getElementById("speccancel").style.display="none"; 
document.getElementById("spec-submit").style.display="none"; 
        }

        function locreplace() { 
document.getElementById("locdata").style.display="none"; 
document.getElementById("loc-update").style.display="block"; 
document.getElementById("locedit").style.display="none"; 
document.getElementById("loccancel").style.display="block"; 
document.getElementById("loc-submit").style.display="block"; 
} 
        function locreturned(){
document.getElementById("locdata").style.display="block"; 
document.getElementById("loc-update").style.display="none"; 
document.getElementById("locedit").style.display="block"; 
document.getElementById("loccancel").style.display="none"; 
document.getElementById("loc-submit").style.display="none"; 
        }

        function sub1replace() { 
document.getElementById("sub1data").style.display="none"; 
document.getElementById("sub1-update").style.display="block"; 
document.getElementById("sub1edit").style.display="none"; 
document.getElementById("sub1cancel").style.display="block"; 
document.getElementById("sub1-submit").style.display="block"; 
} 
        function sub1returned(){
document.getElementById("sub1data").style.display="block"; 
document.getElementById("sub1-update").style.display="none"; 
document.getElementById("sub1edit").style.display="block"; 
document.getElementById("sub1cancel").style.display="none"; 
document.getElementById("sub1-submit").style.display="none"; 
        }
        function sub2replace() { 
document.getElementById("sub2data").style.display="none"; 
document.getElementById("sub2-update").style.display="block"; 
document.getElementById("sub2edit").style.display="none"; 
document.getElementById("sub2cancel").style.display="block"; 
document.getElementById("sub2-submit").style.display="block"; 
} 
        function sub2returned(){
document.getElementById("sub2data").style.display="block"; 
document.getElementById("sub2-update").style.display="none"; 
document.getElementById("sub2edit").style.display="block"; 
document.getElementById("sub2cancel").style.display="none"; 
document.getElementById("sub2-submit").style.display="none"; 
        }
        function sub3replace() { 
document.getElementById("sub3data").style.display="none"; 
document.getElementById("sub3-update").style.display="block"; 
document.getElementById("sub3edit").style.display="none"; 
document.getElementById("sub3cancel").style.display="block"; 
document.getElementById("sub3-submit").style.display="block"; 
} 
        function sub3returned(){
document.getElementById("sub3data").style.display="block"; 
document.getElementById("sub3-update").style.display="none"; 
document.getElementById("sub3edit").style.display="block"; 
document.getElementById("sub3cancel").style.display="none"; 
document.getElementById("sub3-submit").style.display="none"; 
        }
        function sub4replace() { 
document.getElementById("sub4data").style.display="none"; 
document.getElementById("sub4-update").style.display="block"; 
document.getElementById("sub4edit").style.display="none"; 
document.getElementById("sub4cancel").style.display="block"; 
document.getElementById("sub4-submit").style.display="block"; 
} 
        function sub4returned(){
document.getElementById("sub4data").style.display="block"; 
document.getElementById("sub4-update").style.display="none"; 
document.getElementById("sub4edit").style.display="block"; 
document.getElementById("sub4cancel").style.display="none"; 
document.getElementById("sub4-submit").style.display="none"; 
        }

        function va1replace() { 
document.getElementById("va1data").style.display="none"; 
document.getElementById("va1-update").style.display="block"; 
document.getElementById("va1edit").style.display="none"; 
document.getElementById("va1cancel").style.display="block"; 
document.getElementById("va1-submit").style.display="block"; 
} 
        function va1returned(){
document.getElementById("va1data").style.display="block"; 
document.getElementById("va1-update").style.display="none"; 
document.getElementById("va1edit").style.display="block"; 
document.getElementById("va1cancel").style.display="none"; 
document.getElementById("va1-submit").style.display="none"; 
        }
        function va2replace() { 
document.getElementById("va2data").style.display="none"; 
document.getElementById("va2-update").style.display="block"; 
document.getElementById("va2edit").style.display="none"; 
document.getElementById("va2cancel").style.display="block"; 
document.getElementById("va2-submit").style.display="block"; 
} 
        function va2returned(){
document.getElementById("va2data").style.display="block"; 
document.getElementById("va2-update").style.display="none"; 
document.getElementById("va2edit").style.display="block"; 
document.getElementById("va2cancel").style.display="none"; 
document.getElementById("va2-submit").style.display="none"; 
        }
        function va3replace() { 
document.getElementById("va3data").style.display="none"; 
document.getElementById("va3-update").style.display="block"; 
document.getElementById("va3edit").style.display="none"; 
document.getElementById("va3cancel").style.display="block"; 
document.getElementById("va3-submit").style.display="block"; 
} 
        function va3returned(){
document.getElementById("va3data").style.display="block"; 
document.getElementById("va3-update").style.display="none"; 
document.getElementById("va3edit").style.display="block"; 
document.getElementById("va3cancel").style.display="none"; 
document.getElementById("va3-submit").style.display="none"; 
        }
        function va4replace() { 
document.getElementById("va4data").style.display="none"; 
document.getElementById("va4-update").style.display="block"; 
document.getElementById("va4edit").style.display="none"; 
document.getElementById("va4cancel").style.display="block"; 
document.getElementById("va4-submit").style.display="block"; 
} 
        function va4returned(){
document.getElementById("va4data").style.display="block"; 
document.getElementById("va4-update").style.display="none"; 
document.getElementById("va4edit").style.display="block"; 
document.getElementById("va4cancel").style.display="none"; 
document.getElementById("va4-submit").style.display="none"; 
        }
        function va5replace() { 
document.getElementById("va5data").style.display="none"; 
document.getElementById("va5-update").style.display="block"; 
document.getElementById("va5edit").style.display="none"; 
document.getElementById("va5cancel").style.display="block"; 
document.getElementById("va5-submit").style.display="block"; 
} 
        function va5returned(){
document.getElementById("va5data").style.display="block"; 
document.getElementById("va5-update").style.display="none"; 
document.getElementById("va5edit").style.display="block"; 
document.getElementById("va5cancel").style.display="none"; 
document.getElementById("va5-submit").style.display="none"; 
        }
        function va6replace() { 
document.getElementById("va6data").style.display="none"; 
document.getElementById("va6-update").style.display="block"; 
document.getElementById("va6edit").style.display="none"; 
document.getElementById("va6cancel").style.display="block"; 
document.getElementById("va6-submit").style.display="block"; 
} 
        function va6returned(){
document.getElementById("va6data").style.display="block"; 
document.getElementById("va6-update").style.display="none"; 
document.getElementById("va6edit").style.display="block"; 
document.getElementById("va6cancel").style.display="none"; 
document.getElementById("va6-submit").style.display="none"; 
        }
    </script>
    <script>
function goBack() {
    window.history.back()
}
</script>

</body>
</html>