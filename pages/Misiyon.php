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
  <body>
    <div class="my_page">
      <div class="video_page">
        <a href="../index.php">
          <img class="logo" src="../assets/img/logo-negritube.png" alt="negritube">
        </a>
        <div style="height:10px;font-size:10px;">&nbsp;</div>
          <a class="title_link" href="../index.php">
            <div class="title_site">
              &nbsp;&nbsp;Negritube.fr&nbsp;&nbsp;
            </div>
          </a>
        <div class="hidden">
          <div style="height:10px;font-size:10px;">&nbsp;</div>
        </div>
        <div class="subtitle_site">
            &nbsp;&nbsp;Pour (re-)découvrir le Gwoka&nbsp;&nbsp;
        </div>
        <br>
        <?php include("raccourcis.php") ?>
        <div class="song_title" style="width: 40%;cursor: pointer;padding-bottom: 1%; margin-left: 30%;">
        Album Misiyon
        </div>
        <br>
        <canvas id='canvas' width="800" height="350" style="background-image: url('../assets/img/album cover/Misiyon.jpg');background-size: auto;"></canvas>
        <br>
        <canvas id='progress-bar' width="800" height="20" style="border:1px solid green;">canvas not supported</canvas>
        <br>
        <div class="song_title" id="song_title" style="border:2px solid #000;width: 40%;cursor: pointer;padding-bottom: 1%; margin-left: 30%; background-color: #D88851;">► Chanson 01 - West Indies Blue</div>
        <audio id="audio" controls autoplay>
          <source src="../assets/audio/Misiyon/1.mp3" type="audio/mpeg">
        </audio>
        <br>
        <button class="song_title" onclick="document.getElementById('audio').setAttribute('src', '../assets/audio/Misiyon/1.mp3');document.getElementById('song_title').innerHTML='► Chanson 01 - West Indies Blue';" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 01 - West Indies Blue
        </button>
        <br>
        <button class="song_title" onclick="document.getElementById('audio').setAttribute('src', '../assets/audio/Misiyon/2.mp3');document.getElementById('song_title').innerHTML='► Chanson 02 - Pawol A Bondyé';" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 02 - Pawol A Bondyé
        </button>
        <br>
        <button class="song_title" onclick="document.getElementById('audio').setAttribute('src', '../assets/audio/Misiyon/3.mp3');document.getElementById('song_title').innerHTML='► Chanson 03 - Fò Pa Nou Dékourajé';" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 03 - Fò Pa Nou Dékourajé
        </button>
        <br>
        <button class="song_title" onclick="document.getElementById('audio').setAttribute('src', '../assets/audio/Misiyon/4.mp3');document.getElementById('song_title').innerHTML='► Chanson 04 - Yenki Asisté';" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 04 - Yenki Asisté
        </button>
        <br>
        <button class="song_title" onclick="document.getElementById('audio').setAttribute('src', '../assets/audio/Misiyon/5.mp3');document.getElementById('song_title').innerHTML='► Chanson 05 - Tribilasiyon';" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 05 - Tribilasiyon
        </button>
        <br>
        <button class="song_title" onclick="document.getElementById('audio').setAttribute('src', '../assets/audio/Misiyon/6.mp3');document.getElementById('song_title').innerHTML='► Chanson 06 - Omaj A Vélo';" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 06 - Omaj A Vélo
        </button>
        <br>
        <button class="song_title" onclick="document.getElementById('audio').setAttribute('src', '../assets/audio/Misiyon/7.mp3');document.getElementById('song_title').innerHTML='► Chanson 07 - Sonjé Bino';" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 07 - Sonjé Bino
        </button>
        <br>
        <button class="song_title" onclick="document.getElementById('audio').setAttribute('src', '../assets/audio/Misiyon/8.mp3');document.getElementById('song_title').innerHTML='► Chanson 08 - Fòs É Kouraj';" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 08 - Fòs É Kouraj
        </button>
        <br>
        <button class="song_title" onclick="document.getElementById('audio').setAttribute('src', '../assets/audio/Misiyon/9.mp3');document.getElementById('song_title').innerHTML='► Chanson 09 - Sajès';" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 09 - Sajès
        </button>
        <br>
        <button class="song_title" onclick="document.getElementById('audio').setAttribute('src', '../assets/audio/Misiyon/10.mp3');document.getElementById('song_title').innerHTML='► Chanson 10 - Nou Mélé';" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 10 - Nou Mélé
        </button>
        <br>
        <button class="song_title" onclick="document.getElementById('audio').setAttribute('src', '../assets/audio/Misiyon/11.mp3');document.getElementById('song_title').innerHTML='► Chanson 11 - On Gran Sanblé';" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 11 - On Gran Sanblé
        </button>
        <br>
        <button class="song_title" onclick="document.getElementById('audio').setAttribute('src', '../assets/audio/Misiyon/12.mp3');document.getElementById('song_title').innerHTML='► Chanson 12 - Lésé Tè-La Touné';" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 12 - Lésé Tè-La Touné
        </button>
        <br>
      </div>
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
</html>
