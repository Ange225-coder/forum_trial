<?php session_start();

    $_SESSION['email'] = [];
    $_SESSION['pseudo'] = [];
    session_destroy();
    
    setcookie('LOGGED_USER');

    

    header('Location: ../../../../../forum');