<?php
require 'config.php';

function valid_donnees($donnees) {
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serveur = SERVEUR; $dbname = DBNAME; $user = USER; $pass = PASS;
    $email = valid_donnees($_POST["login"]);
    $mdp = valid_donnees($_POST["password"]);
    $idinput = 'off';
    if (isset($_POST["idinput"])) {
        $idinput = valid_donnees($_POST["idinput"]);
    }
    $hashed_password = password_hash($mdp, PASSWORD_BCRYPT);

    $sanitized_mail = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (filter_var($sanitized_mail, FILTER_VALIDATE_EMAIL)) {
        $email = $sanitized_mail;
    } else {
        $email = null;
    }

    if ($email !== admin_one && $email !== admin_two) {
        header("Location:login.php");
    }

    if (!empty($hashed_password)) {
        if (!empty($email)
            && strlen($email) <= 30
            && filter_var($email, FILTER_VALIDATE_EMAIL)
            && preg_match("/^[a-zA-Z0-9!@#$%^&*()_+-=,.<>;:'\s]*$/",$hashed_password)
            && strlen($mdp) > 7
            && !empty($hashed_password)){
            
            if ($idinput == 'on') { 
                if (!empty($email)
                && strlen($email) <= 30
                && filter_var($email, FILTER_VALIDATE_EMAIL)
                && !empty($hashed_password)) {       
                    // connect to the database
                    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    
                    // prepare the statement
                    $sth = $dbco->prepare("SELECT email, password_hash FROM utilisateurs WHERE email = :email");
    
                    // bind the parameters
                    $sth->bindParam(':email', $email);
    
                    // execute the statement
                    $sth->execute();
    
                    // fetch the result
                    $result = $sth->fetch(PDO::FETCH_ASSOC);
                    
                    $password = $result['password_hash'];

                    // check if the entered password matches the hashed password
                    if (password_verify($mdp, $password)) {
                        // login success
                        session_start();
                        $_SESSION['email'] = $email;
                        $_SESSION['derniere_action'] = time();
                        header("Location: secret.php");
                        exit();
                    } else {
                        // login failed
                        header("Location: login.php");
                        exit();
                    }
                    header("Location: login.php");
                    exit();
                }
            } else if ($idinput == 'off'){
                try{
                    //On se connecte à la BDD
                    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
                    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //On insère les données reçues
                    $sth = $dbco->prepare("
                        INSERT INTO utilisateurs(email, password_hash)
                        VALUES(:email, :password_hash)");
                    $sth->bindParam(':email',$email);
                    $sth->bindParam(':password_hash',$hashed_password);
                    $sth->execute();
                    //On renvoie l'utilisateur vers la page de remerciement
                    header("Location: login.php");
                    exit();
                }
                catch(Exception $e){
                    echo 'Erreur : '.$e->getMessage();
                    header("Location: login.php");
                    exit();
                }
            }
        }    
    }
}
?>