<?php
function readHere($csv, $separator){
    $file = fopen($csv, 'r');
    while (!feof($file) ) {
        if ($separator == ',') $line[] = fgetcsv($file, 1024);
        else $line[] = fgetcsv($file, 1024, $separator);
    }
    fclose($file);
    return $line;
}
  
$csvAudio = 'assets/csv/audio.csv';
$fpAudio = file($csvAudio);
$audionumber = count($fpAudio) - 1;
$csvAudio = readHere($csvAudio, ',');
echo '<div id="flexMusic">';
echo '<div class="AudioClass">';
echo '<h2>Musiques</h2>'; 
for ($i = 1; $i <= 10; $i++) {
    $randomAudio = rand(1, $audionumber);
    $linkTitleAudio = $csvAudio[$randomAudio][2] . ", " . $csvAudio[$randomAudio][1];
    $reallinkAudio =  "https://negritube.fr/pages/AudioFile.php?track=$randomAudio";
    echo "<a class='callAudio' href=$reallinkAudio>$linkTitleAudio</a>";
}
 
$csvVideo = 'assets/csv/video.csv';
$fpVideo = file($csvVideo);
$videonumber = count($fpVideo) - 2;
$csvVideo = readHere($csvVideo, ';');
echo '</div>';
echo '<div class="VideoClass">'; 
echo '<h2>Clips vidéos</h2>';
for ($j = 1; $j <= 10; $j++) {
    $randomVideo = rand(1, $videonumber);
    $linkTitleVideo = $csvVideo[$randomVideo][2] . " " . $csvVideo[$randomVideo][1];
    $reallinkVideo =  "https://negritube.fr/pages/VideoFile.php?track=$randomVideo";
    echo "<a class='callVideo' href=$reallinkVideo>$linkTitleVideo</a>";
}
echo '</div>';
echo '</div>';

echo "<h2><a class='callAudio' href='https://negritube.fr/pages/mentions-legales.php'>Mentions Légales</a></h2>";

  



