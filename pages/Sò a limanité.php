<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Negritube.fr</title>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="../assets/js/player.js" crossorigin="paulw"></script>
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
        <div class="hidden">
          <div style="height:10px;font-size:10px;">&nbsp;</div>
        </div>
        <div style="height:10px;font-size:10px;">&nbsp;</div>
        <?php include("raccourcis.php") ?>
        <div class="player">
          <video controls playsinline autoplay controlsList="nodownload">
            <source src="../assets/videos/Sò a limanité.mp4" type="video/mp4" />
            <source src="../assets/videos/Sò a limanité.mp4" type="video/webm" />
          </video>
          <div class="controls">
            <button class="play" data-icon="P" aria-label="bascule lecture pause"></button>
            <button class="stop" data-icon="S" aria-label="stop"></button>
            <div class="timer">
              <div></div>
              <span aria-label="timer">00:00</span>
            </div>
            <button class="rwd" data-icon="B" aria-label="retour arrière"></button>
            <button class="fwd" data-icon="F" aria-label="avance rapide"></button>
          </div>
          <div style="height:10px;font-size:10px;">&nbsp;</div>
          <h3 class="song_title">
            Sò a limanité
          </h3>
          <p class="description">
            Une chanson d'actualité dans l'esprit ka évolutif, offerte aux fans et aux autres
          </p>
          <div style="height:6px;font-size:6px;">&nbsp;</div>
        </div>
      </div>
    </div>
  </body>
  <footer>
    <div style="height:30px;font-size:30px;">&nbsp;</div>
    <p>All rights reserved © Negritube.fr</p>
    <p>Music and Video by Monsieur Philippe Blaze</p>
    <p>Site by Paullux Waffle</p>
  </footer>
</html>
