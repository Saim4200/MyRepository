function showDialog(heading, content){
    document.getElementById("overlay").style.display = "block";
    document.getElementById('popup').style.display = "block";
    document.getElementById('dialogbtn').style.display = "block";
    document.getElementById("dialog-title").innerHTML = heading;
    document.getElementById("dialog-message").innerHTML = content;

}
function hideDialog(){
    document.getElementById("overlay").style.display = "none";
    document.getElementById('popup').style.display = "none";
}
function showLoading(){
    $(".loading-div").show();
    $(".loading-row").show();
}
function hideLoading(){
    $(".loading-div").hide();
    $(".loading-row").hide();
}
function minutes(sec){
    var seconds = Math.floor(sec%60);
    var minutes = Math.floor(sec/60);
    var min_suffix = 'min', show_min, show_sec;
    if (minutes>1) min_suffix = 'mins';
    if(minutes>0) show_min = String(minutes)+' '+min_suffix;  else show_min = '';
    if(seconds>0) show_sec = String(seconds)+' sec';   else show_sec = '';
    return (show_min+' '+show_sec).trim();
}
function show_timer(sec){
	var seconds = Math.floor(sec % 60);
    var minutes = Math.floor(sec/60);
  
    var mins='', secs='';
    if (minutes>=0 && minutes<10) mins = '0'+String(minutes);
    else mins = String(minutes);
    
    if (seconds>=0 && seconds<10) secs = '0'+String(seconds);
    else secs = String(seconds);
    
    $("#minutes").text(mins);
    $("#seconds").text(secs);

    if (sec < 10){
        $("#time").css("color", "red");
    }
    
}

var counter=0;
var timer;

function startTimer(start) {

  counter = Number($("#qtime").val());
    $("#time").css("color", "darkcyan");

  clearInterval(timer);
  timer = setInterval(function(){
        counter--;
        show_timer(counter);
    
        if (counter === 0) {
          clearInterval(timer);
          showDialog("Time Out", "Sorry! Time's up for this question.");
        }
  }, 1000);
}



function match(ans){
    var checked = Number($(":checked").val()) - 1;
    var answers = ['s','m','f','b'];
    if( checked == answers.indexOf(ans)){
        return 1;
    } else {
        return 0;
    }
}
function loadnext()
{
		var _testid = $("#testid").val();
		var _tid = $("#tid").val();
		var _qid = $("#ques-no").val();
		var _ans = $("#qans").val();
		var _result = match(_ans);
		var correct = $("#correct-ans").val();
		if(_result==1){   correct++;   $("#correct-ans").val(correct);  }
		var _qtime = $("#qtime").val();

		var _timeleft = Number($("#minutes").text()) * 60 + Number($("#seconds").text());
		   
        $("#ques").hide();
        $("#opt").hide();
          
        clearInterval(timer);

        showLoading();
		
		$.ajax(
    	{
    		url : 'submit.php',
    		type: "POST",
    		data : {testid: _testid, tid: _tid, qno: _qid, result: _result, timeleft: _timeleft},
    		success: function(result, textStatus, jqXHR) 
    		{
                hideLoading();
                   console.log(result);
                   result = JSON.parse(result);
            	
            	if(result.result=="SUCCESS"){	
            	    
            	    if(result.success==2){
                		_qid++;
                		$("#ques-no").val(_qid);
                		$("#qn").text(String(_qid));
                		let ques = result.question.split("|");
                		$("#question").text(ques[0]);
                		let options = `<table><tbody>
                        <tr><td><div class="option"><input type="radio" id="choice1" name="radio-group" value="1"><label for="choice1">${ques[1]}</label></div></td></tr>
                        <tr><td><div class="option"><input type="radio" id="choice2" name="radio-group" value="2"><label for="choice2">${ques[2]}</label></div></td></tr>
                        <tr><td><div class="option"><input type="radio" id="choice3" name="radio-group" value="3"><label for="choice3">${ques[3]}</label></div></td></tr>
                        <tr><td><div class="option"><input type="radio" id="choice4" name="radio-group" value="4"><label for="choice4">${ques[4]}</label></div></td></tr>
                        </tbody></table>
                        <input type="hidden" value="${result.answer}" id="qans" name="qans">`;
                		$("#choices").html(options);
                		$("#ques").show();
                		$("#opt").show();
                		$("#Next").prop("disabled", true);
                        onRadioClickListener();
                        startTimer();
            	    } else {
            	        $("#header").hide();
            	        $("#btn-row").hide();
            	        $("#testresult").show();
            		    $("#description-2").html("<strong>That's it!</strong> You have completed the test. Here is your test result.");
            	        if (result.success===1){
                            $("#success").text("Cleared");
            	            $("#success").css("color","green");
            	        } 
            	        else if(result.success===0){
                            $("#success").text("Not Cleared");
            	            $("#success").css("color","#ff4e50");
            	        }
                        $("#score").html(String(result.score)+" <span> ("+String(result.correct)+" correct answers) </span>");
                        if(result.rank>0)
                            $("#rank").html(String(result.rank) + " <span> (Out of "+String(result.totaltests)+" test takers) </span>");
                        $("#complete-time").html(minutes(result.completetime)+ " <span> ("+minutes(result.totaltime)+" allowed) </span>");
            	    }
            	} else if (result.result=="ERROR-1" || result.result=="ERROR-2"){
            	    showDialog("Connection Lost", "Unable to proceed! Check your internet connection.");
            	    $("#dialogbtn").hide();
            	}
    		},
    		error: function(jqXHR, textStatus, errorThrown) 
    		{
                   console.log(textStatus+" error: "+errorThrown);
            	    showDialog("Connection Lost", "Unable to proceed! Check your internet connection.");
            	    $("#dialogbtn").hide();
    		}
    	});
}
function start(){
    var startqid = $("#startfrom").val();

    $("#introduction").hide();
	$("#ques-no").val(startqid);
	$("#header").show();
	$("#btn-row").show();
	$("#ques").show();
	$("#opt").show();
     $("#Next").prop("disabled", true);
	startTimer();
}
function onRadioClickListener(){
    $("input[type=radio]").click(function(){
     $("#Next").prop("disabled", false);
});
}
$(document).ready(function()
{
hideDialog();
onRadioClickListener();
$("input[type=button]").click(function(){
    var _id = $(this).attr("id");

    if(_id==="start-test"){
        start();
    }
    else if(_id==="Next"){
        loadnext();
    }
    
});
$("#dialogbtn").click(function(){
        hideDialog();
        loadnext();
});

});