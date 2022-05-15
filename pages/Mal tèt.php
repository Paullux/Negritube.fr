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
    <style>
    .left_col {
      height: 25%;
    }
    </style>
  </head>
  <body>
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
        <?php include("raccourcis.php") ?>
        <h3 class="song_title" style="width: 40%;cursor: pointer;padding-bottom: 1%; margin-left: 30%;">
          Chanson Mal tèt
        </h3>
        <br>
        <canvas id='canvas' width="800" height="350"></canvas>
        <br>
        <canvas id='progress-bar' width="800" height="20" style="border:1px solid green;">canvas not supported</canvas>
        <br>
        <audio src="../assets/audio/Mal tèt.mp3" id="audio" controls autoplay controlsList="nodownload"></audio>
        <br>
        <button class="song_title" onclick="document.getElementById('audio').setAttribute('src', '../assets/audio/Mal tèt.mp3');" style="background-color: #D88851; border:2px solid #000;width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
          ► Philippe Blaze - Mal tèt
        </button>
        <div class="hidden">
          <div style="height:10px;font-size:10px;">&nbsp;</div>
        </div>
        <div style="height:10px;font-size:10px;">&nbsp;</div>
        <div style="height:6px;font-size:6px;">&nbsp;</div>
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
  <script src="../assets/js/graph_audio.js" crossorigin="paulw"></script>
</html>
