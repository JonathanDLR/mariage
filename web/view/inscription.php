<?php $title="Jonathan & Marie: Inscription";
require_once($_SERVER['DOCUMENT_ROOT'].'/model/entity/Inscription.php');
ob_start(); ?>
    <section>
        <article>
            <h2>Votre Participation</h2>
            <form id="formIns">
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
                           min="1"
                           step="1"
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
                        <label for="nbreVegan" id="nbreVege">Nombre de repas Vege?</label>
                        <input type="number"
                               id="nbreVegan"
                               name="nbreVegan"
                               min="1"
                               step="1"
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
                        <label for="lendemain">Vous serez présent le lendemain?</label>
                        <input type="checkbox"
                               id="lendemain"
                               name="lendemain"
                               <?php if ($inscription instanceof Inscription) {
                                   
                                   if ($inscription->getLendemain() == "1") {
                                       echo "checked";
                                   }
                               } ?> />
                    </div>
                    <?php if (!$_SESSION['loge']) { ?>
                        <div>
                        <label for="logement">Vous souhaitez loger en gite ou hôtel?</label>
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
                    <?php } else { ?>
                        <div></div>
                    <?php }                    
                } ?>
                <div>
                    <input id="submit" type="submit" value="Envoyer" />
                </div>
            </form>
        </article>

        <div id="formOk" class="formOk"></div>

        <h2>Modifier votre mot de passe</h2>
        <article>
            <form id="formMdp">
                <div>
                    <label for="mdp">Mot de passe actuel</label>
                    <input type="password" name="mdp" id="mdp" />
                </div>
                <div>
                    <label for="newMdp">Nouveau mot de passe</label>
                    <input type="password" name="newMdp" id="newMdp" />
                </div>
                <div>
                    <label for="newMdpConf">Confirmez votre nouveau mot de passe</label>
                    <input type="password" name="newMdpConf" id="newMdpConf" />
                </div>
                <div>
                    <input type="submit" id="submitMdp" value="Modifier" />
                </div>
        </article>

        <div id="formOkMdp" class="formOk"></div>

    </section>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/view/common/template.php'); ?>