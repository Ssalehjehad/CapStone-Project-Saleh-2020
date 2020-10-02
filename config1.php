<?php 

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('475016890692-dqr7psn1fvkcpgqt88f1nrads82fepfi.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('38Ek8vT7wHXtp7wXjU6');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost:8080/cap/index.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page


?>