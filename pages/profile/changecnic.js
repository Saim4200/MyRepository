$('#upload-file-2').click( function() { // jQuery on change form
    var file_data = $('#file-2').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('cnicpicsubmit', file_data);
    $.ajax({
			url: 'updatecnic.php', // Call this file to update database and send back the correct new image and URL
	        type: 'POST',
			data:  form_data,
			mimeType:"multipart/form-data",
    		cache: false,
            contentType: false,
            processData: false,
            dataType: 'text', 
    		success: function(result, textStatus, jqXHR) {
    		    console.log(result);
    			var data = result.split("%");
    			var html = data[0];
    			var url = "";
    			if(data.length>1){ 
    			    url = data[1];
    			}   
    			$('#resultCnicImage').html(html); // We display text in the div resultImageProfile tank
     			var date = new Date();
     			if(url!=="")    $("#cnic").attr( 'src', url + '?dt=' + date.getTime() );
		    }
	    });
	
});