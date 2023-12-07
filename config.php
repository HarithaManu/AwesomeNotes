<?php
    require_once('google-api-php-client--PHP8.0/vendor/autoload.php');
    $gClient = new Google_Client();
    $gClient->setClientId("514667753745-t966cgb2kcib0ifik0f1ldkkuahi4869.apps.googleusercontent.com");
    $gClient->setClientSecret("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");
    $gClient->setApplicationName("Note taking tool");
    $gClient->setRedirectUri("http://localhost/NoteTakingApp/controller.php");
    $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

    $login_url = $gClient->createAuthUrl();
?>