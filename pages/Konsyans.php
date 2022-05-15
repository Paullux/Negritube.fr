<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Negritube.fr</title>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="../assets/css/audioplayer.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
  </head>
  <body onload="document.getElementById(1).style.backgroundColor = '#D88851';">
    <div class="my_page">
      <div class="video_page">
        <a href="../index.php">
          <img class="logo" src="../assets/img/logo-negritube.png" alt="negritube">
        </a>
        <div style="height:10px;font-size:10px;">&nbsp;</div>
          <a class="title_link" href="../index.php">
            <h1 class="title_site">
              &nbsp;&nbsp;Negritube.fr&nbsp;&nbsp;
            </h1>
          </a>
        <div class="hidden">
          <div style="height:10px;font-size:10px;">&nbsp;</div>
        </div>
        <h2 class="subtitle_site">
            &nbsp;&nbsp;Pour (re-)découvrir le Gwoka&nbsp;&nbsp;
        </h2>
        <br>
        <?php include("raccourcis.php") ?>
        <h3 class="song_title" style="width: 40%;cursor: pointer;padding-bottom: 1%; margin-left: 30%;">
          Album Konsyans
        </h3>
        <br>
        <canvas id='canvas' width="800" height="350" style="background-image: url('../assets/img/album cover/philippe_konsyans.png');background-size: auto;"></canvas>
        <br>
        <canvas id='progress-bar' width="800" height="20" style="border:1px solid green;">canvas not supported</canvas>
        <br>
        <div class="song_title" id="song_title" style="border:2px solid #000;width: 40%;cursor: pointer;padding-bottom: 1%; margin-left: 30%; background-color: #D88851;">► Chanson 01 - Lévé</div>
        <audio id="audio" controls autoplay controlsList="nodownload">
          <source src="../assets/audio/Konsyans/1.mp3" type="audio/mpeg">
        </audio>
        <br>
        <button class="song_title" id="1" onclick="launchNewMusic(1);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 01 - Lévé
        </button>
        <br>
        <button class="song_title" id="2" onclick="launchNewMusic(2);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 02 - Syel la tandé
        </button>
        <br>
        <button class="song_title" id="3" onclick="launchNewMusic(3);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 03 - An bato la
        </button>
        <br>
        <button class="song_title" id="4" onclick="launchNewMusic(4);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 04 - On jédi swa
        </button>
        <br>
        <button class="song_title" id="5" onclick="launchNewMusic(5);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 05 - Jénès
        </button>
        <br>
        <button class="song_title" id="6" onclick="launchNewMusic(6);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 06 - Polèt
        </button>
        <br>
        <button class="song_title" id="7" onclick="launchNewMusic(7);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 07 - An mwé
        </button>
        <div class="hidden">
          <div style="height:10px;font-size:10px;">&nbsp;</div>
        </div>
        <div style="height:10px;font-size:10px;">&nbsp;</div>
        <div style="height:6px;font-size:6px;">&nbsp;</div>
      </div>
    </div>
  </div>
</body>
<footer>
  <br>
  <p>All rights reserved © Negritube.fr</p>
  <p>Music and Video by Monsieur Philippe Blaze</p>
  <p>Site by Paullux Waffle</p>
</footer>
<script src="../assets/js/progressbar.js" crossorigin="padivw"></script>
<script src="../assets/js/graph_audio.js" crossorigin="padivw"></script>
<script type="text/javascript">
   var myaud = document.getElementById("audio");
   var song = document.getElementById('song_title');

   function launchNewMusic(trackNumber) {

     document.getElementById('song_title').style.backgroundColor = "#D88851";

     for (let i = 1; i < 8; i++) {
       document.getElementById(i).style.backgroundColor = "orange";
     }

     document.getElementById(trackNumber).style.backgroundColor = "#D88851";

     document.getElementById('audio').setAttribute('src', '../assets/audio/Konsyans/' + trackNumber + '.mp3');
     song.innerHTML=document.getElementById(trackNumber).innerHTML;

     myaud.play();
   }
 </script>
</html>