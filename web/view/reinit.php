<?php $title = "Jonathan et Marie: Réinitialisation Mot de Passe";
require_once($_SERVER['DOCUMENT_ROOT'].'/model/entity/User.php');

ob_start(); ?>
    <?php if ($user instanceof User) { ?>
        <h1>Réinitialisation de Votre Mot de Passe</h1>
        <section id="DIVmdp">
            <div><span>Votre Mot de Passe:</span><input type="password" id="mdp"></div>
            <div><span>Confirmation:</span><input type="password" id="mdpConf"></div>
            <div><input type="button" value="Réinitialiser" id="submit"></div>
    </section>


        <div id="formOk"></div>
    <?php } else { ?>
        <h1>Réinitialisation de Votre Mot de Passe</h1>
        <section id="DIVmdp">
            Aucune demande de réinitialisation n'a été trouvé pour ce compte.
    </section>
    <?php } ?>
 
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/view/common/template.php'); ?>