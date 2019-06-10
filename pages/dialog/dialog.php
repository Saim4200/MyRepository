<div id="overlay" class="ui-widget-overlay" style="z-index: 10; display: none; width: 100%; height: 100%;"></div>
<div id="popup" style="position: fixed; top: 140px; padding: 20px; left: 50%; margin-left: -220px; z-index: 200; display: none">
    <div style="width: 440px; position: relative; z-index: 1" class="ui-dialog">
        <div class="ui-dialog-titlebar titlebar1"> <span class="ui-dialog-title" id="dialog-title" >Error</span></div>
        <div class="ui-dialog-content content1">
            <p id="dialog-message">An unknown error occured. Try again in a few minutes.</p>
            <p class="dialog-btn" id="dialogbtn">OK</p>
        </div>
    </div>
</div>
<div id="popup-success" style="position: fixed; top: 140px; padding: 20px; left: 50%; margin-left: -220px; z-index: 300; display: none">
    <div style="width: 440px; position: relative; z-index: 1" class="ui-dialog success-box">
        <div class="ui-dialog-titlebar titlebar2"> <span class="ui-dialog-title" id="dialog-title-success" ></span></div>
        <div class="ui-dialog-content content2">
            <p id="dialog-message-success"></p>
            <p class="dialog-btn-success" id="dialogbtnSuccess">OK</p>
        </div>
    </div>
</div>
<div id="overlay-loading" class="ui-widget-overlay" style="z-index: 100; display: none; width: 100%; height: 100%; background-color: whitesmoke;  opacity: .9;"></div>
<div class="loading-div"><?php include '../../css/icons/loading-spinner.html'; ?></div>
