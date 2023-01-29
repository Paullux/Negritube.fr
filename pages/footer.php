<?php
require 'config.php';

//if ($track == 0) $track == 1;
//$index = intval($track) - 1;

$serveur = SERVEUR; $dbname = DBNAME; $user = USER; $pass = PASS;

// connect to the database
$dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// prepare the statement
$sth = $dbco->prepare("SELECT * FROM musiques");

// execute the statement
$sth->execute();

// fetch the result
$result = $sth->fetchAll(PDO::FETCH_ASSOC);


$audionumber = count($result);
echo '<div id="flexMusic">';
echo '<div class="AudioClass">';
echo '<h2>Musiques</h2>'; 
for ($i = 1; $i <= 10; $i++) {
    $randomAudio = rand(1, $audionumber);
    $linkTitleAudio = $result[$randomAudio-1]['Artiste'] . " - " . $result[$randomAudio-1]['Titre'];
    $reallinkAudio =  "https://negritube.fr/pages/AudioFile.php?track=$randomAudio";
    echo "<a class='callAudio' href=$reallinkAudio>$linkTitleAudio</a>";
}
echo '<br></div>';

echo '<div class="vl"></div>';
echo '<div class="negritube_flex">';
echo '<h3>Pourquoi Negritube :</h3>';
echo '<div class="FlexExplication">';
echo '<p class="negritube_signification">Négritube est une plateforme dédiée à la musique noire, et notre nom est une référence au mouvement littéraire et intellectuel connu sous le nom de Négritude. Cette mouvance a eu une influence profonde sur la compréhension de l\'identité noire et a prôné une fierté pour les racines africaines et la mémoire de l\'héritage.</p>';
echo '<p class="negritube_signification">À Négritube, nous sommes fermement convaincus que la musique noire est un vecteur important de la culture noire et de son patrimoine. Nous considérons notre site comme un sanctuaire où cette richesse musicale peut être célébrée et partagée avec le monde entier. Nous nous efforçons de faire en sorte que notre plateforme soit un lieu où la musique noire puisse être appréciée pour sa propre valeur musicale."</p>';
echo '</div>';
echo '</div>';
echo '<div class="vl"></div>';

// prepare the statement
$sth = $dbco->prepare("SELECT * FROM videos");

// execute the statement
$sth->execute();

// fetch the result
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
 
$videonumber = count($result);
echo '<div class="VideoClass">'; 
echo '<h2>Clips vidéos</h2>';
for ($j = 1; $j <= 10; $j++) {
    $randomVideo = rand(1, $videonumber);
    $linkTitleVideo = $result[$randomVideo-1]['Artiste'] . " " . $result[$randomVideo-1]['Titre'];
    $reallinkVideo =  "https://negritube.fr/pages/VideoFile.php?track=$randomVideo";
    echo "<a class='callVideo' href=$reallinkVideo>$linkTitleVideo</a>";
}
echo '<br></div>';
echo '</div>';

echo "<h2><a class='callAudio' href='https://negritube.fr/pages/mentions-legales.php'>Mentions Légales</a></h2>";

  



