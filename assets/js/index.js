var miniature = document.getElementById("Miniatures");
let miniatureCurrentImageIndex = 0;

var cover = document.getElementById("Covers");
var coverCurrentImageIndex = 0;

miniature.style.backgroundImage = `url('assets/img/miniature/6.png')`;
cover.style.backgroundImage = `url('assets/img/album cover/Mal_tèt.jpg')`;

setInterval(() => {
  miniature.style.backgroundImage = `url("${window.Miniatures[miniatureCurrentImageIndex]}")`;
  miniatureCurrentImageIndex = (miniatureCurrentImageIndex + 1) % window.Miniatures.length;
}, 6000);

setInterval(() => {
cover.style.backgroundImage = `url("${window.Covers[coverCurrentImageIndex]}")`;
coverCurrentImageIndex = (coverCurrentImageIndex + 1) % window.Covers.length;
}, 4500);