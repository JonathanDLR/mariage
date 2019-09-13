<?php $title="Jonathan & Marie: Inscription";
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/entity/Inscription.php');
ob_start(); ?>
    <section>
        <article>
            <span>Inscription <?php echo $_SESSION['nom'] . $_SESSION['type']; ?></span>
            <form>
                <div>
                    <label for="presence">Vous serez présent</label>
                    <input type="checkbox" 
                           id="presence"
                           name="presence"
                           <?php if ($inscription instanceof Inscription) {
                               echo 'checked';
                           } ?>
                            />
                </div>
                <div>
                    <label for="nbre">Nombre de personne</label>
                    <input type="number"
                           id="nbre"
                           name="nbre"
                           <?php if ($inscription instanceof Inscription) { ?>
                            value="<?php echo $inscription->getNbre(); ?>"    
                           <?php } ?> />
                </div>
                <?php if ($_SESSION['type'] !== "civil") { ?>
                    <div>
                        <label for="vegan">Vous souhaitez manger végétarien?</label>
                        <input type="checkbox"
                               id="vegan"
                               name="vegan"
                               <?php if ($inscription instanceof Inscription) {
                                   if ($inscription->getVegan() == TRUE) {
                                       echo 'checked';
                                   }
                               } ?> />
                        <label for="nbreVegan">Nombre de repas Vege?</label>
                        <input type="number"
                               id="nbreVegan"
                               name="nbreVegan"
                               <?php if ($inscription instanceof Inscription) { ?>
                                value="<?php echo $inscription->getNbreVegan(); ?>"
                               <?php } ?> />
                    </div>
                    <div>
                        <label for="allergie">Vous avez des allergies?</label>
                        <input type="text"
                               id="allergie"
                               name="allergie"
                               <?php if ($inscription instanceof Inscription) { ?>
                                value="<?php echo $inscription->getAllergie(); ?>"
                               <?php } ?> />
                    </div>
                    <div>
                        <label for="civil">Vous serez présent au mariage civil?</label>
                        <input type="checkbox"
                               id="civil"
                               name="civil"
                               <?php if ($inscription instanceof Inscription) {
                                   if ($inscription->getInvit() == "3") {
                                       echo "checked";
                                   }
                               } ?> />
                    </div>
                    <div>
                        <label for="logement">Gite ou Hotel?</label>
                        <select id="logement" name="logement">
                            <option value=1
                                    <?php if ($inscription instanceof Inscription) {
                                        if ($inscription->getLogement() == "1") {
                                            echo "selected";
                                        }
                                    } ?>
                            >Gite</option>
                            <option value=2
                                    <?php if ($inscription instanceof Inscription) {
                                        if ($inscription->getLogement() == "2") {
                                            echo "selected";
                                        }
                                    } ?>
                                    >Hotel</option>
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