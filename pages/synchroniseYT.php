<?php
require 'config.php';
require_once 'vendor/autoload.php';

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



$client = new Google_Client();
$client->setDeveloperKey(API_KEY_GOOGLE);

$client->addScope(Google_Service_YouTube::YOUTUBE_READONLY);

$service = new Google_Service_YouTube($client);

$channelId = CHANNEL_ID_GOOGLEA;

$searchResponse1 = $service->search->listSearch('id,snippet', array(
  'channelId' => $channelId,
  'maxResults' => 50,
  'order' => 'date'
));

$channelId = CHANNEL_ID_GOOGLEB;

$searchResponse2 = $service->search->listSearch('id,snippet', array(
  'channelId' => $channelId,
  'maxResults' => 50,
  'order' => 'date'
));

function tableExists($pdo, $table) {

    // Try a select statement against the table
    // Run it in try-catch in case PDO is in ERRMODE_EXCEPTION.
    try {
        $result = $pdo->query("SELECT 1 FROM {$table} LIMIT 1");
    } catch (Exception $e) {
        // We got an exception (table not found)
        return FALSE;
    }

    // Result is either boolean FALSE (no table found) or PDOStatement Object (table found)
    return $result !== FALSE;
}

$serveur = SERVEUR; $dbname = DBNAME; $user = USER; $pass = PASS;

// connect to the database
$dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if (tableExists($dbco, 'videoyt')) {
    $sql=$dbco->prepare("DROP TABLE  videoyt ");

    $sql->execute();
}

$statement = 'CREATE TABLE `videoyt`( 
    id          INT AUTO_INCREMENT,
    videoId     VARCHAR(100) NOT NULL, 
    title       VARCHAR(255) NULL, 
    descr_vid   VARCHAR(255) NULL,
    thumbnail   VARCHAR(255) NULL,
    PRIMARY KEY(id))';

$dbco->exec($statement);


foreach ($searchResponse2['items'] as $searchResult) {
  $videoId = $searchResult['id']['videoId'];
  $title = str_replace("'", "",str_replace('"', '', $searchResult['snippet']['title']));
  $description = str_replace("'", "",str_replace('"', '', $searchResult['snippet']['description']));
  $thumbnail = $searchResult['snippet']['thumbnails']['default']['url'];
  if (isset($videoId) && $title !== 'Extrait de concert privé') {
      $sql = "INSERT INTO videoyt (videoId, title, descr_vid, thumbnail) VALUES (?,?,?,?)";
      $sth = $dbco->prepare($sql);
      $sth->execute([$videoId, $title, $description, $thumbnail]);
  }
}

foreach ($searchResponse1['items'] as $searchResult) {
    $videoId = $searchResult['id']['videoId'];
    $title = str_replace("'", "",str_replace('"', '', $searchResult['snippet']['title']));
    $description = str_replace("'", "",str_replace('"', '', $searchResult['snippet']['description']));
    $thumbnail = $searchResult['snippet']['thumbnails']['default']['url'];
    if (isset($videoId) && $title !== 'Extrait de concert privé') {
        $sql = "INSERT INTO videoyt (videoId, title, descr_vid, thumbnail) VALUES (?,?,?,?)";
        $sth = $dbco->prepare($sql);
        $sth->execute([$videoId, $title, $description, $thumbnail]);
    }
}

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
        echo '<br><br><h2>Résultat de la synchronisation : </h2><br>';
        echo '<br><h3>All is OK</h3><br>';
        echo '<br><button id="SynochroniseButton" onclick="history.go(-2);">Retour à l\'accueil</button>';
      ?>
    </div>
</body>
</html>  