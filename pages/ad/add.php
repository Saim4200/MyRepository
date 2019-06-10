<?php
error_reporting(0);
 include '../database/tutordb.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/subjects.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/resnavi.css">
    <link rel="stylesheet" type="text/css" href="../../css/grid.css">
    </head>
    <body>
        <header class="clearfix">
          <?php
            include 'notiad.php';
            ?>
        <div class="add">
            <div class="container">
                <?php if(isset($_GET['setarea'])==1) {
                        $link= 'updatearea.php';
                        $placeholder='Enter Area';
                        $databasename= 'area';
                        $id='id';
                        $name='areaname';
                        $titleid='area id';
                        $titlename='area name';
}
                if(isset($_GET['setsubject'])==1){
                        $link='updatesubject.php';
                        $placeholder='Enter Subject';
                        $databasename='subjects';
                        $id='sid';
                        $name='subjectname';
                        $titleid='subject id';
                        $titlename='subject name';
                }
                
           echo " <form method='post' action='".$link."' enctype='application/x-www-form-urlencoded'>
            
            <input type='text' name='subject' placeholder='".$placeholder."'>
                <input type='submit' name='add' value='ADD'>
            </form>"; 
    ?>
        </div>
            </div>
        </header>
    <section>
      
            </section>
        <section>
              <ul class="select"><li><a href="add.php?setarea=1" >add area</a></li>
            <li><a href="add.php?setsubject=1">add subject</a></li></ul>
        <div class="border"></div>
        <div class="col span-2-of-2">
        <div class="container">
             <table class="table">
           <tr>
                <th><?php echo $titleid; ?></th>
                <th><?php echo $titlename; ?></th> 
                <th>Remove</th> 
                
              </tr>
            <?php
            
            $show=mysqli_query($dbConnected,"select * from ".$databasename." ");
            while($fetch=mysqli_fetch_array($show)){
                     ?>
           
               
              <tr>
                <td><?php echo $fetch[$id]; ?></td>
                <td><?php echo $fetch[$name]; ?></td>
                <td>
                    <?php echo "<form action=$link method='post'  enctype='application/x-www-form-urlencoded'>
                     <input type='hidden' name='removesubject' value='".$fetch[$id]."'>
                     <input type='submit'' name='remove' value='Remove'></form></td>"; ?>
              </tr>
                <?php }?>
               
            
            </table>
            </div>
        </div>
        </section>
        <?php
        include '../templates/script.php';
        ?>
    </body>
</html>