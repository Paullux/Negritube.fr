<?php
function read($csv){
  $file = fopen($csv, 'r');
  while (!feof($file) ) {
    $line[] = fgetcsv($file, 1024);
  }
  fclose($file);
  return $line;
}

function rel2abs( $rel, $base )
{
    /* return if already absolute URL */
    if( parse_url($rel, PHP_URL_SCHEME) != '' )
        return( $rel );

    /* queries and anchors */
    if( $rel[0]=='#' || $rel[0]=='?' )
        return( $base.$rel );

    /* parse base URL and convert to local variables:
       $scheme, $host, $path */
    extract( parse_url($base) );

    /* remove non-directory element from path */
    $path = preg_replace( '#/[^/]*$#', '', $path );

    /* destroy path if relative url points to root */
    if( $rel[0] == '/' )
        $path = '';

    /* dirty absolute URL */
    $abs = '';

    /* do we have a user in our URL? */
    if( isset($user) )
    {
        $abs.= $user;

        /* password too? */
        if( isset($pass) )
            $abs.= ':'.$pass;

        $abs.= '@';
    }

    $abs.= $host;

    /* did somebody sneak in a port? */
    if( isset($port) )
        $abs.= ':'.$port;

    $abs.=$path.'/'.$rel;

    /* replace '//' or '/./' or '/foo/../' with '/' */
    $re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
    for( $n=1; $n>0; $abs=preg_replace( $re, '/', $abs, -1, $n ) ) {}

    /* absolute URL is ready! */
    return( $scheme.'://'.$abs );
}

$csv = '../assets/csv/audio.csv';
$csv = read($csv);

if (isset($_GET['track']) && $_GET['track'] <= 33){
  $track = htmlspecialchars($_GET["track"]);
} else {
  $track = 1;
}

$ogTitle = "Negritube.fr - " . $csv[$track][2] . " : " . $csv[$track][1];
$ogLink =  rel2abs($csv[$track][4], "https://www.negritube.fr/pages/");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- HTML Meta Tags -->
  <title><?php echo $ogTitle ?></title>
  <meta name="description" content="Musique Issue des Albums">
  <meta name="keywords" content="créole" />
  <meta name="author" content="Philippe Blaze" />
  <meta name="theme-color" content="#f6b73c" />

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://negritube.fr/pages/AudioFile.php">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo $ogTitle ?>">
  <meta property="og:description" content="Musique Issues des Albums">
  <meta property="og:image" content="<?php echo $ogLink ?>">
  <meta property="og:locale" content="fr_FR" />

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary" />
  <meta property="twitter:domain" content="negritube.fr">
  <meta property="twitter:url" content="https://negritube.fr/pages/AudioFile.php">
  <meta name="twitter:title" content="<?php echo $ogTitle ?>">
  <meta name="twitter:description" content="Musique Issue des Albums">
  <meta name="twitter:image" content="<?php echo $ogLink ?>">
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
<body> <!-- onload="document.getElementById(1).style.backgroundColor = '#D88851';">² -->
  <div id="turnDeviceNotification"></div>
  <div class="my_page">
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
    <div class="presentation">
      <div class="Music"  onclick="togglePlay()">
        <h3 class="song_title" id="title">
          Chansons issues des Albums
        </h3>
        <div class="song_title aMasquer">
          Pour relancer la lecture d'une chanson cliquez sur la partie droite
        </div>
        <div class="imageContainer">
          <img class="image" id="cover">
          <img class="image imgIsPlaying" id="enCoursDeLecture">
        </div>
      </div>
      <div class="song_title aMasquer descriptionPhilippe">
        Philippe BLAZE est un artiste guadeloupéen, il est musicien dont le style musical principal est le Gwoka Évolutif.
        À la fois artiste qui régulièrement monte sur scène, il est aussi professeur de musique dans plusieurs établissements.
        <br>
        ______
        <br>
        Pour acheter un de ses albums rendez vous au siège de COM.G en Guadeloupe, l'entreprise se situe au 73 rue Jean Jaurès 97110 à Pointe à Pitre.
        <br>
        ______
        <br>
        L'entreprise est joignable au <br>(+590) 06 90 76 25 18.
        <br>
        ______
        <br><br>
        L'album Eritaj est ausi disponible dans le magasin :<br>
        Blazing Music<br>
        138-140 rue des Rosiers<br>
        (Marché Dauphine Stand 228)<br>
        93400  Saint-Ouen<br><br>
        Il est possible de commander en ligne l'album sur le : <br><a href=https://blazingmusicshop.com/products/philippe-blaze-eritaj target="_blank" style="color:black;">site web de Blazing Music</a>
      </div>
      <div class="choixTitreAudio">
        <?php
        for ($i = 1; $i <= 33; $i++) {
          echo "<button class='song_title button_song' id='" . $csv[$i][0] . "' onclick='launchNewMusic(" . $csv[$i][0] . ");' type='button'>
          <img class='cover' src='" . $csv[$i][4] . "' alt='cover'>
          <div class='listMusic'>
          <h3 class='Titre'>Titre :&nbsp;<span id='p" . $csv[$i][0] . "'>" . $csv[$i][1] . "</h3>
          <p class='Auteur'>Auteur : " . $csv[$i][2] . "</p>
          <p class='Album'>Album : " . $csv[$i][3] . "</p>
          </div>
          </button>";
        }
        ?>
      </div>
    </div>
    <div class="basDePage">
      <footer>
        <p>All rights reserved © Negritube.fr | Music and Video by Philippe Blaze | Site by Paullux Waffle</p>
      </footer>
      <div class="monAudioPlayer">
        <canvas class="canvas" id='canvas' width="800" height="250"></canvas>
        <canvas class="progressBar" id='progressBar' width="800" height="1"></canvas>
        <?php include("aud-player.php") ?>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript" src="../assets/js/aud-player.js"></script>
<script type="text/javascript" src="../assets/js/AudioFile.js"></script>
<script src="../assets/js/landscapeWarning.js" crossorigin="paulw"></script>
</html>
