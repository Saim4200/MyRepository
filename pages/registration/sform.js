$(document).ready(function()
{
    hideDialog();
    hideSuccessDialog();
    $("#dialogbtn").click(function(){
        hideDialog();
        if(loc!==null) window.location.href = loc;
    });
    $("#dialogbtnSuccess").click(function(){
        hideSuccessDialog();
        if(loc!==null) window.location.href = loc;
    });
    $('#subjects').on('change', function(){
            $(".choices__inner").css("border","1.5px solid #DDDDDD");
    }); 
    $("#agreeTerms").change(function(){
        $("#agreeTermsError").text("");
    });
    
    $("#Submit").click(function(){
    
        if($("#agreeTerms:checked").val()){
                showLoading();
                
                    var postData = $(".wizard-card form").serializeArray();
                    var formURL = 'sregister.php';
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
                                showSuccessDialog('Success' ,'<strong>Congratulations!</strong> Your registration is successful. <br>An activation email has been sent to your email address for account activation.','../match/search.php');
                            } 
                            else if (result=="ERROR-1"){
                                showDialog('Email Exists!','This email is already registered. Register with a different email address.', null);
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
        }
        else {
                $("#agreeTermsError").text('Select this checkbox to continue');
        }
    });
});