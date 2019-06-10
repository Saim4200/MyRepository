<div class="col span-2-of-2">
            <div class="auto-box">
                <form action="csearch.php" enctype="application/x-www-form-urlencoded" method="post">
                <div class="col span-1-of-3">
                    <?php
                    if(isset($_SESSION['id'])){
                echo '<input type="hidden" value="'.$_SESSION['id'].'" name="sid">';
                    } ?>
                <input type="submit" name="auto-match" value="AUTO MATCH">
                </div>
                <div class="col span-2-of-3">
                <div class="col cus-box">
                <div class="col span-1-of-3">
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
                <div class="col span-1-of-3">
                    <select name="autosub1">
                       
                    <option value="0">select subject</option>
                    <?php
                    $autosubject=mysqli_query($dbConnected,"select * from subjects");
                        while($asub1=mysqli_fetch_array($autosubject))
                        {
                            echo '<option value='.$asub1['sid'].'>'.$asub1['subjectname'].'</option>';
                        }
                    ?>
                    </select>
                    
                    </div>
                <div class="col span-1-of-3">
                    <select name="autosub2">
                       
                    <option value="0">select subject</option>
                    <?php
                    $autosubject=mysqli_query($dbConnected,"select * from subjects");
                        while($asub2=mysqli_fetch_array($autosubject))
                        {
                            echo '<option value='.$asub2['sid'].'>'.$asub2['subjectname'].'</option>';
                        }
                    ?>
                    </select></div>
                </div>
                <div class="col cus-box">
                <div class="col span-1-of-3">
                   
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
                <div class="col span-1-of-3">
                    <select name="autosub3">
                       
                    <option value="0">select subject</option>
                    <?php
                    $autosubject=mysqli_query($dbConnected,"select * from subjects");
                        while($asub3=mysqli_fetch_array($autosubject))
                        {
                            echo '<option value='.$asub3['sid'].'>'.$asub3['subjectname'].'</option>';
                        }
                    ?>
                    </select>
                    </div>
                <div class="col span-1-of-3"><select name="autosub4">
                       
                    <option value="0">select subject</option>
                    <?php
                    $autosubject=mysqli_query($dbConnected,"select * from subjects");
                        while($asub4=mysqli_fetch_array($autosubject))
                        {
                            echo '<option value='.$asub4['sid'].'>'.$asub4['subjectname'].'</option>';
                        }
                    ?>
                    </select></div>
                </div>
                
                </div>
                </form>
                
                </div><div class="res-auto-box">
                <form action="csearch.php" enctype="application/x-www-form-urlencoded" method="post">
                <div class="col span-2-of-2">
                    <?php
                    
                        echo '<input type="hidden" value="'.$_SESSION['id'].'" name="sid">';
                    ?>
                <input type="submit" name="auto-match" value="AUTO MATCH">
                </div>
                <div class="col span-2-of-2">
                <div class="col cus-box">
                <div class="col cus-box-1-of-2">
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
                <div class="col cus-box-1-of-2">
               <select name="tplace" required>
                    <option value="0">Select Tutoring place</option>
                    <?php
                    $loc=mysqli_query($dbConnected,"select * from locatoin");
                        while($floc=mysqli_fetch_array($loc))
                        {
                            echo '<option value='.$floc['lid'].'>'.$floc['locationname'].'</option>';
                        }
                    ?>
                    </select> 
                    </div>
                    </div>
                    <div class="cus-box">
                        <div class="col cus-box-1-of-2">
                    <select name="autosub1">
                       
                    <option value="0">select subject</option>
                    <?php
                    $autosubject=mysqli_query($dbConnected,"select * from subjects");
                        while($asub1=mysqli_fetch_array($autosubject))
                        {
                            echo '<option value='.$asub1['sid'].'>'.$asub1['subjectname'].'</option>';
                        }
                    ?>
                    </select>
                    
                    </div>
                <div class="col cus-box-1-of-2">
                    <select name="autosub2">
                       
                    <option value="0">select subject</option>
                    <?php
                    $autosubject=mysqli_query($dbConnected,"select * from subjects");
                        while($asub2=mysqli_fetch_array($autosubject))
                        {
                            echo '<option value='.$asub2['sid'].'>'.$asub2['subjectname'].'</option>';
                        }
                    ?>
                    </select></div>
                </div>
                <div class="col cus-box">
                <div class="col cus-box-1-of-2">
                    <select name="autosub3">
                       
                    <option value="0">select subject</option>
                    <?php
                    $autosubject=mysqli_query($dbConnected,"select * from subjects");
                        while($asub3=mysqli_fetch_array($autosubject))
                        {
                            echo '<option value='.$asub3['sid'].'>'.$asub3['subjectname'].'</option>';
                        }
                    ?>
                    </select>
                    </div>
                <div class="col cus-box-1-of-2">
                    <select name="autosub4">
                       
                    <option value="0">select subject</option>
                    <?php
                    $autosubject=mysqli_query($dbConnected,"select * from subjects");
                        while($asub4=mysqli_fetch_array($autosubject))
                        {
                            echo '<option value='.$asub4['sid'].'>'.$asub4['subjectname'].'</option>';
                        }
                    ?>
                    </select>
                    </div>
                </div>
                
                </div>
                    </form>
                </div>
            </div>