<?php
while($req=mysqli_fetch_array($join))
{
?>
<div class="notification-box-alpha">
            <div class="col span-1-of-4">
            <table class="table">
                <tr>
                <td>name</td>
                </tr>
                </table>
                <table class="table">
                <tr>
                    <?php
                       
                            $subn1=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$req['sub1']."' or sid='".$req['sub2']."'");
                            $subn2=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$req['sub3']."' or sid='".$req['sub4']."'");
                 while(($fsubn1=mysqli_fetch_array($subn1)) | ($fsubn2=mysqli_fetch_array($subn2))){
                        ?>
                        <tr>
                        <td><?php echo $fsubn1['subjectname']; ?></td>
                        <td><?php echo $fsubn2['subjectname']; ?></td>
                        </tr>
                        <?php } ?>
                </table>
            </div>
            <div class="col span-1-of-4">
                <table class="table">
                <tr><td><?php echo $req['date']; ?></td></tr>
                </table>
                <table class="table">
                <tr><td><?php echo $req['time']; ?></td></tr>
                <tr><td><?php echo 'first get a student';?></td></tr>
                </table>
            </div>
            <div class="col span-1-of-4">
            <div class="proposed-amount">0</div>
            </div>
            <div class="col span-1-of-4">
            <form>
                <input type="tel" name="bragain" placeholder="enter bargain amount">
               <div class="col span-2-of-2">
                   <div class="col span-1-of-2">
                <input type="submit" name="send" value="Send &rsaquo;">
                   </div> <div class="col span-1-of-2">
                    <input type="submit" name="decline" value="decline">
                    </div>
                </div>
                </form>
            </div>
            </div>
<div class="notification-box-bravo">
            <div class="col span-1-of-4">
            <table class="table">
                <tr>
                <td>name</td>
                </tr>
                </table>
                <table class="table">
                <tr>
                    <?php
                       
                            $subn1=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$req['sub1']."' or sid='".$req['sub2']."'");
                            $subn2=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$req['sub3']."' or sid='".$req['sub4']."'");
                 while(($fsubn1=mysqli_fetch_array($subn1)) | ($fsubn2=mysqli_fetch_array($subn2))){
                        ?>
                        <tr>
                        <td><?php echo $fsubn1['subjectname']; ?></td>
                        <td><?php echo $fsubn2['subjectname']; ?></td>
                        </tr>
                        <?php } ?>
                </table>
            </div>
            <div class="col span-1-of-4">
                <table class="table">
                <tr><td><?php echo $req['date']; ?></td></tr>
                </table>
                <table class="table">
                <tr><td><?php echo $req['time']; ?></td></tr>
                <tr><td><?php echo 'first get a student';?></td></tr>
                </table>
            </div>
            <div class="col span-1-of-4">
            <div class="proposed-amount">8000</div>
            </div>
            <div class="col span-1-of-4">
                <div class="bargain-amount">8500</div>
                <form>
                <div class="col span-2-of-2">
                    <div class="col span-1-of-2">
                    <input type="submit" name="accept" value="Accept">
                    </div>
                    <div class="col span-1-of-2">
                    <input type="submit" name="reject" value="reject">
                    </div>
                    </div>
                
                </form>
            </div>
            </div>
            <div class="notification-box-delta">
            <div class="col span-1-of-4">
            <table class="table">
                <tr>
                <td>name</td>
                </tr>
                </table>
                <table class="table">
                <tr>
                    <?php
                       
                            $subn1=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$req['sub1']."' or sid='".$req['sub2']."'");
                            $subn2=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$req['sub3']."' or sid='".$req['sub4']."'");
                 while(($fsubn1=mysqli_fetch_array($subn1)) | ($fsubn2=mysqli_fetch_array($subn2))){
                        ?>
                        <tr>
                        <td><?php echo $fsubn1['subjectname']; ?></td>
                        <td><?php echo $fsubn2['subjectname']; ?></td>
                        </tr>
                        <?php } ?>
                </table>
            </div>
            <div class="col span-1-of-4">
                <table class="table">
                <tr><td><?php echo $req['date']; ?></td></tr>
                </table>
                <table class="table">
                <tr><td><?php echo $req['time']; ?></td></tr>
                <tr><td><?php echo 'first get a student';?></td></tr>
                </table>
            </div>
            <div class="col span-1-of-4">
            <div class="proposed-amount">8000</div>
            </div>
            <div class="col span-1-of-4">
            <form>
                <input type="tel" name="bragain" placeholder="enter bargain amount">
               <div class="col span-2-of-2">
                   <div class="col span-1-of-2">
                <input type="submit" name="send" value="Send &rsaquo;">
                   </div> <div class="col span-1-of-2">
                    <input type="submit" name="decline" value="decline">
                    </div>
                </div>
                </form>
            </div>
            </div>
<div class="notification-box-charlie clearfix">
            <div class="col span-1-of-3">
                <table class="table">
                <tr>
                <td>name</td>
                </tr>
                </table>
                <table class="table">
                <tr>
                    <?php
                       
                            $subn1=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$req['sub1']."' or sid='".$req['sub2']."'");
                            $subn2=mysqli_query($dbConnected,"select subjectname from subjects where sid='".$req['sub3']."' or sid='".$req['sub4']."'");
                 while(($fsubn1=mysqli_fetch_array($subn1)) | ($fsubn2=mysqli_fetch_array($subn2))){
                        ?>
                        <tr>
                        <td><?php echo $fsubn1['subjectname']; ?></td>
                        <td><?php echo $fsubn2['subjectname']; ?></td>
                        </tr>
                        <?php } ?>
                </table>
            </div>
            <div class="col span-1-of-4">
                <table class="table">
                <tr><td><?php echo $req['date']; ?></td></tr>
                </table>
                <table class="table">
                <tr><td><?php echo $req['time']; ?></td></tr>
                <tr><td><?php echo 'first get a student';?></td></tr>
                </table>
            </div>
            <div class="col span-1-of-3"> <div class="agreed-amount">8000</div></div>
            
            </div>

<?php } ?>