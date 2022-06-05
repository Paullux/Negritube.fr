<!DOCTYPE html>
<html>
<head>
  <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="71bb40dd-296e-4604-8a7b-f47916d5ad6a" data-blockingmode="auto" type="text/javascript"></script>
  <meta charset="utf-8">
  <!-- HTML Meta Tags -->
  <title>Negritube.fr - Album Misiyon</title>
  <meta name="description" content="Album Complet Misiyon">
  <meta name="keywords" content="créole" />
  <meta name="author" content="Philippe Blaze" />
  <meta name="theme-color" content="#f6b73c" />

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://negritube.fr/pages/Misiyon.php">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Negritube.fr - Album Misiyon">
  <meta property="og:description" content="Album Complet Misiyon">
  <meta property="og:image" content="https://negritube.fr/assets/img/miniature/Misiyon.png">
  <meta property="og:locale" content="fr_FR" />

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary" />
  <meta property="twitter:domain" content="negritube.fr">
  <meta property="twitter:url" content="https://negritube.fr/pages/Misiyon.php">
  <meta name="twitter:title" content="Negritube.fr - Album Misiyon">
  <meta name="twitter:description" content="Album Complet Misiyon">
  <meta name="twitter:image" content="https://negritube.fr/assets/img/miniature/Misiyon.png">
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
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2838504479669283" crossorigin="anonymous"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-K07Z7YG6ZX"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-K07Z7YG6ZX');
  </script>

  <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="71bb40dd-296e-4604-8a7b-f47916d5ad6a" data-blockingmode="auto" type="text/javascript"></script>

  <!-- Matomo -->
  <script>
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
    _paq.push(["setCookieDomain", "*.negritube.fr"]);
    _paq.push(["setDomains", ["*.negritube.fr"]]);
    _paq.push(["setDoNotTrack", true]);
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u="//negritube.fr/matomo/";
      _paq.push(['setTrackerUrl', u+'matomo.php']);
      _paq.push(['setSiteId', '1']);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
      g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
  </script>
  <noscript><p><img src="//negritube.fr/matomo/matomo.php?idsite=1&amp;rec=1" style="border:0;" alt="" /></p></noscript>
  <!-- End Matomo Code -->
</head>
<body onload="document.getElementById(1).style.backgroundColor = '#D88851';display();">
  <div class="my_page">
    <div class="video_page">
      <div class="big-title">
        <div id="item">
          <a href="../index.php"><img class="logo" src="../assets/img/logo-negritube.png" alt="negritube"></a>
        </div>
        <div id="item">
          <a href="../index.php" style="text-decoration: none; ">
            <h1 class="title_site">
              Negritube.fr
            </h1>
          </a>
          <h2 class="subtitle_site">
            Pour (re-)découvrir le Gwoka
            <br>et autres musiques Guadeloupéennes
          </h2>
        </div>
        <div class="container" id="item">
          <h3>Changement de Thème</h3>
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
      <h3 class="song_title" id="title" style="width: 40%;padding-bottom: 1%; margin-left: 30%;">
        Album Misiyon
      </h3>
      <br>
      <div class="global-player-aud">
        <div class="myCanvas">
          <img class="img" id="img" src="../assets/img/bargraph.gif" alt="graph"/>
          <canvas class="canvas" id='canvas' width="500" height="350" style="background-image: url('../assets/img/album cover/Misiyon.jpg');"></canvas>
        </div>
        <br>
        <canvas id='progress-bar' width="800" height="20">canvas not supported</canvas>
        <br><br>
      </div>
      <div class="song_title" id="song_title" style="border:2px solid #000;width: 40%;padding-bottom: 1%; margin-left: 30%; background-color: #D88851;">► Chanson 01 - West Indies Blue</div>
      <br><br>
      <?php include("aud-player.php") ?>
      <br>
      <?php include("raccourcis horizontaux.php") ?>
      <br><br>
      <div class="song_title" id="title" style="height:auto; font-size:20pt;width: 40%;padding-top: 1%;padding-bottom: 1%; margin-left: 30%;">
        Liste des chansons de l'album (cliquez ci-dessous pour écouter un autre morceau)
      </div>
      <br>
      <button class="song_title" id="1" onclick="launchNewMusic(1);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 01 - West Indies Blue
      </button>
      <br>
      <button class="song_title" id="2" onclick="launchNewMusic(2);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 02 - Pawol A Bondyé
      </button>
      <br>
      <button class="song_title" id="3" onclick="launchNewMusic(3);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 03 - Fò Pa Nou Dékourajé
      </button>
      <br>
      <button class="song_title" id="4" onclick="launchNewMusic(4);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 04 - Yenki Asisté
      </button>
      <br>
      <button class="song_title" id="5" onclick="launchNewMusic(5);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 05 - Tribilasiyon
      </button>
      <br>
      <button class="song_title" id="6" onclick="launchNewMusic(6);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 06 - Omaj A Vélo
      </button>
      <br>
      <button class="song_title" id="7" onclick="launchNewMusic(7);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 07 - Sonjé Bino
      </button>
      <br>
      <button class="song_title" id="8" onclick="launchNewMusic(8);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 08 - Fòs É Kouraj
      </button>
      <br>
      <button class="song_title" id="9" onclick="launchNewMusic(9);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 09 - Sajès
      </button>
      <br>
      <button class="song_title" id="10" onclick="launchNewMusic(10);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 10 - Nou Mélé
      </button>
      <br>
      <button class="song_title" id="11" onclick="launchNewMusic(11);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
        ► Chanson 11 - On Gran Sanblé
      </button>
      <br>
      <button class="song_title" id="12" onclick="launchNewMusic(12);" style="width: 40%;cursor: pointer;padding-bottom: 1%;" type="button">
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
</body>
<footer>
  <br>
  <p>All rights reserved © Negritube.fr | Music and Video by Philippe Blaze | Site by Paullux Waffle</p>
</footer>
<script type="text/javascript" src="../assets/js/aud-player.js"></script>
<script type="text/javascript" src="../assets/js/Misiyon.js"></script>
</html>
