<?php $title="Jonathan & Marie: Accueil";
ob_start(); ?>
    <section>
        <article>
            <?php if ($_SESSION['type'] != "civil") { ?>
                <div id="DIVcarte"><img src="web/img/carte_ok.png" alt="carte"/></div>
            <?php } else { ?>
                <div id="DIVcarte"><img src="web/img/carte_civil.png" alt="carte"/></div> 
            <?php } ?>
            <h1>Bienvenue <?php echo ucfirst($_SESSION['nom']); ?></h1>

            <p>
                Nous espérons vous compter parmi nous!<br/>
                Vous trouverez sur ce site toutes les informations utiles sur notre mariage ainsi que le
                formulaire pour valider votre participation.<br/><br/>
                Pour toutes vos questions:<br/><br/>
                <span id="tel">
                    <span id="telM"><span class="nomtel">Marie</span>: 06 32 37 96 84</span>
                    <span id="telJ"><span class="nomtel">Jonathan</span>: 06 31 59 60 72</span>
                </span>
            </p>
        </article>
    </section>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/view/common/template.php'); ?>