'use strict';

function showDialog(title, message, type) {
    var dialog = document.getElementById('dialog');
    var dialogheader = document.getElementById('dialog-header');
    var dialogtitle = document.getElementById('dialog-title');
    var dialogclose = document.getElementById('dialog-close');
    var dialogcontent = document.getElementById('dialog-body');
    var dialogmask = document.getElementById('dialog-mask');
   
    dialogheader.className = type + "header";
    dialogtitle.innerHTML = title;
    dialogcontent.innerHTML = message;
    
    dialog.style.display = "block";
    dialogmask.style.display = "block";
}

// hide the dialog box //
function hideDialog() {
    document.getElementById('dialog').style.display = "none";
    document.getElementById('dialog-mask').style.display = "none";
}


