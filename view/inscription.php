<?php $title="Jonathan & Marie: Inscription";
ob_start(); ?>
    <section>
        <article>
            <span>Inscription <?php echo $_SESSION['nom'] . $_SESSION['type']; ?></span>

            <form>
                <label for="mail">Votre adresse mail</label>
                <input type="text" id="mail" name="mail" placeholder="<?php echo $_SESSION['login']; ?>" />
                <label for="presence">Vous serez présent</label>
                <input type="checkbox" id="presence" name="presence" />
                <label for="nbre">Nombre de personne</label>
                <input type="number" id="nbre" name="nbre" />
                <?php if ($_SESSION['type'] !== "civil") { ?>
                    <label for="vegan">Vous souhaitez manger végétarien?</label>
                    <input type="checkbox" id="vegan" name="vegan" />
                    <label for="allergie">Vous avez des allergies?</label>
                    <input type="text" id="allergie" name="allergie" />
                    <label for="civil">Vous serez présent au mariage civil?</label>
                    <input type="checkbox" id="civil" name="civil" />
                    <label for="logement">Gite ou Hotel?</label>
                    <select id="logement" name="logement">
                        <option value=1>Gite</option>
                        <option value=2>Hotel</option>
                    </select>
                <?php } ?>

                <input type="submit" value="Envoyer" />
            </form>
        </article>

        <article>
            <a href="#">Modifier votre mot de passe</a>
        </article>
    </section>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/mariage/view/common/template.php'); ?>