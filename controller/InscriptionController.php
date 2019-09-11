<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/controller/AbstractController.php');

/**
 * Inscription Controller
 */
class InscriptionController extends AbstractController {
    /**
     * send the view and info if exist in db
     */
    public function getInscription() {
        if (isset($_SESSION['nom'])) {
            $inscription = self::getManagerFactory()->getInscriptionManager()->getInscription($_SESSION["nom"]);
            if (is_array($inscription)) {
                return $inscription;
            }
            include("view/inscription.php");
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
            $inscription = self::getManagerFactory()->getInscriptionManager()->getInscription($_SESSION["nom"]);
            if ($_POST["presence"] == TRUE) {
                $loginId = htmlspecialchars($_POST["mail"]);
                $nbre = htmlspecialchars($_POST["nbre"]);
                $invit = 2;
                if ($_SESSION["type"] == "laique") {
                    $veganString = $_POST["vegan"];
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
                    $newInscription = self::getManagerFactory()->getInscriptionManager()->createInscription(
                        $loginId, $nbre, $invit, $vegan, $allergie, $logement
                    );
                } else {
                    $newInscription = self::getManagerFactory()->getInscriptionManager()->createInscription(
                        $loginId, $nbre, $invit
                    );
                }
                if (is_array($inscription)) {
                   $response = self::getManagerFactory()->getInscriptionManager()->updateInscription($newInscription);
                } else {
                    $response = self::getManagerFactory()->getInscriptionManager()->sendInscription($newInscription);
                }
            } else {
                if (is_array($inscription)) {
                    $response = self::getManagerFactory()->getInscriptionManager()->deleteInscription($_SESSION["nom"]);
                }
            }

            return $response;
        } else {
            echo "Vous n'etes pas connecté!";
            include('view/connexion.php');
        }
    }
}

?>