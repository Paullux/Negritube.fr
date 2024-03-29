<?php
require_once ( 'validate.php' );
require_once ( 'formulaire.php' );
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- HTML Meta Tags -->
  <title>Contact</title>
  <meta name="description" content="Pour une prise de contact">
  <meta name="keywords" content="créole, musique, musique créole, gwoka, gwoka evolutif, guitare, guadeloupe, Kréyol, Mizik, Mizik Kréyol, Gwoka, Gwoka Modenn, Gita, Gwadloup" />
  <meta name="author" content="Philippe Blaze" />
  <meta name="theme-color" content="#f6b73c" />

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://negritube.fr/contact.html">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Contact - Negritube">
  <meta property="og:description" content="Pour une prise de contact">
  <meta property="og:image" content="https://negritube.fr/assets/img/Carte-og.png">
  <meta property="og:locale" content="fr_FR" />

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary" />
  <meta property="twitter:domain" content="negritube.fr">
  <meta property="twitter:url" content="https://negritube.fr/contact.html">
  <meta name="twitter:title" content="Contact - Negritube">
  <meta name="twitter:description" content="Pour une prise de contact">
  <meta name="twitter:image" content="https://negritube.fr/assets/img/Carte-Twitter.png">
  <meta name="twitter:image:alt" content="Negritube.fr" />

  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
  <link href="../assets/css/styles.css" rel="stylesheet" />
  <link href="../assets/css/switchTheme.css" rel="stylesheet" />
  <link href="../assets/css/dark.css" rel="stylesheet" id="stylesheet" />
  <link href="../assets/css/form-project.css" rel="stylesheet" id="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <script src="../assets/js/switchThemePages.js" crossorigin="paulw"></script>
  <script>
    if (window.location.href.indexOf("paulluxwaffle.synology.me") > -1) {
      Server = "https://paulluxwaffle.synology.me/Multi-Plateform/";
    } else {
      Server = "https://negritube.fr/";
    }
    window.history.replaceState('', '', Server + 'contact.html');
  </script>

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
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-947003196"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-947003196');
  </script>
</head>
<body style="overflow: scroll;">
  <div id="turnDeviceNotification"></div>
  <div class="my_page">
    <div class="big-title">
      <div id="item">
        <a href="."><img class="logo" src="assets/img/logo-negritube.png" alt="negritube"></a>
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
    <br><br>
    <h3 class="song_title" id="title">
      Pour prendre contact avec nous,
    </h3>
    <form id="contact-form" method="post" autocomplete="off">
      <div class="card-body p-0 my-3">
        <div class="row">
          <label style="background: transparent !important; color:<?php if (isset($colorMessageWarning)) echo $colorMessageWarning; ?>" > <?php if (isset($messageWarning)) echo $messageWarning; ?> </label>
          <div class="col-md-6">
            <div class="input-group">
              <label style="<?php if (isset($nameLabelColor)) echo $nameLabelColor; ?>" >Votre Nom complet <?php if (isset($nameTextAdded)) echo $nameTextAdded; ?></label>
              <input name="name" type="text" class="form-control" placeholder="Nom complet" style="<?php if (isset($nameManquant)) echo $nameManquant; ?>" value="<?php if (isset($name)) echo $name; ?>">
            </div>
          </div>
          <div class="">
            <div class="input-group">
              <label style="<?php if (isset($emailLabelColor)) echo $emailLabelColor; ?>" >Votre Email <?php if (isset($emailTextAdded)) echo $emailTextAdded; ?></label>
              <input name="email" type="email" class="form-control" placeholder="exemple@domaine.com" style="<?php if (isset($emailManquant)) echo $emailManquant; ?>" value="<?php if (isset($email)) echo $email; ?>">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group input-group-static mb-4">
            <label style="<?php if (isset( $messageLabelColor)) echo $messageLabelColor; ?>" >Décrivez votre demande <?php if (isset($messageTextAdded)) echo $messageTextAdded; ?></label>
            <textarea name="message" class="form-control" id="message" placeholder="Message" rows="5" placeholder="Décrivez votre demande avec 250 caractères aux maximum." style="<?php if (isset($messageManquant)) echo $messageManquant; ?>"><?php if (isset($message)) echo $message; ?></textarea>
          </div>
        </div>
        <div class="captcha">
          <label style="<?php if (isset($captchaLabelColor)) echo $captchaLabelColor; ?>">Entrer le texte dans l'image  <?php if (isset($captchaTextAdded)) echo $captchaTextAdded; ?></label>
          <input name="captcha captchaInput" type="text" class="form-control" placeholder="Entrez le Captcha" style="<?php if (isset($captchaManquant)) echo $captchaManquant; ?>">
          <img src="./pages/captcha.php" style="vertical-align: middle;"/>
          <label style="<?php if (isset($messageCaptchaColor)) echo $messageCaptchaColor; ?>" >
            <?php
            if (isset($_POST["captcha"])) {
              echo $status;
            }
            ?>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <button name="submit" type="submit" class="btn">Envoyer votre message</button>
        </div>
      </div>
    </div>
  </form>
  <p class="song_title" style="text-align: center;">
    La musique vous plait venez à notre rencontre.
  </p>
</div>
</body>
<footer>
  <?php
    require_once(dirname(__FILE__) . '/footer.php');
  ?>
  <p>All rights reserved © Negritube.fr | Music and Video by Philippe Blaze | Site by Paullux Waffle</p>
</footer>
<script src="../assets/js/landscapeWarning.js" crossorigin="paulw"></script>
</html>
