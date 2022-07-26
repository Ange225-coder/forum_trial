<?php

    $title = 'Forum de freelance';
    ob_start();
?>

<h1>
    Bienvenu sur le premier forum web ivoirien
</h1>

<div>
    <a href="front/view/registration.php?action=registration">S'inscrire</a><br >
    <a href="front/view/login.php?action=login">Se connecter</a>
</div>

<?php
    $content = ob_get_clean();
    require_once('templates.php');
?>
