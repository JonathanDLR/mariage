<?php $title="Jonathan & Marie: Inscription";
ob_start(); ?>
    <section>
        <article>
            <span>Inscription <?php echo $_SESSION['nom'] . $_SESSION['type']; ?></span>

            <form>
                <div>
                    <label for="mail">Votre adresse mail</label>
                    <input 
                        type="text"
                        id="mail"
                        name="mail"
                        data-id="<?php echo $_SESSION["id"]; ?>"
                        value="<?php echo $_SESSION['login']; ?>" />
                </div>
                <div>
                    <label for="presence">Vous serez présent</label>
                    <input type="checkbox" id="presence" name="presence" />
                </div>
                <div>
                    <label for="nbre">Nombre de personne</label>
                    <input type="number" id="nbre" name="nbre" />
                </div>
                <?php if ($_SESSION['type'] !== "civil") { ?>
                    <div>
                        <label for="vegan">Vous souhaitez manger végétarien?</label>
                        <input type="checkbox" id="vegan" name="vegan" />
                    </div>
                    <div>
                        <label for="allergie">Vous avez des allergies?</label>
                        <input type="text" id="allergie" name="allergie" />
                    </div>
                    <div>
                        <label for="civil">Vous serez présent au mariage civil?</label>
                        <input type="checkbox" id="civil" name="civil" />
                    </div>
                    <div>
                        <label for="logement">Gite ou Hotel?</label>
                        <select id="logement" name="logement">
                            <option value=1>Gite</option>
                            <option value=2>Hotel</option>
                        </select>
                    </div>
                <?php } ?>
                <div>
                    <input id="submit" type="submit" value="Envoyer" />
                </div>
            </form>
        </article>

        <div id="formOk"></div>

        <article>
            <a href="#">Modifier votre mot de passe</a>
        </article>
    </section>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/mariage/view/common/template.php'); ?>