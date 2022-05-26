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

function launchNewMusic() {
  audio.src = '../assets/audio/0.mp3';
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
