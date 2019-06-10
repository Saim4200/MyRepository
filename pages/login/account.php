<?php
error_reporting(0);
if(isset($_GET['setaccount'])==1)
{
    if(isset($_SESSION['id'])){
        header ('Location :../../index.php');
    }
    else{
      $error=$_GET['error'];
   if($error==1)
   {
       
        echo '<script type="text/javascript">  window.onload = function(){
                      alert("ENTER ID AND PASSWORD");
                    }</script>';
   }
      elseif($error==2){
        echo '<script type="text/javascript">  window.onload = function(){
                      alert("INVALID ID! ENTER CORRECT ID.");
                    }</script>';
      }
      elseif($error==3){
        echo '<script type="text/javascript">  window.onload = function(){
                      alert("ENTER CORRECT PASSWORD.");
                    }</script>';
                       
      }
?>

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/login.css">
    <link rel="stylesheet" type="text/css" href="../../css/resnavi.css">
     <link rel="stylesheet" type="text/css" href="../../css/navi.css">
      <link rel="stylesheet" type="text/css" href="../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/grid.css">
    <link rel="stylesheet" type="text/css" href="../../css/loginqueries.css">
    
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Marck+Script|Lato|Italianno|Courgette|Raleway|Mukta+Malar" rel="stylesheet">
    

</head>
<body>
<header>
    <?php
    include '../templates/navi.php';
    ?>
    </header>
    
       
        <section class="form clearfix">
        <div class="col span-2-of-2">
        <div class="row">
            <form action="caccount.php" method="post" enctype="multipart/form-data">
          
               <div class="label">ACTIVATION</div>
                    <div class="row">
                       
                           
                      
                        <div class="box">
                            <input type="tel" name="id" id="id" placeholder="Enter ID" required>
                        </div>
                           
                   
                    
                       
                        <div class="box">
                            <input type="password" name="pass" id="pass" placeholder="Enter Password" required>
                        
                        </div>
                        
                        <div class="box1">
                        <input type="submit" name="submit" value="ACTIVATE">
                        </div>
                    
                       
                </div>
            </form>
    </div>
            </div>
        </section>
    <script src=" ../../js/nav.js"></script>
    <?php
    include '../templates/footer.php';
    include '../templates/script.php';
    ?>
</body>
<?php
}
}

else{header('Location : ../../index.php');}
?>