<?php $title="Jonathan & Marie: Accueil";
ob_start(); ?>
    <section>
        <article>
            <span>Bonjour <?php echo $_SESSION['nom'] . $_SESSION['type']; ?></span>
        </article>
    </section>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/mariage/view/common/template.php'); ?>