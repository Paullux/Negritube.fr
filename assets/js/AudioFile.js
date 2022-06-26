var k = setInterval("pauseAud()", 20000);
clearInterval(k);
var song = document.getElementById('song_title_audio');
var canvas = document.getElementById('canvas');
var trackNumber = 1;
var currentTrack = 1;

function launchNewMusic(trackNumber) {

  window.history.replaceState('', '', updateURLParameter(window.location.href, "track", trackNumber));

  song.style.backgroundColor = "#484848";

  for (let i = 1; i <= 33; i++) {
    document.getElementById(i).style.backgroundColor = "rgba(192,192,192, 0.5)";
    document.getElementById(i).style.color = "#000";
  }

  if (trackNumber == 1) {
    document.getElementById('cover').style.backgroundImage = "url('../assets/img/album cover/Mal_tèt.jpeg')"
  }
  if (trackNumber > 1 && trackNumber <= 8) {
    document.getElementById('cover').style.backgroundImage = "url('../assets/img/album cover/Konsyans.jpg')"
  }
  if (trackNumber > 8 && trackNumber <= 21) {
    document.getElementById('cover').style.backgroundImage = "url('../assets/img/album cover/Eritaj.jpg')"
    clearInterval(k);
    k = setInterval("pauseAud()", 20000);
  }
  if (trackNumber > 21 && trackNumber <= 33) {
    document.getElementById('cover').style.backgroundImage = "url('../assets/img/album cover/Misiyon.jpg')"
  }

  audio.src = "../assets/audio/AllAlbums/" + trackNumber + ".mp3";

  currentTrack = audio.getAttribute("src").replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
  document.getElementById(currentTrack).style.backgroundColor = "rgba(65,65,65, 0.6)";
  document.getElementById(currentTrack).style.color = "#FFF";

  var title_song = document.getElementById(trackNumber).innerHTML;

  song.innerHTML = title_song;

  audio.play();

}

function pauseAud() {
  audio.pause();
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

  currentTrack = audio.getAttribute("src").replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');

  clearInterval(k);
  k = setInterval("pauseAud()", 20000);
}

function nextSong() {
  clearInterval(k);
  if (shuffleBool) {
    trackNumber = getRandomIntInclusive(1, 33);
  } else {
    if (trackNumber < 33) {
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
  nextSong();
});

function pauseAud2() {
  audio.pause();
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

function updateURLParameter(url, param, paramVal)
{
    var TheAnchor = null;
    var newAdditionalURL = "";
    var tempArray = url.split("?");
    var baseURL = tempArray[0];
    var additionalURL = tempArray[1];
    var temp = "";

    if (additionalURL) 
    {
        var tmpAnchor = additionalURL.split("#");
        var TheParams = tmpAnchor[0];
            TheAnchor = tmpAnchor[1];
        if(TheAnchor)
            additionalURL = TheParams;

        tempArray = additionalURL.split("&");

        for (var i=0; i<tempArray.length; i++)
        {
            if(tempArray[i].split('=')[0] != param)
            {
                newAdditionalURL += temp + tempArray[i];
                temp = "&";
            }
        }        
    }
    else
    {
        var tmpAnchor = baseURL.split("#");
        var TheParams = tmpAnchor[0];
            TheAnchor  = tmpAnchor[1];

        if(TheParams)
            baseURL = TheParams;
    }

    if(TheAnchor)
        paramVal += "#" + TheAnchor;

    var rows_txt = temp + "" + param + "=" + paramVal;
    return baseURL + "?" + newAdditionalURL + rows_txt;
}

let params = new URLSearchParams(document.location.search);
var track = params.get("track");
console.log("track value: " + track)

//audio.src = "../videos/AllAlbums/" + trackNumber + ".mp3";
fetch('../assets/csv/audio.csv')
.then((response) => {
    return response.text();
})
.then((text) => {
    trackArray = CSVToJSON(text,',');
    var ogTitle = "Negritube.fr - " + trackArray[track]['Artiste'] + " : " + trackArray[track]['Titre'];
    var ogImage = trackArray[track]['pochette'];

    var link = document.createElement("a");
    link.href = ogImage;
    var ogLink = link.protocol+"//"+link.host+link.pathname+link.search+link.hash;

    var metaTag = document.getElementsByTagName('meta');
    for (var i=0; i < metaTag.length; i++) {
      if (metaTag[i].getAttribute("name")=='og:title')
        metaTag[i].content = ogTitle;
      if (metaTag[i].getAttribute("name")=='og:image')
        metaTag[i].content = ogLink;
      if (metaTag[i].getAttribute("name")=='twitter:title')
        metaTag[i].content = ogTitle;
      if (metaTag[i].getAttribute("name")=='twitter:image')
        metaTag[i].content = ogLink;
    }
    console.log("titre = " + ogTitle);
    console.log("pochette = " + ogLink);
});


window.addEventListener("load", function(event) {
  //if (!isMobile.any()) {
    if (track != null) {
      launchNewMusic(track);
    } else {
      launchNewMusic(1);
    }
  //}
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