<!DOCTYPE html>
<html>
<head>
  <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="71bb40dd-296e-4604-8a7b-f47916d5ad6a" data-blockingmode="auto" type="text/javascript"></script>
  <meta charset="utf-8">
  <!-- HTML Meta Tags -->
  <title>Negritube.fr</title>
  <meta name="description" content="pour (re-)découvrir le gwoka, musique de Guadeloupe.">
  <meta name="keywords" content="créole" />
  <meta name="author" content="Philippe Blaze" />
  <meta name="theme-color" content="#f6b73c" />

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://negritube.fr/index.php/">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Negritube.fr">
  <meta property="og:description" content="pour (re-)découvrir le gwoka, musique de Guadeloupe.">
  <meta property="og:image" content="https://negritube.fr/assets/img/Carte-og.png">
  <meta property="og:locale" content="fr_FR" />

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary" />
  <meta property="twitter:domain" content="negritube.fr">
  <meta property="twitter:url" content="https://negritube.fr/index.php/">
  <meta name="twitter:title" content="Negritube.fr">
  <meta name="twitter:description" content="pour (re-)découvrir le gwoka, musique de Guadeloupe.">
  <meta name="twitter:image" content="https://negritube.fr/assets/img/Carte-Twitter.png">
  <meta name="twitter:image:alt" content="Negritube.fr" />

  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
  <link href="assets/css/styles.css" rel="stylesheet" />
  <link href="assets/css/switchTheme.css" rel="stylesheet" />
  <link href="assets/css/dark.css" rel="stylesheet" id="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <script src="assets/js/anim.js" crossorigin="paulw"></script>
  <script src="assets/js/switchTheme.js" crossorigin="paulw"></script>

  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2838504479669283" crossorigin="anonymous"></script>

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
<body on load="display();">
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
    <nav>
      <div class="Bouton_Menu" onclick="open_menu();">
        <img id="lebouton" src="assets/img/Menu.png" alt="Menu">
        <p>
          Menu
        </p>
      </div>
      <div id="Menu_Cache">
        <li><a href="#Gwoka_Evolutif">Les vidéos de Gwoka évolutif</a></li>
        <li><a href="#VideoLive">Les vidéos en Live</a></li>
        <li><a href="#reggae">Une vidéo de Reggae</a></li>
        <li><a href="#Ballade_créole">Une vidéo de Ballade Créole</a></li>
        <li><a href="#Salsa">Une vidéo de Salsa</a></li>
        <li><a href="#Biguine">Une vidéo de Biguine</a></li>
        <li><a href="#AudioGwokaEvolutif">Les Albums et autres Extraits audio de Gwoka évolutif</a></li>
        <li><a href="pages/contact.php">Negritube.fr - Prise de Contact</a></li>
      </div>
    </nav>
    <br>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2838504479669283" crossorigin="anonymous"></script>
    <!-- pubs horizontales -->
    <ins class="adsbygoogle"
    style="display:block"
    data-ad-client="ca-pub-2838504479669283"
    data-ad-slot="9838847836"
    data-ad-format="auto"
    data-full-width-responsive="true"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <!-- End pubs horizontales -->
    <section id="Gwoka_Evolutif">
      <h2>
        Les vidéos de Gwoka évolutif
      </h2>
      <div class="link_song">
        <a class="flex-row-item" href="pages/WIB.php">
          <div class="miniature box" onmouseover="launchWait(0);" onmouseout="cancelWait();">
            <img src="assets/img/miniature/WIB.png" alt="" />
            <h3 class="accueilH3">
              <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
              WIB (vidéo)<br>Gwoka évolutif
            </h3>
            <div class="top"></div>
            <div class="bottom"></div>
            <div class="left"></div>
            <div class="right"></div>
          </div>
        </a>
        <a class="flex-row-item" href="pages/DLO.php">
          <div class="miniature box" onmouseover="launchWait(1);" onmouseout="cancelWait();">
            <img src="assets/img/miniature/DLO.png" alt="" />
            <h3 class="accueilH3">
              <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
              DLO (vidéo)<br>Gwoka évolutif
            </h3>
            <div class="top"></div>
            <div class="bottom"></div>
            <div class="left"></div>
            <div class="right"></div>
          </div>
        </a>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2838504479669283" crossorigin="anonymous"></script>
        <ins class="adsbygoogle"
        style="display:block"
        data-ad-format="fluid"
        data-ad-layout-key="-7b+f1-19-54+dx"
        data-ad-client="ca-pub-2838504479669283"
        data-ad-slot="7093835818">
      </ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
      <a class="flex-row-item" href="pages/Fòs é kouraj.php">
        <div class="miniature box" onmouseover="launchWait(2);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Fòs é kouraj.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Fòs é kouraj (vidéo)<br>Gwoka évolutif
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
      <a class="flex-row-item" href="pages/Piétònn'la (Philippe BLAZE).php">
        <div class="miniature box" onmouseover="launchWait(3);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Piétònn'la (Philippe BLAZE).png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Piétònn'la (vidéo)<br>Gwoka évolutif
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
      <a class="flex-row-item" href="pages/Sò a limanité.php">
        <div class="miniature box" onmouseover="launchWait(4);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Sò a limanité.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Sò a limanité (vidéo)<br>Gwoka évolutif
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
      <a class="flex-row-item" href="pages/Sonjé BINO (Philippe BLAZE).php">
        <div class="miniature box" onmouseover="launchWait(5);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Sonjé BINO (Philippe BLAZE).png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Sonjé BINO (vidéo)<br>Gwoka évolutif
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
    </div>
  </section>
  <section id="VideoLive">
    <h2>
      Les vidéos en Live
    </h2>
    <div class="link_song">
      <a class="flex-row-item" href="pages/LILY.php">
        <div class="miniature box" onmouseover="launchWait(6);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/LILY.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Vidéo en Live<br>Lily de Pierre PERRET
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2838504479669283" crossorigin="anonymous"></script>
      <ins class="adsbygoogle"
      style="display:block"
      data-ad-format="fluid"
      data-ad-layout-key="-7b+f1-19-54+dx"
      data-ad-client="ca-pub-2838504479669283"
      data-ad-slot="7093835818"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
      <a class="flex-row-item" href="pages/Petite_Marie.php">
        <div class="miniature box" onmouseover="launchWait(7);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Petite_Marie.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Vidéo en Live<br>Petite Marie de Francis CABREL
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
      <a class="flex-row-item" href="pages/Nou_mélé_Philippe_BLAZE.php">
        <div class="miniature box" onmouseover="launchWait(8);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Nou_mélé_Philippe_BLAZE.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Vidéo en Live<br>Nou mélé (Philippe BLAZE)
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
      <a class="flex-row-item" href="pages/Chanson_Hommage_aux_Gwo_Mòdan.php">
        <div class="miniature box" onmouseover="launchWait(9);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Chanson_Hommage_aux_Gwo_Mòdan.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Vidéo en Live<br>Chanson hommage à 3 Gwo-Mòdan
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
      <a class="flex-row-item" href="pages/Philippe_BLAZE_piano_bar.php">
        <div class="miniature box" onmouseover="launchWait(10);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Philippe_BLAZE_piano_bar.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Vidéo en Live<br>Piano-bar
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
      <a class="flex-row-item" href="pages/Sèl_si_on_gran_chimen.php">
        <div class="miniature box" onmouseover="launchWait(11);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Sèl_si_on_gran_chimen.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Vidéo en Live<br>Sèl si on gran chimen
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
    </div>
  </section>
  <section id="reggae">
    <h2>
      Une vidéo de Reggae
    </h2>
    <div class="link_song">
      <a class="flex-row-item" href="pages/Ekzòd.php">
        <div class="miniature box" onmouseover="launchWait(12);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Ekzòd.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Ekzòd (vidéo)<br>Reggae
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
    </div>
  </section>
  <section id="Ballade_créole">
    <h2>
      Une vidéo de Ballade Créole
    </h2>
    <div class="link_song">
      <a class="flex-row-item" href="pages/Avé Maria Antillais.php">
        <div class="miniature box" onmouseover="launchWait(13);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Avé Maria Antillais.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Avé Maria Antillais (vidéo)<br>Ballade Créole
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
    </div>
  </section>
  <section id="Salsa">
    <h2>
      Une vidéo de Salsa
    </h2>
    <div class="link_song">
      <a class="flex-row-item" href="pages/Pénélope.php">
        <div class="miniature box" onmouseover="launchWait(14);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Pénélope.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Pénélope (vidéo)<br>Salsa
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2838504479669283" crossorigin="anonymous"></script>
      <ins class="adsbygoogle"
      style="display:block"
      data-ad-format="fluid"
      data-ad-layout-key="-7b+f1-19-54+dx"
      data-ad-client="ca-pub-2838504479669283"
      data-ad-slot="7093835818"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
  </section>
  <section id="Biguine">
    <h2>
      Une vidéo de Biguine
    </h2>
    <div class="link_song">
      <a class="flex-row-item" href="pages/Konjé bonifié.php">
        <div class="miniature box" onmouseover="launchWait(15);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Konjé bonifié.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Konjé bonifié (vidéo)<br>Biguine
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
    </div>
  </section>
  <section id="AudioGwokaEvolutif">
    <h2>
      Les Albums et autres Extraits audio de Gwoka évolutif
    </h2>
    <div class="link_song">
      <a class="flex-row-item" href="pages/Mal tèt.php">
        <div class="miniature box" onmouseover="launchWait(16);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Mal tèt.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Mal tèt (chanson)<br>Gwoka évolutif
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
      <a class="flex-row-item" href="pages/Eritaj.php">
        <div class="miniature box" onmouseover="launchWait(17);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Eritaj.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Eritaj (Extrait de l'album)<br>Gwoka évolutif
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
      <a class="flex-row-item" href="pages/Misiyon.php">
        <div class="miniature box" onmouseover="launchWait(18);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Misiyon.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Misiyon (album complet)<br>Gwoka évolutif
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
      <a class="flex-row-item" href="pages/Konsyans.php">
        <div class="miniature box" onmouseover="launchWait(19);" onmouseout="cancelWait();">
          <img src="assets/img/miniature/Konsyans.png" alt="" />
          <h3 class="accueilH3">
            <img src="assets/img/Philippe-.png" alt="" style="padding-right:15px;vertical-align: middle;" />
            Konsyans (album complet)<br>Gwoka évolutif
          </h3>
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="left"></div>
          <div class="right"></div>
        </div>
      </a>
    </div>
  </section>
  <center>
    <div class="visiteurs">
      Nombre de visiteurs sur le site :
    </div>
    <a class="compteur" href="http://www.mon-compteur.fr">
      <img src="http://www.mon-compteur.fr/html_c01genv2-235526-6" border="0" />
    </a>
  </center>
</div>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2838504479669283"crossorigin="anonymous"></script>
</body>
<footer>
  <br><br><br>
  <p>All rights reserved © Negritube.fr | Music and Video by Philippe Blaze | Site by Paullux Waffle</p>
</footer>
<a class="remonter" href="#">⇧ remonter ⇧</a>
<script src="assets/js/menu.js" crossorigin="paulw"></script>
</html>
