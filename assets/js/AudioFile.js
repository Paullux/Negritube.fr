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
}else {
  Server = "https://negritube.fr/";
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

if (!isMobile.any()) {
  enCoursDeLecture.style.backgroundImage = "";
} else {
    enCoursDeLecture.style.backgroundImage = "url('" + Server + "assets/img/musicplayerpause.png')";
}

function launchNewMusic(trackNumber) {

  fetch(Server + 'assets/csv/audio.csv')
    .then((response) => {
      return response.text();
    })
    .then((text) => {
      trackArray = CSVToJSON(text,',');
      if (!isMobile.any()) {
        TitreEnBas.innerHTML = "Titre :&nbsp;" + trackArray[trackNumber - 1]['Titre'];
        AuteurEnBas.innerHTML = "Artiste :&nbsp;" + trackArray[trackNumber - 1]['Artiste'];
        AlbumEnBas.innerHTML = "Album :&nbsp;" + trackArray[trackNumber - 1]['Album'];
      } else {
        TitreEnHaut.innerHTML = "Titre :&nbsp;" + trackArray[trackNumber - 1]['Titre'];
        AuteurEnHaut.innerHTML = "Artiste :&nbsp;" + trackArray[trackNumber - 1]['Artiste'];
        AlbumEnHaut.innerHTML = "Album :&nbsp;" + trackArray[trackNumber - 1]['Album'];
        listeMusique.style.backgroundColor = "rgba(65,65,65, 0.6)";
        listeMusique.style.color = "#FFF";
      }
      document.title = trackArray[trackNumber - 1]['Artiste'] + ", " + trackArray[trackNumber - 1]['Titre'] + " - Negritube";
    });

    window.history.replaceState('', '', Server + 'audio-' + trackNumber + '.html');


  song.style.backgroundColor = "#484848";

  for (let i = 1; i < numberOfLine; i++) {
    document.getElementById(i).style.backgroundColor = "rgba(192,192,192, 0.5)";
    document.getElementById(i).style.color = "#000";
  }

  if (trackNumber >= 1 && trackNumber <= 3) {
    document.getElementById('cover').style.backgroundImage = "url('" + Server + "assets/img/album%20cover/Mal_tèt.jpg')";
    coverVEnBas.src = Server + 'assets/img/album%20cover/Mal_tèt.jpg';
  }
  if (trackNumber > 3 && trackNumber <= 10) {
      document.getElementById('cover').style.backgroundImage = "url('" + Server + "assets/img/album%20cover/Konsyans.jpg')";
      coverVEnBas.src = Server + 'assets/img/album%20cover/Konsyans.jpg';
  }
  if (trackNumber > 10 && trackNumber <= 23) {
    document.getElementById('cover').style.backgroundImage = "url('" + Server + "assets/img/album%20cover/Eritaj.jpg')";
    coverVEnBas.src = Server + 'assets/img/album%20cover/Eritaj.jpg';

    clearInterval(k);
    k = setInterval("pauseAud()", 20000);
  }
  if (trackNumber > 23 && trackNumber <= 35) {
    document.getElementById('cover').style.backgroundImage = "url('" + Server + "assets/img/album%20cover/Misiyon.jpg')";
    coverVEnBas.src = Server + 'assets/img/album%20cover/Misiyon.jpg';
  }

  if (trackNumber > 35 && trackNumber <= 48) {
    document.getElementById('cover').style.backgroundImage = "url('" + Server + "assets/img/album%20cover/Ka Fé Tan.jpg')";
    coverVEnBas.src = Server + 'assets/img/album%20cover/Ka Fé Tan.jpg';
  }

  if (trackNumber > 48 && trackNumber <= 49) {
    document.getElementById('cover').style.backgroundImage = "url('" + Server + "assets/img/album%20cover/Kembé Red.jpg')";
    coverVEnBas.src = Server + 'assets/img/album%20cover/Kembé Red.jpg';
  }

  if (trackNumber > 49 && trackNumber <= 57) {
    document.getElementById('cover').style.backgroundImage = "url('" + Server + "assets/img/album%20cover/A la repriz.jpg')";
    coverVEnBas.src = Server + 'assets/img/album%20cover/A la repriz.jpg';
  }

  if (trackNumber > 57 && trackNumber <= 67) {
    document.getElementById('cover').style.backgroundImage = "url('" + Server + "assets/img/album%20cover/Ti Kaz An Bwa La.jpg')";
    coverVEnBas.src = Server + 'assets/img/album%20cover/Ti Kaz An Bwa La.jpg';
  }

  if (trackNumber > 67 && trackNumber <= 83) {
    document.getElementById('cover').style.backgroundImage = "url('" + Server + "assets/img/album%20cover/Lokans.jpg')";
    coverVEnBas.src = Server + 'assets/img/album%20cover/Lokans.jpg';
  }

  if (trackNumber > 83 && trackNumber <= 93) {
    document.getElementById('cover').style.backgroundImage = "url('" + Server + "assets/img/album%20cover/Liméro twa.jpg')";
    coverVEnBas.src = Server + 'assets/img/album%20cover/Liméro twa.jpg';
  }

  if (trackNumber > 93 && trackNumber <= 99) {
    document.getElementById('cover').style.backgroundImage = "url('" + Server + "assets/img/album%20cover/GWAKASONNE - Présumés Coupables - Cover.jpg')";
    coverVEnBas.src = Server + 'assets/img/album%20cover/GWAKASONNE - Présumés Coupables - Cover.jpg';
  }

  if (trackNumber > 99 && trackNumber <= 105) {
    document.getElementById('cover').style.backgroundImage = "url('" + Server + "assets/img/album%20cover/José MANCLIERE Doubout pou Gadé.jpg')";
    coverVEnBas.src = Server + 'assets/img/album%20cover/José MANCLIERE Doubout pou Gadé.jpg';
  }

  if (trackNumber > 105 && trackNumber <= numberOfLine) {
    document.getElementById('cover').style.backgroundImage = "url('" + Server + "assets/img/album%20cover/Gérard Lockel - Cover.jpg')";
    coverVEnBas.src = Server + 'assets/img/album%20cover/Gérard Lockel - Cover.jpg';
  }

  audio.src = Server + "assets/audio/AllAlbums/" + trackNumber + ".mp3";

  currentTrack = audio.getAttribute("src").replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
  document.getElementById(currentTrack).style.backgroundColor = "rgba(65,65,65, 0.6)";
  document.getElementById(currentTrack).style.color = "#FFF";

  console.log('track number : ' + trackNumber);

  audio.play();

  if (!isMobile.any()) {
    enCoursDeLecture.style.backgroundImage = "";
  } else {
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
  audio.currentTime=0;
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
    enCoursDeLecture.style.backgroundImage = "url('" + Server + "assets/img/musicplayerpause.png')";
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


fetch(Server + 'assets/csv/audio.csv')
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
