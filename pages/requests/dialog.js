function showDialog(heading, content, location ){
    hideLoading();
    document.getElementById("overlay").style.display = "block";
    document.getElementById('popup').style.display = "block";
    document.getElementById('dialogbtn').style.display = "block";
    document.getElementById("dialog-title").innerHTML = heading;
    document.getElementById("dialog-message").innerHTML = content;
    loc = location;
}
function hideDialog(){
    document.getElementById("overlay").style.display = "none";
    document.getElementById('popup').style.display = "none";
}
function showSuccessDialog(heading, content, location){
    hideLoading();
    document.getElementById("overlay").style.display = "block";
    document.getElementById('popup-success').style.display = "block";
    document.getElementById('dialogbtnSuccess').style.display = "block";
    document.getElementById("dialog-title-success").innerHTML = heading;
    document.getElementById("dialog-message-success").innerHTML = content;
    loc = location;
}
function hideSuccessDialog(){
    document.getElementById("overlay").style.display = "none";
    document.getElementById('popup-success').style.display = "none";
}
function showLoading(){
    $("#overlay").show();
    $(".loading-div").show();
}
function hideLoading(){
    $(".loading-div").hide();
    $("#overlay").hide();
}