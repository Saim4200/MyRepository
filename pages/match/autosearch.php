<?php include'../database/tutordb.php';?>

<html>
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/grid.css">
    <link rel="stylesheet" type="text/css" href="../../css/navi.css">
    <link rel="stylesheet" type="text/css" href="../../css/resnavi.css">
    <link rel="stylesheet" type="text/css" href="../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../css/autosearch.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Monoton" rel="stylesheet">
    </head>
    <body>
        <header>
           <?php if(isset($_SESSION['id']))
                {include '../templates/navi2.php';}
              else{include '../templates/navi.php';}?>
        </header>
         <form id="actionform" name="matchform" enctype="application/x-www-form-urlencoded" method="post"  onsubmit="return validateForm()">
       
    <section class="clearfix">
        <div id="selection-box" class="container">
        <div class="col span-2-of-2">
            
            <div class="auto-box">
    
                <div class="col span-2-of-2" style="padding: 0 2%;">
                    <div class="col span-2-of-2">
                    <div class="button-text">TUITION REQUEST</div>
                    </div>
                     <div class="col span-2-of-2">
                        <div class="divider"></div>
                     </div>
                <div class="col span-2-of-2">
                <div class="col span-1-of-3">
                    <div class="col res-box-1-of-2">
                    <div class="dropdown-container">
                        <p class="dropdown-btn">Select Class/Level <i class="fa fa-caret-down"></i></p>

                        <div class="dropbox">
                         <?php
                            $fclass=mysqli_query($dbConnected,"select * from grade");
                        while($fgrade=mysqli_fetch_array($fclass))
                        {
                        echo '<div id="dropdown-ck-button"><label><input class="radio-button" id="grade" type="radio" name="grade" value="'.$fgrade['gid'].'"><span>'.$fgrade['gradename'].'</span></label></div>';
                        }
                        ?>
                        </div>
                        </div>
                    </div>
                    <div class="col res-box-1-of-2">
                      <div class="dropdown-container">
                        <p class="dropdown-btn">Select Tutoring Place <i class="fa fa-caret-down"></i></p>
                        <div class="dropbox">
                            <?php
                            $loc=mysqli_query($dbConnected,"select * from tutoringplace");
                            while($floc=mysqli_fetch_array($loc))
                            {
                                echo '<div id="dropdown-ck-button"><label><input class="radio-button" id="tplace" type="radio" name="tplace" value="'.$floc['id'].'"><span>'.$floc['place'].'</span></label></div>';
                            }?>
                        </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col span-2-of-3">
                  
                    <div class="subjects-container">
                          <div class="col span-2-of-2"><span class="subjects-heading">Select Subjects</span></div>
                        <div class="col span-2-of-2 subjects-list">
                        <?php $sub=mysqli_query($dbConnected,"select * from subjects");
                        while ($subn=mysqli_fetch_array($sub)){ 
                        ?>
                            <div id="ck-button">
                            <label>
                             <input class="single-checkbox" id="sub" type="checkbox" name="sub[]" value="<?php echo $subn['sid']; ?>"><span><?php echo $subn['subjectname']; ?></span>
                            </label>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
              
                </div>
                </div>
                
                <div class="col span-2-of-2" style="margin: 0">
                 <p class="submit-request" onclick="dialogOpen()">SUBMIT REQUEST</p>  
                </div>
            </div>
            
        </div>
            
        </div>
       
        </section>
        
        <section>
           
        <div class="dialog clearfix" id="dialog">
            
            <div class="img left">
          <div class="content">
              <div class="title">SEND AUTOMATICALLY</div>
              <div class="text">let us choose the best tutor for you</div>
                <input type="submit" name="auto" id="auto-button" value="SEND REQUEST" formaction="csearch.php"> 
                </div>
            </div> 
            <div class="img right">
                <div class="col span-2-of-2"><div class="closedialog" onclick="dialogClose()"><ion-icon name="close"></ion-icon></div></div>
           <div class="content">
            <div class="title">SEND MANUALLY</div>
                <div class="text">search and select a tutor of your own choice</div>
                <input type="submit" name="manual" value="SEARCH NOW" formaction="search.php"> 
                </div>
            </div>
            
            </div>
                
        </section>
               </form>
             
      
        <?php
        include '../templates/script.php';
        ?>
       
        <script type='text/javascript'>
            function validateForm() {
                var a = document.forms["matchform"]["tplace"].value;
                var b = document.forms["matchform"]["grade"].value;
                var checked = $("#actionform input:checked").length > 0;
                if (!checked){
                    alert("SELECT ATLEAST ONE SUBJECT");
                    return false;
                }
                else if ( a == 0) {
                   alert("SELECT TUTORING PLACE");
                   return false;
                }
                else if ( b == 0) {
                    alert("SELECT CLASS/LEVEL");
                   return false;
                  } else {
                      return true;
                  }
            }

        function dialogOpen(){
            if(validateForm()){
                document.getElementById("dialog").style.display="block";
                document.getElementById("selection-box").style.display="none";
            }
        } 
        function dialogClose(){
            document.getElementById("dialog").style.display="none";
            document.getElementById("selection-box").style.display="block";
        }
       
        </script>
          
    <script type="text/javascript">
    $('.single-checkbox').on('change', function() {
       if($('.single-checkbox:checked').length > 4) {
           this.checked = false;
       }
    });
     </script>

    <script>
    //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
          dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
              dropdownContent.style.display = "none";
            } else {
              dropdownContent.style.display = "block";
            }
          });
        }
    </script>
    </body>
</html>