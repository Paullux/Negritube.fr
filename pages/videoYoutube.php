<?php
require 'config.php';
require_once 'vendor/autoload.php';
$track = 0;

if (isset($_GET['track']) && $_GET['track']){
  $track = htmlspecialchars($_GET["track"]);
}

$serveur = SERVEUR; $dbname = DBNAME; $user = USER; $pass = PASS;

// connect to the database
$dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$sth = $dbco->prepare("SELECT videoId, title, descr_vid, thumbnail FROM videoyt");
$sth->execute();

/* Fetch all of the remaining rows in the result set */
$results = $sth->fetchAll();

foreach ($results as $result) {
  $videoId[] = $result['videoId'];
  $title[] = $result['title'];
  $description[] = $result['descr_vid'];
  $thumbnail[] = $result['thumbnail'];
}

$ogTitle = $title[$track] . " - Negritube";
$ogLink =  $thumbnail[$track];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- HTML Meta Tags -->
  <title><?= $ogTitle ?></title>
  <meta name="description" content=<?php echo '"Clip - ' . $title[$track] . '"'?>>
  <meta name="keywords" content="créole, musique, musique créole, gwoka, gwoka evolutif, guitare, guadeloupe, Kréyol, Mizik, Mizik Kréyol, Gwoka, Gwoka Modenn, Gita, Gwadloup" />
  <meta name="author" content="Philippe Blaze" />
  <meta name="theme-color" content="#f6b73c" />

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://negritube.fr/video-<?= $videoId[$track] ?>.html'">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= $ogTitle ?>">
  <meta property="og:description" content=<?php echo '"Clip - ' . $title[$track] . '"'?>>
  <meta property="og:image" content="https://img.youtube.com/vi/<?= $videoId[$track] ?>/hqdefault.jpg">
  <meta property="og:locale" content="fr_FR" />

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary" />
  <meta property="twitter:domain" content="negritube.fr">
  <meta property="twitter:url" content="<?php echo "https://negritube.fr/video-" . $videoId[$track] . ".html"?>">
  <meta name="twitter:title" content="<?= $ogTitle ?>">
  <meta name="twitter:description" content=<?php echo '"Clip - ' . $title[$track] . '"'?>>
  <meta name="twitter:image" content="https://img.youtube.com/vi/<?= $videoId[$track] ?>/hqdefault.jpg">
  <meta name="twitter:image:alt" content="Negritube" />

  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
  <link href="../assets/css/styles-youtube.css" rel="stylesheet" />
  <link href="../assets/css/switchTheme.css" rel="stylesheet" />
  <link href="../assets/css/dark.css" rel="stylesheet" id="stylesheet" />
  <link href="../assets/css/audioplayer.css" rel="stylesheet" />
  <link href="../assets/css/aud-player.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <script src="../assets/js/switchThemePages.js" crossorigin="paulw"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="../assets/js/youtubesubmit.js" crossorigin="paulw"></script>
  <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-K07Z7YG6ZX"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2838504479669283"
     crossorigin="anonymous"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-K07Z7YG6ZX');
  </script>



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
    <script> 
    var Server = "";
    if (window.location.href.indexOf("paulluxwaffle.synology.me") > -1) {
      Server = "https://paulluxwaffle.synology.me/Multi-Plateform/";
    } else {
      Server = "https://negritube.fr/";
    }

    window.addEventListener('load', (event) => {
      window.history.replaceState('', '', Server + 'video-<?= $track ?>.html');
    });

  </script>
  <noscript><p><img src="//negritube.fr/matomo/matomo.php?idsite=1&amp;rec=1" style="border:0;" alt="" /></p></noscript>
  <!-- End Matomo Code -->
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-947003196"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-947003196');
  </script>
</head>
<body>
  <div class="my_page">
    <div class="big-title">
      <div id="item">
        <a href="."><img class="logo" src="../assets/img/logo-negritube.png" alt="negritube"></a>
      </div>
      <div id="item">
        <a href="." style="text-decoration: none; ">
          <h1 class="title_site">
            Negritube
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
    <div class="presentationClip">
        <div class="infoMusic" >
            <iframe class='video' id="video"
                src='https://www.youtube.com/embed/<?= $videoId[$track] ?>'
                title="<?= $title[$track] ?>"  
                frameborder='0' 
                allow='accelerometer; 
                autoplay; 
                clipboard-write; 
                encrypted-media; 
                gyroscope; 
                picture-in-picture; 
                web-share;' 
                allowfullscreen >
            </iframe>
            <h3 class='song_title' id='title'>
                <?= $title[$track] ?>
            </h3>
            <p class='song_title' id='description'>
                <?= $description[$track] ?>
            </p>
        </div>
        <div class="choixTitre">
            <?php
                for ($i = 0; $i < count($videoId); $i++) {
                    echo "
                    <form  id='myForm".$i."' method='post'>
                    <button type='button' class='song_title button_songV button_song videoLenght' id='sendForm".$i."' onclick='sendForm(\"".$i."\", \"".htmlspecialchars($videoId[$i], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5)."\", \"".htmlspecialchars($title[$i], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5).".\", \"".strip_tags(htmlspecialchars($description[$i]), ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5)."\"); return false;'>
                        <img class='coverV' id='miniature" . $i . "' src='https://img.youtube.com/vi/" . $videoId[$i] . "/hqdefault.jpg' alt='miniature'>
                        <div class='listMusic'>
                        <p class='Titre'><span style='font-size: 1.5em;' class='Titre' id='p" . $i . "'>" . $title[$i] . "</span></p>
                        <p class='description'><span class='description' id='description" . $i . "' style='visibilty: hidden;'>" . $description[$i] . "</span></p>
                        </div>
                    </button>
                    </form>";
                }
            ?>
        </div>
    </div>
    <div class="basDePageClip">
      <footer>
        <h2><a class='callAudio' href='https://www.negritube.fr/pages/mentions-legales.php'>Mentions Légales</a></h2>
        <p>All rights reserved © Negritube.fr | Music and Video by Philippe Blaze | Site by Paullux Waffle</p>
      </footer>
      <br>
    </div>
</body>
<script type="text/javascript">
  window.numberOfLine = <?php echo count($videoId); ?>;
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="../assets/js/youtubesubmit.js" ></script>
<script src="../assets/js/landscapeWarning.js" crossorigin="paulw"></script>
</html>
