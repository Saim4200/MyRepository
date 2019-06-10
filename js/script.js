$(document).ready(function() {
    
    
    /* For the sticky navigation */
    $('.about').waypoint(function(direction) {
        if (direction == "down") {
            $('nav').addClass('sticky');
            
           
        } else {
            $('nav').removeClass('sticky');
           
        }
    }, {
      offset: '60px;'
    });
    
    $('.about').waypoint(function(direction) {
        if (direction == "down") {
            $('.scroll').addClass('button');
           
           
        } else {
            $('.scroll').removeClass('button');
            
           
        }
    }, {
      offset: '60px;'
    });
    
    $('.register').waypoint(function(direction) {
        if (direction == "down") {
           $('.scroll').removeClass('button');
           
           
        }
        else{
            $('.scroll').addClass('button');
        }
    },{
        offset:'-100px;'
    });
    
   
    
});