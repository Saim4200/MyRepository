<?php
include '../database/tutordb.php';
include 'functions.php';

if(isset($_SESSION['id'])){
    include '../queries/checksession.php';

    if(mysqli_num_rows($checktsession)>0){
        $filters = array();
        $filters['0'] = 'New Requests';
        $filters['1'] = 'Waiting Requests';
        $filters['2'] = 'Accepted Requests';
        $filters['3'] = 'Declined Requests';
        $notifcount = notif_tutor($dbConnected, $_SESSION['id'], "");
        $countnew=$countwait=$countaccept=$countdecline=0;
        while($n=mysqli_fetch_array($notifcount)){
            if($n['status']==1 && $n['seen']==0) $countnew++;
            if($n['status']==3 && $n['seen']==0) $countwait++;
            if($n['status']==5 && $n['seen']==0) $countaccept++;
            if($n['status']==7 && $n['seen']==0) $countdecline++;
        }
        $notif_header = "";
        if(isset($_GET['ns'])){ $ns=$_GET['ns']; }
        if($ns=='new')          {$countnew=0; $notif = notif_tutor($dbConnected, $_SESSION['id'], "response.status = '1' and notifications.seen='0'"); $count=mysqli_num_rows($notif); if($count>0) $notif_header= 'New Requests'; else $notif_header='No new requests'; }
        elseif($ns=='waiting')  {$countwait=0; $notif = notif_tutor($dbConnected, $_SESSION['id'], "response.status = '3' and notifications.seen='0'"); $count=mysqli_num_rows($notif); if($count>0) $notif_header= 'Waiting Requests'; else $notif_header='No wating requests';}
        elseif($ns=='accepted') {$countaccept=0; $notif = notif_tutor($dbConnected, $_SESSION['id'], "response.status = '5' and notifications.seen='0'"); $count=mysqli_num_rows($notif); if($count>0) $notif_header= 'Accepted Requests'; else $notif_header='No accepted requests';}
        elseif($ns=='decline')  {$countdecline=0; $notif = notif_tutor($dbConnected, $_SESSION['id'], "response.status = '7' and notifications.seen='0'"); $count=mysqli_num_rows($notif); if($count>0) $notif_header= 'Declined Requests'; else $notif_header='No declined requests';}
    }
    else if(mysqli_num_rows($checkssession)>0){
        $filters = array();
        $filters['0'] = 'New Responses';
        $filters['1'] = 'Waiting Respones';
        $filters['2'] = 'Accepted Respones';
        $filters['3'] = 'Declined Respones';
        $notifcount = notif_tutor($dbConnected, $_SESSION['id'], "");
        $countnew=$countwait=$countaccept=$countdecline=0;
        while($n=mysqli_fetch_array($notifcount)){
            if($n['status']==2 && $n['seen']==0 && isToday($n['ntime'])) $countnew++;
            if($n['status']==2 && $n['seen']==0 && !isToday($n['ntime'])) $countwait++;
            if(($n['status']==4 || $n['status']==8) && $n['seen']==0) $countaccept++;
            if($n['status']==6 && $n['seen']==0) $countdecline++;
        }
        $notif_header = "";
        if(isset($_GET['ns'])){ $ns=$_GET['ns']; }
        if($ns=='new')          {$countnew=0; $notif = notif_student($dbConnected, $_SESSION['id'], "response.status = '2' and notifications.seen='0'"); $count=mysqli_num_rows($notif); if($count>0) $notif_header= 'New Requests'; else $notif_header='No new requests'; }
        elseif($ns=='waiting')  {$countwait=0; $notif = notif_student($dbConnected, $_SESSION['id'], "response.status = '2' and notifications.seen='0'"); $count=mysqli_num_rows($notif); if($count>0) $notif_header= 'Waiting Requests'; else $notif_header='No wating requests';}
        elseif($ns=='accepted') {$countaccept=0; $notif = notif_student($dbConnected, $_SESSION['id'], "(response.status = '4' or response.status = '8') "); $count=mysqli_num_rows($notif); if($count>0) $notif_header= 'Accepted Requests'; else $notif_header='No accepted requests';}
        elseif($ns=='decline')  {$countdecline=0; $notif = notif_student($dbConnected, $_SESSION['id'], "response.status = '6' and notifications.seen='0'"); $count=mysqli_num_rows($notif); if($count>0) $notif_header= 'Declined Requests'; else $notif_header='No declined requests'; }
    }

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/grid.css">
    <link rel="stylesheet" type="text/css" href="../../css/navi.css">
    <link rel="stylesheet" type="text/css" href="../../css/resnavi.css">
    <link rel="stylesheet" type="text/css" href="../../css/headsup.css">
    <link rel="stylesheet" type="text/css" href="../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../css/notification.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">

    </head>
<body>
    <header>
        <?php include '../templates/navi2.php'; ?>
        <div id="no"></div>
    </header>
    <section>
    <div class="col span-2-of-2">
    <div class="col span-3-of-12">
        <div class="filter" id="filter">
        <div class="container">
            <div class="col span-2-of-2">
                <div class="filter-title">Notifications </div>
            </div>
            <div class="col span-2-of-2">
                <div class="divider-full"></div>
            </div>
            
             <a href="notification.php?ns=new">
            <div class="box">
                <div class="col span-4-of-5">
                <?php  echo $filters['0'];  ?>
                </div>
                <div class="col span-1-of-5">
                <div class="count" id="countnew"><?php if($countnew>0) echo $countnew; else echo ''; ?></div></div>
            </div>
            </a>
            <a href="notification.php?ns=waiting">
            <div class="box">
                 <div class="col span-4-of-5">
                <?php  echo $filters['1'];  ?>
                </div>
                 <div class="col span-1-of-5">
                <div class="count" id="countwaiting"><?php if($countwait>0) echo $countwait;  else echo ''; ?></div></div>
                </div></a>
             <a href="notification.php?ns=accepted">
            <div class="box">
                <div class="col span-4-of-5">
                <?php  echo $filters['2'];  ?>
               </div>
                  <div class="col span-1-of-5">
                <div class="count" id="countaccepted"><?php if($countaccept>0) echo $countaccept;  else echo ''; ?></div></div>
            </div></a>
          <a href="notification.php?ns=decline">   
              <div class="box">
                <div class="col span-4-of-5">
                <?php  echo $filters['3'];  ?>
               </div>
                 <div class="col span-1-of-5">
                <div class="count" id="countdecline"><?php if($countdecline>0) echo $countdecline;  else echo ''; ?></div></div>
            </div></a>
            
            
            </div>
        </div>
        <div class="res-filter ">
        <div class="container clearfix">
            
       
        <div class="col filter-box-1-of-4"><input type="submit" name="all" value=""></div>
        <div class="col filter-box-1-of-4"><input type="submit" name="new" value=""></div>
        <div class="col filter-box-1-of-4"><input type="submit" name="waiting" value=""></div>
        <div class="col filter-box-1-of-4"><input type="submit" name="accepted" value=""></div>
        <div class="col filter-box-1-of-4"><input type="submit" name="decline" value=""></div>

        </div>
        </div>
    </div>
    <div class="col span-9-of-12">
        <div class="container">
            <div class="col span-2-of-2">
<?php
            if($notif_header!==""){
?>
            <div class="title"><?php echo $notif_header; ?>
            <span style="float: right"><a href="notification.php<?php if(isset($_GET['ns'])){ $ns=$_GET['ns']; echo "?ns=".$ns; } ?>"><ion-icon style="color: gray; cursor:pointer; width:20px; height:20px" name="refresh"></ion-icon></a></span>
            </div>
<?php       }
?>

            </div>
            
 
             <div class="col span-2-of-2">
<?php
                while($ntf=mysqli_fetch_array($notif))
                { 
                     if(mysqli_num_rows($checkssession)>0){
                         $ftutor = tquery($dbConnected, $ntf['tid']);
                         $tname = $ftutor['firstname']." ".$ftutor['lastname'];
                         $gender = $ftutor['gender'];

                         $req = tuition_request($dbConnected, $ntf['reqid']);
                             $subjects = ssub($dbConnected,$req['sub1'],$req['sub2'],$req['sub3'],$req['sub4']);
                             $grade = gradename($dbConnected,$req['grade']);
                             if($req['grade']!==7 && $req['grade']!==8){
                                $grade= $grade." level";
                             }
                             if($req['tlocation']==1){ 
                                 $tplace = "His residence is at ".areaname($dbConnected,$ftutor['area']); 
                             }
                             elseif($req['tlocation']==2){ 
                                 $tplace = "He can reach your location"; 
                             }
                             elseif($req['tlocation']==3){ 
                                 $tplace = "He will teach online "; 
                             }
                             else { $tplace = ""; } 
                     }
                    elseif(mysqli_num_rows($checktsession)>0) {
                        $fstud = squery($dbConnected, $ntf['sid']);
                         $sname = $fstud['firstname']." ".$fstud['lastname'];
                         $gender = $fstud['gender'];
                         
                         $req = tuition_request($dbConnected, $ntf['reqid']);
                             $subjects = ssub($dbConnected,$req['sub1'],$req['sub2'],$req['sub3'],$req['sub4']);
                             $grade = gradename($dbConnected,$req['grade']);
                             if($req['grade']!==7 && $req['grade']!==8){
                                $grade= $grade." level";
                             }
                             if($req['tlocation']==1){ 
                                 $tplace = "Student can reach your location."; 
                                 $area = "in your area";
                             }
                             elseif($req['tlocation']==2){ 
                                 $tplace = "Student wants tutor at home."; 
                                 $area = "in ".areaname($dbConnected,$fstud['area']);
                             }
                             elseif($req['tlocation']==3){ 
                                 $tplace = "Student wants Online tuition."; 
                                 $area = "";
                             }
                             else { $tplace = ""; } 
                    }
                    $fee = feedetails($dbConnected, $ntf['nid']);
                    $notiftext = $ntf['text'];
                    $showbuttons = false;
                    $showinputfield = false;
                    $inquiry = '';
                    switch ($ntf['notification']) {
                        case 1:
                            $notiftext =  str_replace("%subjects%", "<strong>".$subjects."</strong>", $notiftext); 
                            $notiftext =  str_replace("%grade%", "<strong>".$grade."</strong>", $notiftext); 
                            $notiftext =  str_replace("%location%", $tplace, $notiftext); 
                            $notiftext =  str_replace("%area%", $area, $notiftext); 
                            if( $ntf['seen']==0 ){ $showbuttons = true; $inquiry = $ntf['inquiry']; }
                            $btntext1 = "ACCEPT";  $btntext2 = "REJECT"; 
                            $inputtext1 = "Enter demand fee";
                            break;
                        case 2:
                            $notiftext =  str_replace("%tid%", "<strong>".$tname."</strong>", $notiftext); 
                            $notiftext =  str_replace("%subjects%", "<strong>".$subjects."</strong>", $notiftext); 
                            $notiftext =  str_replace("%grade%", "<strong>".$grade."</strong>", $notiftext); 
                            $notiftext =  str_replace("%location%", $tplace, $notiftext); 
                            $notiftext =  str_replace("%demand%", "<strong>".$fee['demand']."</strong>", $notiftext); 
                            if( $ntf['seen']==0 ){ $showbuttons = true; $inquiry = $ntf['inquiry']; }
                            $btntext1 = "ACCEPT";  $btntext2 = "BARGAIN"; 
                            $inputtext1 = "Enter bargain fee";
                       break;
                        case 3:
                            $notiftext =  str_replace("%sid%", "<strong>".$sname."</strong>", $notiftext); 
                            $notiftext =  str_replace("%bargain%", "<strong>".$fee['bargain']."</strong>", $notiftext); 
                            if( $ntf['seen']==0 ){ $showbuttons = true; $inquiry = $ntf['inquiry']; }
                            $btntext1 = "ACCEPT";  $btntext2 = "REJECT"; 
                           break;
                        case 4:
                            $notiftext =  str_replace("%tid%", "<strong>".$tname."</strong>", $notiftext); 
                             $notiftext =  str_replace("%bargain%", "<strong>".$fee['bargain']."</strong>", $notiftext); 
                            $notiftext =  str_replace("%startdate%", "<strong>".$fee['startdate']."</strong>", $notiftext); 
                            if( $ntf['seen']==0 ) $showbuttons = false;
                            break;
                        case 5:
                            $notiftext =  str_replace("%sid%", "<strong>".$sname."</strong>", $notiftext); 
                            $notiftext =  str_replace("%accepted%", "<strong>".$fee['accepted']."</strong>", $notiftext); 
                            if( $ntf['seen']==0 ) $showinputfield = true;
                          break;
                        case 6:
                            $notiftext =  str_replace("%tid%", "<strong>".$tname."</strong>", $notiftext); 
                            $notiftext =  str_replace("%bargain%", "<strong>".$fee['bargain']."</strong>", $notiftext); 
                           if( $ntf['seen']==0 ){ $showbuttons = true; $inquiry = $ntf['inquiry']; }
                            $btntext1 = "YES";  $btntext2 = "NO"; 
                         break;
                        case 7:
                            $notiftext =  str_replace("%sid%", "<strong>".$sname."</strong>", $notiftext); 
                            if( $ntf['seen']==0 ){  $showbuttons = true; $inquiry = $ntf['inquiry']; }
                           $btntext1 = "YES";  $btntext2 = "NO"; 
                          break;
                        case 8:
                            $notiftext =  str_replace("%tid%", "<strong>".$tname."</strong>", $notiftext); 
                            $notiftext =  str_replace("%startdate%", "<strong>".$fee['startdate']."</strong>", $notiftext); 
                            $showbuttons = false;
                       break;
                    }
                    
                ?>
                        <div class="noti-box clearfix" id="notibox-<?php echo $ntf['notifid']; ?>" style="<?php if($showbuttons || $showinputfield) echo 'height: 90px'; ?>">
                            <div class="col span-1-of-12">
                            <?php 
                                if(mysqli_num_rows($checktsession)>0){
                                    if($gender==1){
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="42" height="42" viewBox="0 0 192 192" 
                                            style="margin: 10px 20px; border: 0.5px solid rgba(108, 108, 108, 0.25); border-radius: 25px; padding: 6px 3px; fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g><g id="surface1"><path d="M36,102.73438v-50.73438h-8v50.73438c-4.65625,1.65625 -8,6.04688 -8,11.26562c0,6.625 12,24 12,24c0,0 12,-17.375 12,-24c0,-5.21875 -3.34375,-9.60938 -8,-11.26562z" fill="#ffc107"></path><path d="M100,148c-20,0 -20,-16 -20,-16v-24h40v24c0,0 0,16 -20,16z" fill="#ff9800"></path><path d="M28,52l72,-44l72,44l-72,40zM120,132c0,0 -4,16 -20,16c-16,0 -20,-16 -20,-16c0,0 -44,7.9375 -44,52h128c0,-43.90625 -44,-52 -44,-52" fill="#455a64"></path><path d="M144,84c0,4.42188 -3.57812,8 -8,8c-4.42188,0 -8,-3.57812 -8,-8c0,-4.42188 3.57812,-8 8,-8c4.42188,0 8,3.57812 8,8M72,84c0,-4.42188 -3.57812,-8 -8,-8c-4.42188,0 -8,3.57812 -8,8c0,4.42188 3.57812,8 8,8c4.42188,0 8,-3.57812 8,-8" fill="#ffa726"></path><path d="M136,60c0,-24 -72,-19.89062 -72,0v28c0,19.89062 16.10938,36 36,36c19.89062,0 36,-16.10938 36,-36z" fill="#ffb74d"></path><path d="M112,84c0,-2.20312 1.79688,-4 4,-4c2.20312,0 4,1.79688 4,4c0,2.20312 -1.79688,4 -4,4c-2.20312,0 -4,-1.79688 -4,-4M80,84c0,2.20312 1.79688,4 4,4c2.20312,0 4,-1.79688 4,-4c0,-2.20312 -1.79688,-4 -4,-4c-2.20312,0 -4,1.79688 -4,4" fill="#784719"></path><path d="M60,68v9.14062l8,6.85938v-20h-7.84375c-0.09375,1.3125 -0.15625,2.64062 -0.15625,4z" fill="#424242"></path><path d="M132,64v20l8,-6.96875v-9.03125c0,-1.34375 -0.04688,-2.67188 -0.10938,-4z" fill="#424242"></path><path d="M140,72c0,0 -20,-4 -40,-4c-20,0 -40,4 -40,4c0,-16 4,-24 4,-24c0,0 9.5,-8 37,-8c27.5,0 35,8 35,8c0,0 4,8 4,24z" fill="#62808c"></path></g></g></g></svg>';
                                    } elseif($gender==2){
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="42" height="42" viewBox="0 0 192 192"
                                            style="margin: 10px 20px;  border: 0.5px solid rgba(108, 108, 108, 0.25); border-radius: 25px; padding: 6px 3px; fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g><g id="surface1"><path d="M36,94.73438v-50.73438h-8v50.73438c-4.65625,1.65625 -8,6.04688 -8,11.26562c0,6.625 12,24 12,24c0,0 12,-17.375 12,-24c0,-5.21875 -3.34375,-9.60938 -8,-11.26562z" fill="#ffc107"></path><path d="M68,68h64v72h-64z" fill="#bf360c"></path><path d="M100,156c-8.76562,0 -20,-24 -20,-24v-24h40v24c0,0 -11.23438,24 -20,24" fill="#ff9800"></path><path d="M136,92c0,19.89062 -16.10938,36 -36,36c-19.89062,0 -36,-16.10938 -36,-36v-28c0,-19.89062 72,-30.54688 72,0zM100,168c17.6875,0 20,-36 20,-36c0,0 -10.03125,16 -20,16c-9.96875,0 -20,-16 -20,-16c0,0 2.3125,36 20,36" fill="#ffb74d"></path><path d="M112,92c0,-2.20312 1.79688,-4 4,-4c2.20312,0 4,1.79688 4,4c0,2.20312 -1.79688,4 -4,4c-2.20312,0 -4,-1.79688 -4,-4M80,92c0,2.20312 1.79688,4 4,4c2.20312,0 4,-1.79688 4,-4c0,-2.20312 -1.79688,-4 -4,-4c-2.20312,0 -4,1.79688 -4,4" fill="#784719"></path><path d="M136,64l36,-20l-72,-44l-72,44l36,20c0,-19.89062 72,-30.54688 72,0z" fill="#455a64"></path><path d="M120,132c0,0 -2.3125,28 -20,28c-17.6875,0 -20,-28 -20,-28c0,0 -44,7.9375 -44,52h128c0,-43.90625 -44,-52 -44,-52z" fill="#455a64"></path><path d="M68,48c-13,0 -20,14.92188 -20,14.92188c-4.42188,13.48438 -8,30.9375 -8,54.21875l28,18.85938v-52l48,-28l16,20v60l28,-24c0,-8.6875 -0.78125,-31.29688 -8,-50.28125c0,0 -4,-13.71875 -20,-13.71875c-16,0 -51,0 -64,0z" fill="#ff5722"></path><path d="M136,64c0,0 -16,-4 -36,-4c-20,0 -36,4 -36,4c0,-16 4,-24 4,-24c0,0 5.5,-8 33,-8c27.5,0 31,8 31,8c0,0 4,8 4,24z" fill="#62808c"></path></g></g></g></svg>';
                                    }
                                }
                                elseif(mysqli_num_rows($checkssession)>0){
                                    if($gender==1){
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 192 192"
                                            style="margin: 10px 20px; border: 0.5px solid rgba(108, 108, 108, 0.25); border-radius: 25px; padding: 6px 3px; fill:#000000"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g><g id="surface1"><path d="M96,148l-20,-24v-24h40v24z" fill="#ff9800"></path><path d="M140,76c0,4.42188 -3.57812,8 -8,8c-4.42188,0 -8,-3.57812 -8,-8c0,-4.42188 3.57812,-8 8,-8c4.42188,0 8,3.57812 8,8" fill="#ffa726"></path><path d="M68,76c0,4.42188 -3.57812,8 -8,8c-4.42188,0 -8,-3.57812 -8,-8c0,-4.42188 3.57812,-8 8,-8c4.42188,0 8,3.57812 8,8" fill="#ffa726"></path><path d="M132,52c0,-30.54688 -72,-19.89062 -72,0v28c0,19.89062 16.10938,36 36,36c19.89062,0 36,-16.10938 36,-36z" fill="#ffb74d"></path><path d="M96,16c-24.29688,0 -40,19.70312 -40,44v9.14062l8,6.85938v-20l48,-16l16,16v20l8,-6.96875v-9.03125c0,-16.09375 -4.15625,-32.0625 -24,-36l-4,-8z" fill="#424242"></path><path d="M96,172l-20,-48l20,4l20,-4z" fill="#ffffff"></path><path d="M92,140l-2.67188,17.85938l6.67188,16l6.67188,-16l-2.67188,-17.85938l4,-4l-8,-8l-8,8z" fill="#d32f2f"></path><path d="M116,124l-20,48l-20,-48c0,0 -44,7.9375 -44,52h128c0,-43.90625 -44,-52 -44,-52" fill="#1976d2"></path><path d="M120,144l13.34375,-13.34375c-8.46875,-4.71875 -15.9375,-6.375 -17.15625,-6.60938l-0.1875,-0.04688l-20,48v4h12l24,-24z" fill="#093d89"></path><path d="M72,144l-13.34375,-13.34375c8.46875,-4.71875 15.9375,-6.375 17.15625,-6.60938l0.1875,-0.04688l20,48v4h-12l-24,-24z" fill="#093d89"></path><path d="M84,68h24v4h-24z" fill="#0d47a1"></path><path d="M64,68v2c0,7.73438 6.26562,14 14,14c7.73438,0 14,-6.26562 14,-14v-2z" fill="#ffffff"></path><path d="M100,68v2c0,7.73438 6.26562,14 14,14c7.73438,0 14,-6.26562 14,-14v-2z" fill="#ffffff"></path></g></g></g></svg>';
                                    } elseif($gender==2){
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 192 192"
                                            style="margin: 10px 20px; border: 0.5px solid rgba(108, 108, 108, 0.25); border-radius: 25px; padding: 6px 3px; fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g><g id="surface1"><path d="M64,64h64v72h-64z" fill="#bf360c"></path><path d="M96,152c-8.76562,0 -20,-24 -20,-24v-24h40v24c0,0 -11.23438,24 -20,24" fill="#ff9800"></path><path d="M132,60c0,-30.54688 -72,-19.89062 -72,0v28c0,19.89062 16.10938,36 36,36c19.89062,0 36,-16.10938 36,-36z" fill="#ffb74d"></path><path d="M96,20c-24.29688,0 -60,13.60938 -60,93.14062l28,18.85938v-52l48,-28l16,20v60l28,-24c0,-16.09375 -2.70312,-80 -44,-80l-4,-8z" fill="#ff5722"></path><path d="M108,88c0,2.20312 1.79688,4 4,4c2.20312,0 4,-1.79688 4,-4c0,-2.20312 -1.79688,-4 -4,-4c-2.20312,0 -4,1.79688 -4,4" fill="#784719"></path><path d="M76,88c0,2.20312 1.79688,4 4,4c2.20312,0 4,-1.79688 4,-4c0,-2.20312 -1.79688,-4 -4,-4c-2.20312,0 -4,1.79688 -4,4" fill="#784719"></path><path d="M64,64h64v72h-64z" fill="#bf360c"></path><path d="M96,152c-8.76562,0 -20,-24 -20,-24v-24h40v24c0,0 -11.23438,24 -20,24" fill="#ff9800"></path><path d="M132,60c0,-30.54688 -72,-19.89062 -72,0v28c0,19.89062 16.10938,36 36,36c19.89062,0 36,-16.10938 36,-36z" fill="#ffb74d"></path><path d="M96,20c-24.29688,0 -60,13.60938 -60,93.14062l28,18.85938v-52l48,-28l16,20v60l28,-24c0,-16.09375 -2.70312,-80 -44,-80l-4,-8z" fill="#ff5722"></path><path d="M108,88c0,2.20312 1.79688,4 4,4c2.20312,0 4,-1.79688 4,-4c0,-2.20312 -1.79688,-4 -4,-4c-2.20312,0 -4,1.79688 -4,4" fill="#784719"></path><path d="M76,88c0,2.20312 1.79688,4 4,4c2.20312,0 4,-1.79688 4,-4c0,-2.20312 -1.79688,-4 -4,-4c-2.20312,0 -4,1.79688 -4,4" fill="#784719"></path><path d="M64,64h64v72h-64z" fill="#bf360c"></path><path d="M96,156c-8.76562,0 -20,-24 -20,-24v-24h40v24c0,0 -11.23438,24 -20,24" fill="#ff9800"></path><path d="M132,60c0,-30.54688 -72,-19.89062 -72,0v28c0,19.89062 16.10938,36 36,36c19.89062,0 36,-16.10938 36,-36z" fill="#ffb74d"></path><path d="M96,20c-24.29688,0 -60,13.60938 -60,93.14062l28,22.85938v-56l48,-28l16,20v64l28,-28c0,-16.09375 -2.70312,-80 -44,-80l-4,-8z" fill="#ff5722"></path><path d="M108,88c0,-2.20312 1.79688,-4 4,-4c2.20312,0 4,1.79688 4,4c0,2.20312 -1.79688,4 -4,4c-2.20312,0 -4,-1.79688 -4,-4M76,88c0,2.20312 1.79688,4 4,4c2.20312,0 4,-1.79688 4,-4c0,-2.20312 -1.79688,-4 -4,-4c-2.20312,0 -4,1.79688 -4,4" fill="#784719"></path><path d="M116,132l-20,8l-20,-8c0,0 -44,7.9375 -44,52h128c0,-43.90625 -44,-52 -44,-52" fill="#cfd8dc"></path><path d="M92,152l-4,32h16l-4,-32l4,-4l-8,-8l-8,8z" fill="#3f51b5"></path><path d="M116,160h28v16h-28z" fill="#ffffff"></path><path d="M96,180l-20,-48l20,4l20,-4z" fill="#ffffff"></path><path d="M92,148l-2.67188,17.85938l6.67188,16l6.67188,-16l-2.67188,-17.85938l4,-4l-8,-8l-8,8z" fill="#d32f2f"></path><path d="M116,132l-20,48l-20,-48c0,0 -44,7.9375 -44,52h128c0,-43.90625 -44,-52 -44,-52" fill="#3f51b5"></path></g></g></g></svg>'; 
                                    }
                                }
                            ?>
                            </div>
                            <div class="col span-10-of-12">
                                    <div class="noti-text""><p id="notiftext-<?php echo $ntf['notifid']; ?>"><?php echo $notiftext.$inquiry; ?></p></div>
                                    <div class="actions">
<?php 
                                        if($showbuttons) { 
?>
                                        <div class="buttons" id="buttons-<?php echo $ntf['notifid']; ?>">
<?php 
                                        }
                                        else {
?>
                                        <div class="buttons" id="buttons-<?php echo $ntf['notifid']; ?>" style="display: none">
<?php 
                                        }
?>
                                            
                                            <input type="button" id="accept-<?php echo $ntf['notifid']; ?>" name="accept" value="<?php echo $btntext1; ?>"> | <input type="button" id="reject-<?php echo $ntf['notifid']; ?>" name="reject" value="<?php echo $btntext2; ?>">
                                        </div>

<?php 
                                        if($showinputfield) { 
?>
                                        <div class="inputfield" id = "inputfield-<?php echo $ntf['notifid']; ?>" style="display: block">
                                        
<?php 
                                        }
                                        else {
?>
                                        <div class="inputfield" id = "inputfield-<?php echo $ntf['notifid']; ?>" style="display: none">
<?php 
                                        }
?>

<?php 
                                        if($ntf['status']==3 || $ntf['status']==5) { 
?>
                                            <span>Set trial startdate: </span> <input type="date" id="input-<?php echo $ntf['notifid']; ?>" name="input">
<?php 
                                        }
                                        else {
?>
                                            <input type="text" id="input-<?php echo $ntf['notifid']; ?>" name="input" placeholder="<?php echo $inputtext1; ?>">
<?php 
                                        }
?>
                                            <input type="button" id="submit-<?php echo $ntf['notifid']; ?>" name="submit" value="SUBMIT">
                                        </div>
                                    </div>
                                    <input type="hidden" id="status-<?php echo $ntf['notifid']; ?>" name="status" value="<?php echo $ntf['status']; ?>">
                                   
                            </div>
                            <div class="col span-1-of-12">
                                <div class="noti-date"><?php timedate($ntf['ntime']); ?></div>
                            </div>
                        </div>
                
                <?php }
                ?>
            </div>
        </div>
    </div>
    </div>
    </section>
    
    
    <?php
    include '../templates/footer.php';
    include '../templates/script.php';
    ?>
    <!--<script>-->
    <!--   $(document).ready(function(){-->

    <!--    setInterval(function (){refresh_count();},30000);-->
        
    <!--    function refresh_count(){-->
    <!--        $.ajax({-->
    <!--        url: 'count.php',-->
    <!--        type: 'POST',-->
    <!--        success: function(show_notification){-->
    <!--            if(!show_notification.error){-->
    <!--                $('#countnew').html(show_notification)-->
    <!--            }}-->
    <!--    });}-->
    <!--   });-->
    <!--</script>-->
    
        <script type="text/javascript" src="useractions.js"></script>

    </body>

</html>
<?php }
else{
    header ('Location: ../login/login.php?setlogin=1');
}
?>