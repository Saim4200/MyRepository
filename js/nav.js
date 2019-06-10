
    
function openNav() {
    document.getElementById("myNav").style.height = "100%";
    document.getElementById("open").style.visibility = "hidden";
}

function closeNav() {
    document.getElementById("myNav").style.height = "0%";
    document.getElementById("open").style.visibility = "visible";
}
function openFilter() {
    document.getElementById("resfilter").style.width = "75%";
    document.getElementById("openfilter").style.visibility = "hidden";
    document.getElementById("closefilter").style.display = "block";
    document.getElementById("res-container").style.display = "block";
    document.getElementById("open").style.visibility = "hidden";
}

function closeFilter() {
    document.getElementById("resfilter").style.width = "0%";
    document.getElementById("openfilter").style.visibility = "visible";
    document.getElementById("closefilter").style.display = "none";
    document.getElementById("res-container").style.display = "none";
    document.getElementById("open").style.visibility = "visible";
}
