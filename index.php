<?php
session_start();
unset($_SESSION['email'], $_SESSION['derniere_action']);
session_destroy();

$dir    = 'assets/img/miniature/';
$miniature = scandir($dir, SCANDIR_SORT_ASCENDING);

$dir    = 'assets/img/album cover/';
$cover = scandir($dir, SCANDIR_SORT_ASCENDING);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- HTML Meta Tags -->
  <title>Gwoka de Guadeloupe - Negritube</title>

  <meta name="description" content="pour (re-)découvrir le gwoka, musique de Guadeloupe.">
  <meta name="keywords" content="créole, musique, musique créole, gwoka, gwoka evolutif, guitare, guadeloupe, Kréyol, Mizik, Mizik Kréyol, Gwoka, Gwoka Modenn, Gita, Gwadloup" />
  <meta name="author" content="Philippe Blaze" />
  <meta name="theme-color" content="#f6b73c" />

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://negritube.fr/">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Gwoka de Guadeloupe - Negritube">
  <meta property="og:description" content="pour (re-)découvrir le gwoka, musique de Guadeloupe.">
  <meta property="og:image" content="https://negritube.fr/assets/img/Carte-og.png">
  <meta property="og:locale" content="fr_FR" />

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary" />
  <meta property="twitter:domain" content="negritube.fr">
  <meta property="twitter:url" content="https://negritube.fr/">
  <meta name="twitter:title" content="Gwoka de Guadeloupe - Negritube">
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
  <script type="text/javascript">
    window.Miniatures = [];
    window.Covers = [];
    var miniatureIci = "";
    var coverIci = "";    
    for (i = 0; i < 42 ; i++) {
        miniatureIci = i+'.jpg';
        window.Miniatures.push("assets/img/youtubethumbnails/" + miniatureIci);
    }
    <?php
      for ($i = 2; $i < count($cover) ; $i++) {
        if ($cover[$i] !== 'Thumbs.db' && $cover[$i] !== '@eaDir') {
          echo 'coverIci = "'.$cover[$i].'";
                window.Covers.push("assets/img/album cover/" + coverIci);
          ';
        }
      }
    ?>
  </script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2838504479669283"
     crossorigin="anonymous"></script>
  <script>
    if (window.location.href.indexOf("paulluxwaffle.synology.me") > -1) {
      Server = "https://paulluxwaffle.synology.me/Multi-Plateform/";
    } else {
      Server = "https://negritube.fr/";
    }
    window.history.replaceState('', '', Server);
  </script>
  <!--Cookies-->
  <script src="assets/js/cookieconsent.min.js" data-cfasync="false"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/cookieconsent.min.css" />
  <!-- Fin Cookies -->
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-K07Z7YG6ZX"></script>
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
<body id="bodyIndex">
  <div id="turnDeviceNotification"></div>
  <div class="index" style="align-items:center;">
    <div class="big-title">
      <div id="item">
        <a href="index.php"><img class="logo" src="assets/img/logo-negritube.png" alt="negritube"></a>
      </div>
      <div id="item">
        <a href="index.php" style="text-decoration: none; ">
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
    <div class="presentationIndex">
      <nav>
        <div class="Bouton_Menu" onclick="open_menu();">
          <img id="lebouton" src="assets/img/Menu.png" alt="Menu">
          <p>
            Menu
          </p>
        </div>
        <div id="Menu_Cache">
          <li><a href="video-1.html">Les Clips</a></li>
          <li><a href="audio-1.html">Les Albums</a></li>
          <li><a href="contact.html" rel="nofollow">Prise de Contact</a></li>
          <li><a href="about.html">Parcours de Philippe BLAZE</a></li>
        </div>
      </nav>
      <div class="link_song miniatureandcover">
        <a class="miniature box" id="Miniatures" href="video-1.html" onmouseover="launchWait(0);" onmouseout="cancelWait();">
          <img src="assets/img/musicplayer.png" alt="YT" class="src">
          <h3 class="typeOfContent">
            Les Clips
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </a>
        <div class="zoom box">
          <img class="affiche" src="assets/img/affiche.jpg" />
        </div>
        <a class="albumCover box" id="Covers" href="audio-1.html" onmouseover="launchWait(1);" onmouseout="cancelWait();">
          <h3 class="typeOfContent">
            Les Albums
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </a>
        <div class="box song_title aMasquer descriptionPhilippe textesinfos" style="height:480px;">
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
        </div>
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
    <!-- Cookies -->
    <script>
    window.cookieconsent.initialise({
      "palette": {
        "popup": {
          "background": "#332237"
        },
        "button": {
          "background": "#3D3E70"
        }
      },
      "theme": "classic",
      "position": "top-right",
      "content": {
        "message": "Ce site web utilise des cookies afin de vous proposer une meilleure expérience de navigation.",
        "dismiss": "OK",
        "link": "En savoir plus...",
        "href": "mentions-legales.html"
      }
    });
    </script>
</body>
<footer class="footerIndex">
  <?php
    require_once(dirname(__FILE__) . '/pages/footer.php');
  ?>
  <p>All rights reserved © Negritube.fr | Music and Video by Philippe Blaze | Site by Paullux Waffle</p>
</footer>
<script src="assets/js/index.js" crossorigin="paulw"></script>
<script src="assets/js/menu.js" crossorigin="paulw"></script>
<script src="assets/js/landscapeWarning.js" crossorigin="paulw"></script>
</html>
