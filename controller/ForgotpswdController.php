<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/controller/AbstractController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/entity/User.php');
class ForgotpswdController extends AbstractController {
    /**
     * get the view
     */
    public function getPswd() {
        include("view/forgotpswd.php");   
    }

    /**
     * send the mail to reinit
     */
    public function sendmail() {
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
    }
}
?>