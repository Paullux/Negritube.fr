let Numero = 0;
let currentTrack = 0;
const video = document.getElementById("video");
let trackArray;
const title = document.getElementById('title');
const description = document.getElementById('description');
const shuffleBool = new Boolean(true);
const autorenewBool = new Boolean(true);

let Server = "";

if (window.location.href.indexOf("paulluxwaffle.synology.me") > -1) {
  Server = "https://paulluxwaffle.synology.me/Multi-Plateform/";
} else {
  Server = "https://negritube.fr/";
}
const Lenght = document.getElementsByClassName("videoLenght").length;

let miniatureButton = [];
let titreButton = [];
let auteurButton = [];
let descriptionButton = [];

for ( let i = 1 ; i <=  document.getElementsByClassName("videoLenght").length ; i++ ) {
  miniatureButton.push(document.getElementById('miniature'+i).src)
  titreButton.push(document.getElementById('p'+i).innerHTML);
  auteurButton.push(document.getElementById('Auteur'+i).innerHTML);
  descriptionButton.push(document.getElementById('description'+i).innerHTML)
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

function launchNewClip(trackNumber) {

  let miniature = miniatureButton[trackNumber - 1];
  let titre = titreButton[trackNumber - 1];
  let auteur = auteurButton[trackNumber - 1];
  let descriptionB = descriptionButton[trackNumber - 1];

  title.innerHTML = auteur + " : " + titre;
  description.innerHTML = descriptionB;
  document.title = auteur + ", " + titre + " - Negritube";

  window.history.replaceState('', '', Server + 'video-' + trackNumber + '.html');

  for (let i = 1; i <= document.getElementsByClassName("videoLenght").length; i++) {
    document.getElementById(i).style.backgroundColor = "rgba(192,192,192, 0.5)";
    document.getElementById(i).style.color = "#000";
  }

  video.poster = miniature;
  video.src = Server + "assets/videos/AllVideos/" + trackNumber + ".mp4";

  currentTrack = video.getAttribute("src").replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
  document.getElementById(currentTrack).style.backgroundColor = "rgba(65,65,65, 0.6)";
  document.getElementById(currentTrack).style.color = "#FFF";

  video.play();
}

function nextSong() {
    Numero = getRandomIntInclusive(1, document.getElementsByClassName("videoLenght").length);
    if (Numero > document.getElementsByClassName("videoLenght").length) { Numero = 1; }
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