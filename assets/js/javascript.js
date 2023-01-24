var dropzone = document.getElementById('dropzone');
var dropzone_input = dropzone.querySelector('.dropzone-input');
var multiple = dropzone_input.getAttribute('multiple') ? true : false;
var textdropzone = document.getElementById("text-drop-zone");
var UploadButton = document.getElementById("UploadButton");

['drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop'].forEach(function(event) {
  dropzone.addEventListener(event, function(e) {
    e.preventDefault();
    e.stopPropagation();
  });
});

dropzone.addEventListener('dragover', function(e) {
  this.classList.add('dropzone-dragging');
}, false);

dropzone.addEventListener('dragleave', function(e) {
  this.classList.remove('dropzone-dragging');
}, false);


dropzone.addEventListener('drop', function(e) {
	this.classList.remove('dropzone-dragging');
	var files = e.dataTransfer.files;
	var dataTransfer = new DataTransfer();
	
	Array.prototype.forEach.call(files, file => {
		dataTransfer.items.add(file);
		if (!multiple) {
			return false;
		}
	});
	dropzone_input.files = dataTransfer.files;
	textdropzone.innerHTML = "Glisser les MP3 🎵 ou les pochettes d'album 💿<br>uniquement en mp3 ou en jpg ici !<br>Vous avez glissé " + dropzone_input.files.length + " fichiers"; 
}, false);
  
dropzone.addEventListener('click', function(e) {
	dropzone_input.click();
});

UploadButton.addEventListener('click', function(e) {
	document.getElementById('image-dl').src = '../assets/img/wait.gif';
	document.body.style.cursor='wait';
});
