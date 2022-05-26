var k = setInterval("pauseAud()", 20000);
var song = document.getElementById('song_title');
var img = document.getElementById('img');

function launchNewMusic(trackNumber) {

  song.style.backgroundColor = "#D88851";

  for (let i = 1; i < 14; i++) {
    document.getElementById(i).style.backgroundColor = "orange";
  }

  document.getElementById(trackNumber).style.backgroundColor = "#D88851";

  audio.src = "../assets/audio/Eritaj/" + trackNumber + ".mp3";

  song.innerHTML=document.getElementById(trackNumber).innerHTML;
  audio.play();
  clearInterval(k);
  k = setInterval("pauseAud()", 20000);
  if (isMobile.any()) {
    img.style.visibility = "visible";
  }
}

function pauseAud() {
  audio.pause();
  audio.currentTime=0;
  song.style.backgroundColor = "#c7432e";
  song.innerHTML+=" - Fin de l'Extrait";
  clearInterval(k);
  if (isMobile.any()) {
    img.style.visibility = "hidden";
  }
}

function playAud() {
  if (song.innerHTML.endsWith(" - Fin de l'Extrait")) {
    song.innerHTML = rmEnd(song.innerHTML, " - Fin de l'Extrait");
  }
  song.style.backgroundColor = "#D88851";
  audio.play();
  clearInterval(k);
  k = setInterval("pauseAud()", 20000);
  if (isMobile.any()) {
    img.style.visibility = "visible";
  }
}

function pauseAud2() {
  audio.pause();
  audio.currentTime=0;
  clearInterval(k);
  if (isMobile.any()) {
    img.style.visibility = "hidden";
  }
}

function rmEnd(str, ending){
  return str.slice(0, -ending.length);
}
