<?php  
                    
                while($row2=mysqli_fetch_array($tsearch))
             {
                 
                   
            include 'query.php';
            
            ?>
                <div class="container">
           <div class="box">
                 <div class="col span-1-of-6">
               <?php 
                if(file_exists($srcpic)){echo "<img src=$srcpic class='pic-box'>";}
                else{echo "<img src='../../css/img/placeholder.png' class='pic-box'>";}?>
                <div class="name"><?php echo $fetchtinfo['firstname']." ".$fetchtinfo['lastname']; ?></div>
               </div>
               <div class="col span-2-of-6">
                <div class="inner-box">
                        <div class="uni-box"><?php echo $fetchtinfo['institute']; ?></div>
                    <table class="table">
                         <tr>
                       <td><?php echo $fetchtinfo['qualificationname']; ?></td>
                       <td><?php echo $fetchtinfo['majorsub']?></td>
                       </tr>
                    </table>
                   </div>
                     <div class="inner-box">
                    <table class="table">
                        <th>SUBJECTS</th>
                        <?php
                        while($sub=mysqli_fetch_array($subject))
                        {
                            $subn1=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$sub['sub1']."' or sid='".$sub['sub2']."'");
                            $subn2=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$sub['sub3']."' or sid='".$sub['sub4']."'");
                            while(($fsubn1=mysqli_fetch_array($subn1)) | ($fsubn2=mysqli_fetch_array($subn2))){
                        ?>
                        <tr>
                        <td><?php echo $fsubn1['subjectname']; ?></td>
                        <td><?php echo $fsubn2['subjectname']; ?></td>
                        </tr>
                        <?php } }?>
                        </table>
                        </div>
                 
                   </div>
               <div class="col span-3-of-6">
                   <div class="inner-box">
                   <div class="bargain-box">
                       <form action="csearch.php" enctype="application/x-www-form-urlencoded" method="post">
                           
                        <div class="col span-1-of-3" style="margin-top:2%;">
                       <select name="tplace" required>
                    <option value="0">select tutoring place</option>
                    <?php
                    $loc=mysqli_query($dbConnected,"select * from locatoin");
                        while($floc=mysqli_fetch_array($loc))
                        {
                            echo '<option value='.$floc['lid'].'>'.$floc['locationname'].'</option>';
                        }
                    ?>
                    </select> 
                        <select name="grade" required>
                    <option value="0">Select Grade</option>
                    <?php
                    $loc=mysqli_query($dbConnected,"select * from grade");
                        while($floc=mysqli_fetch_array($loc))
                        {
                            echo '<option value='.$floc['gid'].'>'.$floc['gradename'].'</option>';
                        }
                    ?>
                    </select> 
                           </div>
                           <div class="col span-2-of-3">
                               <div class="col span-1-of-2">
                                   <select name="sub1">
                                       <option value="0">select subject</option>
                                        <?php
                    $subject=mysqli_query($dbConnected,"select * from teachersubjects where id='".$row2['id']."'");
                 
                    while($ftsub1=mysqli_fetch_array($subject)){
                     
                    $fsubject=mysqli_query($dbConnected,"select * from subjects where sid='".$ftsub1['sub1']."' or sid='".$ftsub1['sub2']."' or sid='".$ftsub1['sub3']."'or sid='".$ftsub1['sub4']."'");
                        
                        while($fsub1=mysqli_fetch_array($fsubject))
                        {
                            echo '<option value='.$fsub1['sid'].'>'.$fsub1['subjectname'].'</option>';
                        }}
                       ?>
                                   </select>
                                   <select name="sub2">
                                        <option value="0">select subject</option>
                                    <?php
                   $subject=mysqli_query($dbConnected,"select * from teachersubjects where id='".$row2['id']."'");
                 
                    while($ftsub2=mysqli_fetch_array($subject)){
                     
                    $fsubject=mysqli_query($dbConnected,"select * from subjects where sid='".$ftsub2['sub1']."' or sid='".$ftsub2['sub2']."' or sid='".$ftsub2['sub3']."'or sid='".$ftsub2['sub4']."'");
                        
                        while($fsub2=mysqli_fetch_array($fsubject))
                        {
                            echo '<option value='.$fsub2['sid'].'>'.$fsub2['subjectname'].'</option>';
                        }}
                         ?>
                                   </select>
                            
                               </div>
                               <div class="col span-1-of-2">
                              <select name="sub3">
                                   <option value="0">select subject</option>
                                    <?php
                  $subject=mysqli_query($dbConnected,"select * from teachersubjects where id='".$row2['id']."'");
                 
                    while($ftsub3=mysqli_fetch_array($subject)){
                     
                    $fsubject=mysqli_query($dbConnected,"select * from subjects where sid='".$ftsub3['sub1']."' or sid='".$ftsub3['sub2']."' or sid='".$ftsub3['sub3']."'or sid='".$ftsub3['sub4']."'");
                        
                        while($fsub3=mysqli_fetch_array($fsubject))
                        {
                            echo '<option value='.$fsub3['sid'].'>'.$fsub3['subjectname'].'</option>';
                        }}
                    ?>
                                   </select>
                              <select name="sub4">
                                   <option value="0">select subject</option>
                                    <?php
                  $subject=mysqli_query($dbConnected,"select * from teachersubjects where id='".$row2['id']."'");
                 
                    while($ftsub4=mysqli_fetch_array($subject)){
                     
                    $fsubject=mysqli_query($dbConnected,"select * from subjects where sid='".$ftsub4['sub1']."' or sid='".$ftsub4['sub2']."' or sid='".$ftsub4['sub3']."'or sid='".$ftsub4['sub4']."'");
                        
                        while($fsub4=mysqli_fetch_array($fsubject))
                        {
                            echo '<option value='.$fsub4['sid'].'>'.$fsub4['subjectname'].'</option>';
                        }}
                    ?>
                                   </select>
                               </div>
                           </div>
                           <div class="col span-2-of-2">
                               <div class="col span-1-of-2">
                               <div class="col span-1-of-4">
                               <input type="hidden" name="tid" value="<?php echo $row2['id']; ?>">
                                   </div>
                                   
                                   <div class="col span-1-of-4"></div>
                               </div>
                               <div class="col span-1-of-2">
                        <input type="submit" name="send" value="send">
                               </div>
                           </div>
                       </form>
                       </div>
                   
                   </div>
                     </div>
               </div>
                    </div>
                      <?php } 
                mysqli_data_seek($tsearch,0);
                while($row2=mysqli_fetch_array($tsearch))
             {
                 
                include 'query.php';
                
            ?>
                <div class="res-container">
          <div class="res-card">
                 <div class="col span-2-of-2">
                     <div class="col span-1-of-3">
               <?php 
                if(file_exists($srcpic)){echo "<img src=$srcpic class='res-pic-box'>";}
                else{echo "<img src='../../css/img/placeholder.png' class='res-pic-box'>";}?>
                <div class="name"><?php echo $fetchtinfo['firstname']." ".$fetchtinfo['lastname']; ?></div>
                     </div>
                     <div class="col span-1-of-3">
                     <div class="res-inner-box">
                         <div class="res-uni-box"><?php echo $fetchtinfo['institute']?></div>
                   <table class="table">
                         <tr>
                       <td><?php echo $fetchtinfo['qualificationname']; ?></td>
                       <td><?php echo $fetchtinfo['majorsub']; ?></td>
                       </tr>
                         </table>
                   </div>
                     </div>
                     <div class="col span-1-of-3"><div class="res-inner-box">
                    <table class="table">
                        <tr>
                        <?php
                        while($sub=mysqli_fetch_array($subject))
                        {
                            $subn1=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$sub['sub1']."' or sid='".$sub['sub2']."'");
                            $subn2=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$sub['sub3']."' or sid='".$sub['sub4']."'");
                            while(($fsubn1=mysqli_fetch_array($subn1)) | ($fsubn2=mysqli_fetch_array($subn2))){
                        ?>
                        <tr>
                        <td><?php echo $fsubn1['subjectname']; ?></td>
                        <td><?php echo $fsubn2['subjectname']; ?></td>
                        </tr>
                        <?php } }?>
                        </table>
                        </div></div>
               </div>
              
               
                <div class="col span-2-of-2"><div class="inner-box">
                   <div class="bargain-box">
                      
                           
                        <div class="col res-inner-box">
                            <div class="col inner-box-1-of-2">
                       <select name="tplace" required>
                    <option value="0">select tutoring place</option>
                    <?php
                    $loc=mysqli_query($dbConnected,"select * from locatoin");
                        while($floc=mysqli_fetch_array($loc))
                        {
                            echo '<option value='.$floc['lid'].'>'.$floc['locationname'].'</option>';
                        }
                    ?>
                    </select> 
                        
                           
                            </div>
                            <div class="col inner-box-1-of-2">
                        <select name="grade" required>
                    <option value="0">Select Grade</option>
                    <?php
                    $loc=mysqli_query($dbConnected,"select * from grade");
                        while($floc=mysqli_fetch_array($loc))
                        {
                            echo '<option value='.$floc['gid'].'>'.$floc['gradename'].'</option>';
                        }
                    ?>
                    </select> 
                            </div>
                           </div>
                           <div class="col res-inner-box">
                               <div class="col inner-box-1-of-2">
                                   <select name="sub1">
                                       <option value="0">select subject</option>
                                        <?php
                    $subject=mysqli_query($dbConnected,"select * from teachersubjects where id='".$row2['id']."'");
                 
                    while($ftsub1=mysqli_fetch_array($subject)){
                     
                    $fsubject=mysqli_query($dbConnected,"select * from subjects where sid='".$ftsub1['sub1']."' or sid='".$ftsub1['sub2']."' or sid='".$ftsub1['sub3']."'or sid='".$ftsub1['sub4']."'");
                        
                        while($fsub1=mysqli_fetch_array($fsubject))
                        {
                            echo '<option value='.$fsub1['sid'].'>'.$fsub1['subjectname'].'</option>';
                        }}
                       ?>
                                   </select>
                                   <select name="sub2">
                                        <option value="0">select subject</option>
                                    <?php
                   $subject=mysqli_query($dbConnected,"select * from teachersubjects where id='".$row2['id']."'");
                 
                    while($ftsub2=mysqli_fetch_array($subject)){
                     
                    $fsubject=mysqli_query($dbConnected,"select * from subjects where sid='".$ftsub2['sub1']."' or sid='".$ftsub2['sub2']."' or sid='".$ftsub2['sub3']."'or sid='".$ftsub2['sub4']."'");
                        
                        while($fsub2=mysqli_fetch_array($fsubject))
                        {
                            echo '<option value='.$fsub2['sid'].'>'.$fsub2['subjectname'].'</option>';
                        }}
                         ?>
                                   </select>
                            
                               </div>
                               <div class="col inner-box-1-of-2">
                              <select name="sub3">
                                   <option value="0">select subject</option>
                                    <?php
                  $subject=mysqli_query($dbConnected,"select * from teachersubjects where id='".$row2['id']."'");
                 
                    while($ftsub3=mysqli_fetch_array($subject)){
                     
                    $fsubject=mysqli_query($dbConnected,"select * from subjects where sid='".$ftsub3['sub1']."' or sid='".$ftsub3['sub2']."' or sid='".$ftsub3['sub3']."'or sid='".$ftsub3['sub4']."'");
                        
                        while($fsub3=mysqli_fetch_array($fsubject))
                        {
                            echo '<option value='.$fsub3['sid'].'>'.$fsub3['subjectname'].'</option>';
                        }}
                    ?>
                                   </select>
                              <select name="sub4">
                                   <option value="0">select subject</option>
                                    <?php
                  $subject=mysqli_query($dbConnected,"select * from teachersubjects where id='".$row2['id']."'");
                 
                    while($ftsub4=mysqli_fetch_array($subject)){
                     
                    $fsubject=mysqli_query($dbConnected,"select * from subjects where sid='".$ftsub4['sub1']."' or sid='".$ftsub4['sub2']."' or sid='".$ftsub4['sub3']."'or sid='".$ftsub4['sub4']."'");
                        
                        while($fsub4=mysqli_fetch_array($fsubject))
                        {
                            echo '<option value='.$fsub4['sid'].'>'.$fsub4['subjectname'].'</option>';
                        }}
                    ?>
                                   </select>
                               </div>
                           </div>
                           
                               
                               <div class="col res-inner-box">
                    <input type="hidden" name="tid" value="<?php echo $row2['id']; ?>">
                        <input type="submit" name="send" value="send">
                           </div>
                       
                       </div>
                   
                   </div></div>
                </div>
              
          
        </div>
                 <?php } ?>
    
  