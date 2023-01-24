<?php
require 'vendor/autoload.php';
require 'config.php';

$client = new GuzzleHttp\Client([
    'timeout' => 2.0,
]);

try{
    $response = $client->request('GET', 'https://accounts.google.com/.well-known/openid-configuration');
    $discoveryJSON = json_decode($response->getBody());
    $tokenEndpoint = $discoveryJSON->token_endpoint;
    $userInfoEndpoint = $discoveryJSON->userinfo_endpoint;
    $response = $client->request('POST', $tokenEndpoint, [
        'form_params' => [
            'code' => $_GET['code'],
            'client_id' => GOOGLE_ID,
            'client_secret' => GOOGLE_SECRET,
            'redirect_uri' => 'https://paulluxwaffle.synology.me/Multi-Plateform/pages/connect.php',
            'grant_type' => 'authorization_code'
        ]
    ]);
    $accessToken = json_decode($response->getBody())->access_token;
    $response = $client->request('GET', $userInfoEndpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken
            ]
        ]);
        $response = json_decode($response->getBody());
        if ($response->email_verified === true && ($response->email === admin_one || $response->email === admin_two)) {
            session_start();
            $_SESSION['email'] = $response->email;
            $_SESSION['picture'] = $response->picture;
            $_SESSION['derniere_action'] = time();
            header('Location: secret.php');
            exit();
        } else {
            header('location: login.php');
            exit();  
        }
} catch (\GuzzleHttp\Exception\ClientException $exception) {
    dd($exception->getMessage());
}

dd($response->getBody())
?>