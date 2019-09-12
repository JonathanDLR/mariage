<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/controller/AbstractController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/entity/Inscription.php');

/**
 * Inscription Controller
 */
class InscriptionController extends AbstractController {
    /**
     * send the view and info if exist in db
     */
    public function getInscription() {
        if (isset($_SESSION['nom'])) {
            $inscription = self::getManagerFactory()->getInscriptionManager()->getInscription($_SESSION["id"]);
            include("view/inscription.php");
            var_dump($inscription);
            if ($inscription instanceof Inscription) {
                return $inscription;
            }          
        } else {
            echo "Vous n'etes pas connecté!";
            include('view/connexion.php');
        }
    }

    /**
     * send infos to db
     */
    public function sendInscription() {
        if (isset($_SESSION["nom"])) {
            // CHECK IF INSCRIPTION EXIST
            $inscription = self::getManagerFactory()->getInscriptionManager()->getInscription($_SESSION["id"]);
            $presenceString = htmlspecialchars($_POST["presence"]);
            if ($presenceString == "true") {
                $presence = TRUE;
            } else {
                $presence = FALSE;
            }
            // IF PRESENCE CHECKED, CONTROL OF DATA
            if ($presence == TRUE) {
                $nbre = htmlspecialchars($_POST["nbre"]);
                $invit = 2;
                if (($_SESSION["type"] == "laique") || ($_SESSION["type"] == "both")) {
                    $veganString = htmlspecialchars($_POST["vegan"]);
                    if ($veganString == "true") {
                        $vegan = TRUE;
                    } else {
                        $vegan = FALSE;
                    }
                    $allergie = htmlspecialchars($_POST["allergie"]);
                    $civil = htmlspecialchars($_POST["civil"]);
                    $logement = htmlspecialchars($_POST["logement"]);
                    if ($civil == "true") {
                        $invit = 3;
                    } else {
                        $invit = 1;
                    }
                    // CREATING INSCRIPTION
                    $newInscription = self::getManagerFactory()->getInscriptionManager()->createInscription(
                        $_SESSION["id"], $nbre, $invit, $vegan, $allergie, $logement
                    );
                } else {
                    $newInscription = self::getManagerFactory()->getInscriptionManager()->createInscription(
                        $_SESSION["id"], $nbre, $invit
                    );
                }
                // CREATING OR UPDATE IN DB
                if ($inscription instanceof Inscription) {
                   $response = self::getManagerFactory()->getInscriptionManager()->updateInscription($newInscription);
                } else {
                    $response = self::getManagerFactory()->getInscriptionManager()->sendInscription($newInscription);
                }
                // IF PRESENCE NOT CHECKED, DELETING OR SENDING ERROR MSG
            } else {
                if ($inscription instanceof Inscription) {
                    $response = self::getManagerFactory()->getInscriptionManager()->deleteInscription($_SESSION["id"]);
                } else {
                    $response = "Aucune inscription enregistrée!";
                }
            }
            echo $response;
        } else {
            echo "Vous n'etes pas connecté!";
            include('view/connexion.php');
        }
    }
}

?>