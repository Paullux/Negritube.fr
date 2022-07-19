<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- HTML Meta Tags -->
  <title>Negritube.fr</title>
  <meta name="description" content="pour (re-)découvrir le gwoka, musique de Guadeloupe.">
  <meta name="keywords" content="créole" />
  <meta name="author" content="Philippe Blaze" />
  <meta name="theme-color" content="#f6b73c" />

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://negritube.fr/">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Negritube.fr">
  <meta property="og:description" content="pour (re-)découvrir le gwoka, musique de Guadeloupe.">
  <meta property="og:image" content="https://negritube.fr/assets/img/Carte-og.png">
  <meta property="og:locale" content="fr_FR" />

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary" />
  <meta property="twitter:domain" content="negritube.fr">
  <meta property="twitter:url" content="https://negritube.fr/">
  <meta name="twitter:title" content="Negritube.fr">
  <meta name="twitter:description" content="pour (re-)découvrir le gwoka, musique de Guadeloupe.">
  <meta name="twitter:image" content="https://negritube.fr/assets/img/Carte-Twitter.png">
  <meta name="twitter:image:alt" content="Negritube.fr" />

  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
  <link href="assets/css/styles.css" rel="stylesheet" />
  <link href="assets/css/switchTheme.css" rel="stylesheet" />
  <link href="assets/css/dark.css" rel="stylesheet" id="stylesheet" />
  <link href="assets/css/index.css" rel="stylesheet" />
  <link href="assets/css/affiche.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <script src="assets/js/anim.js" crossorigin="paulw"></script>
  <script src="assets/js/switchTheme.js" crossorigin="paulw"></script>
  <script>
    if (window.location.href.indexOf("paulluxwaffle.synology.me") > -1) {
      Server = "https://paulluxwaffle.synology.me/Multi-Plateform/";
    } else {
      Server = "https://negritube.fr/";
    }
    window.history.replaceState('', '', Server);
  </script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-K07Z7YG6ZX"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-K07Z7YG6ZX');
  </script>

  <!-- Clarity tracking code for https://negritube.fr/ -->
  <script>
  (function(c,l,a,r,i,t,y){
    c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
    t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i+"?ref=bwt";
    y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
  })(window, document, "clarity", "script", "c73v5s2zme");
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
<body>
  <div id="turnDeviceNotification"></div>
  <div class="index" style="align-items:center;">
    <div class="big-title">
      <div id="item">
        <a href="index.php"><img class="logo" src="assets/img/logo-negritube.png" alt="negritube"></a>
      </div>
      <div id="item">
        <a href="index.php" style="text-decoration: none; ">
          <h1 class="title_site">
            Negritube.fr
          </h1>
        </a>
        <h2 class="subtitle_site">
          Pour (re-)découvrir le Gwoka,
          <br>une musique de Guadeloupe !
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
    <div class="presentationIndex">
      <nav>
        <div class="Bouton_Menu" onclick="open_menu();">
          <img id="lebouton" src="assets/img/Menu.png" alt="Menu">
          <p>
            Menu
          </p>
        </div>
        <div id="Menu_Cache">
          <li><a href="video-0.html">Les Clips</a></li>
          <li><a href="audio-1.html">Les Albums</a></li>
          <li><a href="contact.html">Negritube.fr - Prise de Contact</a></li>
        </div>
      </nav>
      <div class="link_song miniatureandcover">
        <a class="miniature box" href="video-0.html" onmouseover="launchWait(0);" onmouseout="cancelWait();">
          <h3 class="typeOfContent">
            Les Clips
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </a>
        <div class="zoom box">
          <img class="affiche" src="assets/img/affichePlublication.jpg" />
        </div>
        <a class="albumCover box" href="audio-1.html" onmouseover="launchWait(1);" onmouseout="cancelWait();">
          <h3 class="typeOfContent">
            Les Albums
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </a>
        <?
          $csv = 'assets/csv/audio.csv';
          $fp = file($csv);
          $audionumber = count($fp) - 1;

          for ($i = 2; $i <= $audionumber; $i++) {
            echo '<a style="display: none" href="audio-' . $i . '.html">a</a>';
          }

          $csv = 'assets/csv/video.csv';
          $fp = file($csv);
          $videonumber = count($fp) - 2;

          for ($i = 1; $i <= $videonumber; $i++) {
            echo '<a style="display: none" href="video-' . $i . '.html">a</a>';
          }
        ?>
      </div>
    </div>
    <div class="basDePageIndex">
      <div class="visiteurs">
        Nombre de visiteurs sur le site :
      </div>
      <a class="compteur" href="https://www.mon-compteur.fr">
        <img src="https://www.mon-compteur.fr/html_c01genv2-235526-6" border="0" />
      </a>
    </div>
  </div>
</body>
<footer class="footerIndex">
  <p>All rights reserved © Negritube.fr | Music and Video by Philippe Blaze | Site by Paullux Waffle</p>
</footer>
<script src="assets/js/menu.js" crossorigin="paulw"></script>
<script src="assets/js/landscapeWarning.js" crossorigin="paulw"></script>
</html>
