
$(document).ready(function()
{
    
$("input[type=button]").click(function()
{
		var _id = $(this).attr("id");
		var btn = $(this);
		var id = _id.split('-');
		var id1 = id[0];
		var id2 = id[1];
        
        var val = $("#"+id1+"-update").val();
		
		var loadingid = "#loading-"+id1;
		var editid = "#"+id1+"edit";
		var cancelid = "#"+id1+"cancel";
		var dataid = "#"+id1+"data";
		var fieldid = "#"+id1+"-update";

        btn.hide();
        $(cancelid).hide();
        $(loadingid).show();
        
        var _data = {field: id1, value: val};
        if(id1=="pass"){
             _data = {field: id1, value: val, oldpass: $("#opass-update").val(), cpass:  $("#cpass-update").val() };
        }
        console.log(_data);

    	$.ajax(
    	{
    		url : 'updatefields.php',
    		type: "POST",
    		data : _data,
    		success:function(result, textStatus, jqXHR) 
    		{
                // console.log(result);
                $(loadingid).hide();
                $(fieldid).hide();
                $(editid).show();
                $(dataid).show();

                if(result!=="" && result!=="ERROR_1"){
                    $(dataid).text(result);
                    if(id1=="pass"){
                        if(result=="Password updated successfully!"){
                            $("#opass-update").hide();
                            $("#cpass-update").hide();
                        } else {
                            $(fieldid).show();
                            $("#pass-update").show();
                            $("#cpass-update").show();
                            $(editid).hide();
                            $("#passcancel").show();
                            btn.show();
                        }
                    }
                } 
                else if (result=="ERROR_1") {
                    alert('UNABLE TO SUBMIT YOUR CHANGES! TRY AGAIN.')
                }
    		},
    		error: function(jqXHR, textStatus, errorThrown) 
    		{
                   console.log(textStatus+" error: "+errorThrown);
    		}
    	});
	});
	
$("input[name=cpass]").keyup(function(){
    if($('#pass-update').val() !== $('#cpass-update').val()) {
        $("#passdata").text("Passwords do not match");
        $("#passdata").css("color", "red");
    }
    else {
        $("#passdata").text("Passwords matched!");
        $("#passdata").css("color", "darkgreen");
    }
  });

});
