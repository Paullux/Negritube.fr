<?php
require('config.php');
//header('Access-Control-Allow-Origin: *');
session_start();
header("refresh: 600"); 
if (!isset($_SESSION['email'])) {
    header('location: ../index.php');
    exit();
}
$to=time();
$t_on=$_SESSION['derniere_action'];
$diff_=$to-$t_on;
if($diff_>599){ 
  echo"<script>alert('5 minutes sans aucune activité sur l'application, vous allez être amener à vous reconnecter!')</script>";
  unset($_SESSION['email'], $_SESSION['derniere_action']);
  session_destroy();
  header('location: ../index.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/login.css" rel="stylesheet" />
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="../assets/css/login.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Se connecter</title>
</head>
<body>
    <div class="big-title">
        <div id="item">
                <a href=".."><img class="logo" src="../assets/img/logo-negritube.png" alt="negritube"></a>
        </div>
        <div id="item">
            <a href=".." style="text-decoration: none; ">
            <h1 class="title_site">
                Negritube
            </h1>
            </a>
            <h2 class="subtitle_site">
            Page d'accès au backend,
            <br>vous devez vous authentifier !
            </h2>
        </div>
    </div>
    <h1>Se connecter</h1>
    <form action="connect_propre.php" method="post">
        <div id="flexy">
            <label class="register" for="idinput">Créer compte</label>
                <label class="switch">
                    <input type="checkbox" class="check-with-label" id="idinput" name="idinput" value="off">
                    <span class="slider round"></span>
                </label>
            <label class="login" for="idinput">Se connecter</label>
        </div>
        <br><br>
        <div class="c100">
            <label class="idElement" for="login">Email : </label><br>
            <input type="text" id="login" name="login"
                   required pattern="^[A-Za-z0-9\._-]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$"><br><br>
        </div>
        <div class="c100">
            <label class="idElement" for="password">Mot de Passe : </label><br>
            <input type="password" id="password" name="password"
                   required pattern="^[a-zA-Z0-9!@#$%^&*()_+-=,.<>;:']*$" minlength="8">
        </div>
        <div>
            <br><input id="submit_button" type="submit" value="S'enregistrer">
        </div>
    </form>
    <p>
        <br><br><a href="https://accounts.google.com/o/oauth2/v2/auth?scope=email&access_type=online&redirect_uri=<?= urlencode('https://negritube.fr/pages/connect.php') ?>&response_type=code&client_id=<?= GOOGLE_ID ?>"><img id="ggl" src="../assets/img/bouton google.png" alt="" /></a>
    </p>
    <script src="../assets/js/login.js" crossorigin="paulw"></script>
</body>
<footer>
  <?php
    require_once(dirname(__FILE__) . '/footer-sans-conf.php');
  ?>
  <p>All rights reserved © Negritube.fr | Music and Video by Philippe Blaze | Site by Paullux Waffle</p>
</footer>
</html>