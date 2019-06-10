
            <form action="search.php" method="post" enctype="application/x-www-form-urlencoded">
            <div class="filter" id="filter">
                
                <div class="container">
                    <div class="col span-2-of-2">
                    <div class="col span-1-of-2">
                    <div class="filter-title">Filters</div>
                    </div>
                    <div class="col span-1-of-2">
                        <div class="filter-title"></div>
                    </div>
                        <div class="col span-2-of-2">
                        <div class="divider-full"></div>
                        </div>
                    </div>
                
                <div class="col span-2-of-2">
                   <p class="dropdown-btn">Grade <i class="fa fa-caret-down"></i></p>
                    <div class="dropdown-container">
                      <?php
                        $fclass=mysqli_query($dbConnected,"select * from grade");
                        while($fgrade=mysqli_fetch_array($fclass))
                        {
                            if($fgrade['gid']==$level){
                        ?>
                            <div id="filter-ck-button"><label><input class="single-checkbox" id="grade" type="radio" name="grade" value="<?php echo $fgrade['gid']; ?>" checked><span><?php echo $fgrade['gradename']; ?></span></label></div>
<?php 
                            } else { 
?>
                            <div id="filter-ck-button"><label><input class="single-checkbox" id="grade" type="radio" name="grade" value="<?php echo $fgrade['gid']; ?>"><span><?php echo $fgrade['gradename']; ?></span></label></div>
<?php 
                            } 
                        } 
?>
                    </div>
                </div>
                   <div class="col span-2-of-2">
                    <p class="dropdown-btn">Subjects <i class="fa fa-caret-down"></i></p>
                      <div class="dropdown-container">
                            <?php
                            $subjects=mysqli_query($dbConnected,"select * from subjects");
                            while($fsub=mysqli_fetch_array($subjects))
                            {
                                if($fsub['sid']==$sub1 || $fsub['sid']==$sub2 ||$fsub['sid']==$sub3 || $fsub['sid']==$sub4){
                            ?>
                                   <div id="filter-ck-button"><label><input class="single-checkbox" id="sub" type="checkbox" name="sub[]" value="<?php echo $fsub['sid']; ?>" checked><span><?php echo $fsub['subjectname']; ?></span></label></div>
<?php 
                            } else { 
?>
                                   <div id="filter-ck-button"><label><input class="single-checkbox" id="sub" type="checkbox" name="sub[]" value="<?php echo $fsub['sid']; ?>" ><span><?php echo $fsub['subjectname']; ?></span></label></div>
<?php 
                            } 
                        } 
?>
                      </div>
                </div>
                    <div class="col span-2-of-2">
                    <p class="dropdown-btn">Area <i class="fa fa-caret-down"></i></p>
                      <div class="dropdown-container">
<?php
                        $areaname=mysqli_query($dbConnected,"select * from area");
                        while($farea=mysqli_fetch_array($areaname))
                        {
                            if($farea['id']==$area){
                        ?>
                          <div id="filter-ck-button"><label><input class="single-checkbox" id="area" type="radio" name="area" value="<?php echo $farea['id']; ?>" checked><span><?php echo $farea['areaname']; ?></span></label></div>
<?php 
                            } else { 
?>
                          <div id="filter-ck-button"><label><input class="single-checkbox" id="area" type="radio" name="area" value="<?php echo $farea['id']; ?>"><span><?php echo $farea['areaname']; ?></span></label></div>
<?php 
                            } 
                        } 
?>
                          
                      </div>
                    </div>

                    <div class="col span-2-of-2">
                    <p class="dropdown-btn">Tutoring Place <i class="fa fa-caret-down"></i></p>
                      <div class="dropdown-container">
                      <?php
                        $loc=mysqli_query($dbConnected,"select * from tutoringplace");
                        while($floc=mysqli_fetch_array($loc))
                        {
                            if($floc['id']==$location){
                        ?>
                           <div id="filter-ck-button"><label><input class="single-checkbox" id="tplace" type="radio" name="tplace" value="<?php echo $floc['id']; ?>" checked><span><?php echo $floc['place']; ?></span></label></div>
<?php 
                            } else { 
?>                           
                            <div id="filter-ck-button"><label><input class="single-checkbox" id="tplace" type="radio" name="tplace" value="<?php echo $floc['id']; ?>"><span><?php echo $floc['place']; ?></span></label></div>
<?php 
                            } 
                        } 
?>
                      </div>
                    </div>
              
                    <div class="col span-2-of-2">
                    <p class="dropdown-btn">Gender <i class="fa fa-caret-down"></i></p>
                      <div class="dropdown-container">
<?php                            
                        if($gender==1){
                        ?>
                         <div id="filter-ck-button"><label><input id="gender" type="radio" name="gender" value="1" checked><span>Male Only</span></label></div>
<?php 
                        } else { 
?>                           
                         <div id="filter-ck-button"><label><input id="gender" type="radio" name="gender" value="1"><span>Male Only</span></label></div>
<?php 
                        } 
                        
                        if($gender==2){
?>
                          <div id="filter-ck-button"><label><input id="gender" type="radio" name="gender" value="2" checked><span>Female Only</span></label></div>
 <?php 
                        } else { 
?>                           
                          <div id="filter-ck-button"><label><input id="gender" type="radio" name="gender" value="2"><span>Female Only</span></label></div>
<?php 
                        } 
?>                        
                      </div>
                    </div>
                    <div class="inner-box" style="padding-top: 10%"> 
                    <div class="col span-2-of-2">
                    <input type="submit" name="filterapply" value="APPLY">
                    </div>
                    </div>
                
             
            </div>
            </div>
        </form>

        <form action="search.php" method="post" enctype="application/x-www-form-urlencoded">
            <ion-icon id="openfilter" name="options" onclick="openFilter()"></ion-icon>
            <ion-icon id="closefilter" name="close" onclick="closeFilter()"></ion-icon>
                
            <div class="res-filter clearfix" id="resfilter">
                <div class="res-container" id="res-container">
                    <div class="col span-2-of-2">
                    <div class="filter-title">Filters</div>
                    </div>
                 
                        <div class="col span-2-of-2">
                        <div class="divider-full"></div>
                        </div>
                    </div>
                
                <div class="col span-2-of-2">
                   <p class="dropdown-btn">Grade <i class="fa fa-caret-down"></i></p>
                    <div class="dropdown-container">
<?php
                        $fclass=mysqli_query($dbConnected,"select * from grade");
                        while($fgrade=mysqli_fetch_array($fclass))
                        {
                            if($fgrade['gid']==$level){
                        ?>
                            <div id="filter-ck-button"><label><input class="single-checkbox" id="grade" type="radio" name="grade" value="<?php echo $fgrade['gid']; ?>" checked><span><?php echo $fgrade['gradename']; ?></span></label></div>
<?php 
                            } else { 
?>
                            <div id="filter-ck-button"><label><input class="single-checkbox" id="grade" type="radio" name="grade" value="<?php echo $fgrade['gid']; ?>"><span><?php echo $fgrade['gradename']; ?></span></label></div>
<?php 
                            } 
                        } 
?>
                    </div>
                </div>
                   <div class="col span-2-of-2">
                    <p class="dropdown-btn">Subjects <i class="fa fa-caret-down"></i></p>
                      <div class="dropdown-container">
<?php
                            $subjects=mysqli_query($dbConnected,"select * from subjects");
                            while($fsub=mysqli_fetch_array($subjects))
                            {
                                if($fsub['sid']==$sub1 || $fsub['sid']==$sub2 ||$fsub['sid']==$sub3 || $fsub['sid']==$sub4){
                            ?>
                                   <div id="filter-ck-button"><label><input class="single-checkbox" id="sub" type="checkbox" name="sub[]" value="<?php echo $fsub['sid']; ?>" checked><span><?php echo $fsub['subjectname']; ?></span></label></div>
<?php 
                            } else { 
?>
                                   <div id="filter-ck-button"><label><input class="single-checkbox" id="sub" type="checkbox" name="sub[]" value="<?php echo $fsub['sid']; ?>" ><span><?php echo $fsub['subjectname']; ?></span></label></div>
<?php 
                            } 
                        } 
?>
                      </div>
                    </div>
                    <div class="col span-2-of-2">
                    <p class="dropdown-btn">Area <i class="fa fa-caret-down"></i></p>
                      <div class="dropdown-container">
<?php
                        $areaname=mysqli_query($dbConnected,"select * from area");
                        while($farea=mysqli_fetch_array($areaname))
                        {
                            if($farea['id']==$area){
                        ?>
                          <div id="filter-ck-button"><label><input class="single-checkbox" id="area" type="radio" name="area" value="<?php echo $farea['id']; ?>" checked><span><?php echo $farea['areaname']; ?></span></label></div>
<?php 
                            } else { 
?>
                          <div id="filter-ck-button"><label><input class="single-checkbox" id="area" type="radio" name="area" value="<?php echo $farea['id']; ?>"><span><?php echo $farea['areaname']; ?></span></label></div>
<?php 
                            } 
                        } 
?>
                      </div>
                    </div>

                    <div class="col span-2-of-2">
                    <p class="dropdown-btn">Tutoring Place <i class="fa fa-caret-down"></i></p>
                      <div class="dropdown-container">
                      <?php
                        $loc=mysqli_query($dbConnected,"select * from tutoringplace");
                        while($floc=mysqli_fetch_array($loc))
                        {
                            if($floc['id']==$location){
                        ?>
                           <div id="filter-ck-button"><label><input class="single-checkbox" id="tplace" type="radio" name="tplace" value="<?php echo $floc['id']; ?>" checked><span><?php echo $floc['place']; ?></span></label></div>
<?php 
                            } else { 
?>                           
                            <div id="filter-ck-button"><label><input class="single-checkbox" id="tplace" type="radio" name="tplace" value="<?php echo $floc['id']; ?>"><span><?php echo $floc['place']; ?></span></label></div>
<?php 
                            } 
                        } 
?>                      </div>
                    </div>
              
                    <div class="col span-2-of-2">
                    <p class="dropdown-btn">Gender <i class="fa fa-caret-down"></i></p>
                      <div class="dropdown-container">
<?php                            
                        if($gender==1){
                        ?>
                         <div id="filter-ck-button"><label><input id="gender" type="radio" name="gender" value="1" checked><span>Male Only</span></label></div>
<?php 
                        } else { 
?>                           
                         <div id="filter-ck-button"><label><input id="gender" type="radio" name="gender" value="1"><span>Male Only</span></label></div>
<?php 
                        } 
                        
                        if($gender==2){
?>
                          <div id="filter-ck-button"><label><input id="gender" type="radio" name="gender" value="2" checked><span>Female Only</span></label></div>
 <?php 
                        } else { 
?>                           
                          <div id="filter-ck-button"><label><input id="gender" type="radio" name="gender" value="2"><span>Female Only</span></label></div>
<?php 
                        } 
?>                        
                      </div>
                    </div>
                    <div class="inner-box" style="padding-top: 10%"> 
                    <div class="col span-2-of-2">
                    <input type="submit" name="resfilterapply" value="APPLY">
                    </div>
                    </div>
                     <div class="inner-box" style="padding-top: 10%"> 
                         <div class="reset-title"><a href="search.php" style="color:#666666">Clear all filters</a></div>
                    </div>
               
                </div>
        </form>
           
     