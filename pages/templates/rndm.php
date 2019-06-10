 <?php
clearstatcache();
            function gen(){	$x = 5; // Amount of digits
            $min = pow(10,$x);
            $max = pow(10,$x+1)-1;
            $value = rand($min, $max);
                     $firstnum =$value;
                     return $firstnum;}

?>