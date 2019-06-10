<?php
error_reporting(0);
include '../database/tutordb.php';
$check=mysqli_query($dbConnected,"select id from ad");
$catch=mysqli_fetch_array($check);
if($_SESSION['id']==$catch['id']){
?>
<head>
<link rel="stylesheet" type="text/css" href="../../css/page-ad.css">    
<link rel="stylesheet" type="text/css" href="../../css/grid.css">    
<link rel="stylesheet" type="text/css" href="../../css/normalize.css">    
<link rel="stylesheet" type="text/css" href="../../css/resnavi.css">    
     
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
        <form action="adminnotification.php" enctype="application/x-www-form-urlencoded" method="get">
        <div class="col span-1-of-2"><input type="submit" name="students" value="students"></div>
        <div class="col span-1-of-2"><input type="submit" name="teachers" value="teachers"></div>
        </form>
        </div>
    </section>
    <section >
        <div class="row">
            <?php
        if(isset($_GET['teachers'])){
        $databasenamep='teacherinfopersonal';
        $databasenamepro='teacherinfoprofessional';
        $databasenamesub='teachersubjects';
        $databasenamepic='teacherinfopic';
        }
        elseif(isset($_GET['students'])){
        $databasenamep='students';
        $databasenamepro='studentinfoprofessional';
        $databasenamesub='studentsubjects';
        $databasenamepic='studentinfopic';
            
        }
        else{
            echo"select teacher or students";
            exit();
        }
        $id='634754';
        $info= mysqli_query($dbConnected, "select * from $databasenamep
        inner join $databasenamepro on $databasenamep.id = $databasenamepro.id
        inner join data on $databasenamep.id = data.id 
        inner join $databasenamesub on $databasenamep.id = $databasenamesub.id
        inner join $databasenamepic on $databasenamep.id = $databasenamepic.id ");

        while($row=mysqli_fetch_array($info)){
            
                        $src='../degree/'.$row['degree'];
                        $src1='../CNICpic/'.$row['CNICpic'];
                        $src2='../profilepic/'.$row['profilepic'];
        
             if ($row['accepted']==0)
             {echo '<div class="box2 clearfix">';
              
            ?>
        
        <div class="col span-2-of-2">
            <div class="col span-1-of-3">
            <div class="inner-box" style="margin-left:30%"><?php
                echo "<img src=$src2 alt='HTML5 Icon' style='width:40%;height:20%'>";
                ?></div>
            <div class="inner-box" style="margin-left:30%"><?php
                echo "<img src=$src alt='HTML5 Icon' style='width:40%;height:20%'>";
                ?></div>
            <div class="inner-box" style="margin-left:30%"><?php
                echo "<img src=$src1 alt='HTML5 Icon' style='width:40%;height:20%'>";
                ?></div>
            </div>
            <div class="col span-2-of-3">
                 <form action="page-ad-update.php" method="post" enctype="application/x-www-form-urlencoded">
                <div class="col span-2-of-2">
                <div class="col span-1-of-2">
            <div class="inner-box">
                
                <div class="col span-1-of-2">Name:</div>
                <div class="col span-1-of-2"><?php echo $row['firstname']." ".$row['lastname']; ?></div>
                </div>
             <div class="inner-box">
                <div class="col span-1-of-2">ID:</div>
                <div class="col span-1-of-2"><?php
                echo $row['id'];
                 echo "<input type='hidden' name='id' value='".$row['id']."'>" ?>
                 </div>
               
                </div>
             <div class="inner-box">
                <div class="col span-1-of-2">Email:</div>
                <div class="col span-1-of-2"><?php echo $row['email']?></div>
               
                </div>
            <div class="inner-box">
                <div class="col span-1-of-2">CNIC:</div>
                <div class="col span-1-of-2"><?php echo $row['CNIC']; ?></div>
             
                </div>
                    <div class="inner-box">
                <div class="col span-1-of-2">active status:</div>
                <div class="col span-1-of-2"><?php echo $row['active']; ?></div>
             
                </div>
            <div class="inner-box">
                <div class="col span-1-of-2">stypeid:</div>
                <div class="col span-1-of-2"><?php echo $row['skype']; ?></div>
             
                </div>
                    
                    </div>
                    <div class="col span-1-of-2">
             <div class="inner-box">
                <div class="col span-1-of-2">Address:</div>
                <div class="col span-1-of-2"><?php echo $row['address']; ?></div>
               
                </div>
            <div class="inner-box">
                <div class="col span-1-of-2">Phone Number:</div>
                <div class="col span-1-of-2"><?php echo $row['pnum']; ?></div>
                
                </div>
             <div class="inner-box">
                <div class="col span-1-of-2">Whatsapp Number:</div>
                <div class="col span-1-of-2"><?php echo $row['wnum']; ?></div>
                
                </div>
             <div class="inner-box">
                <div class="col span-1-of-2">DOB:</div>
                <div class="col span-1-of-2"><?php echo $row['dob']; ?></div>
               
                </div>
             <div class="inner-box">
                <div class="col span-1-of-2">Gender:</div>
                <div class="col span-1-of-2"><?php echo $row['gender']; ?></div>
                
                </div>
                    </div>
                </div>
                <div class="col span-2-of-2" style="margin:0;">
                    <div class="col span-1-of-2">
             <div class="inner-box">
                 <div class="col span-1-of-2">
                 Inter Group:</div>
                <div class="col span-1-of-2"><?php $showsub1=mysqli_query($dbConnected,"select intergroupname from intergroup where intid='".$row['intersub']."' ");
        
        $subject1=mysqli_fetch_array($showsub1);
        
        echo $subject1['intergroupname']; ?></div>
              
                </div>
             <div class="inner-box">
                <div class="col span-1-of-2">
                 QUALIFICATION:</div>
                <div class="col span-1-of-2"><?php echo $row['qualification']; ?></div>
               
                </div>
                    </div>
                    <div class="col span-1-of-2">
             <div class="inner-box">
                <div class="col span-1-of-2">
                 Current Status:</div>
                <div class="col span-1-of-2"><?php echo $row['currentstatus']; ?></div>
               
                </div>
             <div class="inner-box">
                <div class="col span-1-of-2">
                 Place Of Tuting:</div>
                <div class="col span-1-of-2"><?php $showsub1=mysqli_query($dbConnected,"select locationname from locatoin where lid='".$row['location']."' ");
        
        $subject1=mysqli_fetch_array($showsub1);
        
        echo $subject1['locationname']; ?></div>
                
                </div>
                </div>
                </div>
                <div class="col span-2-of-2" style="margin:0;">
                <div class="col span-1-of-2">
                    
             <div class="inner-box">
                <div class="inner-box-2"><?php 
        $showsub1=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$row['sub1']."' ");
        
        $subject1=mysqli_fetch_array($showsub1);
        
        echo $subject1['subjectname']; ?></div>
                <div class="inner-box-2"></div>
                </div>
             <div class="inner-box">
                <div class="inner-box-2"><?php $showsub1=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$row['sub2']."' ");
        
        $subject1=mysqli_fetch_array($showsub1);
        
        echo $subject1['subjectname']; ?></div>
                <div class="inner-box-2"></div>
                </div>
                    </div>
                    <div class="col span-1-of-2">
             <div class="inner-box">
                <div class="inner-box-2"><?php $showsub1=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$row['sub3']."' ");
        
        $subject1=mysqli_fetch_array($showsub1);
        
        echo $subject1['subjectname']; ?></div>
                <div class="inner-box-2"></div>
                </div>
             <div class="inner-box">
                <div class="inner-box-2"><?php $showsub1=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$row['sub4']."' ");
        
        $subject1=mysqli_fetch_array($showsub1);
        
        echo $subject1['subjectname']; ?></div>
                
                </div>
                        </div>
                </div>
                
                
                <div class="col span-2-of-2">
               
        
                <div class="col span-1-of-3"><input type="submit" name="accepted2" value="accept"></div>
                <div class="col span-1-of-3"><input type="submit" name="activate2" value="activate"></div>
                <div class="col span-1-of-3"><input type="submit" name="deactivate2" value="deactivate"></div>
                    
                </div>
                     <div class="col span-2-of-2">
                     <input type="submit" name="decline2" value="decline">
                     <input type="text" name="reason" placeholder="&nbsp;&nbsp;Enter Reason">
                     
                     </div>
                
               </form>
            
            </div>
        </div>
        </div>
            <?php }}}
        echo '</div>' ?>
    </section>
<script src="../../js/script.js"></script>
<script src="../../js/nav.js"></script>
</body>
<?php
}
else{
echo 'you are not authorized';}
?>