var mediaPlayer;
var progressBar;
var canvas;

mediaPlayer = document.getElementById('audio');
progressBar = document.getElementById('progress-bar');
canvas = document.getElementById('progress-bar');

canvas.addEventListener("click", function(e) {

    var canvas = document.getElementById('progress-bar');

    if (!e) {
        e = window.event;
    } //get the latest windows event if it isn't set
    try {
        //calculate the current time based on position of mouse cursor in canvas box
        mediaPlayer.currentTime = mediaPlayer.duration * (e.offsetX / canvas.clientWidth);
    }
    catch (err) {
    // Fail silently but show in F12 developer tools console
        if (window.console && console.error("Error:" + err));
    }
}, true);

mediaPlayer.addEventListener('timeupdate', updateProgressBar, false);

function updateProgressBar() {
    mediaPlayer = document.getElementById('audio');
    //get current time in seconds
    var elapsedTime = Math.round(mediaPlayer.currentTime);
    //update the progress bar
    if (canvas.getContext) {
        var ctx = canvas.getContext("2d");
        //clear canvas before painting
        ctx.clearRect(0, 0, canvas.clientWidth, canvas.clientHeight);
        ctx.fillStyle = "rgb(255,0,0)";
        var fWidth = (elapsedTime / mediaPlayer.duration) * (canvas.clientWidth);
        if (fWidth > 0) {
            ctx.fillRect(0, 0, fWidth, canvas.clientHeight);
        }
    }
}
