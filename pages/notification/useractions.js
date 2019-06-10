
$(document).ready(function()
{

$("input[type=button]").click(function()
{
		var _btnid = $(this).attr("id");
		var _id = _btnid.split('-');

		var _nid = _id[1];
		var btn = $(this);
		
		var status = $("#status-"+_nid).val();
        var _data = null;
        
 // console.log(_btnid+", "+_nid+", "+status);
    
    switch(status){
        case '1':
            if(_id[0]=='accept') {
                $('#buttons-'+_nid).hide();
                $('#inputfield-'+_nid).show();
                $('#input-'+_nid).attr("placeholder", "Enter demand fee");
            } 
            else if(_id[0]=='reject') {
                $('#notibox-'+_nid).fadeOut(800,function(){ $('#notibox-'+_nid).remove();});
                _data = {id: _nid, status: 7};
            }
            else if(_id[0]=='submit') {
                var fee = $('#input-'+_nid).val();
                _data = {id: _nid, status: 2,  demand: fee};
                $('#notibox-'+_nid).fadeOut(800,function(){ $('#notibox-'+_nid).remove();});
            }  
            break;
        case '2':
            if(_id[0]=='accept') {
                $('#notibox-'+_nid).fadeOut(800,function(){ $('#notibox-'+_nid).remove();});
                _data = {id: _nid, status: 5, accepted: 'demand'};
            } 
            else if(_id[0]=='reject') {
                $('#buttons-'+_nid).hide();
                $('#inputfield-'+_nid).show();
                $('#input-'+_nid).attr("placeholder", "Enter bargain fee");
            }
            else if(_id[0]=='submit') {
                var fee2 = $('#input-'+_nid).val();
                _data = {id: _nid, status: 3,  bargain: fee2};
                $('#notibox-'+_nid).fadeOut(800,function(){ $('#notibox-'+_nid).remove();});
            }  
            break;
        case '3':
            if(_id[0]=='accept') {
                $('#buttons-'+_nid).hide();
                $('#inputfield-'+_nid).show();
            } 
            else if(_id[0]=='reject') {
                $('#notibox-'+_nid).fadeOut(800,function(){ $('#notibox-'+_nid).remove();});
                _data = {id: _nid, status: 6};
            }
            else if(_id[0]=='submit') {
                var date = $('#input-'+_nid).val();
                _data = {id: _nid, status: 4, accepted: 'bargain', startdate: date};
               $('#notibox-'+_nid).fadeOut(800,function(){ $('#notibox-'+_nid).remove();});
             }
            break;
        case '5':
            if(_id[0]=='submit') {
                var date1 = $('#input-'+_nid).val();
                _data = {id: _nid, status: 8,  startdate: date1};
                window.location='../payment/payment.php?id='+_nid;
                $('#notibox-'+_nid).fadeOut(800,function(){ $('#notibox-'+_nid).remove();});
            }
            break;
        case '6':
            if(_id[0]=='accept') {
                $('#buttons-'+_nid).hide();
                $('#inputfield-'+_nid).show();
                $('#input-'+_nid).attr("placeholder", "Enter bargain fee");
            } 
            else if(_id[0]=='reject') {
                $('#notibox-'+_nid).fadeOut(800,function(){ $('#notibox-'+_nid).remove();});
                _data = {id: _nid, status: 0};
            }
            else if(_id[0]=='submit') {
                var fee3 = $('#input-'+_nid).val();
                _data = {id: _nid, status: 3,  bargain: fee3};
                $('#notibox-'+_nid).fadeOut(800,function(){ $('#notibox-'+_nid).remove();});
            }  
            break;
        case '7':
            if(_id[0]=='accept') {
                $('#buttons-'+_nid).hide();
                $('#inputfield-'+_nid).show();
                $('#input-'+_nid).attr("placeholder", "Enter demand fee");
            } 
            else if(_id[0]=='reject') {
                $('#notibox-'+_nid).fadeOut(800,function(){ $('#notibox-'+_nid).remove();});
                _data = {id: _nid, status: 0};
            }
            else if(_id[0]=='submit') {
                var fee4 = $('#input-'+_nid).val();
                _data = {id: _nid, status: 2,  demand: fee4};
                $('#notibox-'+_nid).fadeOut(800,function(){ $('#notibox-'+_nid).remove();});
            }  
            break;
    }

    if(_data !== null){
    	$.ajax(
    	{
    		url : 'actions.php',
    		type: "POST",
    		data : _data,
    		success:function(result, textStatus, jqXHR) 
    		{
                   console.log(result);
    		},
    		error: function(jqXHR, textStatus, errorThrown) 
    		{
                   console.log(textStatus+" error: "+errorThrown);
    		}
    	});
    }
});

});
