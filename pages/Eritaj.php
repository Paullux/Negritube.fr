<!DOCTYPE html>
<html>
<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="71bb40dd-296e-4604-8a7b-f47916d5ad6a" data-blockingmode="auto" type="text/javascript"></script>
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
  <link href="../assets/css/switchTheme.css" rel="stylesheet" />
  <link href="../assets/css/dark.css" rel="stylesheet" id="stylesheet" />
  <link href="../assets/css/audioplayer.css" rel="stylesheet" />
  <link href="../assets/css/aud-player.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <script src="../assets/js/switchThemePages.js" crossorigin="paulw"></script>

  <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2838504479669283"
  crossorigin="anonymous"></script>
  <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="71bb40dd-296e-4604-8a7b-f47916d5ad6a" data-blockingmode="auto" type="text/javascript"></script>
</head>
<body onload="document.getElementById(1).style.backgroundColor = '#D88851';">
  <div class="my_page">
    <div class="video_page">
      <div class="big-title">
        <div id="item">
          <a href="../index.php"><img class="logo" src="../assets/img/logo-negritube.png" alt="negritube"></a>
        </div>
        <div id="item">
          <h1 class="title_site">
            Negritube.fr
          </h1>
          <h2 class="subtitle_site">
            Pour (re-)découvrir le Gwoka
            <br>(une musique traditionnelle<br>Guadeloupéenne)
          </h2>
        </div>
        <div class="container" id="item">
          <h1>Changement de Thème</h1>
          <label id="switch" class="switch">
            <input type="checkbox" onchange="toggleTheme()" id="slider">
            <span class="slider round"></span>
          </label>
          <!-- <button id="switch" onclick="toggleTheme()">Switch</button> -->
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>
      <h3 class="song_title" id="title" style="width: 40%;cursor: pointer;padding-bottom: 1%; margin-left: 30%;">
        Album Eritaj (Extrait)
      </h3>
      <br>
      <div class="myCanvas">
        <img class="img" id="img" src="../assets/img/bargraph.gif" alt="graph"/>
        <canvas class="canvas" id='canvas' width="800" height="350" style="background-image: url('../assets/img/album cover/Eritaj.jpg');background-size: cover;"></canvas>
      </div>
      <br>
      <canvas id='progress-bar' width="800" height="20" style="border:1px solid green;">canvas not supported</canvas>
      <br>
      <div class="song_title" id="song_title" style="border:2px solid #000;width: 40%;cursor: pointer;padding-bottom: 1%; margin-left: 30%; background-color: #D88851;">
        ► Chanson 01 - A prèzan
      </div>
      <br><br>
      <?php include("aud-player.php") ?>
      <?php include("raccourcis horizontaux.php") ?>
      <br><br>
      <p class="description" id="obtension" style="border:2px solid #000;width: 37%;padding-bottom: 1%; margin-left: auto; margin-right: auto; background-color: rgba(255,165,0,.5);">
        Pour acheter cet album rendez vous au siège de COM.G en Guadeloupe, l'entreprise se situe au 73 rue Jean Jaurès 97110 à Pointe à Pitre.
        <br>
        L'entreprise est joignable au <br>(+590) 06 90 76 25 18.
        <br>
        ______
        <br><br>
        L'album est ausi disponible dans le magasin :<br>
        Blazing Music<br>
        138-140 rue des Rosiers<br>
        (Marché Dauphine Stand 228)<br>
        93400  Saint-Ouen<br><br>
        Il est possible de commander en ligne l'album sur le : <br><a href=https://blazingmusicshop.com/products/philippe-blaze-eritaj target="_blank" style="color:black;">site web de Blazing Music</a>
      </p>
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
  <p>All rights reserved © Negritube.fr | Music and Video by Philippe Blaze | Site by Paullux Waffle</p>
</footer>
<script type="text/javascript" src="../assets/js/aud-player.js"></script>
<script type="text/javascript" src="../assets/js/Eritaj.js"></script>
</html>
