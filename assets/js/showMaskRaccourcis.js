var raccourcisContent = document.getElementById('raccourcisContent');
var raccourcisH1 = document.getElementById('raccourcisH1');

window.addEventListener("load", function() {
  raccourcisContent = document.getElementById('raccourcisContent');
  raccourcisH1 = document.getElementById('raccourcisH1');
});

function showHidePlaylist() {
  if (raccourcisContent.style.display != "none") {
    raccourcisContent.style.display = "none";
    raccourcisH1.innerHTML="▲      Autres Musiques      ▲";
  } else {
    raccourcisContent.style.display = "flex";
    raccourcisH1.innerHTML="▼      Autres Musiques      ▼";
  }
}
