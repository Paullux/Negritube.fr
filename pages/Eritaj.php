<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- HTML Meta Tags -->
    <title>Negritube.fr - Album Eritaj</title>
    <meta name="description" content="Album Eritaj (Extrait)">
    <meta name="keywords" content="créole" />
    <meta name="author" content="Philippe Blaze" />
    <meta name="theme-color" content="#f6b73c" />

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://negritube.fr/pages/Eritaj.php">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Negritube.fr - Album Eritaj">
    <meta property="og:description" content="Album Eritaj (Extrait)">
    <meta property="og:image" content="https://negritube.fr/assets/img/miniature/Eritaj.png">
    <meta property="og:locale" content="fr_FR" />

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary" />
    <meta property="twitter:domain" content="negritube.fr">
    <meta property="twitter:url" content="https://negritube.fr/pages/Eritaj.php">
    <meta name="twitter:title" content="Negritube.fr - Album Eritaj">
    <meta name="twitter:description" content="Album Eritaj (Extrait)">
    <meta name="twitter:image" content="https://negritube.fr/assets/img/miniature/Eritaj.png">
    <meta name="twitter:image:alt" content="Negritube.fr" />

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
        <h3 class="song_title" id="title" style="width: 40%;cursor: pointer;padding-bottom: 1%; margin-left: 30%;">
          Album Eritaj (Extrait)
        </h3>
        <br>
        <canvas id='canvas' width="800" height="350" style="background-image: url('../assets/img/album cover/Eritaj.jpg');background-size: cover;"></canvas>
        <br>
        <canvas id='progress-bar' width="800" height="20" style="border:1px solid green;">canvas not supported</canvas>
        <br>
        <div class="song_title" id="song_title" style="border:2px solid #000;width: 40%;cursor: pointer;padding-bottom: 1%; margin-left: 30%; background-color: #D88851;">
          ► Chanson 01 - A prèzan
        </div>
        <br><br>
        <audio id="audio" controls autoplay preload="auto" autobuffer controlsList="nodownload" oncontextmenu="return false" onplay="playAud();">
          <source src="../assets/audio/Eritaj/1.mp3" type="audio/mpeg" />
        </audio>
        <br><br>
        <div class="song_title" id="obtension" style="border:2px solid #000;width: 40%;cursor: pointer;padding-bottom: 1%; margin-left: 30%; background-color: rgba(255,165,0,.5);">
          Pour acheter cet album rendez vous au siège de COM.G en Guadeloupe, l'entreprise se situe au 73 rue Jean Jaurès 97110 à Pointe à Pitre
        </div>
        <br>
        <button class="song_title" id="1" onclick="launchNewMusic(1);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
          ► Chanson 01 - A prèzan
        </button>
        <br>
        <button class="song_title" id="2" onclick="launchNewMusic(2);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
          ► Chanson 02 - Blagamas
        </button>
        <br>
        <button class="song_title" id="3"  onclick="launchNewMusic(3);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
          ► Chanson 03 - Jòd'la
        </button>
        <br>
        <button class="song_title" id="4" onclick="launchNewMusic(4);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
          ► Chanson 04 - Vyé zèb
        </button>
        <br>
        <button class="song_title" id="5" onclick="launchNewMusic(5);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
          ► Chanson 05 - Piétòn-la
        </button>
        <br>
        <button class="song_title" id="6" onclick="launchNewMusic(6);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
          ► Chanson 06 - Latina
        </button>
        <br>
        <button class="song_title" id="7" onclick="launchNewMusic(7);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
          ► Chanson 07 - Mèsi Bondyé
        </button>
        <br>
        <button class="song_title" id="8" onclick="launchNewMusic(8);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
          ► Chanson 08 - Dlo
        </button>
        <br>
        <button class="song_title" id="9" onclick="launchNewMusic(9);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
          ► Chanson 09 - Fawniennt'
        </button>
        <br>
        <button class="song_title" id="10" onclick="launchNewMusic(10);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
          ► Chanson 10 - Fiyansaiy
        </button>
        <br>
        <button class="song_title" id="11" onclick="launchNewMusic(11);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
          ► Chanson 11 - Twopik
        </button>
        <br>
        <button class="song_title" id="12" onclick="launchNewMusic(12);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
          ► Chanson 12 - Zépon
        </button>
        <br>
        <button class="song_title" id="13" onclick="launchNewMusic(13);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
          ► Chanson 13 - Jwé mizik
        </button>
        <br>
      </div>
      <div class="hidden">
        <div style="height:10px;font-size:10px;">&nbsp;</div>
      </div>
      <div style="height:10px;font-size:10px;">&nbsp;</div>
      <div style="height:6px;font-size:6px;">&nbsp;</div>
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
    var k = setInterval("pauseAud()", 20000);
    var song = document.getElementById('song_title');

    function launchNewMusic(trackNumber) {

      document.getElementById('song_title').style.backgroundColor = "#D88851";

      for (let i = 1; i < 14; i++) {
        document.getElementById(i).style.backgroundColor = "orange";
      }

      document.getElementById(trackNumber).style.backgroundColor = "#D88851";

      document.getElementById('audio').setAttribute('src', '../assets/audio/Eritaj/' + trackNumber + '.mp3');
      song.innerHTML=document.getElementById(trackNumber).innerHTML;
      myaud.play();
      clearInterval(k);
      k = setInterval("pauseAud()", 20000);
    }

    function playAud() {
      if (song.innerHTML.endsWith(" - Fin de l'Extrait")) {
        song.innerHTML = rmEnd(song.innerHTML, " - Fin de l'Extrait");
      }
      song.style.backgroundColor = "#D88851";
      myaud.play();
      clearInterval(k);
      k = setInterval("pauseAud()", 20000);
    }

    function pauseAud() {
      myaud.pause();
      myaud.currentTime=0;
      song.style.backgroundColor = "#c7432e";
      song.innerHTML+=" - Fin de l'Extrait";
      clearInterval(k);
    }

    function rmEnd(str, ending){
      return str.slice(0, -ending.length);
    }
  </script>
</html>
