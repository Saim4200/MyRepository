function login(){
    showLoading();
    var postData = $(".login100-form").serializeArray();
    var formURL = 'slogin.php';
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(result, textStatus, jqXHR) 
        {
            console.log(result);
            hideLoading();
            if (result=="SUCCESS-1"){
                window.location.href = '../../index.php';
            } 
            else if (result=="SUCCESS-2"){
                window.location.href = '../requests/request.php';
            }
            else if (result=="ERROR-1"){
                $('.errorMessage').addClass('alert alert-danger').html('Incorrect Email/Password');
            } 
            else if (result=="ERROR-2"){
                $('.errorMessage').addClass('alert alert-danger').html('Email not registered!');
            }
            else if (result=="ERROR-3"){
                $('.errorMessage').addClass('alert alert-danger').html('Incorrect Password');
            }
            else if (result=="ERROR-4"){
                $('.errorMessage').addClass('alert alert-danger').html('Unable to login! Try again.');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            $('.errorMessage').addClass('alert alert-danger').html('Unable to login! Try again.');
        }
    });
}