<?php
    require_once('class/controller.class.php');
    require_once('config.php');
    if(isset($_GET["code"])){
        $token = $gClient->fetchAccessTokenWithAuthCode($_GET["code"]);
    }else{
        header('Location:login.php');
        exit();
    }

    if(isset($token["error"]) != "invalid_grant" ){
        $OAuth = new Google\Service\Oauth2($gClient);
        $userData = $OAuth->userinfo_v2_me->get();
      
        //insert data
        $Controller = new Controller;
        echo $Controller -> insertData(array(
            'email' => $userData['email'],
            'givenName' => $userData['givenName'],
            'familyName' => $userData['familyName']
            
        ));

      //var_dump($userData);
       
    }else{
        header('Location:login.php');
        exit();
    }
?>