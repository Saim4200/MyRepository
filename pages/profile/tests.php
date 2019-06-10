<?php 

function minutes($sec){
    $seconds = $sec%60;
    $minutes = ($sec-$seconds)/60;
    if ($minutes>1) $min_suff = 'mins'; else $min_suff = 'min';
    if($minutes>0) $show_min = $minutes.' '.$min_suff;  else $show_min = '';
    if($seconds>0) $show_sec = $seconds.' sec';   else $show_sec = '';
    
    return trim($show_min.' '.$show_sec);
}
function nextlevel($sub, $tests){
    foreach($tests as $test){
        $s = floor($test['test'] / 1000);
        if($sub==$s) {
            if($test['success']==1){
                $i = floor($test['test'] / 100);
                $level = ($i % 10);
                $next = $level + 1;
                if($next>3) $next=0;
            } elseif($test['success']==0){
                $next=0;
                break;
            }
        }
    }
    return $next;
   
}
function is_present($sub, $tests){
    foreach($tests as $test => $id){
        $s = floor($id / 1000);
        if($sub==$s) return true;
    }
    return false;
}

$allsubs = array();
$levels = array("Basic", "Intermediate", "Advanced");
$subjects=mysqli_query($dbConnected,"select * from subjects");
while($sub=mysqli_fetch_assoc($subjects)){
    array_push($allsubs, $sub['subjectname']);
}

if($count>0){
    
?>
<div class="box">
<table>
    <thead>
        <tr>
            <th colspan="2">Subject Name</th>
            <th>Score<p>(out of 5)</p></th>
            <th>Completion Time</th>
            <th  colspan="2">Remarks</th>
        </tr>
    </thead>
    <tbody>
<?php

while($test=mysqli_fetch_array($ttests)){
    $testdetails=mysqli_fetch_array(mysqli_query($dbConnected, "select * from tests where testid='".$test['test']."'"));

    $testscore = $test['score'];
    $completetime = minutes($test['completetime']);
    $totaltime = minutes($testdetails['questions'] * $testdetails['questiontime']);
    
    if($test['success']==1){
        if($testscore >=1.6 && $testscore < 3.5){
            $remarks = 'Needs Improvement';
            $color = '#02896a';
            $action = 'Retake Test';
            $link = "../skills/test.php?retake=".$test['id'];
        } else if($testscore >= 3.5 && $testscore < 4.5) {
            $remarks = 'Cleared';
            $color = 'green';
            $action = 'View Details';
            $testid = $test['id'];
            $link = "../skills/test.php?view=".$test['id'];
        } else if($testscore >= 4.5) {
            $remarks = 'Best Score';
            $color = 'green';
            $action = 'View Details';
            $link = "../skills/test.php?view=".$test['id'];
        }
    } 
    else if($test['success']==0){
            $remarks = 'Not Cleared';
            $color = '#ff4e50';
            $action = 'Retake Test';
            $link = "../skills/test.php?retake=".$test['id'];
    }
    else if($test['success']==2){
            $testscore = "--";
            $completetime = "--";
            $remarks = 'In Progress';
            $color = 'inherit';
            $action = 'Resume Test';
            $link = "../skills/test.php?resume=".$test['id'];
    }
    $level = $levels[$testdetails['level']-1];

?>
        <tr>
            <td><a href="<?php echo $link; ?>"><?php echo $allsubs[$testdetails['subject']-1]; ?></a></td>
            <td><span> (<?php echo $level; ?>)</span></td>
            <td><?php echo $testscore; ?></td>
            <td><?php echo $completetime; ?></td>
            <td><span style="color: <?php echo $color; ?>"><?php echo $remarks; ?></span></td>
            <td><a href="<?php echo $link; ?>" id="retake">[<?php echo $action; ?>]</a> </td>
            </tr>
<?php 
}
?>
    </tbody>
</table>
</div>

<?php 
}
?>


<?php
$tsubjects = mysqli_fetch_assoc(mysqli_query($dbConnected,"select sub1,sub2,sub3,sub4 from teachersubjects where id='".$_SESSION['id']."'"));
$ttests = mysqli_fetch_array(mysqli_query($dbConnected,"SELECT test from teachertests WHERE tid='".$_SESSION['id']."' and success=1 ORDER BY test"));
?>
    <div class="sub-title" style="font-weight: bolder; padding: 40px 0 5px 0">Recommended Tests</div>
    <div class="box" >
        <table class="table2">
        <tbody>
        
        <?php
        for ($i=1; $i<=4; $i++){
            $tsub = $tsubjects['sub'.$i];
            if($tsub>0){
                $level = 1;
                for($j=1; $j<=3; $j++){
                    foreach($ttests as $test => $id){
                        $s = floor($id / 100);
                        if($s == $tsub.$j){
                            $level = $j<3 ? $j+1 : 0;
                        }
                    }
                }
            if($level>0){
                $testdetails=mysqli_fetch_array(mysqli_query($dbConnected, "select * from tests where subject='".$tsub."' and level='".$level."'"));
        ?>
        <tr>
            <td><?php echo $allsubs[$tsub-1]; ?></td>
            <td><span> (<?php echo $levels[$level-1]; ?>)</span></td>
            <td><?php echo $testdetails['description']; ?></td>
            <td><a href="<?php echo '../skills/test.php?new='.$testdetails['testid']; ?>" id="startnew">[ Start Test ]</a> 
            </td>
            </tr>
        <?php
            }
            }
        }
        ?>

            </tbody>
        </table>
    </div>
