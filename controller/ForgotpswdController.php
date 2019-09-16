<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/controller/AbstractController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/entity/User.php');

class ForgotpswdController extends AbstractController {
    /**
     * get the view
     */
    public function getPswd() {
        if (isset($_SESSION['nom'])) {
            include("view/forgotpswd.php");
        } else {
            echo "Vous n'etes pas connecté!";
            include('view/connexion.php');
        }
    }

    /**
     * send the mail to reinit
     */
    public function sendmail() {
        if (isset($_SESSION["nom"])) {
            $login = htmlspecialchars($_POST["mail"]);
            $loginConf = htmlspecialchars($_POST["mailConf"]);
            if ($login == "") {
                echo "Veuillez renseigner votre mail.";
            } else if ($loginConf == "") {
                echo "Veuillez confirmer votre mail.";
            } else if ($login != $loginConf) {
                echo "Les mails ne sont pas identiques.";
            } else if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
                $user = self::getManagerFactory()->getUserManager()->getUser($login);
                $response = self::getManagerFactory()->getUserManager()->sendMail($user);

                echo $response;
            } else {
                echo "Mail non valide";
            }
        } else {
            echo "Vous n'etes pas connecté!";
            include('view/connexion.php');
        }
    }
}

?>