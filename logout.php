<?php
    setcookie('g_id','', time() - 60*60*24*30, '/');
    setcookie('sess','', time() - 60*60*24*30, '/');
    header('Location: login.php');
    die();

?>