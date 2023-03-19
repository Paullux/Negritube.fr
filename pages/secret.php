<?php 
require 'vendor/autoload.php';
require 'config.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit();
}
header("refresh: 600"); 
$to=time();
$t_on=$_SESSION['derniere_action'];
$diff_=$to-$t_on;
if($diff_>599){ 
  echo"<script>alert('10 minutes sans aucune activité sur l'application, vous allez être amener à vous reconnecter!')</script>";
  unset($_SESSION['email'], $_SESSION['derniere_action']);
  session_destroy();
  header('location: login.php');
  exit();
}

$parts = explode('@', $_SESSION['email']);

$user = $parts[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
    <title>BackEnd</title>
    
    <link rel="stylesheet" type="text/css" href="../assets/css/secret.css" />
    <!--<link rel="stylesheet" type="text/css" href="../assets/css/standard.css" />
    <script src="../assets/js/jquery.js"></script>-->
</head>
<body  style="font-family: Arial, sans-serif;">
    <div class="navbar flexy">
      <div class="flexy">
        <?php 
          if (isset($_SESSION['picture'])) {
            echo "<img id='img_profile' src='" . $_SESSION['picture'] . "' alt='image' />";
          } else {
            if ($_SESSION['email'] == admin_one) {
              echo "<img id='img_profile' src='../assets/img/Philippe-.png' alt='image' />";
            } else {
              echo "<img id='img_profile' src='../assets/img/favicon.png' alt='image' />";
            }
          }            
        ?>
        <h1>BackEnd, bienvenue <?= $user ?></h1>
      </div>
      <a href="login.php">
        <i class="fa fa-sign-out" aria-hidden="true"></i>
        Déconnexion
      </a>
    </div>   
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <div class="dropzone" id="dropzone">
        <img width="256" height="256" class="dropzone-icon" id="image-dl" src="../assets/img/cloud-uploading.png" />
        <p id="text-drop-zone">
          Glisser les MP3 et les pochettes d'album correspondantes<br>
          uniquement en mp3 ou en jpg ici ! 
        </p>
        <input type="file" name="file[]" id="file" class="dropzone-input" accept="audio/mpeg,image/jpeg" hidden multiple />
      </div>
      <input type="submit" id="UploadButton" value="Lancer le traitement de vos fichiers"></input>
    </form>
    <form action="synchroniseYT.php" method="post">
      <input type="submit" id="SynochroniseButton" value="Synchroniser les vidéos YouTube avec base de données"></input>
    </form>
    <script src="../assets/js/javascript.js"></script>
</body>
</html>