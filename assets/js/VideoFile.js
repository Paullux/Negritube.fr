var trackNumber = 0;
var currentTrack = 0;
var video = document.getElementById("video");
var trackArray;
var title = document.getElementById('title');
var description = document.getElementById('description');
var shuffleBool = new Boolean(true);
var autorenewBool = new Boolean(true);
var numberOfLine = 1;

var Server = "";

if (window.location.href.indexOf("paulluxwaffle.synology.me") > -1) {
  Server = "https://paulluxwaffle.synology.me/Multi-Plateform/";
}else {
  Server = "https://negritube.fr/";
}

function launchNewClip(trackNumber) {

  fetch(Server + 'assets/csv/video.csv')
    .then((response) => {
      return response.text();
    })
    .then((text) => {
      trackArray = CSVToJSON(text,';');
      title.innerHTML = trackArray[trackNumber]['Artiste'] + " : " + trackArray[trackNumber]['Titre'];
      description.innerHTML = trackArray[trackNumber]['description'];
    });

  window.history.replaceState('', '', Server + 'video-' + trackNumber + '.html');

  for (let i = 0; i <= numberOfLine; i++) {
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
  if (shuffleBool) {
    trackNumber = getRandomIntInclusive(0, numberOfLine);
  } else {
    if (trackNumber < numberOfLine) {
    } else {
      ++trackNumber;
      trackNumber = 0;
    }
  }
  if (autorenewBool) {
    launchNewClip(trackNumber);
  }
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

const CSVToJSON = (data, delimiter = ',') => {
  const titles = data.slice(0, data.indexOf('\n')).split(delimiter);
  return data
    .slice(data.indexOf('\n') + 1)
    .split('\n')
    .map(v => {
      const values = v.split(delimiter);
      return titles.reduce(
        (obj, title, index) => ((obj[title] = values[index]), obj),
        {}
      );
    });
};

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

fetch(Server + 'assets/csv/video.csv')
  .then((response) => {
    return response.text();
  })
  .then((text) => {
    trackArray = CSVToJSON(text,',');
    var obj = JSON.parse(JSON.stringify(trackArray));
    numberOfLine = Object.keys(obj).length - 1;
  });

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
      launchNewClip(0);
    }
  //}
});
