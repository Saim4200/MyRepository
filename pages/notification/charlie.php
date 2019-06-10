<?php       
mysqli_data_seek($join,0);
            while($req=mysqli_fetch_array($join)){
      if(($req['saccepted']==1) && (!empty($req['pid']) || $req['pid']>0)){
             ?>
      <div class="notification-box-charlie clearfix">
           <div class="span-2-of-2"> <div class="time"><?php echo date('d M Y', strtotime($req['ntime'])); ?></div></div>
                 <div class="col span-2-of-2">
            <div class="col res-box-1-of-4">
               
                <table class="table">
                <tr>
                <td><?php
                    $fetchname=mysqli_query($dbConnected,"select students.firstname,students.lastname,response.sid from students inner join response on students.id=response.sid where response.sid='".$req['sid']."'");
                    $catchname=mysqli_fetch_array($fetchname);
                    echo $catchname['firstname']." ".$catchname['lastname'];
                    ?></td>
                </tr>
                </table>
                <div class="check-container">
               
                    
                    <?php
                        
                            $subn1=mysqli_fetch_array(mysqli_query($dbConnected,"select subjectname from subjects where sid='".$req['sub1']."'"));
                            $subn2=mysqli_fetch_array(mysqli_query($dbConnected,"select subjectname from subjects where sid='".$req['sub2']."'"));
                            $subn3=mysqli_fetch_array(mysqli_query($dbConnected,"select subjectname from subjects where sid='".$req['sub3']."'"));
                            $subn4=mysqli_fetch_array(mysqli_query($dbConnected,"select subjectname from subjects where sid='".$req['sub4']."'"));
                            if(!empty($subn1)){
                        ?>
                        <div id="ck-button">
                               <label>
                         <input type="checkbox" name="sub1" value="" disabled="disabled"><span><?php echo $subn1['subjectname']; ?></span>
                               </label>
                            </div>
                               <?php } if(!empty($subn2)){ ?>
                        <div id="ck-button">
                               <label>
                                  <input type="checkbox" name="sub2" value="" disabled="disabled"><span><?php echo $subn2['subjectname']; ?></span>
                               </label>
                            </div>
                              <?php } if(!empty($subn3)){ ?>
                               <div id="ck-button">
                               <label>
                                  <input type="checkbox" name="sub3" value="" disabled="disabled"><span><?php echo $subn3['subjectname']; ?></span>
                               </label>
                            </div>
                               <?php } if(!empty($subn4)){ ?>
                        <div id="ck-button">
                               <label>
                                  <input type="checkbox" name="sub4" value="" disabled="disabled"><span><?php echo $subn4['subjectname']; ?></span>
                               </label>
                            </div>
                        <?php } ?>
                </div>
            </div>
            <div class="col res-box-1-of-4">
                <table class="table">
                   
              
                <tr><td><?php
            $area=mysqli_query($dbConnected,"select students.area,area.areaname from students inner join area on students.area=area.id where students.id='".$req['sid']."'");
            $farea=mysqli_fetch_array($area);
            echo $farea['areaname']; ?></td></tr>
                     <tr><td><?php
            $gradename=mysqli_fetch_array(mysqli_query($dbConnected,"select gradename from grade where gid='".$req['grade']."'"));
                     echo $gradename['gradename']; ?></td></tr> 
                </table>
            </div>
            <div class="col res-box-2-of-4 lol">
                
              
                <div class="col span-2-of-2">
                <div class="bargin-title">bargain amount</div>
                <div class="bargain-amount">
                <?php
                echo $req['bargain'];
                ?></div>
                </div>
                <div class="col span-2-of-2">
                <div class="bargin-title">proposed amount</div>    
                <div class="bargain-amount">
                <?php
                echo $req['proposed'];
                ?></div>
                </div>
                <div class="col span-2-of-2">
                <input type="submit" name="agree" value="accept">
                </div>
                </div>
                     
                     
            
            </div>
        
</div>
            <?php 
                    
            }} ?>