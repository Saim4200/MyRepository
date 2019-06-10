        function resetAjax(){
            if($('#emailid').val() == ""){
                shakeModal('Field is empty!');
            }
            else if(!$('#emailid').val().includes("@")){
                shakeModal('Invalid email address!');                
            } else {
                closeLoginModal();
                showLoading();
                var postData = $(".login form").serializeArray();
                var formURL = 'cforgotpass.php';
                $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(result, textStatus, jqXHR) 
                    {
                        console.log(result);

                        if (result=="SUCCESS"){
                            showSuccessDialog("Success", "A reset link has been sent to your email address.", null);
                        } 
                        else if (result=="ERROR-1"){
                            shakeModal('Unable to reset password! Try again.');
                        } 
                        else if (result=="ERROR-2"){
                            shakeModal('Email not registered!');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) 
                    {
                        shakeModal('Unable to reset password! Try again.');
                    }
                });
            }
        }