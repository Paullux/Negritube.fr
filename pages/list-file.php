<?php

session_start();
header("refresh: 900"); 
if (!isset($_SESSION['email'])) {
    header('location: ../index.php');
    exit();
}

const UPLOAD = "../assets/uploads/";
const COVER = "../assets/img/album cover/";
const ALLALBUM = "../assets/audio/AllAlbums/";

$to=time();
$t_on=$_SESSION['derniere_action'];
$diff_=$to-$t_on;
if($diff_>899){ 
  echo"<script>alert('5 minutes sans aucune activité sur l'application, vous allez être amener à vous reconnecter!')</script>";
  unset($_SESSION['email'], $_SESSION['derniere_action']);
  session_destroy();
  header('location: login.php');
  exit();
}



require('albums.php');
require 'config.php';

function sortTracks($a, $b) {
    return (int)$a->piste > (int)$b->piste;
}

$messages = [];

function toMessage(string $value, &$messages) {
  $messages[] = $value;
}

function arrayToList($albums, $audionumber, &$messages) {

    $i = intval($audionumber);
    forEach($albums as $item) {
        $album = $item->title;
        $cover = $item->cover;
        $remove[] = "'";
        $remove[] = '"';
        $remove[] = "-"; // just as another example
        $cover2 = str_replace( $remove, "", $cover );
        rename(UPLOAD.$cover, COVER.$cover2);
        forEach($item->songs as $Song) {
            $filename = $Song->filename;
            $oldPath = UPLOAD.$filename;
            $newPath = ALLALBUM.$i.'.mp3';
            $didUpload = rename($oldPath, $newPath);
            if ($didUpload) {
              toMessage("Le fichier " . $filename . " a bien été téléverser.", $messages);
            } else {
              toMessage("Une erreur s'est déroulé lors du traitement du fichier " . $filename . ". Veuillez contacter l'administrateur du site.", $messages);
                unlink($oldPath);
            }
            $filename = $Song->filename;
            $oldPath = UPLOAD.$filename;
            $newPath = ALLALBUM.$i.'.mp3';
            
            $songtitle = $Song->title;
            $artist = $Song->artist;
            $number = strval($i);
            $pochette = COVER.$cover2;            

            $serveur = SERVEUR; $dbname = DBNAME; $user = USER; $pass = PASS;
            $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //On insère les données reçues
            $sth = $dbco->prepare("
                INSERT INTO musiques(Numero, Titre, Artiste, Album, pochette)
                VALUES(:Numero, :Titre, :Artiste, :Album, :pochette)");
            $sth->bindParam(':Numero',$number);
            $sth->bindParam(':Titre',$songtitle);
            $sth->bindParam(':Artiste',$artist);
            $sth->bindParam('Album',$album);
            $sth->bindParam(':pochette',$pochette);
            $sth->execute();
            $i++;
        }
    }
    toMessage("Tous c'est bien passé vos fichiers sont sur le serveur et prêt à être écoutés.",$messages);
}
$album = new Albums();
$albums = array();

$counter = count($_POST['filename']);

for ($i = 0; $i < $counter; $i++) {
    $album = new Albums();
    $album->title = $_POST['album'][$i];
    $album->cover = $_POST['cover'][$i];
    $albums[$album->title] = $album; 
}

for ($i = 0; $i < $counter; $i++) {
    $Song = new Song();
    $Song->filename = $_POST['filename'][$i];
    $Song->piste = $_POST['track'][$i];
    $Song->title = $_POST['title'][$i];
    $Song->artist = $_POST['artist'][$i];
    $current_album = $_POST['album'][$i];  
    array_push($albums[$current_album]->songs, $Song);
}

forEach($albums as $item) {
    usort($item->songs, 'sortTracks');
}

$serveur = SERVEUR; $dbname = DBNAME; $user = USER; $pass = PASS;
$dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);

$query = "SELECT MAX(Numero) as max_id FROM musiques";
$sth = $dbco->prepare($query);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
$audionumber = $row['max_id'] + 1;

arrayToList($albums, $audionumber, $messages);
$parts = explode('@', $_SESSION['email']);

$user = $parts[0];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
    <title>BackEnd</title>
    
    <link rel="stylesheet" type="text/css" href="../assets/css/secret.css" />
    <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-947003196"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-947003196');
  </script>
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
    <div>
      <?php
        echo '<br><br><h2>Résultat du téléversement : </h2><br>';
        forEach($messages as $message) {
          echo '<br><h3>' . $message . '</h3><br>';
        }
        echo '<br><button id="UploadButton" onclick="history.go(-3);">Retour à l\'accueil</button>';
      ?>
    </div>
</body>
</html>  