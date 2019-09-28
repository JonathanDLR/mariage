<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/controller/AbstractController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/entity/Inscription.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/entity/User.php');

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
                        $nbreVegan = htmlspecialchars($_POST["nbreVegan"]);
                    } else {
                        $vegan = FALSE;
                        $nbreVegan = 0;
                    }                   
                    $allergie = htmlspecialchars($_POST["allergie"]);
                    $civil = htmlspecialchars($_POST["civil"]);
                    $logement = htmlspecialchars($_POST["logement"]);
                    if ($civil == "true") {
                        $invit = 3;
                    } else {
                        $invit = 1;
                    }
                    $lendemainString = htmlspecialchars($_POST["lendemain"]);
                    if ($lendemainString == "true") {
                        $lendemain = TRUE;
                    } else {
                        $lendemain = FALSE;
                    }
                    // CREATING INSCRIPTION
                    $newInscription = self::getManagerFactory()->getInscriptionManager()->createInscription(
                        $_SESSION["id"], $nbre, $invit, $vegan, $nbreVegan, $allergie, $logement, $lendemain
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

    /**
     * Change password
     */
    public function changePswd() {
        if (isset ($_SESSION["login"])) {
            $login = $_SESSION['login'];
            $mdp = htmlspecialchars($_POST["mdp"]);
            $newMdp = htmlspecialchars($_POST["newMdp"]);
            $newMdpConf = htmlspecialchars($_POST["newMdpConf"]);
            $user = self::getManagerFactory()->getUserManager()->getUser($login);

            if (!password_verify($mdp, $user->getMdp())) {
                $response = "Le mot de passe actuel est incorrect";
            } else {
                if ($mdp == "") {
                    $response = "Veuillez renseigner votre mot de passe";
                } else if ($newMdp == "") {
                    $response = "Veuillez renseigner votre nouveau mot de passe";
                } else if (!preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})#", $newMdp)) {
                    $response = "Votre mot de passe doit contenir au minimum une lettre minuscule, une lettre majuscule, un chiffre et 6 caractères.";
                } else if ($newMdp != $newMdpConf) {
                    $response = "Les mots de passe ne sont pas identiques";
                } else {
                    $response = self::getManagerFactory()->getUserManager()->changePswd($user, $newMdp);
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