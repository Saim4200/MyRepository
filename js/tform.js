$(function(){
       // Code for the Validator
    var $validator = $('.form-register').validate({
        debug:true,
        errorElement: 'div',
        focusCleanup: true,
		  rules: {
            fullname: {
			     required: true,
                minlength: 3
            },
            gender: {
		      required: true,
		    },
		    pnum: {
		      required: true,
                digits: true,
                maxlength: 11,
                minlength: 11
		    },
		    cnic: {
		      required: true,
                digits: true,
                maxlength: 13,
                minlength: 13
		    },
		    tarea: {
		      required: true,
		    },
            address: {
		      required: true,
		    },
            year: {
		      required: true,
		    },
            qualification: {
		      required: true,
		    },
            institute: {
                required: true,
                minlength: 3
            },
            field: {
                required: true,
                minlength: 3
            },
            passingyear: {
                required: true,
            },
		    email: {
		      required: true,
                email: true
		    },
		    pass: {
		      required: true,
                minlength: 5
		    },
            cpass: {
		      required: true,
                equalTo: "#pass"
		    }
        },
        messages: {
            fullname: {
		      required: "This field is required",
		    },
		    gender: {
		      required: "This field is required",
		    },
		    tarea: {
		      required: "This field is required",
		    },
            address: {
		      required: "This field is required",
		    },
		    phone: {
		      required: "This field is required",
                digits: "Only number digits are allowed",
                minlength: "Number must be 11 digits",
                maxlength: "Number must not exceed 11 digits"
		    },
		    cnic: {
		      required: "This field is required",
                digits: "Only number digits are allowed",
                minlength: "Number must be 13 digits",
                maxlength: "Number must not exceed 13 digits"
		    },
		    email: {
		      required: "This field is required",
                email: "Invalid email address"
		    },
		    pass: {
		      required: "Please enter a valid password",
                minlength: "Minimum 5 characters required"
		    },
            cpass: {
		      required: "Please confirm your password",
                equalTo: "Passwords do not match"
		    }
        },
        errorPlacement: function(error, element) {  
            error.appendTo($(element).parent());
         }
    });
    
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<div class="title">#title#</div>',
        labels: {
            previous : 'Back Step',
            next : 'Next Step',
            finish : 'Submit',
            current : ''
        },
        onStepChanging: function (event, currentIndex, newIndex) { 
            var $valid = $('.form-register').valid();
            if(!$valid) {
                $validator.focusInvalid();
                return false;
            }
            if(currentIndex==2){
                let radioChecked = $('input[type=radio]:checked').val() > 0;
                let countSubs = $('#subjects option:selected').length > 0;
                let countAreas = $('#areas option:selected').length > 0;
                if(!radioChecked){
                    $('#tplace-error').text('Please choose an option.');  $('#tplace-error').show();
                } else if(!countSubs) {
                    $('#subjects-error').text('Please choose atleast one subject.'); $('#subjects-error').show();
                } else if(!countAreas) {
                    $('#areas-error').text('Please choose atleast one area.'); $('#areas-error').show();
                }
                return radioChecked && countSubs && countAreas;
            }
            
            return true; 
        },

        onFinishing: function (event, currentIndex) { 
            var $valid = $('.form-register').valid();
            if(!$valid) {
                $validator.focusInvalid();
                return false;
            }
            return true; 
        }, 
        onFinished: function (event, currentIndex) { 
            if(currentIndex==3){
                if($("#agree:checked").val()){
                        showLoading();
                            var postData = $(".form-register").serializeArray();
                            var formURL = 'tregister.php';
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
                                        $('#wizard').hide();
                                        $('#success').show();
                                    } 
                                    else if (result=="ERROR-1"){
                                        showDialog('Email Exists!','This email is already registered. Register with a different email address.', null);
                                    } 
                                    else if (result=="ERROR-2"){
                                        showDialog('CNIC Exists!','This CNIC is already registered.', null);
                                    } 
                                    else if (result=="ERROR-3"){
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
                
            }
        },
    });
    $("#date").datepicker({
        dateFormat: "MM - DD - yy",
        showOn: "both",
        buttonText : '<i class="zmdi zmdi-chevron-down"></i>',
    });
});
