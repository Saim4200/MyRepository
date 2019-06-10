<?php
error_reporting(0);
include '../database/tutordb.php';
$check=mysqli_query($dbConnected,"select id from ad");
$catch=mysqli_fetch_array($check);
if($_SESSION['id']==$catch['id']){
?>
<head>
    
<link rel="stylesheet" type="text/css" href="../../css/grid.css">    
<link rel="stylesheet" type="text/css" href="../../css/normalize.css">    
<link rel="stylesheet" type="text/css" href="../../css/resnavi.css">   
<link rel="stylesheet" type="text/css" href="../../css/page-ad.css">
     
</head>
<body>
    <?php
    header("Cache-Control: no-cache");
    header("Pragma: no-cache");
    if($dbsuccess){
        
    ?>
    <header>
    <?php
        include 'notiad.php';
        ?>
    </header>
    <section>
    <div class="col span-2-of-2">
        <form action="page-ad.php" enctype="application/x-www-form-urlencoded" method="get">
        <div class="col span-1-of-2"><input type="submit" name="teachers" value="teachers"></div>
        <div class="col span-1-of-2"><input type="submit" name="students" value="students"></div>
        </form>
        </div>
    </section>
    
    <?php
    if(isset($_GET['teachers']) || isset($_GET['new']) || isset($_GET['acceptok']) || isset($_GET['active']) || isset($_GET['deactive']) || isset($_GET['declined'])){ 
    
        $count = mysqli_query($dbConnected,"select count(id) from data where accepted = '0'");
        $count_new = mysqli_fetch_array($count);
        $count = mysqli_query($dbConnected,"select count(id) from data where accepted = '1'");
        $count_accepted = mysqli_fetch_array($count);
        $count = mysqli_query($dbConnected,"select count(id) from data where active = '1' and accepted = '1'");
        $count_active = mysqli_fetch_array($count);
        $count = mysqli_query($dbConnected,"select count(id) from data where active = '0' and accepted = '1'");
        $count_deactive = mysqli_fetch_array($count);
        $count = mysqli_query($dbConnected,"select count(id) from data where accepted = '2'");
        $count_declined = mysqli_fetch_array($count);

    echo '
    <section>
    <div class="row">
        <div class="col span-2-of-2">
            <a href="adduserform.php?adduserform=1">Add New Tutor</a> 
        </div>
    </div>
    <div class="row">
        <div class="col span-6-of-6">
        <form action="page-ad.php" enctype="application/x-www-form-urlencoded" method="get">
        <div class="col span-1-of-6"><div class="tab"><input type="submit" name="new" value="new"><br/>('.$count_new[0].')</div></div>
        <div class="col span-1-of-6"><div class="tab"><input type="submit" name="acceptok" value="accepted"><br/>('.$count_accepted[0].') </div></div>
        <div class="col span-1-of-6"><div class="tab"><input type="submit" name="active" value="active"><br/>('.$count_active[0].') </div></div>
        <div class="col span-1-of-6"><div class="tab"><input type="submit" name="deactive" value="deactive"><br/>('.$count_deactive[0].') </div></div>
        <div class="col span-1-of-6"><div class="tab"><input type="submit" name="declined" value="declined"><br/>('.$count_declined[0].') </div></div>
        </form>
        </div>
    </div>
    </section>
    '; 

    }
    else{ }
    ?>
    
    <section>
        <div class="row">
    
    <?php
     if(isset($_GET['new']) || isset($_GET['teachers'])){
        $databasenamep='teacherinfopersonal';
        $databasenamepro='teacherinfoprofessional';
        $databasenamesub='teachersubjects';
        $databasenamepic='teacherinfopic';
        $filter = " where data.accepted = '0'";
        }
        elseif(isset($_GET['acceptok'])){
        $databasenamep='teacherinfopersonal';
        $databasenamepro='teacherinfoprofessional';
        $databasenamesub='teachersubjects';
        $databasenamepic='teacherinfopic';
        $filter = " where data.accepted = '1'";
        }
        elseif(isset($_GET['active'])){
        $databasenamep='teacherinfopersonal';
        $databasenamepro='teacherinfoprofessional';
        $databasenamesub='teachersubjects';
        $databasenamepic='teacherinfopic';
        $filter = " where data.active = '1' and data.accepted = '1'";
        }
        elseif(isset($_GET['deactive'])){
        $databasenamep='teacherinfopersonal';
        $databasenamepro='teacherinfoprofessional';
        $databasenamesub='teachersubjects';
        $databasenamepic='teacherinfopic';
        $filter = " where data.active = '0' and data.accepted = '1'";
        }
        elseif(isset($_GET['declined'])){
        $databasenamep='teacherinfopersonal';
        $databasenamepro='teacherinfoprofessional';
        $databasenamesub='teachersubjects';
        $databasenamepic='teacherinfopic';
        $filter = " where data.accepted = '2'";
        }
        
        $info= mysqli_query($dbConnected, "select * from $databasenamep
        inner join $databasenamepro on $databasenamep.id = $databasenamepro.id
        inner join data on $databasenamep.id = data.id 
        inner join $databasenamesub on $databasenamep.id = $databasenamesub.id
        inner join $databasenamepic on $databasenamep.id = $databasenamepic.id"
        .$filter);

        while($row=mysqli_fetch_array($info)){
            
            $src='../degree/'.$row['degree'];
            $src1='../CNICpic/'.$row['CNICpic'];
            $src2='../profilepic/'.$row['profilepic'];
          
            if(empty($row['degree'])){
                $src='../../css/img/certificate.png';
            }
             if(empty($row['CNICpic'])){
                $src1='../../css/img/cniccard.jpg';
            }
            
             if(empty($row['profilepic'])){
                $src2='../../css/img/PersonPlaceholder.png';
            }
            
            ?>
        
        <div class="box clearfix">
        <div class="col span-2-of-2">
            <div class="col span-1-of-3">
                <div class="inner-box"><?php
                    echo "<img src=$src1 style='width:100%;height:40%'>";
                    ?></div>
                <div class="inner-box"><?php
                    echo "<img src=$src  style='width:100%;height:60%'>";
                    ?></div>
            </div>
           
            <div class="col span-2-of-3">
                
            <form action="page-ad-update.php" method="post" enctype="application/x-www-form-urlencoded">
          
            <div class="col span-2-of-2">
                <div class="col span-2-of-2">
                    <div class="col span-1-of-4">
                        <div class="inner-box"><?php
                            echo "<img src=$src2 style='width:80%; height:20%; padding:1%;'>";
                        ?></div>
                    </div>
                    <div class="col span-3-of-5">
                        <div class="col span-2-of-2" style="font-size: 150%; padding: 0 10px 0 0; ">
                            <?php echo $row['firstname']." ".$row['lastname']; ?>
                        </div>
        
                        <div class="col span-2-of-2"><?php echo $row['email']; ?></div>
                    </div>
                </div>
                <div class="col span-2-of-2">

                <div class="col span-1-of-2">
                    <div class="col span-2-of-2">INTERMEDIATE: 
                    <?php $showsub1=mysqli_query($dbConnected,"select intergroupname from intergroup where intid='".$row['intersub']."' ");
                        $subject1=mysqli_fetch_array($showsub1);
                        echo $subject1['intergroupname']; ?>
                    </div>
                    
                    <div class="col span-2-of-2">
                    <?php $fetchqualification=mysqli_query($dbConnected,"select qualificationname from qualification where qid='".$row['qualification']."'");
                    $catchqualification=mysqli_fetch_array($fetchqualification);
                    echo $catchqualification['qualificationname']; 
                    ?>: <?php echo $row['majorsub']; ?></div>

                    <div class="col span-2-of-2"><?php echo $row['institute']; ?></div>
                    <div class="col span-2-of-2"></div>
                    
                    <div class="col span-2-of-2">CNIC No:   <?php echo $row['CNIC']; ?></div>
                    <div class="col span-2-of-2">Date of birth:  <?php echo $row['dob']; ?></div>
                    
                    <div class="col span-2-of-2"></div>
                </div>
    
                <div class="col span-1-of-2">
                    <div class="col span-2-of-2">Address: 
                    <?php $showarea=mysqli_query($dbConnected,"select areaname from area where id='".$row['area']."' ");
                        $myarea=mysqli_fetch_array($showarea);
                         echo $myarea['areaname']; ?>
                    </div>
              
                    <div class="col span-2-of-2">Mobile:  <?php echo $row['pnum']; ?></div>
                    <div class="col span-2-of-2">Whatsp:  <?php echo $row['wnum']; ?></div>

                    <div class="col span-2-of-2">Tutoring Place:  
                    <?php $showsub1=mysqli_query($dbConnected,"select locationname from locatoin where lid='".$row['location']."' ");
                        $subject1=mysqli_fetch_array($showsub1);
                         echo $subject1['locationname']; ?>
                    </div>
                </div>
                </div>
            
                <div class="col span-2-of-2">SUBJECTS:   
                    <?php $showsub1=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$row['sub1']."' ");
                    $subject1=mysqli_fetch_array($showsub1);
                    echo $subject1['subjectname']; ?>,
                    <?php $showsub1=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$row['sub2']."' ");
                    $subject1=mysqli_fetch_array($showsub1);
                    echo $subject1['subjectname']; ?>, 
                    <?php $showsub1=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$row['sub3']."' ");
                    $subject1=mysqli_fetch_array($showsub1);
                    echo $subject1['subjectname']; ?>, 
                    <?php $showsub1=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$row['sub4']."' ");
                    $subject1=mysqli_fetch_array($showsub1);
                    echo $subject1['subjectname']; ?>
                </div>
                
                    <div class="col span-2-of-2"></div>
                    <div class="col span-2-of-2"></div>
                <div class="col span-2-of-2" style="font-size:90%; color:green;">
                    ID:<?php echo $row['id']; ?>, 
                Accepted:
                <?php 
                    if($row['accepted']==1){
                        echo 'Yes';
                    } else {
                        echo 'No';
                    }
                ?>, 
                Active:
                <?php 
                    if($row['active']==1){
                        echo 'Yes';
                    } else {
                        echo 'No';
                    }
                ?> 
                </div>
                <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                <div class="col span-2-of-2"></div>
            </div>
                    
    
        <div class="col span-2-of-2">
                <div class="col span-1-of-3"><input type="submit" name="accepted" value="accept"></div>
                <div class="col span-1-of-3"><input type="submit" name="activate" value="activate"></div>
                <div class="col span-1-of-3"><input type="submit" name="deactivate" value="deactivate"></div>
        </div>
        
        <div class="col span-2-of-2">
                <input type="submit" name="decline" value="decline">
                <input type="text" name="reason" placeholder="Enter Reason" style="color:black;">
        </div>
                
        </form>
            
        </div>
        </div>
        </div>
      
            <?php 
        }}  ?>
         </div>
    </section>
<script src="../js/script.js"></script>
<script src="../js/nav.js"></script>
</body>
<?php
}
else{
    echo "you are not authorized";
}
?>