
$(document).ready(function()
{
    $(".tooltip").hide();
    $(".progress-loading").hide();
    
$("input[type=button]").click(function()
{
		var _tid = $(this).attr("id");
		var btn = $(this);
		var progressid = "#progress-"+_tid;
		var loadingid = "#loading-"+_tid;
		var errorid = "#error-"+_tid;
		var tooltipid = "#tooltip-"+_tid;
	    var tooltiptext = "";
        var _reqid =  $("#reqid-"+_tid).val();
        
        
    $("#"+_tid).attr("value","Sending ");
    $(loadingid).show();

    $.ajax({
        		url : 'ajax.php',
        		type: "POST",
        		data : {tid: _tid, reqid: _reqid},
        		success:function(result, textStatus, jqXHR) 
        		{
                       console.log(result);
        
                       if(result=="SUCCESS"){
                              $("#"+_tid).attr("disabled",true);
                              $("#"+_tid).attr("value","Request Sent");
                                $(loadingid).hide();
                       }
                        else if(result=="ERROR-1"){
                              $("#"+_tid).attr("value","Error ");
                                $(loadingid).hide();
                                tooltiptext = "No Internet Connection";
                                btn.css("color","#c5a524");
                                btn.css("background-color", "#f9f6e9");
                                btn.css("border", "0.5px solid #f4efd8");
                                btn.css("pointer-events", "none");
                                $(tooltipid).text(tooltiptext);
                                $(tooltipid).show();
                               
                       }
                        else if(result=="ERROR-2"){
                              $("#"+_tid).attr("value","Error ");
                                $(loadingid).hide();
                                tooltiptext = "Login or Register first";
                                btn.css("color","#c5a524");
                                btn.css("background-color", "#f9f6e9");
                                btn.css("border", "0.5px solid #f4efd8");
                                btn.css("pointer-events", "none");
                                $(tooltipid).text(tooltiptext);
                                $(tooltipid).show();
                       }
                        else if(result=="ERROR-3"){
                              $("#"+_tid).attr("value","Error ");
                                $(loadingid).hide();
                                tooltiptext = "Tutors not allowed";
                                btn.css("color","#c5a524");
                                btn.css("background-color", "#f9f6e9");
                                btn.css("border", "0.5px solid #f4efd8");
                                btn.css("pointer-events", "none");
                                $(tooltipid).text(tooltiptext);
                                $(tooltipid).show();
                       }
                        
                        // var margin =  10 - (tooltiptext.length*10 + 20)/2 + 2;
                        // $(tooltipid).css("margin-left", margin);
        
        
        		},
        		error: function(jqXHR, textStatus, errorThrown) 
        		{
        		}
        	});
            
	});

});
