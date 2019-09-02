<?php $title="Jonathan & Marie: Connexion";
ob_start(); ?>
    <form method="post" action="index.php">
        <label for="login">Votre login</label>
        <input type="text" id="login" name="login" />
        <label for ="mdp">Votre mot de passe</label>
        <input type="password" id="mdp" name="mdp" />
        <input type="submit" value="Connexion" />
    </form>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/mariage/view/common/template.php'); ?>
