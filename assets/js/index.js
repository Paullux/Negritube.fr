var miniature = document.getElementById("Miniatures");
let miniatureCurrentImageIndex = 0;

var cover = document.getElementById("Covers");
var coverCurrentImageIndex = 0;

miniature.style.backgroundImage = `url('assets/img/miniature/6.png')`;
cover.style.backgroundImage = `url('assets/img/album cover/Mal_tèt.jpg')`;

setInterval(() => {
  const imgMiniature = new Image();
  imgMiniature.src = window.Miniatures[miniatureCurrentImageIndex];
  imgMiniature.onload = function () {
    miniature.style.backgroundImage = `url("${window.Miniatures[miniatureCurrentImageIndex]}")`;
    miniature.style.transition = `background 3s linear;`;
  }
  miniatureCurrentImageIndex = (miniatureCurrentImageIndex + 1) % window.Miniatures.length;
}, 6000);

setInterval(() => {
  const imgCover = new Image();
  imgCover.src = window.Covers[coverCurrentImageIndex];
  imgCover.onload = function () {
	cover.style.backgroundImage = `url("${window.Covers[coverCurrentImageIndex]}")`;
	cover.style.transition = `background 3s linear;`;
  }
  coverCurrentImageIndex = (coverCurrentImageIndex + 1) % window.Covers.length;
}, 4000);