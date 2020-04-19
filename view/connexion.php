<?php $title="Jonathan & Marie: Connexion";
ob_start(); ?>
    <form method="post" action="index.php">
        <div>
            <label for="login" title="Pour une première connexion, il s'agit de votre adresse mail">Votre login</label>
            <input type="text" id="login" name="login" />
        </div>
        <div>
            <label for ="mdp" title="Pour une première connexion, il s'agit de votre adresse mail">Votre mot de passe</label>
            <input type="password" id="mdp" name="mdp" />
        </div>
        <div>
            <input id="submit" type="submit" value="Connexion" />
        </div>
    </form>

    <div id="formOk"></div>

    <article>
        <a href="forgotpswd">Mot de passe oublié</a>
    </article>

    <article>
        <span>Pas de compte? <a href="mailto:marie.jonathan.mariage@gmail.com"> Contactez-nous</a></span>
    </article>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/view/common/template.php'); ?>
