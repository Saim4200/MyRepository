<?php  
                    
    while($row2=mysqli_fetch_array($tsearch))
    { 
        $gettinfo=mysqli_query($dbConnected,
                    "select * from teacherinfoprofessional
                    inner join teacherinfopersonal on teacherinfoprofessional.id=teacherinfopersonal.id
                    inner join qualification on teacherinfoprofessional.qualification=qualification.qid
                    inner join locatoin on teacherinfoprofessional.location=locatoin.lid 
                    where teacherinfoprofessional.id='".$row2['id']."'");

        $fetchtinfo=mysqli_fetch_array($gettinfo);
        $tsubjects=mysqli_query($dbConnected,"select * from teachersubjects where id='".$row2['id']."'");
        
        $tarea=mysqli_fetch_array(mysqli_query($dbConnected, "select * from teacherinfopersonal 
                                                    inner join area on teacherinfopersonal.area=area.id 
                                                    where teacherinfopersonal.id='".$row2['id']."'"));
        
        $tpic=mysqli_fetch_array(mysqli_query($dbConnected,"select profilepic from teacherinfopic where id='".$row2['id']."'"));
        
        $srcpic='';
        if(!empty($tpic) && $tpic['profilepic']!="")
            $srcpic='../profilepic/'.$tpic['profilepic'];
                     
        
?>
           
           <div class="box">
            <div class="col span-2-of-12">
<?php 
                if($srcpic!='' && file_exists($srcpic)){
                    echo "<img src=$srcpic class='pic-box'>";
                }
                else{
                    if($fetchtinfo['gender']==1)
                        echo "<img src='../../css/img/tutor.png' class='pic-box'>";
                    elseif($fetchtinfo['gender']==2)
                        echo "<img src='../../css/img/tutor-female.png' class='pic-box'>";
                    else
                         echo "<img src='../../css/img/placeholder.png' class='pic-box'>";
                   
                }
?>
                <div class="name" id="name"><?php echo $fetchtinfo['firstname']." ".$fetchtinfo['lastname']; ?></div>
            </div>
               
            <div class="col span-5-of-12">
            <div class="inner-box">
                 <img src='../../css/img/university.png' class='icon-box'>
                 <div id="unibox"><?php echo $fetchtinfo['institute']; ?></div>
              </div>
                 <div class="divider"></div>
            <div class="inner-box">    
                  <img src='../../css/img/graduation.png' class='icon-box-2'><div class="qualification-box"><?php echo $fetchtinfo['qualificationname']; ?></div>
                  <img src='../../css/img/books.png' class='icon-box-2'><div class="qualification-box"><?php echo $fetchtinfo['majorsub']?></div>
            </div>
            <div class="divider"></div>
            <div class="inner-box" style="margin-top: 5px">
                 <img src="../../css/img/location.png" class="icon-box-2"><div class="qualification-box">Lives in <?php echo $tarea['areaname']; ?></div>
                 <img src="../../css/img/location2.png" class="icon-box-2"><div class="qualification-box">
<?php                     
$farea=mysqli_fetch_array(mysqli_query($dbConnected, "select * from area where id=".$area));
                 if($location==2){ if(count($farea)>0){echo 'I can go to '.$farea['areaname'];} else{ echo 'I can go to student\'s location'; } } 
                 elseif($location==1){ echo 'I can teach at my home'; }
                 elseif($location==3){ echo 'I can teach online tuition'; }
?>
                 </div>
            </div>
                 <div class="divider"></div>
            </div>
               <div class="col span-5-of-12">
                   <div class="inner-box">
                        <div class="col span-2-of-2">
                            <div class="subjectslist">My Subjects</div>
                            <div class="col span-2-of-2" style="min-height:10%;">
<?php
                        while($sub=mysqli_fetch_array($tsubjects))
                        {
                            $subn1=mysqli_fetch_array(mysqli_query($dbConnected,"select * from subjects where sid='".$sub['sub1']."'"));
                            $subn2=mysqli_fetch_array(mysqli_query($dbConnected,"select * from subjects where sid='".$sub['sub2']."'"));
                            $subn3=mysqli_fetch_array(mysqli_query($dbConnected,"select * from subjects where sid='".$sub['sub3']."'"));
                            $subn4=mysqli_fetch_array(mysqli_query($dbConnected,"select * from subjects where sid='".$sub['sub4']."'"));
                            
                            if(!empty($subn1)){
                                if($subn1['sid']==$sub1 || $subn1['sid']==$sub2 ||$subn1['sid']==$sub3 || $subn1['sid']==$sub4){
?>
                                    <div id="ck-button">
                                       <label>
                                          <input type="checkbox" id="sub"  name="sub[]" value="<?php echo $subn1['sid']?>" checked><span><?php echo $subn1['subjectname']; ?></span>
                                       </label>
                                    </div>
<?php 
                                } else{ 
?>
                                    <div id="ck-button-disabled">
                                       <label>
                                          <input type="checkbox" id="sub"  name="sub[]" value="<?php echo $subn1['sid']?>" disabled="disabled"><span><?php echo $subn1['subjectname']; ?></span>
                                       </label>
                                    </div>
<?php 
                                }
                            } 
                           
                            if(!empty($subn2)){
                                if($subn2['sid']==$sub1 || $subn2['sid']==$sub2 ||$subn2['sid']==$sub3 || $subn2['sid']==$sub4){
?>
                                    <div id="ck-button">
                                       <label>
                                          <input type="checkbox" id="sub"  name="sub[]" value="<?php echo $subn2['sid']?>" checked><span><?php echo $subn2['subjectname']; ?></span>
                                       </label>
                                    </div>
<?php 
                                } else{ 
?>
                                    <div id="ck-button-disabled">
                                       <label>
                                          <input type="checkbox"id="sub"  name="sub[]"  value="<?php echo $subn2['sid']?>" disabled="disabled"><span><?php echo $subn2['subjectname']; ?></span>
                                       </label>
                                    </div>
<?php 
                                }
                            }
                            if(!empty($subn3)){
                                if($subn3['sid']==$sub1 || $subn3['sid']==$sub2 ||$subn3['sid']==$sub3 || $subn3['sid']==$sub4){
?>
                                    <div id="ck-button">
                                       <label>
                                          <input type="checkbox" id="sub"  name="sub[]" value="<?php echo $subn3['sid']?>" checked><span><?php echo $subn3['subjectname']; ?></span>
                                       </label>
                                    </div>
<?php 
                                } else{ 
?>
                                    <div id="ck-button-disabled">
                                       <label>
                                          <input type="checkbox" id="sub"  name="sub[]" value="<?php echo $subn3['sid']?>" disabled="disabled"><span><?php echo $subn3['subjectname']; ?></span>
                                       </label>
                                    </div>
<?php 
                                }
                            } 
                            if(!empty($subn4)){
                                if($subn4['sid']==$sub1 || $subn4['sid']==$sub2 ||$subn4['sid']==$sub3 || $subn4['sid']==$sub4){
?>
                                    <div id="ck-button">
                                       <label>
                                          <input type="checkbox" id="sub"  name="sub[]" value="<?php echo $subn4['sid']?>" checked><span><?php echo $subn4['subjectname']; ?></span>
                                      </label>
                                    </div>
<?php 
                                } else{ 
?>
                                    <div id="ck-button-disabled">
                                       <label>
                                          <input type="checkbox" id="sub"  name="sub[]" value="<?php echo $subn4['sid']?>" disabled="disabled"><span><?php echo $subn4['subjectname']; ?></span>
                                       </label>
                                    </div>
<?php 
                                }
                            } 
                        }
?>
                           </div>
                           <div class="col span-2-of-2">
                             
                                <input type="hidden" id="reqid-<?php echo $row2['id']; ?>" value="<?php echo $_SESSION['req_id']; ?>">
<?php 
    if(mysqli_num_rows(mysqli_query($dbConnected,"select reqid from response where reqid='".$_SESSION['req_id']."' and tid='".$row2['id']."'")) > 0)
    {
        echo '<input type="button" class="sendrequest" id="'.$row2['id'].'" name="send" value="Request Sent" disabled>';
    }
    else {
        echo '<input type="button" class="sendrequest" id="'.$row2['id'].'" name="send" value="Send Request">';
    }
?>                  
                            <span class="result" id="progress-<?php echo $row2['id']; ?>">
                                <span class="tooltip" id="tooltip-<?php echo $row2['id']; ?>"></span>
                                <span class="progress-loading" id="loading-<?php echo $row2['id']; ?>"><img src="../../css/img/progress-loading.gif"></span>
                                <span class="progress-error" id="error-<?php echo $row2['id']; ?>"></span>
                            </span>
                              </div>
                        </div>
                </div>
            </div>
        </div>

          
<?php }
?>



          
        
      
    
    
