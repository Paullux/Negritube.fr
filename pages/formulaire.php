<?php
if (isset($_POST["submit"])) {
    $email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
    $configs = include('config.php');
    $url = $configs['url'];
    $messageWarning = "";
    $colorMessageWarning = "white";
    $nameTextAdded = "";
    $nameLabelColor = "";
    $emailTextAdded = "";
    $emailLabelColor = "";
    $MessageTextAdded = "";
    $messageLabelColor = "";
    if (!empty($name) and !empty($email) and !empty($message) and $name != "HenryFrile" and $messageCaptchaColor == "color: green") {
        $timeStamp = date('Y-m-d\TH:i:sO');

        $name_title = "**Nom : **" . $name;
        $description =  "**Email : **" . $email . "\n**Message : **" . $message;


        $destinataire = "blazephilippe@gmail.com, paulwoisard@gmail.com"; // adresse mail du destinataire
        $sujet = "Contact depuis le site web Negritube.fr"; // sujet du mail
        // maintenant, on crée l'en-tête du mail
        $header = "From: " . $email . "\r\n";
        $header .= "Disposition-Notification-To:" . $email; // c'est ici que l'on ajoute la directive
        mail ($destinataire, $sujet, $message, $header); // on envois le mail

        $response = curl_exec( $ch );
        curl_close( $ch );
        $messageWarning='Le formulaire a été envoyé, Merci pour votre participation.';
        $colorMessageWarning="green";
        $name = "";
        $email = "";
        $message = "";

    } else {
        $messageWarning='Veuillez remplir correctement le formulaire';
        $colorMessageWarning="red";
        if (empty($name)||$name=="HenryFrile") {
            $nameManquant = "border:red 1px solid;border-radius: 30px; border-collapse: separate;";
            $nameTextAdded = " mal renseigné";
            $nameLabelColor = "color: red";
        } else {
            $nameManquant = "";
            $nameTextAdded = "";
            $nameLabelColor = "";
        }

        if (empty($email)) {
            $emailManquant = "border:red 1px solid;border-radius: 30px; border-collapse: separate;";
	        $emailTextAdded = " mal renseigné";
            $emailLabelColor = "color: red";
        } else {
            $emailManquant = "";
            $emailTextAdded = "";
            $emailLabelColor = "";
        }

        if (empty($message)) {
            $messageManquant = "border:red 1px solid;border-radius: 30px; border-collapse: separate;";
	        $messageTextAdded = " mal renseigné";
            $messageLabelColor = "color: red";
        } else {
            $messageManquant = "";
	        $MessageTextAdded = "";
            $messageLabelColor = "";
        }
    }
}
?>
