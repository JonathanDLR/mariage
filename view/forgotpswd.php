<?php $title = "Jonathan et Marie: Mot de Passe Oublié";

ob_start(); ?>
    <h1>Réinitialisation de Votre Mot de Passe</h1>
    <section id="DIVmail">
        <div><span>Votre Mail:</span><input type="text" id="mail"></div>
        <div><span>Confirmation:</span><input type="text" id="mailConf"></div>
        <div><input type="button" value="Réinitialiser" id="submit"></div>
    </section>

    <div id="formOk"></div>

<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/mariage/view/common/template.php'); ?>