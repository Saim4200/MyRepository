
<?php 
            mysqli_data_seek($join,0);
            while($req=mysqli_fetch_array($join)){
            include '../queries/checksession.php';
if($req['decline']==1){
?>
 <form action="cnotification.php" enctype="application/x-www-form-urlencoded" method="post">
            <div class="notification-box-alpha clearfix">
           <?php include 'fragment1.php';?>
            <div class="col res-box-1-of-4">
            <div class="bargain-amount"><?php echo $req['proposed']?></div>
                <?php
                echo   '<input type="hidden" name="nid" value='.$req['nid'].' style="display:none;">' ?>
                <div class="col span-2-of-2">
                </div>
            </div>
            <div class="col res-box-1-of-4">
                <div class="note">request was declined</div>
            </div>
            </div>
</form>  
            <?php }}