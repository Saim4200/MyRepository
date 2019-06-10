$('#profile').on("change", function() { // jQuery on change form
    var file_data = $('#profile').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('profilepic', file_data);
    $('#picture-box').hide();
    $('.pic-box').hide();
    $(".lds-default").show();
    $.ajax({
			url: 'updatepicture.php', // Call this file to update database and send back the correct new image and URL
	        type: 'POST',
			data:  form_data,
			mimeType:"multipart/form-data",
    		cache: false,
            contentType: false,
            processData: false,
            dataType: 'text', 
    		success: function(result, textStatus, jqXHR) {
    		    console.log(result);
                $(".lds-default").hide();
                $('#picture-box').show();
                $('.pic-box').show();
    			if(result.search("%")>0){
        			var data = result.split("%");
        			var html = data[0];
        			var url = "";
        			if(data.length>1){ 
        			    url = data[1];
        			}
        			$('#picture-box').html(html); // We display text in the div resultImageProfile tank
         			var date = new Date();
         			if(url!==""){
         			    $(".picture").attr( 'src', url + '?dt=' + date.getTime() );
         			    $(".proimg").attr( 'src', url + '?dt=' + date.getTime() );
         			}    
    			} else {
    			    alert(result);
    			}
		    }
	    });
	
});