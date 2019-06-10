$(document).ready(function()
    {    
        $('.input-append.date').datepicker({
            format: 'DD, M dd, yyyy',
            daysOfWeekDisabled: 0,
            todayHighlight: true
        });
        $('#subjects').on('change', function(){
            $(".choices__inner").css("border","1.5px solid #DDDDDD");
        }); 
        
            
        $("#dialogbtn").click(function(){
            hideDialog();
            if(loc!==null) window.location.href = loc;
        });
        $("#dialogbtnSuccess").click(function(){
            hideSuccessDialog();
            if(loc!==null) window.location.href = loc;
        });
        
    $("#Submit").click(function(){

            showLoading();
                
            var postData = $(".wizard-card form").serializeArray();
            var formURL = 'submit.php';
            $.ajax(
            {
                url : formURL,
                type: "POST",
                data : postData,
                success:function(result, textStatus, jqXHR) 
                {
                    hideLoading();
                       console.log(result);

                    if(result=="SUCCESS"){
                         showSuccessDialog('Success' ,'Your request has been sent successfully. <br>You will be notified when a tutor accepts your request.','../../index.php');
                    } 
                    else if (result=="ERROR-1"){
                        showDialog('Error','Tutors are not allowed to send tuition requests.', null);
                    }
                    else if (result=="ERROR-2"){
                        showDialog('Error','An unknown error occured. Try again in a few minutes.', null);
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) 
                {
                    showDialog('Internet Error','Internet Connection is lost. Try again in a few minutes.', null);
                }
            });
        });
});