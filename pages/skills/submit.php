<?php
include '../database/tutordb.php';

function calculate_rank($totaltests, $lagging_scores){
    $ndigits = floor(log10($totaltests));
    $percentile = round($lagging_scores/$totaltests*100, $ndigits);
    $percentile_rank = floor($totaltests - ($percentile * $totaltests / 100));
    return $percentile_rank;
}

if($dbsuccess){

$response = array();

if(isset($_POST['tid']) && isset($_POST['testid'])){
    
    $test=mysqli_fetch_array(mysqli_query($dbConnected, "select * from teachertests where tid='".$_POST['tid']."' and test = '".$_POST['testid']."'"));
    $testdetails=mysqli_fetch_array(mysqli_query($dbConnected, "select * from tests where testid = '".$_POST['testid']."'"));
    
    if(isset($_POST['timeleft'])){
        $completetime = $test['completetime'];
        $time_taken = $testdetails['questiontime'] - $_POST['timeleft'];
        $completetime += $time_taken;
    }
    $correct_answers = $test['correct'];
    if( isset($_POST['result']) && $_POST['result']==1) $correct_answers++;
    
    $qno = isset($_POST['qno']) ? $_POST['qno'] : 0;
    $totques = $testdetails['questions'];
    $score=0.0;
  
    if($qno < $totques){
            
        $path = "../files/text/".$test['id'].".txt";
        if(!file_exists($path)) {  
            $response["result"] = "ERROR-1";
            echo json_encode($response);
            exit();
        } 
        else { 
            $file = fopen($path, "r");  
            $string = fread($file,filesize($path));
            fclose($file);
        }

        $attemptedNos = !empty($string) ? explode("," , $string) : array();
            
            require "../files/php/".$testdetails['filename'].".php";
        
        $number = rand(0, count($q)-1);
        while(in_array($number, $attemptedNos)){
            $number = rand(0, count($q)-1);
        }  
        
        $path = "../files/text/".$test['id'].".txt";
        
        try{
            $file = fopen($path, "a") or die("Error initializing test! Try again. ");
            fwrite($file,",".$number);
            fclose($file);
        }
        catch(Exception $e){
            $response["result"] = "ERROR-1";
            echo json_encode($response);
            exit();
        }
        $success = 2;
        $response["success"] = 2;
        $response["question"] = $q[$number];
        $code = array('a'=>'s', 'b'=>'m', 'c'=>'f', 'd'=>'b');
        $response["answer"] = $code[$a[$number]];

        $update=mysqli_query($dbConnected, "UPDATE teachertests SET completetime = '".$completetime."', attempted='".$qno."', correct='".$correct_answers."', ntime=now() where tid='".$_POST['tid']."' and test = '".$_POST['testid']."'");

    } else {
        $all_tests=mysqli_fetch_array(mysqli_query($dbConnected, "select count(id) from teachertests where test='".$test['testid']."'"));
        $less_score_tests=mysqli_fetch_array(mysqli_query($dbConnected, "select count(id) from teachertests where test='".$test['testid']."' and score <= '".$ttest['score']."'"));
        $totaltests  = $all_tests[0];
        $lagging_scores = $less_score_tests[0];
        if($totaltests>10) $rank = calculate_rank($totaltests, $lagging_scores);  else $rank = 0;

        $score = round($correct_answers/$totques*5.00, 2);
        if ($score>1.6){
            $success = 1;
            $response["success"] = 1;
        }
        else {
            $success = 0;
            $response["success"] = 0;
        }
        $response["score"] = $score;
        $response["correct"] = $correct_answers;
        $response["totaltime"] = $testdetails['questiontime'] * $testdetails['questions'];
        $response["completetime"] = $completetime;
        $response["rank"] = $rank;
        $response["totaltests"] = $totaltests;

        $update=mysqli_query($dbConnected, "UPDATE teachertests SET score = '".$score."', completetime = '".$completetime."', success='".$success."', attempted='".$qno."', correct='".$correct_answers."', ntime=now() where tid='".$_POST['tid']."' and test = '".$_POST['testid']."'");
    }
    
    
    if($update){
        $response["result"] = "SUCCESS";
        echo json_encode($response);
    } else {
        $response["result"] = "ERROR-1";
        echo json_encode($response);
    }
}
    
} else {
        $response["result"] = "ERROR-2";
        echo json_encode($response);
}

mysqli_close($dbConnected);
?>