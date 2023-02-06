<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit();
}
header("refresh: 800"); 
$to=time();
$t_on=$_SESSION['derniere_action'];
$diff_=$to-$t_on;
if($diff_>799){ 
  echo"<script>alert('10 minutes sans aucune activité sur l'application, vous allez être amener à vous reconnecter!')</script>";
  unset($_SESSION['email']);
  unset($_SESSION['derniere_action']);
  session_destroy();
  header('location: login.php');
  exit();
}

require 'config.php';

$errors = []; // Store errors here
$fileExtensions = new ArrayObject(array());

if (!isset($_POST)) {
    $errors[] = 'Vous ne devez pas vous retrouver ici.';
}

if (!isset($_FILES['file']['name'][0])) {
    $errors[] = 'Vous n\'avez rien envoyé.';
} else {
    $fileExtensionsAllowed = ['mp3','jpg'];
    $_SESSION['file'] = $_FILES['file'];
    for($i = 0; $i < count($_FILES['file']['name']); $i++) {
        $fileNames = $_FILES['file']['name'][$i];
        $fileSizes = $_FILES['file']['size'][$i];
        $extension = strtolower(end(explode('.',$fileNames)));
        $fileExtensions->append($extension);
        if (! in_array($extension,$fileExtensionsAllowed)) {
            $errors[] = "Ces fichiers ne sont pas autorisé. S'il-vous-plait, envoyez uniquement des fichiers MP3 ou JPG.";
        }
        if ($fileSizes > 1000000000) {
            $errors[] = "Vos fichiers dépassent la taille autorisée (4MB).";
        }
    } 
}
$parts = explode('@', $_SESSION['email']);
$user = $parts[0];

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
 
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
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
    <?php if (!empty($errors)) {
        echo "<br><h2>Vous avez encontré au moins une erreur. </h2><br>";
        foreach ($errors as $error) {
            echo '<h3>'.$error . '</h3><br>';
        }
        echo '<br><button id="UploadButton" onclick="history.back()">Retour à la page précédente</button>';
    } else {  
        $countfiles = count($_FILES['file']['name']);       
        $images = new ArrayObject(array()); //array de covers
        $music = new ArrayObject(array());
        for ($i = 0; $i < $countfiles; $i++) {
            $filename = $_FILES['file']['name'][$i];
            if (strtolower($fileExtensions[$i]) === 'jpg') {
                $filename = clean($filesname);
                $filename = str_replace("'", "&quot;", $filename);
                $images->append($filename);
            } else if (strtolower($fileExtensions[$i]) === 'mp3'){
                $music->append($filename);
            }
            $_SESSION['temp_file'][$i] = '../assets/uploads/' . $_FILES['file']['name'][$i];
            move_uploaded_file($_FILES['file']['tmp_name'][$i], $_SESSION['temp_file'][$i]);
        }?>
        <form id="formAddMP3" action="list-file.php" method="post">
            <table>
                <thead>
                <tr>
                    <th>Fichiers téléversés</th>
                    <th>Numéro de la piste sur l'album</th>
                    <th>Titre chanson</th>
                    <th>Artiste</th>
                    <th>Album</th>
                    <th>Pochette</th>
                </tr>
                </thead>
                <tbody id="fichierTeleverse">
                    <?php $j = 0;
                    for ($i = 0;$i < $countfiles; $i++) { 
                        if (strtolower($fileExtensions[$i]) == 'mp3') { ?>
                            <tr>
                                <td>
                                    <input type="text" class="mp3" name="filename[]" readonly required value="<?= $music[$j] ?>">
                                </td>
                                <td>
                                    <input type="number" class="mp3" name="track[]" required value="">
                                </td>
                                <td>
                                    <input type="text" class="mp3" name="title[]" required value="">
                                </td>
                                <td>
                                    <input type="text" class="mp3" name="artist[]" required value="">
                                </td>
                                <td>
                                    <input type="text" class="mp3" name="album[]" required  value=""> 
                                </td>
                                <td>
                                    <select class="mp3" id="<?php echo 'cover_'.$i ?>" name="cover[]" required>
                                    <option value="">--Please choose an option--</option>
                                    <?php forEach($images as $image) {
                                        echo '<option value="'.$image.'">'.$image.'</option>';
                                    } ?>
                                </td>
                            </tr>
                        <?php $j++;
                        } 
                    } ?>
                </tbody>
            </table>
            <input type="submit" id="UploadButton" value="Téléverser les fichiers"></input>
        </form>
    <?php } ?>
</body>
</html>      
