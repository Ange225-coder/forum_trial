<?php session_start();
    
    $title = 'Bienvenue '.$_SESSION['pseudo'];
    ob_start();

    include_once('memberDetails.php');
?>

<h1>Bienvenue sur le forum</h1>

<?php
    $content = ob_get_clean();
    require_once('templates.php');
?>