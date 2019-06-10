<?php
error_reporting(0);
include '../database/tutordb.php';
$check=mysqli_query($dbConnected,"select id from ad");
$catch=mysqli_fetch_array($check);
if($_SESSION['id']==$catch['id']){
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/grid.css">
    <link rel="stylesheet" type="text/css" href="../../css/animate.css">
    </head>
    <body>
    <header class="clearfix">
        <div class="col span-2-of-2">
        <div class="hero-title clearfix">WELCOME ADMIN</div>
          
        </div>
            <div class="col span-2-of-2">
            <div class="row clearfix">
                <div class="col span-1-of-4"> <div class="box"><ion-icon name="stats"></ion-icon></div></div>
                <div class="col span-1-of-4"><a href="adminnotification.php"><div class="box">
                    <div class="circle"><div class="value"><?php
                        $value=mysqli_query($dbConnected,"select count(id) from data where accepted=0");
                        $vrow=mysqli_fetch_array($value);
                        echo $vrow[0];
                        ?></div></div>
                    <ion-icon name="notifications-outline"></ion-icon>
                    
                    </div></a>
                </div>
                
        <div class="col span-1-of-4"><div class="box"><a href="page-ad.php"><?php
            $show=mysqli_query($dbConnected,"select count(id) from data");
            $row=mysqli_fetch_array($show);
            echo "<div class='hover'>".$row[0]."<br><span style='font-size:30px;'>Users</span></div>";
            ?></a></div></div>
                <div class="col span-1-of-4"><div class="box"><a href="add.php"><ion-icon name="options"></ion-icon></a></div></div>
        </div>
        </div>
        </header>
        <?php
        include '../templates/script.php';
        ?>
    </body>
</html>
<?php
}
else{
    echo"you are not authorized";
}
?>