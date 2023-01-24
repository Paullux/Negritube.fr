var Numero = 0;
var currentTrack = 0;
var video = document.getElementById("video");
var trackArray;
var title = document.getElementById('title');
var description = document.getElementById('description');
var shuffleBool = new Boolean(true);
var autorenewBool = new Boolean(true);

var Server = "";

if (window.location.href.indexOf("paulluxwaffle.synology.me") > -1) {
  Server = "https://paulluxwaffle.synology.me/Multi-Plateform/";
} else {
  Server = "https://negritube.fr/";
}

function launchNewClip(trackNumber) {
      console.log(window.videos)
      title.innerHTML = window.videos[trackNumber-1]['Artiste'] + " : " + window.videos[trackNumber-1]['Titre'];
      description.innerHTML = window.videos[trackNumber-1]['description'];
      document.title = window.videos[trackNumber-1]['Artiste'] + ", " + window.videos[trackNumber-1]['Titre'] + " - Negritube";

  window.history.replaceState('', '', Server + 'video-' + trackNumber + '.html');

  for (let i = 1; i <= window.numberOfLine; i++) {
    document.getElementById(i).style.backgroundColor = "rgba(192,192,192, 0.5)";
    document.getElementById(i).style.color = "#000";
  }

  video.src = Server + "assets/videos/AllVideos/" + trackNumber + ".mp4";

  currentTrack = video.getAttribute("src").replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
  document.getElementById(currentTrack).style.backgroundColor = "rgba(65,65,65, 0.6)";
  document.getElementById(currentTrack).style.color = "#FFF";

  video.play();
}

function nextSong() {
    Numero = getRandomIntInclusive(1, window.numberOfLine);
    if (Numero > window.numberOfLine) { Numero = 1; }
    window.location.replace(Server + 'video-'+ Numero +'.html');
}

video.addEventListener('ended', (event) => {
  video.currentTime = 0;
  nextSong();
});

function rmEnd(str, ending){
  return str.slice(0, -ending.length);
}

function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min +1)) + min;
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

var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
var oldTrack = urlParams.get('track');
var track = oldTrack;

if (oldTrack == null) {
  track = document.location.toString().split("-")[1].split(".")[0];;
}

window.addEventListener("load", function(event) {
  //if (!isMobile.any()) {
    if (track != null) {
      launchNewClip(track);
    } else {
      launchNewClip(1);
    }
  //}
});