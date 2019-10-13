<?php $title="Jonathan & Marie: Hébergements";
ob_start(); 
?>
    <section>
        <article>
            <span>Hébergements <?php echo $_SESSION['nom'] . $_SESSION['type']; ?></span>
        </article>

        <?php if (($_SESSION['type'] != "civil") && (!$_SESSION['loge'])) { ?>
            <article>
                <span>Infos Gites</span>
            </article>
            <article>
                <span>Infos Hotel</span>
            </article>
        <?php } else { ?>
            <article>
                <span>Vous n'avze rien à faire ici! Ouste!</span>
            </article>
        <?php } ?>
    </section>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/mariage/view/common/template.php'); ?>