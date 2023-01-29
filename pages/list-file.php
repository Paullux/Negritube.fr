<?php
session_start();
header("refresh: 900"); 
if (!isset($_SESSION['email'])) {
    header('location: ../index.php');
    exit();
}
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
function arrayToList($albums, $audionumber) {
    $i = intval($audionumber);
    forEach($albums as $item) {
        $album = $item->title;
        $cover = $item->cover;
        rename('../assets/uploads/'.$cover, '../assets/img/album cover/'.$cover);
        forEach($item->songs as $Song) {
            $filename = $Song->filename;
            $oldPath = '../assets/uploads/'.$filename;
            $newPath = '../assets/audio/AllAlbums/'.$i.'.mp3';
            $didUpload = rename($oldPath, $newPath);
            if ($didUpload) {
              $messages[] = "Le fichier " . $filename . " a bien été téléverser.";
            } else {
              $messages[] = "Une erreur s'est déroulé lors du traitement du fichier " . $filename . ". Veuillez contacter l'administrateur du site.";
                unlink($oldPath);
            }
            $filename = $Song->filename;
            $oldPath = '../assets/uploads/'.$filename;
            $newPath = '../assets/audio/AllAlbums/'.$i.'.mp3';
            
            $songtitle = $Song->title;
            $artist = $Song->artist;
            $number = strval($i); $
            $pochette = '../assets/img/album cover/'.$cover;            

            $serveur = SERVEUR; $dbname = DBNAME; $user = USER; $pass = PASS;
            $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
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
    $messages[] = "Tous c'est bien passé vos fichiers sont sur le serveur et prêt à être écoutés.";
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

arrayToList($albums, $audionumber);
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
        foreach($messages as $message) {
          echo '<br><h3>' . $message . '</h3><br>';
        }
        echo '<br><button id="UploadButton" onclick="window.location.replace("..");">Retour à l\'accueil</button>';
      ?>
    </div>
</body>
</html>  