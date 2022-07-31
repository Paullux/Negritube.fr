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
$fp = file($csv);
$audionumber = count($fp) - 1;
$csv = read($csv);

if (isset($_GET['track']) && $_GET['track'] <= $audionumber){
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
  <meta property="og:url" content="<?php echo "https://negritube.fr/audio-" . $track  . ".html"?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo $ogTitle ?>">
  <meta property="og:description" content="Musique Issues des Albums">
  <meta property="og:image" content="<?php echo $ogLink ?>">
  <meta property="og:locale" content="fr_FR" />

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary" />
  <meta property="twitter:domain" content="negritube.fr">
  <meta property="twitter:url" content="<?php echo "https://negritube.fr/audio-" . $track  . ".html"?>">
  <meta name="twitter:title" content="<?php echo $ogTitle ?>">
  <meta name="twitter:description" content="Musique Issue des Albums">
  <meta name="twitter:image" content="<?php echo $ogLink ?>">
  <meta name="twitter:image:alt" content="Negritube.fr" />

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
        <a href="."><img class="logo" src="../assets/img/logo-negritube.png" alt="negritube"></a>
      </div>
      <div id="item">
        <a href="." style="text-decoration: none; ">
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
      <div class="Music" onclick="togglePlay()">
        <div class='song_title aMasquer'>Chansons issues des Albums</div>
        <div class='song_title listMusicMobile' id="listeMusique" style="height: 50px;">
          <p class='Auteur' id='AuteurEnHaut'>Chansons issues des Albums</p>
          <h3 class='Titre' id='TitreEnHaut'></h3>
          <p class='Album' id='AlbumEnHaut'></p>
        </div>
        <div class="imageContainer">
          <img class="image" id="cover">
          <img class="image imgIsPlaying" id="enCoursDeLecture">
        </div>
        <br><br>
        <div class="song_title aMasquer">
          Pour relancer la lecture d'une chanson cliquez sur la partie droite
        </div>
      </div>
      <div class="song_title aMasquer descriptionPhilippe">
        <div style="text-align: left">
          GWO KA – UNE EXCELLENTE MUSIQUE DE GUADELOUPE
          <br>

          <br>
          La musique française possède son folklore ; exemple : la bourrée auvergnate. Il est vrai que ces musiques n’ont
          <br>
          pas une très grande portée, si ce n’est régionale.
          <br>
          Pourtant il existe au moins une musique folk française, à forte connotation identitaire et historique, néanmoins
          <br>
          commerciale. Je veux parler du « GWO KA ».
          <br>
          Beaucoup d’entre vous ne savent pas ce que c’est.
          <br>
          Ouvrons le dossier.
          <br>

          <br>
          Le GWO KA est la musique la plus ancienne recensée en Guadeloupe.
          <br>
          A l’instar du blues américain, le GWO KA est « né dans la douleur, au sein d’africains déportés en Guadeloupe
          <br>
          et réduits en esclavage. Il a connu l’interdit, le dénigrement, avant de se répandre dans l’archipel et sur le
          <br>
          globe comme patrimoine de grande valeur ». Une reconnaissance due à une poignée de fervents ambassadeurs
          <br>
          dont l’avocat guadeloupéen Félix COTELON. Le mercredi 26 novembre 2014, l’UNESCO a inscrit le GWO
          <br>
          KA guadeloupéen sur la liste représentative du patrimoine culturel immatériel de l’humanité.
          <br>

          <br>
          « Le GWO KA a résisté au déracinement de ces femmes et de ces hommes, aux divers traumatismes d’une
          <br>
          population sans repère qui a dû se reconstruire, se recréer ».
          <br>
          « Le GWO KA s’est finalement érigé en lien cimentant les êtres de Guadeloupe. Une genèse qui en fait une
          <br>
          musique de rézistans, un élément puissant de la lutte pour la justice, des descendants de ces personnes
          <br>
          asservies ». Pour l’église, le GWO KA était la musique du Diable. Cela ne vous rappelle rien ?
          <br>

          <br>
          « L’histoire du GWO KA est à la fois douloureuse et pleine d’espoir car elle repose sur la souffrance et la lutte
          <br>
          mais aussi sur la quête de liberté et la fête pendant les heures sombres de l’esclavage au 17ème siècle en
          <br>
          Guadeloupe. C’était avant tout une façon de résister, d’exister face à la déshumanisation de l’esclavage ». En
          <br>
          se rassemblant malgré les interdits du Code Noir, pour jouer du tambour KA, chanter et danser, les personnes
          <br>
          réduites en esclavage en ont fait un espace de résistance à la déshumanisation et à l’acculturation, assurant ainsi
          <br>
          sa viabilité. Depuis, le GWO KA se transmet de génération en génération.
          <br>

          <br>
          «Le GWO KA est l’âme de la Guadeloupe tant il est porteur de messages ».
          <br>

          <br>
          « Le GWO KA est pluriel : musique, chant, danse, pratique culturelle représentative de l’identité
          <br>
          guadeloupéenne. Il partage et rassemble car il se vit en communauté mais chacun est invité à exprimer son
          <br>
          individualité »
          <br>

          <br>
          L’instrument de musique est appelé KA, tambour rythmique « composé d’une peau de cabri (chèvre) et d’un
          <br>
          tonneau qui est la caisse de résonnance, le tout assemblé par un système de cordage et de cerclage métallique.
          <br>
          Au temps de l’esclavage, le tonneau était du matériau de récupération qui servait à conditionner la viande salée
          <br>
          ou le vin ».
          <br>

          <br>
          Les personnes asservies ont synthétisé la musique GWO KA en créant plusieurs rythmes de base dont les 7
          <br>
          principaux sont le MENNDé, le GRAJ, le TOUMBLAK, le LéWÒZ, le KALADJA, le WOULé, le
          <br>
          PAJANBEL. Il y en a d’autres qui ont été abandonnés par les tanbouyés (joueurs de KA), notamment le
          <br>
          « SOBO » rythme proche du NAYABINGHI jamaïcain.
          <br>
          L’instrument KA servait aussi aux Nèg mawon (esclaves fugitifs) à communiquer entre eux pour les réunions,
          <br>
          les alertes et toutes sortes de messages.
          <br>

          <br>
          Avec les mouvements anti assimilationnistes et anticolonialistes qui se sont développés à partir des années 60,
          <br>
          le GWO KA a quitté petit à petit l’univers des plantations de cannes et des faubourgs où les marginaux la
          <br>
          pratiquaient. Quand une femme chantait et dansait du GWO KA, elle était traitée de pute. Vers les années 70,
          <br>
          cette musique s’étend à toute la Guadeloupe et devient un espace de contestation et d’expression identitaire.
          <br>

          <br>
          Durant ces mêmes années 60 le GWO KA dit traditionnel, appelé à l’époque musique folklorique, abordait
          <br>
          souvent des thèmes d’ordre social, mais avec une connotation « doudouiste » c’est-à-dire que nombre de textes
          <br>
          évoquaient le boire, le manger, le plaisir, la légèreté.
          <br>

          <br>
          A partir des années 70, la connotation politique de la musique GWO KA a pris tout son essor et d’autres
          <br>
          instruments sont venus s’ajouter au KA : percussions, guitare, piano, cuivres et autres. C’est ainsi qu’est né le
          <br>
          GWO KA MODèN dont le père est Gérard LOCKEL.
          <br>
          Là encore, la censure a parlé. Gouvernants, médias, une partie de la population ont tout fait pour gommer, rayer
          <br>
          cette musique, des surfaces de diffusions : radios, télévisions, salles de concerts etc…
          <br>

          <br>
          C’est de cette effervescence qu’est né le ZOUK qui est une réminiscence d’un des rythmes du GWO KA : le
          <br>
          Menndé.
          <br>
          A noter que durant les années 40-50 est née la BIGUINE, une autre émanation du GWO KA ; elle est issue du
          <br>
          Graj.
          <br>

          <br>
          La musique GWO KA a donc enfanté deux musiques : BIGUINE et ZOUK, à des époques différentes.
          <br>

          <br>
          Le ZOUK est né avec le groupe KASSAV au début des années 80. Cette musique a été un vecteur économique
          <br>
          considérable durant près de 20 ans. La Guadeloupe durant ces années-là était, après l’Ile de France, la région
          <br>
          française qui rapportait le plus d’argent à la SACEM. Pourtant nous ne sommes que 400 000 habitants en
          <br>
          Guadeloupe.
          <br>
          Avec BIGARD et JOHNNY, le groupe KASSAV est l’unique groupe français à remplir le stade de France !
          <br>
          Mais il faut bien admettre que le groupe KASSAV, groupe français à part entière, est traité comme un groupe
          <br>
          français « entièrement à part… »
          <br>

          <br>
          Systématiquement zappé par le showbiz français, négligé par les médias, pourtant toujours disque d’or, de
          <br>
          platine, de diamant, depuis des décennies, KASSAV représente la France aux quatre coins du monde, avec des
          <br>
          tournées interminables… 40 ans de carrière et de succès et méconnu en France hexagonale, sauf chez les
          <br>
          antillais et africains !
          <br>
          D’ailleurs le groupe a décidé d’arrêter les tournées (l’âge peut-être…). C’est vrai qu’au bout de 10 tournées
          <br>
          mondiales, on en a fait le tour. Quel autre groupe français peut en dire autant ? Un nombre impressionnant de
          <br>
          grands concerts dont plusieurs à l’Hôtel Accor Arena : la presse, les médias hexagonaux n’en parlent pas. Le
          <br>
          groupe INDOCHINE fait petit garçon à côté, pourtant beaucoup de français pensent que c’est lui le n° 1
          <br>
          français.
          <br>

          <br>
          Appelés maîtres KA, les premiers artistes qui ont popularisé la musique GWO KA furent CARNOT, Robert
          <br>
          LOISON, Germain CALIXTE dit CHABEN (prononcer Chabin), mais le maître absolu fut Marcel LOLLIA
          <br>
          plus connu sous le nom de VéLO. Sa statue trône au milieu de la rue piétonne à Pointe-à-Pitre. C’était un
          <br>
          vagabond mi-clochard, mi-alcolo, pourtant lors de sa mort, il eut des obsèques dignes d’un chef d’Etat. C‘est le
          <br>
          seul homme qui a réuni tout un peuple autour de sa dépouille exposée sur la Place de la Victoire à Pointe-à-
          <br>
          Pitre. C’est un personnage incontournable de l’histoire musicale de la Guadeloupe.
          <br>

          <br>
          Le GWO KA MODEN que j’évoque plus haut, a été créé par Gérard LOCKEL qui a créé son propre code ; le
          <br>
          langage du GWO KA MODEN, musique atonale est extrêmement difficile d’accès pour beaucoup, mais a eu
          <br>
          le mérite d’ouvrir la voie à beaucoup de musiciens. Gérard LOCKEL a fait école. Des groupes comme KAFé
          <br>

          <br>
          KA LéVé sont nés, son leader était Edouard IGNOL dit KAFé, trompettiste de son état, lui aussi a fait école.
          <br>
          Les musiciens Robert OUMAOU, Georges TROUPé, Christian DAHOMAY faisaient partie de la 1 ère
          <br>
          génération de ce groupe.
          <br>
          Après leur séparation, Robert OUMAOU a créé le groupe GWAKASONé, Georges TROUPé a créé le groupe
          <br>
          KIMBÒL, Christian DAHOMAY a créé le groupe KATOURé.
          <br>
          Dans la 2 ème mouture du groupe de KAFé, il y avait le guitariste Christian LAVISO qui a créé son groupe,
          <br>
          HORIZON.
          <br>
          Enfin, issu de l’une des dernières vagues du groupe KAFé, j’ai créé le groupe JÒD’LA et aujourd’hui, je
          <br>
          fonctionne sous mon propre nom Philippe BLAZE.
          <br>

          <br>
          LOCKEL, KAFé, GWAKASONé, KIMBÒL, HORIZON, JÒD’LA, tous ces artistes et groupes ont produit
          <br>
          plusieurs albums. Ils font partie de l’histoire de la musique GWO KA MODEN, GWO KA EVOLUTIF ou
          <br>
          GWO KA FUSION comme aiment à le dire les médias.
          <br>

          <br>
          La musique GWO KA a de beaux jours devant elle car ceux qui la pratiquent sont dans une dimension
          <br>
          militante, identitaire et de résistance, à l’instar des prédécesseurs qui on créé et développé cette musique.
          <br>

          <br>
          Cette musique comporte différents styles ; certains sont très jazz, d’autres très pop et d’autres encore comme le
          <br>
          mien sont plus rock, mais le tout repose sur le même socle, le GWO KA TRADITIONNEL.
          <br>

          <br>
          Bien qu’elle soit reconnue comme patrimoine immatériel de l’humanité par l’UNESCO, cette musique ne passe
          <br>
          quasiment pas sur les médias de la Guadeloupe qui préfèrent de l’imitation reggae dance-hall, RNB, produite
          <br>
          par beaucoup de nos jeunes artistes.
          <br>

          <br>
          Chaque année (sauf durand la covid) se déroule le festival de GWO KA en Guadeloupe.
          <br>
          Un ethno musicologue américain (dont je ne connais pas le nom) venu en Guadeloupe lors de l’un de ces
          <br>
          festivals, a déclaré que la Guadeloupe est l’un des territoires au monde où il y a le plus de musiques à la fois
          <br>
          identitaires et commerciales.
          <br>
          Miles DAVIS lui, a dit que le zouk est une musique d’avenir. Le Brésil l’utilise sous le nom de KIZUMBA, des
          <br>
          artistes africains et franco-africains telle que Aya NAKAMURA entre autres, l’utilisent avec succès.
          <br>

          <br>
          Il n’y a que les français, qui ne reconnaissent pas ce qui est à eux quand cela vient de l’outre-mer jadis asservi.
          <br>
          Soyons positivement chauvins puisque le GWO KA est la lus belle musique de France !!!
          <br>

          <br>
          Philippe BLAZE
          <br>
        </div>
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
        L'album Éritaj est ausi disponible dans le magasin :<br>
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
        for ($i = 1; $i <= $audionumber; $i++) {
          echo "<button class='song_title button_song' id='" . $csv[$i][0] . "' onclick='launchNewMusic(" . $csv[$i][0] . ");' type='button'>
          <img class='cover' src='" . $csv[$i][4] . "' alt='cover'>
          <div class='listMusic'>
            <p class='Titre'>Titre :&nbsp;<span id='p" . $csv[$i][0] . "'>" . $csv[$i][1] . "</p>
            <p class='Auteur'>Artiste : " . $csv[$i][2] . "</p>
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
