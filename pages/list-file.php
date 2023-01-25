<?php
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
  header('location: login.php');
  exit();
}

require('albums.php');
require 'config.php';

function readHere($csv, $separator){
    $file = fopen($csv, 'r');
    while (!feof($file) ) {
        if ($separator == ',') $line[] = fgetcsv($file, 1024);
        else $line[] = fgetcsv($file, 1024, $separator);
    }
    fclose($file);
    return $line;
}

function saveHere($csv, $list, $separator){
    $file = fopen($csv, "a");
    $list = array_map(function($val) { return str_replace('"', '', $val); }, $list);
    fputcsv($file, $list, $separator);
    fclose($file);
}

function sortTracks($a, $b) {
    return (int)$a->piste > (int)$b->piste;
}

function arrayToList($albums, $audionumber) {
    echo '<br><br><br><br>';
    echo $audionumber;
    echo '<br><br><br><br>';
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
                echo "<br>Le fichier " . $filename . " a bien été téléverser.";
            } else {
                echo "<br>Une erreur s'est déroulé. Veuillez contacter l'administrateur du site.";
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
    echo "Tous c'est bien passé vos fichiers sont sur le serveur prêt à être écouté.";
}

$album = new Albums();
$albums = array();

$counter = count($_POST['filename']);

echo '<br><br><br><br>';
echo $counter;

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