<?php
            
            $checkinstitute=mysqli_fetch_array(mysqli_query($dbConnected,"select institute from teacherinfoprofessional where id='".$_SESSION['id']."'"));

            $checkareas=mysqli_fetch_array(mysqli_query($dbConnected,"select varea1,varea2,varea3,varea4,varea5,varea6 from teacherareas where (id='".$_SESSION['id']."')
            and (varea1=0 and varea2=0 and varea3=0 and varea4=0 and varea5=0 and varea6=0)
            "));

?>