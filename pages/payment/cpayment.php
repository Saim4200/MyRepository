<?php

include '../database/tutordb.php';

if (isset($_POST['payment'])){
        
    $channel= $_POST['channel'];
    $transacNo= mysqli_real_escape_string($dbConnected,$_POST['transactionNo']);
    $transacAmount= $_POST['transactionAmount'];
    $transacDate= $_POST['transactionDate'];

    $notifid = $_POST['notid'];
    $tid = $_SESSION['id'];

    $fetchnid=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT nid FROM notifications WHERE notifid=".$notifid));
    $nid = $fetchnid['nid'];
    $checknid=mysqli_query($dbConnected,"SELECT nid FROM payments WHERE nid=".$nid);
    if (mysqli_num_rows($checknid)>0)
        $insertpay=mysqli_query($dbConnected,"UPDATE payments SET channel='".$channel."',amount='".$transacAmount."',date='".$transacDate."',transnumber=".$transacNo." WHERE nid=".$nid);
    else
        $insertpay=mysqli_query($dbConnected,"INSERT INTO payments (tid, nid, channel, amount, date, transnumber,verified) 
                                        values ('".$tid."','".$nid."','".$channel."','".$transacAmount."','".$transacDate."','".$transacNo."','0')");
    if($insertpay){
        $insertnotif=mysqli_query($dbConnected,"INSERT INTO adnotifications (nid,userid,notification) 
        values ('".$nid."','".$tid."','%tid% paid an amount of Rs. ".$transacAmount." through channel no. ".$channel." on ".$transacDate.".')");
        echo "<script>
                alert('Your payment details have been submitted for verification. Click OK to continue.');
                window.location.href='payment.php';
                </script>";
    } else {
        echo "<script>
                alert('Unable to submit your payment details! Try again.');
                window.location.href='payment.php';
                </script>";

    }
}


?>