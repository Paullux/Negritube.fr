// (A) AUDIO OBJECT + HTML CONTROLS
var audio = new Audio("../assets/audio/AllAlbums/1.mp3"), // change to your own!
currentTrack = audio.getAttribute("src"),
skipPrevious = document.getElementById("skipPrevious"),
skipPreviousIco = document.getElementById("skipPreviousIco"),
skipNext = document.getElementById("skipNext"),
skipNextIco = document.getElementById("skipNextIco"),
aPlay = document.getElementById("aPlay"),
aPlayIco = document.getElementById("aPlayIco"),
autorenew = document.getElementById("autorenew"),
autorenewBool = new Boolean(false),
autorenewIco = document.getElementById("autorenewIco"),
shuffle = document.getElementById("shuffle"),
shuffleIco = document.getElementById("shuffleIco"),
shuffleBool = new Boolean(false),
aNow = document.getElementById("aNow"),
aTime = document.getElementById("aTime"),
aSeek = document.getElementById("aSeek"),
aVolume = document.getElementById("aVolume"),
aVolIco = document.getElementById("aVolIco");

skipPrevious.onclick = () => {
  currentTrack = audio.getAttribute("src").replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
  if (Number(audio.currentTime) > 1) {
    audio.currentTime=0;
    launchNewMusic(currentTrack);
  } else {
    if (Number(currentTrack) > 1) {
      var previousTrack = Number(previousTrack) - 1;
      launchNewMusic(previousTrack);
    }
  }
};

skipNext.onclick = () => {
  currentTrack = audio.getAttribute("src").replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
  if (Number(currentTrack) < window.numberOfLine) {
    var nextTrack = Number(currentTrack) + 1;
    document.cookie = 'index=' + nextTrack ;
    launchNewMusic(nextTrack);
  } else {
    document.cookie = 'index=1' ;
    launchNewMusic(1);
  }
};


// (B) PLAY & PAUSE
// (B1) CLICK TO PLAY/PAUSE
aPlay.onclick = () => {
  if (audio.paused) { audio.play(); playAud(); }
  else { audio.pause(); pauseAud2(); }
};

// (B2) SET PLAY/PAUSE ICON
audio.onplay = () => { aPlayIco.innerHTML = "pause"; };
audio.onpause = () => { aPlayIco.innerHTML = "play_arrow"; };

// (C) LOOP
if (autorenewBool) {
  autorenewIco.style.color = "#efff6a";
} else {
  autorenewIco.style.color = "grey";
}

autorenew.onclick = () => {
  if (!autorenewBool) {
    autorenewIco.style.color = "#efff6a";
    autorenewBool = true;
  } else {
    autorenewIco.style.color = "grey";
    autorenewBool = false;
  }
}
// (C) RANDOM
if (shuffleBool) {
  shuffleIco.style.color = "#efff6a";
} else {
  shuffleIco.style.color = "grey";
}

shuffle.onclick = () => {
  if (!shuffleBool) {
    shuffleIco.style.color = "#efff6a";
    shuffleBool = true;
  } else {
    shuffleIco.style.color = "grey";
    shuffleBool = false;
  }
}

// (C) TRACK PROGRESS & SEEK TIME
// (C1) SUPPORT FUNCTION - FORMAT HH:MM:SS
var timeString = (secs) => {
  // HOURS, MINUTES, SECONDS
  let ss = Math.floor(secs),
  hh = Math.floor(ss / 3600),
  mm = Math.floor((ss - (hh * 3600)) / 60);
  ss = ss - (hh * 3600) - (mm * 60);

  // RETURN FORMATTED TIME
  if (hh>0) { mm = mm<10 ? "0"+mm : mm; }
  ss = ss<10 ? "0"+ss : ss;
  return hh>0 ? `${hh}:${mm}:${ss}` : `${mm}:${ss}` ;
};

// (C2) TRACK LOADING
audio.onloadstart = () => {
  aNow.innerHTML = "Loading";
  aTime.innerHTML = "";
};

// (C3) ON META LOADED
audio.onloadedmetadata = () => {
  // (C3-1) INIT SET TRACK TIME
  aNow.innerHTML = timeString(0);
  aTime.innerHTML = timeString(audio.duration);

  // (C3-2) SET SEEK BAR MAX TIME
  aSeek.max = Math.floor(audio.duration);

  // (C3-3) USER CHANGE SEEK BAR TIME
  var aSeeking = false; // user is now changing time
  aSeek.oninput = () => { aSeeking = true; }; // prevents clash with (c3-4)
  aSeek.onchange = () => {
    audio.currentTime = aSeek.value;
    if (!audio.paused) { audio.play(); }
    aSeeking = false;
  };

  // (C3-4) UPDATE SEEK BAR ON PLAYING AND UPDATE TIME ON PLAYING
  audio.ontimeupdate = () => {
    if (!aSeeking) { aSeek.value = Math.floor(audio.currentTime); }
    aNow.innerHTML = timeString(audio.currentTime);
  };
};

// (D) VOLUME
aVolume.onchange = () => {
  audio.volume = aVolume.value;
  aVolIco.innerHTML = (aVolume.value==0 ? "volume_mute" : "volume_up");
};

// (E) ENABLE/DISABLE CONTROLS
audio.oncanplaythrough = () => {
  aPlay.disabled = false;
  aVolume.disabled = false;
  aSeek.disabled = false;
};
audio.onwaiting = () => {
  aPlay.disabled = true;
  aVolume.disabled = true;
  aSeek.disabled = true;
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


if (!isMobile.any()) {
  window.AudioContext = window.AudioContext || window.webkitAudioContext || window.mozAudioContext;

  function start() {
    var ctx = new AudioContext();
    var analyser = ctx.createAnalyser();
    var audioSrc = ctx.createMediaElementSource(audio);
    // we have to connect the MediaElementSource with the analyser
    audioSrc.connect(analyser);
    analyser.connect(ctx.destination);
    // we could configure the analyser: e.g. analyser.fftSize (for further infos read the spec)
    // analyser.fftSize = 64;
    // frequencyBinCount tells you how many values you'll receive from the analyser
    var frequencyData = new Uint8Array(analyser.frequencyBinCount);

    // we're ready to receive some data!
    var canvas = document.getElementById('canvas'),
    cwidth = canvas.width, //parseFloat(window.getComputedStyle(canvas).getPropertyValue("width")),
    cheight = canvas.height - 2,
    meterWidth = 1, //width of the meters in the spectrum
    gap = 1, //gap between meters
    capHeight = 1,
    capStyle = '#fff',
    meterNum = cwidth, // / (1 + 1), //count of the meters
    capYPositionArray = []; ////store the vertical position of hte caps for the preivous frame
    ctx = canvas.getContext('2d'),
    gradient = ctx.createLinearGradient(0, 0, 0, 100);
    gradient.addColorStop(1, '#A0E6E3');
    gradient.addColorStop(0.5, '#447DD0');
    gradient.addColorStop(0, '#1027E3');

    // loop
    function renderFrame() {
      var array = new Uint8Array(analyser.frequencyBinCount);
      analyser.getByteFrequencyData(array);
      var step = Math.round(array.length / meterNum); //sample limited data from the total array
      ctx.clearRect(0, 0, cwidth, cheight);
      for (var i = 0; i < meterNum; i++) {
        var value = array[i * step];
        if (capYPositionArray.length < Math.round(meterNum)) {
          capYPositionArray.push(value);
        };
        ctx.fillStyle = capStyle;
        //draw the cap, with transition effect
        if (value < capYPositionArray[i]) {
          ctx.fillRect(i * 2, cheight - (--capYPositionArray[i]), meterWidth, capHeight);
        } else {
          ctx.fillRect(i * 2, cheight - value, meterWidth, capHeight);
          capYPositionArray[i] = value;
        };
        ctx.fillStyle = gradient; //set the filllStyle to gradient for a better look
        ctx.fillRect(i * 2 /*meterWidth+gap*/ , cheight - value + capHeight, meterWidth, cheight); //the meter
      }
      requestAnimationFrame(renderFrame);
    }
    renderFrame();
    // audio.play();
  };
  start();
}

audio.addEventListener('timeupdate', updateProgressBar, false);

function updateProgressBar() {
  //get current time in seconds
  var elapsedTime = Math.round(audio.currentTime);
  var progressBar = document.getElementById('progressBar');
  //update the progress bar
  if (progressBar.getContext) {
    var ctx = progressBar.getContext("2d");
    //clear canvas before painting
    ctx.clearRect(0, 0, progressBar.clientWidth, progressBar.clientHeight);
    ctx.fillStyle = "rgb(255,0,0)";
    var fWidth = (elapsedTime / audio.duration) * (progressBar.width);
    if (fWidth > 0) {
      ctx.fillRect(0, 0, fWidth, progressBar.clientHeight);
    }
  }
}
