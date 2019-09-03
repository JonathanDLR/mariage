<?php $title="Jonathan & Marie: Connexion";
ob_start(); ?>
    <form method="post" action="index.php">
        <div>
            <label for="login">Votre login</label>
            <input type="text" id="login" name="login" />
        </div>
        <div>
            <label for ="mdp">Votre mot de passe</label>
            <input type="password" id="mdp" name="mdp" />
        </div>
        <div>
            <input type="submit" value="Connexion" />
        </div>
    </form>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/mariage/view/common/template.php'); ?>
