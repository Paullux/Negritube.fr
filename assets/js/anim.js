
var box = document.getElementsByClassName('box');

var anim = setInterval("",0);
var url = "index.php";

function launchWait(goodLink) {
  url = box[goodLink].getAttribute('href');
  anim = setInterval(() => {
    launchMedia(url)
  }, 8000);
}

function cancelWait() {
  clearInterval(anim)
}

function launchMedia(url) {
  window.location.href = url;
}
