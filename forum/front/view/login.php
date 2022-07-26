<?php
    $title = 'Se connecter';
    ob_start();
?>

<form method="POST" action="../../index.php?action=loginUserCtrl">

    <h1>Connecter vous</h1>

    <!-- display login error here -->
    <?php if(isset($errorLogin)): ?>
        <div>
            <?= $errorLogin; ?>
        </div>
    <?php endif; ?>    
    
    <div>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="pass">Mot de passe</label><br >
        <input type="password" name="pass" id="pass" required>
    </div>

    <button type="submit">Se connecter</button>
</form>

<div>
    <a href="#">Mot de passe oublié</a>
</div>

<?php
    $content = ob_get_clean();
    require_once('templates.php');
?>