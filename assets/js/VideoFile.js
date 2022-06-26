var trackNumber = 0;
var currentTrack = 0;
var video = document.getElementById("video");
var trackArray;
var title = document.getElementById('title');
var description = document.getElementById('description');
var shuffleBool = new Boolean(true);
var autorenewBool = new Boolean(true);


function launchNewClip(trackNumber) {

  window.history.replaceState('', '', updateURLParameter(window.location.href, "track", trackNumber));

  for (let i = 0; i <= 15; i++) {
    document.getElementById(i).style.backgroundColor = "rgba(192,192,192, 0.5)";
    document.getElementById(i).style.color = "#000";
  }

  video.src = "../assets/videos/AllVideos/" + trackNumber + ".mp4";

  currentTrack = video.getAttribute("src").replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
  document.getElementById(currentTrack).style.backgroundColor = "rgba(65,65,65, 0.6)";
  document.getElementById(currentTrack).style.color = "#FFF";
  fetch('../assets/csv/video.csv')
  	.then((response) => {
    		return response.text();
  	})
  	.then((text) => {
    		trackArray = CSVToJSON(text,';');
        title.innerHTML = trackArray[trackNumber]['Artiste'] + " : " + trackArray[trackNumber]['Titre'];
        description.innerHTML = trackArray[trackNumber]['description'];
  	});

  video.play();
}

function nextSong() {
  if (shuffleBool) {
    trackNumber = getRandomIntInclusive(0, 15);
  } else {
    if (trackNumber < 15) {
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

//video.src = "../assets/videos/AllVideos/" + trackNumber + ".mp4";
fetch('../assets/csv/video.csv')
.then((response) => {
    return response.text();
})
.then((text) => {
    trackArray = CSVToJSON(text,';');
    var ogTitle = "Negritube.fr - " + trackArray[track]['Artiste'] + " : " + trackArray[track]['Titre'];
    var ogImage = trackArray[track]['miniature'];

    var link = document.createElement("a");
    link.href = ogImage;
    var ogLink = link.protocol+"//"+link.host+link.pathname+link.search+link.hash;

    document.title = ogTitle;
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
      launchNewClip(track);
    } else {
      launchNewClip(0);
    }
  //}
});