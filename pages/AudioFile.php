<?php
require 'config.php';

if (isset($_GET['track']) && $_GET['track']){
  $track = htmlspecialchars($_GET["track"]);
} else {
  $track = 1;
}

if ($track == 0) $track == 1;
$index = intval($track) - 1;

$serveur = SERVEUR; $dbname = DBNAME; $user = USER; $pass = PASS;

// connect to the database
$dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// prepare the statement
$sth = $dbco->prepare("SELECT * FROM musiques WHERE Numero = :Numero");

// bind the parameters
$sth->bindParam(':Numero', $track);

// execute the statement
$sth->execute();

// fetch the result
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

if (empty($result)) {
  // bind the parameters
  $sth->bindParam(':Numero', 1);

  // execute the statement
  $sth->execute();

  // fetch the result
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);

}

$result = $result[0];

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

$ogTitle = $result['Artiste'] . ", " . $result['Titre'] . " - Negritube";
$ogLink =  rel2abs($result['pochette'], "https://www.negritube.fr/pages/");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- HTML Meta Tags -->
  <title><?php echo $ogTitle ?></title>
  <meta name="description" content=<?php echo '"Album ' . $result["Album"] . ' - de l\'artiste ' . $result["Artiste"] . ' - Chanson ' . $result["Titre"] . '"'; ?> >
  <meta name="keywords" content="créole, musique, musique créole, gwoka, gwoka evolutif, guitare, guadeloupe, Kréyol, Mizik, Mizik Kréyol, Gwoka, Gwoka Modenn, Gita, Gwadloup" />
  <meta name="author" content="Philippe Blaze" />
  <meta name="theme-color" content="#f6b73c" />

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="<?php echo "https://negritube.fr/audio-" . $track  . ".html"?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= $ogTitle ?>">
  <meta property="og:description" content=<?php echo '"Album ' . $result["Album"] . ' - de l\'artiste ' . $result["Artiste"] . ' - Chanson ' . $result["Titre"] . '"' ?>>
  <meta property="og:image" content="<?= $ogLink ?>">
  <meta property="og:locale" content="fr_FR" />

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary" />
  <meta property="twitter:domain" content="negritube">
  <meta property="twitter:url" content="<?php echo "https://negritube.fr/audio-" . $track  . ".html"?>">
  <meta name="twitter:title" content="<?= $ogTitle ?>">
  <meta name="twitter:description" content=<?php echo '"Album ' . $result["Album"] . ' - de l\'artiste ' . $result["Artiste"] . ' - Chanson ' . $result["Titre"] . '"' ?>>
  <meta name="twitter:image" content="<?= $ogLink ?>">
  <meta name="twitter:image:alt" content="Negritube" />

  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
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
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2838504479669283"
     crossorigin="anonymous"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-K07Z7YG6ZX"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-K07Z7YG6ZX');
  </script>

  <!--<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="71bb40dd-296e-4604-8a7b-f47916d5ad6a" data-blockingmode="auto" type="text/javascript"></script>-->

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
      window.history.replaceState('', '', Server + 'audio-'+<?= $result['Numero'] ?>+'.html');
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
<body> <!-- onload="document.getElementById(1).style.backgroundColor = '#D88851';">² -->
  <?php
    // prepare the statement
    $sth = $dbco->prepare("SELECT * FROM musiques");

    // execute the statement
    $sth->execute();

    // fetch the result
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <div id="turnDeviceNotification"></div>
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
    <div class="presentation">
      <div class="Music" onclick="togglePlay()">
        <div class='song_title aMasquer'>Chansons issues des Albums</div>
        <div class='song_title listMusicMobile' id="listeMusique" style="height: 50px;">
          <p class='Auteur' id='AuteurEnHaut'><?= $result[$i]['Artiste'] ?></p>
          <h3 class='Titre' id='TitreEnHaut'><?= $result[$index]['Titre'] ?></h3>
          <p class='Album' id='AlbumEnHaut'><?= $result[$index]['Album'] ?></p>
        </div>
        <div class="imageContainer">
          <img class="image coverAudio" id="cover" src= `<?= $result[$index]['pochette'] ?>`>
          <img hidden class="image imgIsPlaying" src="" id="enCoursDeLecture">
        </div>
        <br><br>
        <div class="song_title aMasquer">
          Pour écouter des chansons, cliquez sur la partie droite
        </div>
      </div>
      <div class="song_title aMasquer descriptionPhilippe">
        <br><br><br>
        Pour acheter un de ses albums rendez vous au siège de COM.G en Guadeloupe, l'entreprise se situe au 73 rue Jean Jaurès 97110 à Pointe à Pitre.
        <br>
        ______
        <br>
        L'entreprise est joignable au <br>(+590) 06 90 76 25 18.
        <br>
        ______
        <br><br>
        L'album Éritaj est aussi disponible dans le magasin :<br>
        Blazing Music<br>
        138-140 rue des Rosiers<br>
        (Marché Dauphine Stand 228)<br>
        93400  Saint-Ouen<br><br>
        Il est possible de commander en ligne l'album sur le : <br><a href=https://blazingmusicshop.com/products/philippe-blaze-eritaj target="_blank" style="color:black;">site web de Blazing Music</a>
        <br>
        ______
        <br>
        L'album Éritaj se trouve aussi en téléchargement sur Amazon : <br><a href=https://www.amazon.fr/dp/B086HPCRS5?tag=amz-mkt-chr-fr-21&ascsubtag=1ba00-01000-org00-win10-other-nomod-fr000-pcomp-feature-scomp-feature-scomp&ref=aa_scomp target="_blank"  style="color:black;">Éritaj</a>
      </div>
      <div class="choixTitreAudio">
        <?php
          for ($i = 0; $i < count($result); $i++) {
            echo "<button class='song_title button_song' id='" . $result[$i]['Numero'] . "' onclick='launchNewMusic(\"" . $result[$i]['Numero'] . "\");' type='button'>
              <img class='cover coverLength' id='cover" . $result[$i]['Numero'] . "' src='" . $result[$i]['pochette'] . "' alt='cover'>
              <div class='listMusic'>
                <p class='Titre'>Titre :&nbsp;<span id='p" . $result[$i]['Numero'] . "'>" . $result[$i]['Titre'] . "</span></p>
                <p class='Auteur'>Artiste : <span id='Auteur" . $result[$i]['Numero'] . "'>" . $result[$i]['Artiste'] . "</span></p>
                <p class='Album'>Album : <span id='Album" . $result[$i]['Numero'] . "'>" . $result[$i]['Album'] . "</span></p>
              </div>
            </button>
            ";
          }
        ?>
      </div>
    </div>
    <div class="basDePage">
      <footer>
        <h2><a class='callAudio' href='https://www.negritube.fr/pages/mentions-legales.php'>Mentions Légales</a></h2>
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
<script type="text/javascript">
  window.numberOfLine = <?php echo count($result); ?>;
</script>
<script type="text/javascript" src="../assets/js/aud-player.js"></script>
<script type="text/javascript" src="../assets/js/AudioFile.js"></script>
<script src="../assets/js/landscapeWarning.js" crossorigin="paulw"></script>
</html>
