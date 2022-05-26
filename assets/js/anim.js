
var miniature = document.getElementsByClassName('miniature');
var anim = setInterval("",0);
var url = "index.php";

function launchWait(goodLink) {
  url = miniature[goodLink].parentNode.getAttribute('href');
  anim = setInterval(() => {
    launchMedia(url)
  }, 3900);
}

function cancelWait() {
  clearInterval(anim)
}

function launchMedia(url) {
  window.location.href = url;
}
