<?php
include '../database/tutordb.php';

function timedate($date, $format)
{
    return date($format, strtotime($date));
}
function minutes($sec){
    $seconds = $sec%60;
    $minutes = ($sec-$seconds)/60;
    if ($minutes>1) $min_suff = 'mins'; else $min_suff = 'min';
    if($minutes>0) $show_min = $minutes.' '.$min_suff;  else $show_min = '';
    if($seconds>0) $show_sec = $seconds.' sec';   else $show_sec = '';
    
    return trim($show_min.' '.$show_sec);
}
function in_mins($sec){
    $seconds = $sec%60;
    $minutes = ($sec-$seconds)/60;
    if ($minutes<10) $minutes = '0'.$minutes;
    return $minutes;
}
function in_secs($sec){
    $seconds = $sec%60;
    if ($seconds<10) $seconds = '0'.$seconds;
    return $seconds;
}
function calculate_rank($totaltests, $lagging_scores){
    $ndigits = floor(log10($totaltests));
    $percentile = round($lagging_scores/$totaltests*100, $ndigits);
    $percentile_rank = floor($totaltests - ($percentile * $totaltests / 100));
    return $percentile_rank;
}
function gen(){	
    $x = 5; // Amount of digits
    $min = pow(10,$x);
    $max = pow(10,$x+1)-1;
    $value = rand($min, $max);
    $firstnum =$value;
    return $firstnum;
}

if(isset($_SESSION['id'])){
    
    if(isset($_GET['retake'])){
        $ttest= mysqli_query($dbConnected, "select * from teachertests where id='".$_GET['retake']."'");
        $ttest = mysqli_fetch_array($ttest);
        $test=mysqli_fetch_array(mysqli_query($dbConnected, "select * from tests where testid='".$ttest['test']."'"));
        $deletetest = mysqli_query($dbConnected, "DELETE from teachertests where id='".$_GET['retake']."'");
        unlink("../files/".$ttest['id'].".txt");
        $status = 'new';
    } 
    else if(isset($_GET['new'])){
        $test=mysqli_fetch_array(mysqli_query($dbConnected, "select * from tests where testid='".$_GET['new']."'"));
        $status = 'new';
    }
    else if(isset($_GET['resume'])){
        $ttest=mysqli_query($dbConnected, "select * from teachertests where id='".$_GET['resume']."'");
        $ttest = mysqli_fetch_array($ttest);
        $test=mysqli_fetch_array(mysqli_query($dbConnected, "select * from tests where testid='".$ttest['test']."'"));
        $status = 'in-progress';
    } 
    else if(isset($_GET['view'])){
        $ttest=mysqli_query($dbConnected, "select * from teachertests where id='".$_GET['view']."'");
        $ttest = mysqli_fetch_array($ttest);
        $test=mysqli_fetch_array(mysqli_query($dbConnected, "select * from tests where testid='".$ttest['test']."'"));
        $subject=mysqli_fetch_array(mysqli_query($dbConnected,"select subjectname from subjects where sid='".$test['subject']."'"));
        $status = 'completed';
    } 

    if($status === 'in-progress'){
        $subject=mysqli_fetch_array(mysqli_query($dbConnected,"select subjectname from subjects where sid='".$test['subject']."'"));
        $totalq = $test['questions'];

        $path = "../files/text/".$ttest['id'].".txt";
        if(!file_exists($path)) {  
            die("Error initializing test! Try again. "); 
        } 
        else { 
            $file = fopen($path, "r");  
        $string = fread($file,filesize($path));
        fclose($file);
        }

        if(!empty($string)){
            $attemptedNos = explode("," , $string);
            $attempted = $ttest['attempted'];
            
            require "../files/php/".$test['filename'].".php";

            if($attempted == count($attemptedNos)){
                $number = rand(0, count($q)-1);
                while(in_array($number, $attemptedNos)){
                    $number = rand(0, count($q)-1);
                }  
                $file = fopen($path, "a") or die("Error initializing test! Try again. ");
                fwrite($file,",".$number);
                fclose($file);
                
                $ques = $q[$number];
                $ans = $a[$number];
                $qno = $attempted+1;
            } 
            else if($attempted < count($attemptedNos)){
                $number = $attemptedNos[$attempted-1];
                $ques = $q[$number];
                $ans = $a[$number];
                $qno = $attempted+1;
            }
            
        } else {
            echo "Test file is empty!";
            exit();
        }
    }

    elseif ($status == 'new') {  // new 
    
        $subject=mysqli_fetch_array(mysqli_query($dbConnected,"select subjectname from subjects where sid='".$test['subject']."'"));
    
        $newtestid = gen();
        $insertnew=mysqli_query($dbConnected,"INSERT INTO teachertests (id,tid,test,success,ntime) values ('".$newtestid."','".$_SESSION['id']."','".$test['testid']."','2',now())");
        
        if($insertnew){
            $totalq = $test['questions'];
            
            require "../files/php/".$test['filename'].".php";
        
            $number = rand(0, count($q)-1);
            
            $path = "../files/text/".$newtestid.".txt";
            $file = fopen($path, "w") or die("Error initializing test! Try again. ");
            fwrite($file,$number);
            fclose($file);
                        
            $ques = $q[$number];
            $ans = $a[$number];
            $qno = 1;
        } else {
            echo "Error initializing test! Try again.";
            exit();
        }
    }
        
    $split = explode("|", $ques);
    $question = $split[0];
    $choices = array_slice($split,1,count($split));
    $code = array('a'=>'s', 'b'=>'m', 'c'=>'f', 'd'=>'b');
    $ans_code = $code[$ans];

    $levels = array("Basic", "Intermediate", "Advanced");

?>    
<html>
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/grid.css">
    <link rel="stylesheet" type="text/css" href="../../css/navi.css">
    <link rel="stylesheet" type="text/css" href="../../css/resnavi.css">
    <link rel="stylesheet" type="text/css" href="../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../css/testlayout.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif|Roboto" rel="stylesheet">
    <script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML">
    </script>

</head>

<body>
    <!--<header>-->
    <!--</header>-->
    <div class="container">
    <table class="table" id="tbllq">
    <thead>
        <th colspan="3" id="title">
           <?php echo $subject['subjectname']; ?>
        </th>
    </thead>
    <tbody>
        <tr>
            <td style="text-align: center">
                <input type="hidden" value="<?php echo $test['testid']; ?>" id="testid" name="testid">
                <input type="hidden" value="<?php echo $_SESSION['id']; ?>" id="tid" name="tid">
            </td>
        </tr>
        
        <?php
        if ($status=="new" || $status=="in-progress"){  // new or continuing 
            if($status=="new"){ $btntext = 'Start Test'; } else { $btntext = 'Resume Test';}
            $duration = minutes($test['questions'] * $test['questiontime']);
           
            if($test['level']==1){
                $best_time =  minutes($test['questions'] * $test['questiontime'] * 0.5);
            }elseif($test['level']==2){
                $best_time =  minutes($test['questions'] * $test['questiontime'] * 0.75);
            }elseif($test['level']==3){
                $best_time =  minutes($test['questions'] * $test['questiontime'] * 0.75);
            }
            
            $level = $levels[$test['level']-1];
            $description = $subject['subjectname']." test of ".$level." Level (Level-".$test['level'].")";

        $best= mysqli_query($dbConnected, "select score, completetime from teachertests where success=1 ORDER BY score DESC, completetime ASC");
        if(mysqli_num_rows($best)>0){
            $besttest = mysqli_fetch_row($best);
        } else {
            $besttest = 0;
        }
        ?>
        <tr id="introduction">
            <td colspan="4">
                <table>
                    <tr>
                    <td colspan="4" style="font-family:'Comfortaa'; font-size: 95%; letter-spacing: 0.2px; height: 80px"><p><strong><?php echo $description; ?></strong></p></td>
                    </tr>
                    <tr>
                    <td colspan="4" style="font-family:'Roboto'; font-size: 90%; letter-spacing: 0.1px; vertical-align: top"><p>This test includes <?php echo $test['description']; ?></p></td>
                    </tr>
                    <tr>
                        <td><strong>Questions:</strong></td>
                        <td><?php echo $test['questions']; ?> in total<span> (equal weightage)</span></td>
                    </tr>
                    <tr>
                        <td><strong>Duration:</strong></td>
                        <td><?php echo $duration ?><span> (<?php echo minutes($test['questiontime']) ?> for each question)</span></td>
                    </tr>
                    <tr>
                        <td><strong>Best Score:</strong></td>
                        <td><?php if(is_array($besttest)){ echo $besttest[0].'<span> ('.minutes($besttest[1]).' is the lowest completion time)</span>'; } else echo "--"; ?>
                        </td>
                    </tr>
                     <tr style="height: 60px;">
                        <td colspan="3" style="height: 100px; text-align: left; vertical-align: middle">
                            <input type="hidden" value="<?php echo $qno; ?>" id="startfrom" name="startfrom">
                            <input type="button" value="<?php echo $btntext; ?>" id="start-test">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="QuestionHeader" id="header">
            <td style="">
                <b>Question&nbsp;</b> - <span id="qn"><?php echo $qno; ?></span> of <span><?php echo $totalq; ?></span>
            </td>
            <td style="text-align:right" colspan="2">
                <div class="time-container"><span>Time Remaining:&nbsp;</span><span id="time"><span id="minutes"><?php echo in_mins($test['questiontime']); ?></span>:<span id="seconds"><?php echo in_secs($test['questiontime']); ?></span></span></div>
                <input type="hidden" value="<?php echo $test['questiontime']; ?>" id="qtime" name="qtime">
            </td>
        </tr>
        <tr class="loading-row" style="display:none"></tr>
        
        <tr id="ques" style="display: none">
            <td colspan="3" class="QuestionBody"><span id="question"><?php echo $question; ?></span>
            </td>
        </tr>
        <tr class="options" id="opt" style="display: none">
            <td colspan="3">
                <div id="choices">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div class="option">
                                <input type="radio" id="choice1" name="radio-group" value="1">
                                <label for="choice1" id="lb-choice1"><?php echo $choices[0]; ?></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="option">
                                <input type="radio" id="choice2" name="radio-group" value="2">
                                <label for="choice2" id="lb-choice2"><?php echo $choices[1]; ?></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="option">
                                <input type="radio" id="choice3" name="radio-group" value="3">
                               <label for="choice3" id="lb-choice3"><?php echo $choices[2]; ?></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 <div class="option">                               
                                <input type="radio" id="choice4" name="radio-group" value="4">
                                <label for="choice4" id="lb-choice4"><?php echo $choices[3]; ?></label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                    <input type="hidden" value="<?php echo $ans_code; ?>" id="qans" name="qans">

                </div>
            </td>
        </tr>
        
        <tr id="btn-row" style="display: none">
            <td colspan="3" style="height: 100px; text-align: right; vertical-align: top">
                <input type="hidden" value="" id="correct-ans" name="">
                <input type="hidden" value="" id="ques-no-2" name="ques-no">
                <input type="button" value="Next" id="Next" class="inputButtonSmall" disabled="disabled">
            </td>
        </tr>

            <tr id="testresult" class="scorecard" style="display:none">
            <td colspan="4">
                <table>
                    <tr>
                    <td id="description-2" colspan="2" style="font-family: 'Roboto'; font-size: 100%; height: 60px; vertical-align: middle"></td>
                    </tr>
                     <tr>
                        <td><strong>Status:</strong></td>
                        <td id="success" style="color: inherit; font-weight: 600; letter-spacing: 1px; font-size: 105%"></td>
                    </tr>
                    <tr>
                        <td><strong>Score:</strong></td>
                        <td id="score" > -- </td>
                    </tr>
                    <tr>
                        <td><strong>Rank:</strong></td>
                        <td id="rank" > -- </td>
                    </tr>
                    <tr>
                        <td>
                        <strong>Completed In:</strong>
                        </td>
                        <td id="complete-time" > -- </td>
                    </tr>
                    <tr style="height: 60px">
                    <td>
                        <a href="../profile/profile.php?setprofile=1">Back to profile</a>
                    </td>
                    </tr>
                </table>
            </td>
        </tr>
<?php
        }
        elseif($status==='completed'){
            if($ttest['success'] == 1){
                $text = 'Cleared'; 
                 $color = 'green';
            } else {
                $text = 'Not Cleared';
                $color = '#ff4e50';
            }
                
            $duration = minutes($test['questions'] * $test['questiontime']);
            $level = $levels[$test['level']-1];
            $complete_time = minutes($ttest['completetime']);
            $description = "This is a ".$subject['subjectname']." test of ".$level." Level (Level-".$test['level']."). It was held on ".timedate($ttest['ntime'], 'l, jS F, Y').".";
                
            // Calculating rank
            $all_tests=mysqli_fetch_array(mysqli_query($dbConnected, "select count(id) from teachertests where test='".$test['testid']."'"));
            $less_score_tests=mysqli_fetch_array(mysqli_query($dbConnected, "select count(id) from teachertests where test='".$test['testid']."' and score <= '".$ttest['score']."'"));
        
            $totaltests  = $all_tests[0];
            $lagging_scores = $less_score_tests[0];
            $rank = calculate_rank($totaltests, $lagging_scores);
        ?>
        
        <tr id="scorecard" class="scorecard">
            <td colspan="4">
                <table>
                    <tr>
                    <td colspan="2" style="font-family: 'Roboto'; font-size: 100%; height: 60px"><h4><?php echo $description; ?></h4></td>
                    </tr>
                     <tr>
                        <td><strong>Status:</strong></td>
                        <td style="color: <?php echo $color; ?>; font-weight: 600; letter-spacing: 1px; font-size: 105%"><?php echo $text; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Score:</strong></td>
                        <td><?php echo $ttest['score']; ?> <span> (<?php echo $ttest['correct']; ?> correct answers)</span></td>
                    </tr>
                    <tr>
                        <td><strong>Rank:</strong></td>
                        <td><?php echo $rank; ?> <span> (Out of <?php echo $totaltests; ?> test takers)</span></td>
                    </tr>
                    <tr>
                        <td>
                        <strong>Completed In:</strong>
                        </td>
                        <td>
                        <?php echo $complete_time; ?><span>  (<?php echo $duration; ?> allowed)</span>
                        </td>
                    </tr>
                    <tr style="height: 60px">
                    <td>
                        <a href="../profile/profile.php?setprofile=1">Back to profile</a>
                    </td>
                    </tr>
                </table>
            </td>
        </tr>
<?php    
        } 
?>
    </tbody>
</table>
    <div class="loading-div"><?php include "../../css/icons/loading-blocks.html";  ?></div>
</div>
<!--dialog-->
<div id="overlay" class="ui-widget-overlay" style="z-index: 10; display: none; width: 100%; height: 100%;"></div>
<div id="popup" style="position: fixed; top: 140px; padding: 20px; left: 50%; margin-left: -220px; z-index: 1000; display: none">
    <div style="width: 440px; position: relative; z-index: 1" class="ui-dialog">
        <div class="ui-dialog-titlebar"> <span class="ui-dialog-title" id="dialog-title">Time Out</span></div>
        <div class="ui-dialog-content">
            <p id="dialog-message">Sorry! Time's up for this question.</p>
            <p class="dialog-btn" id="dialogbtn">Next Question</p>
            <input type="hidden" value="" id="ques-no" name="ques-no">
        </div>
    </div>
</div>

    <?php
    include '../templates/script.php';
    ?>
    <script type="text/javascript" src="loadquestion.js"></script>

</body>
</html>
<?php 
}
?>