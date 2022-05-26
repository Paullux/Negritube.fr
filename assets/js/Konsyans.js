var song = document.getElementById('song_title');
var img = document.getElementById('img');

function launchNewMusic(trackNumber) {

  document.getElementById('song_title').style.backgroundColor = "#D88851";

  for (let i = 1; i < 8; i++) {
    document.getElementById(i).style.backgroundColor = "orange";
  }

  document.getElementById(trackNumber).style.backgroundColor = "#D88851";

  audio.src = '../assets/audio/Konsyans/' + trackNumber + '.mp3';
  song.innerHTML=document.getElementById(trackNumber).innerHTML;

  audio.play();
  if (isMobile.any()) {
    img.style.visibility = "visible";
  }
}

function playAud() {
  audio.play();
  if (isMobile.any()) {
    img.style.visibility = "visible";
  }
}

function pauseAud2() {
  audio.pause();
  audio.currentTime=0;
  if (isMobile.any()) {
    img.style.visibility = "hidden";
  }
}
