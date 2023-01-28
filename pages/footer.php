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

// prepare the statement
$sth = $dbco->prepare("SELECT * FROM videos");

// execute the statement
$sth->execute();

// fetch the result
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
 
$videonumber = count($result);
echo '</div>';
echo '<div class="VideoClass">'; 
echo '<h2>Clips vidéos</h2>';
for ($j = 1; $j <= 10; $j++) {
    $randomVideo = rand(1, $videonumber);
    $linkTitleVideo = $result[$randomVideo-1]['Artiste'] . " " . $result[$randomVideo-1]['Titre'];
    $reallinkVideo =  "https://negritube.fr/pages/VideoFile.php?track=$randomVideo";
    echo "<a class='callVideo' href=$reallinkVideo>$linkTitleVideo</a>";
}
echo '</div>';
echo '</div>';

echo "<h2><a class='callAudio' href='https://negritube.fr/pages/mentions-legales.php'>Mentions Légales</a></h2>";

  



