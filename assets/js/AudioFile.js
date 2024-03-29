var song = document.getElementById('song_title_audio');
var canvas = document.getElementById('canvas');
var trackNumber = 1;
var currentTrack = 1;
var enCoursDeLecture = document.getElementById('enCoursDeLecture');
var isPlaying = false;
var pausedOnDemand = false;

var listeMusique = document.getElementById('listeMusique');
var TitreEnBas = document.getElementById('TitreEnBas');
var AuteurEnBas = document.getElementById('AuteurEnBas');
var AlbumEnBas = document.getElementById('AlbumEnBas');

var coverVEnHaut = document.getElementById('coverVEnHaut');
var TitreEnHaut = document.getElementById('TitreEnHaut');
var AuteurEnHaut = document.getElementById('AuteurEnHaut');
var AlbumEnHaut = document.getElementById('AlbumEnHaut');

var Server = "";

if (window.location.href.indexOf("paulluxwaffle.synology.me") > -1) {
  Server = "https://paulluxwaffle.synology.me/Multi-Plateform/";
} else {
  Server = "https://negritube.fr/";
}

var Length = document.getElementsByClassName("coverLength").length;

var coverButton = [];
var TitreButton = [];
var AuteurButton = [];
var AlbumButton = [];

for ( let i = 1 ; i <=  Length ; i++ ) {
  coverButton.push(document.getElementById('cover'+i).src);
  TitreButton.push(document.getElementById('p'+i).innerHTML);
  AuteurButton.push(document.getElementById('Auteur'+i).innerHTML);
  AlbumButton.push(document.getElementById('Album'+i).innerHTML);
}

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

let NAS = true;

if (!isMobile.any()) {
  enCoursDeLecture.style.backgroundImage = "";
  NAS = true
} else {
  enCoursDeLecture.style.backgroundImage = "url('assets/img/musicplayerpause.png')";
  NAS = false
}

function launchNewMusic(Numero) {

  var Titre = TitreButton[Numero - 1];
  var Artiste = AuteurButton[Numero - 1];
  var Album = AlbumButton[Numero - 1];
  var Pochette = coverButton[Numero - 1];

  TitreEnHaut.innerHTML = "Titre :&nbsp;" + Titre;
  AuteurEnHaut.innerHTML = "Artiste :&nbsp;" + Artiste;
  AlbumEnHaut.innerHTML = "Album :&nbsp;" + Album;

  if (!isMobile.any()) {
    TitreEnBas.innerHTML = "Titre :&nbsp;" + Titre;
    AuteurEnBas.innerHTML = "Artiste :&nbsp;" + Artiste;
    AlbumEnBas.innerHTML = "Album :&nbsp;" + Album;
  } else {

    listeMusique.style.backgroundColor = "rgba(65,65,65, 0.6)";
    listeMusique.style.color = "#FFF";
  }

  document.getElementById('cover').src = Pochette;
  coverVEnBas.src = Pochette;
  cover.src = Pochette;

  document.title = Artiste + ", " + Titre + " - Negritube";

  window.history.replaceState('', '', Server + 'audio-' + Numero + '.html');

  song.style.backgroundColor = "#484848";

  for (var i = 1; i <= Length; i++) {
    document.getElementById(i).style.backgroundColor = "rgba(192,192,192, 0.5)";
    document.getElementById(i).style.color = "#000";
  }

  audio.src = Server + "assets/audio/AllAlbums/" + Numero + ".mp3";

  currentTrack = audio.getAttribute("src").replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
  document.getElementById(currentTrack).style.backgroundColor = "rgba(65,65,65, 0.6)";
  document.getElementById(currentTrack).style.color = "#FFF";

  audio.play();

  if (!isMobile.any()) {
    enCoursDeLecture.style.backgroundImage = "";
  } else {
    enCoursDeLecture.removeAttribute("hidden");
    enCoursDeLecture.style.backgroundImage = "url('" + Server + "assets/img/musicplayerplay.png')";
  }
}

function pauseAud() {
  audio.pause();
  if (!isMobile.any()) {
    enCoursDeLecture.style.backgroundImage = "";
  } else {
    enCoursDeLecture.style.backgroundImage = "url('" + Server + "assets/img/musicplayerpause.png')";
  }
  document.getElementById("song_title_audio"); song.style.backgroundColor = "#c7432e";
  TitreEnBas.innerHTML+=" - Fin de l'Extrait";
  clearInterval(k);
  k = setInterval("nextSong();", 2000);
}

function playAud() {
  if (TitreEnBas.innerHTML.endsWith(" - Fin de l'Extrait")) {
    TitreEnBas.innerHTML = rmEnd(TitreEnBas.innerHTML, " - Fin de l'Extrait");
  }
  audio.play();

  if (!isMobile.any()) {
    enCoursDeLecture.style.backgroundImage = "";
  } else {
    enCoursDeLecture.style.backgroundImage = "url('" + Server + "assets/img/musicplayerplay.png')";
  }

  currentTrack = audio.getAttribute("src").replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
}

function nextSong() {
  if (shuffleBool) {
    trackNumber = getRandomIntInclusive(1, Length);
  } else {
    if (trackNumber < Length - 1) {
      ++trackNumber;
    } else {
      trackNumber = 1;
    }
  }
  if (autorenewBool) {
    launchNewMusic(trackNumber);
  }
}

audio.addEventListener('ended', (event) => {
  audio.currentTime = 0;
  if (!pausedOnDemand) {
    nextSong();
  }
});

function pauseAud2() {
  audio.pause();
  if (!isMobile.any()) {
    enCoursDeLecture.style.backgroundImage = "";
  } else {
    enCoursDeLecture.style.backgroundImage = "url('" + Server + "assets/img/musicplayerpause.png')";
  }
}

function rmEnd(str, ending){
  return str.slice(0, -ending.length);
}

function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min +1)) + min;
}

var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
var oldTrack = urlParams.get('track');
var track = oldTrack;

if (oldTrack == null) {
  track = document.location.toString().split("-")[1].split(".")[0];;
}

window.addEventListener("DOMContentLoaded", function(event) {
  //if (!isMobile.any()) {
    if (track != null) {
      launchNewMusic(track);
    } else {
      launchNewMusic(0);
    }
  //}
});

function togglePlay() {
  if (!isMobile.any()) {
    enCoursDeLecture.style.backgroundImage = "";
  } else {
    pausedOnDemand = !pausedOnDemand;
    if (audio.currentTime > 1 && !audio.paused) {
      pauseAud2();
    } else {
      currentTrack = audio.getAttribute("src").replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
      launchNewMusic(currentTrack);
    }
  }
}
