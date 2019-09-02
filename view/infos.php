<?php $title="Jonathan & Marie: Informations";
ob_start(); 
?>
    <section>
        <article>
            <span>Informations <?php echo $_SESSION['nom'] . $_SESSION['type']; ?></span>
        </article>

        <?php if ($_SESSION['type'] !== "civil") { ?>
            <article>
                <span>Infos Prieuré</span>
            </article>
        <?php } ?>

        <?php if ($_SESSION['type'] !== "laique") { ?>
            <article>
                <span>Infos Mairie</span>
            <article>
        <?php } ?>
    </section>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/mariage/view/common/template.php'); ?>