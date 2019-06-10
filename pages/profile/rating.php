<?php
$rating = array(0,0,0,0,0);
while($ratings=mysqli_fetch_array($tratngs)){
    if($ratings['rating']==5)   $rating[4] += 1; 
    if($ratings['rating']==4)   $rating[3] += 1; 
    if($ratings['rating']==3)   $rating[2] += 1; 
    if($ratings['rating']==2)   $rating[1] += 1; 
    if($ratings['rating']==1)   $rating[0] += 1; 
}
$avg = ($rating[4]*5 + $rating[3]*4 + $rating[2]*3 + $rating[1]*2 + $rating[0]*1) / $count;
$num_stars = round($avg, 0, PHP_ROUND_HALF_UP);
function barlength($value, $total){
    if($value!==0 && $total!==0) 
        return $value/$total*100; 
    else 
        return 1;
}
?>
                <span class="fa fa-star <?php if($num_stars>=1) echo 'checked'; ?>"></span>
                <span class="fa fa-star <?php if($num_stars>=2) echo 'checked'; ?>"></span>
                <span class="fa fa-star <?php if($num_stars>=3) echo 'checked'; ?>"></span>
                <span class="fa fa-star <?php if($num_stars>=4) echo 'checked'; ?>"></span>
                <span class="fa fa-star <?php if($num_stars>=5) echo 'checked'; ?>"></span>
                <span class="description"><?php echo round($avg, 1); ?> average based on <?php echo $count; ?> reviews.</span>
                <hr style="border:3px solid #f1f1f1; width: 80%">

                <div class="col span-2-of-2 top">
                <div class="col span-2-of-2 row">
                <div class="col span-1-of-10 side">5 star</div>
                  <div class="col span-8-of-10 middle">
                    <div class="bar-container">
                      <div class="bar-5" style="width: <?php echo barlength($rating[4], $count); ?>%"></div>
                    </div>
                  </div>
                  <div class="col span-1-of-10 right"><?php echo $rating[4]; ?></div>
                  </div>
                <div class="col span-2-of-2 row">
                <div class="col span-1-of-10 side">4 star</div>
                  <div class="col span-8-of-10 middle">
                    <div class="bar-container">
                      <div class="bar-4" style="width: <?php echo barlength($rating[3], $count); ?>%"></div>
                    </div>
                  </div>
                  <div class="col span-1-of-10 right"><?php echo $rating[3]; ?></div>
                  </div>
                    <div class="col span-2-of-2 row">
                <div class="col span-1-of-10 side">3 star</div>
                  <div class="col span-8-of-10 middle">
                    <div class="bar-container">
                      <div class="bar-3" style="width: <?php echo barlength($rating[2], $count); ?>%"></div>
                    </div>
                  </div>
                  <div class="col span-1-of-10 right"><?php echo $rating[2]; ?></div>
                  </div>
                    <div class="col span-2-of-2 row">
                <div class="col span-1-of-10 side">2 star</div>
                  <div class="col span-8-of-10 middle">
                    <div class="bar-container">
                      <div class="bar-2" style="width: <?php echo barlength($rating[1], $count); ?>%"></div>
                    </div>
                  </div>
                  <div class="col span-1-of-10 right"><?php echo $rating[1]; ?></div>
                  </div>
                    <div class="col span-2-of-2 row">
                <div class="col span-1-of-10 side">1 star</div>
                  <div class="col span-8-of-10 middle">
                    <div class="bar-container">
                      <div class="bar-1" style="width: <?php echo barlength($rating[0], $count); ?>%"></div>
                    </div>
                  </div>
                  <div class="col span-1-of-10 right"><?php echo $rating[0]; ?></div>
                  </div>
                </div>