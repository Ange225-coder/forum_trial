<?php session_start();

    $title = 'Inscrivez-vous';
    ob_start();
?>

<form method="POST" action="../../index.php?action=newUserInsertionCtrl">

    <div>
        <label for="pseudo">Pseudonyme</label><br>
        <input type="text" name="pseudo" id="pseudo" required>
    </div>

    <div>
        <label for="email">Email</label><br >
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="pass">Mot de passe</label><br >
        <input type="password" name="pass" id="pass" required>
    </div>

    <div>
        <label for="confirm_pass">Confimer le mot de passe</label><br>
        <input type="password" name="confirm_pass" id="confirm_pass" required>
    </div>

    <button type="submit">S'inscrire</button>
</form>

<?php
    $content = ob_get_clean();
    require_once('templates.php');
?>