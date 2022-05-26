var song = document.getElementById('song_title');
var img = document.getElementById('img');

var isMobile = {
  Android: function() {
    return navigator.userAgent.match(/Android/i);
  },
  BlackBerry: function() {
    return navigator.userAgent.match(/BlackBerry/i);
  },
  iOS: function() {
    return navigator.userAgent.match(/iPhone|iPad|iPod/i);
  },
  Opera: function() {
    return navigator.userAgent.match(/Opera Mini/i);
  },
  Windows: function() {
    return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
  },
  any: function() {
    return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
  }
};

function launchNewMusic(trackNumber) {

  document.getElementById('song_title').style.backgroundColor = "#D88851";

  for (let i = 1; i < 13; i++) {
    document.getElementById(i).style.backgroundColor = "orange";
  }

  document.getElementById(trackNumber).style.backgroundColor = "#D88851";

  audio.src = '../assets/audio/Misiyon/' + trackNumber + '.mp3';
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
