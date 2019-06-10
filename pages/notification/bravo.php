<?php 
            mysqli_data_seek($join,0);
            while($req=mysqli_fetch_array($join)){
                if($req['decline']==0){
                if(mysqli_num_rows($checkssession)==1 && mysqli_num_rows($checktsession)==0){
                     updateNotiBravo($dbConnected,$req['nid']); 
?>
 <form action="cnotification.php" enctype="application/x-www-form-urlencoded" method="post">
 <div class="notification-box-alpha clearfix">
                <?php include 'datentime.php';?>
                <div class="col span-2-of-2">
                <?php include 'fragment1.php';
                                                                                             
                if($req['proposed']==0 && $req['bargain']>0 && $req['taccepted']==0 && $req['status']==2 && $req['saccepted']==0 && $req['decline']==0){?>
                    
                <div class="col res-box-1-of-4 lol">
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
                <div class="col res-box-1-of-4">
                <?php
                echo   '<input type="hidden" name="nid" value='.$req['nid'].'>' ?>
                <input type="tel" name="bargain" placeholder="enter bargain fee">
                <div class="col span-2-of-2">
                <div class="col res-box-1-of-2">
                <input type="submit" name="bargainsend" value="Send &rsaquo;">
                </div> 
                <div class="col res-box-1-of-2"> 
                <input type="submit" name="decline" value="decline">
                </div>
                </div>
                </div>
                <?php }
               
                elseif($req['proposed']>0 && $req['bargain']>0 && $req['taccepted']==0 && $req['saccepted']==0 && $req['decline']==0){    ?>
                <div class="col res-box-1-of-4 lol">
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
                    </div>
                <div class="col res-box-1-of-4">
                <div class="note">
                wait for the tutor to response
                </div>
                </div>
                <?php }
                elseif($req['proposed']>0 && $req['bargain']>0 && $req['taccepted']>=1 && $req['saccepted']==0 && $req['decline']==0){    ?> 
                <div class="col res-box-1-of-4 lol">
                <div class="col span-2-of-2">
                <div class="bargin-title">proposed amount</div>    
                <div class="bargain-amount">
                <?php
                echo $req['proposed'];
                ?></div>
                </div>
                <div class="col span-2-of-2">
                <input type="submit" name="proceed" value="proceed">
                </div>
                </div>
                <div class="col res-box-1-of-4">
                <?php
                echo '<input type="hidden" name="nid" value='.$req['nid'].'>' ?>
                <div class="note">
                tutor have accepted your request
                </div>
                </div>  
                    
                <?php }
                elseif(($req['proposed']>0 || $req['bargain']>0) && $req['saccepted']==1 && $req['decline']==0){    ?> 
                <div class="col res-box-1-of-4 lol">
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
                </div>
                <div class="col res-box-1-of-4">
                <?php
                echo '<input type="hidden" name="nid" value='.$req['nid'].'>' ?>
                <div class="note">
                wait for tutor to respond
                </div>
                </div>  
                    
                <?php }
                    
                    ?>
                </div>
</div>
</form>                 
                    
             <?php   }
                   
                   
                elseif(mysqli_num_rows($checktsession)==1){?>

 <form action="cnotification.php" enctype="application/x-www-form-urlencoded" method="post">
<div class="notification-box-alpha clearfix">    
                    <?php include 'datentime.php';?>
                    <div class="col span-2-of-2">
                    <?php include 'fragment1.php';
                    if($req['proposed']<=0 && $req['bargain']>0 && $req['taccepted']==0 && $req['saccepted']==0 && $req['decline']==0){?>   
                    <div class="col res-box-1-of-4 lol">
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
                    </div>
                    <div class="col res-box-1-of-4">
                    <div class="note">
                    wait for the student to response
                    </div>
                    </div>
                    <?php  }  
                    elseif($req['proposed']>0 && $req['bargain']>0){ 
                    if( $req['taccepted']==0 && $req['saccepted']==0 && $req['decline']==0){    ?>
                    <div class="col res-box-1-of-4 lol">
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
                    <?php
                    echo   '<input type="hidden" name="nid" value='.$req['nid'].'>' ?>
                    <div class="col span-2-of-2">
                    <input type="submit" name="agree" value="accept">
                    </div>
                    </div>
                        
                    <div class="col res-box-1-of-4">
                    <div class="col span-2-of-2">
                        <div class="note">
                    student is waiting for your response
                    </div>
                    <div class="col res-box-1-of-2">
                    <input type="submit" name="rebargain" value="re bargain">
                    </div> <div class="col res-box-1-of-2">
                    <input type="submit" name="t-decline" value="decline">
                    </div>
                    </div>
                    </div>
                    <?php }
                    elseif( $req['taccepted']==1 && $req['saccepted']==0 && $req['decline']==0){   ?>
                    <div class="col res-box-1-of-4 lol">
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
    
                    </div>
                    </div>
                    <div class="col res-box-1-of-4">
                    <?php
                    echo'<input type="hidden" name="nid" value='.$req['nid'].' style="display:none;">' ?>
                    <div class="note">
                    wait for student to response
                    </div>
                    </div>   
                    <?php }}
              /*     elseif($req['bargain']>0 && $req['taccepted']<=0 && $req['decline']<=0){ ?> 
                    <div class="col res-box-1-of-4">
                    <div class="bargain-amount"><?php echo $req['bargain']?></div>
                    <?php
                    echo '<input type="hidden" name="nid" value='.$req['nid'].'>' ?>
                    <div class="col span-2-of-2">
                    <input type="submit" name="agree" value="accept">
                    </div>
                    </div>
                    <div class="col res-box-1-of-4">
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
                    <div class="col span-2-of-2" >
                    <div class="col res-box-1-of-2">
                    <input type="submit" name="rebargain" value="re bargain">
                    </div> <div class="col res-box-1-of-2">
                    <input type="submit" name="decline" value="decline">
                    </div>
                    </div>
                    </div>   
                    <?php }*/
                    
                    if($req['saccepted']==1 && $req['decline']<=0 ){ ?>
                    <div class="col res-box-1-of-4 lol">
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
                    <?php
                    echo '<input type="hidden" name="nid" value='.$req['nid'].' style="display:none;">' ?>
                    <div class="col span-2-of-2">
                    <input type="submit" name="proceed" value="proceed">
                    </div>
                    </div>
                    <div class="col res-box-1-of-4">
                    <div class="note">student has accepted</div>   
                    </div><?php }
                     ?>
                    </div>
</div>
</form>             
       
                <?php }}}