var k = setInterval("pauseAud()", 20000);
clearInterval(k);
var song = document.getElementById('song_title_audio');
var canvas = document.getElementById('canvas');
var trackNumber = 1;
var currentTrack = 1;
var enCoursDeLecture = document.getElementById('enCoursDeLecture');
var isPlaying = false;
var pausedOnDemand = false;
var numberOfLine = 1;

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

if (!isMobile.any()) {
  enCoursDeLecture.style.backgroundImage = "";
} else {
  enCoursDeLecture.style.backgroundImage = "url('../assets/img/musicplayerpause.png')";
}

function launchNewMusic(trackNumber) {

  window.history.replaceState('', '', 'https://negritube.fr/audio-' + trackNumber + '.html');

  song.style.backgroundColor = "#484848";

  for (let i = 1; i <= numberOfLine; i++) {
    document.getElementById(i).style.backgroundColor = "rgba(192,192,192, 0.5)";
    document.getElementById(i).style.color = "#000";
  }

  if (trackNumber == 1) {
    document.getElementById('cover').style.backgroundImage = "url('../assets/img/album cover/Mal_tèt.jpeg')";
  }
  if (trackNumber > 1 && trackNumber <= 8) {
    document.getElementById('cover').style.backgroundImage = "url('../assets/img/album cover/Konsyans.jpg')";
  }
  if (trackNumber > 8 && trackNumber <= 21) {
    document.getElementById('cover').style.backgroundImage = "url('../assets/img/album cover/Eritaj.jpg')";
    clearInterval(k);
    k = setInterval("pauseAud()", 20000);
  }
  if (trackNumber > 21 && trackNumber <= numberOfLine) {
    document.getElementById('cover').style.backgroundImage = "url('../assets/img/album cover/Misiyon.jpg')";
  }

  audio.src = "../assets/audio/AllAlbums/" + trackNumber + ".mp3";

  currentTrack = audio.getAttribute("src").replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
  document.getElementById(currentTrack).style.backgroundColor = "rgba(65,65,65, 0.6)";
  document.getElementById(currentTrack).style.color = "#FFF";

  var title_song = document.getElementById(trackNumber).innerHTML;

  song.innerHTML = title_song;

  audio.play();

  if (!isMobile.any()) {
    enCoursDeLecture.style.backgroundImage = "";
  } else {
    enCoursDeLecture.style.backgroundImage = "url('../assets/img/musicplayerplay.png')";
  }
}

function pauseAud() {
  audio.pause();
  if (!isMobile.any()) {
    enCoursDeLecture.style.backgroundImage = "";
  } else {
    enCoursDeLecture.style.backgroundImage = "url('../assets/img/musicplayerpause.png')";
  }
  audio.currentTime=0;
  song.style.backgroundColor = "#c7432e";
  song.innerHTML+=" - Fin de l'Extrait";
  clearInterval(k);
  k = setInterval("nextSong();", 2000);
}

function playAud() {
  if (song.innerHTML.endsWith(" - Fin de l'Extrait")) {
    song.innerHTML = rmEnd(song.innerHTML, " - Fin de l'Extrait");
  }
  audio.play();

  if (!isMobile.any()) {
    enCoursDeLecture.style.backgroundImage = "";
  } else {
    enCoursDeLecture.style.backgroundImage = "url('../assets/img/musicplayerplay.png')";
  }

  currentTrack = audio.getAttribute("src").replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');

  clearInterval(k);
  k = setInterval("pauseAud()", 20000);
}

function nextSong() {
  clearInterval(k);
  if (shuffleBool) {
    trackNumber = getRandomIntInclusive(1, numberOfLine);
  } else {
    if (trackNumber < numberOfLine) {
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
    enCoursDeLecture.style.backgroundImage = "url('../assets/img/musicplayerpause.png')";
  }
  audio.currentTime=0;
  clearInterval(k);
}

function rmEnd(str, ending){
  return str.slice(0, -ending.length);
}

function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min +1)) + min;
}

var urlParams = new URLSearchParams(queryString);
var oldTrack = urlParams.get('track');
var track = document.location.toString().split("-")[1].split(".")[0];

if (oldTrack != null) {
  track = oldTrack;
}

window.addEventListener("load", function(event) {
  //if (!isMobile.any()) {
    if (track != null) {
      launchNewMusic(track);
    } else {
      launchNewMusic(1);
    }
  //}
});

function togglePlay() {
  if (!isMobile.any()) {
    enCoursDeLecture.style.backgroundImage = "";
  } else {  
    pausedOnDemand = !pausedOnDemand;
    if (audio.currentTime > 0 && !audio.paused) {
      pauseAud2();
    } else {
      currentTrack = audio.getAttribute("src").replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
      launchNewMusic(currentTrack);
    }  
  }
}

fetch('../assets/csv/audio.csv')
.then((response) => {
    return response.text();
})
.then((text) => {
    trackArray = CSVToJSON(text,',');
    var obj = JSON.parse(JSON.stringify(trackArray));
    numberOfLine = Object.keys(obj).length;
});

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
