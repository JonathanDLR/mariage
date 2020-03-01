<?php $title="Jonathan & Marie: Accueil";
ob_start(); ?>
    <section>
        <article>
            <h1>Bonjour <?php echo ucfirst($_SESSION['nom']); ?></h1>

            <p>
                Bienvenue sur le site de notre mariage!<br/><br/>
                Vous y trouverez les formulaires pour valider votre participation
                ainsi que toutes les informations utiles<br/>
                sur les logements et les cérémonies.<br/><br/>
                N'hésitez pas à nous contacter si vous avez la moindre question:<br/><br/>
                Marie: 06 . 32 . 37 . 96 . 84<br/>
                Jonathan: 06 . 31 . 59 . 60 . 72<br/><br/>
                Nous espérons vous compter parmi nous.<br/>
                Bonne navigation!
            </p>
        </article>
    </section>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/view/common/template.php'); ?>