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
            $user = self::getManagerFactory()->getUserManager()->getUser($login);
            $response = self::getManagerFactory()->getUserManager()->sendMail($user);

            echo $response;
        } else {
            echo "Vous n'etes pas connecté!";
            include('view/connexion.php');
        }
    }
}

?>