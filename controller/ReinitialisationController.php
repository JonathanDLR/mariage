<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/controller/AbstractController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/entity/User.php');

class ReinitialisationController extends AbstractController {
    public function getReinit() {
        $nom = htmlspecialchars($_GET["nom"]);
        $token = htmlspecialchars($_GET["token"]);
        $user = self::getManagerFactory()->getUserManager()->checkUser($nom, $token);
        include('view/reinit.php');
      
        return $user;
    }

    public function change() {
        $nom = htmlspecialchars($_POST["nom"]);
        $token = htmlspecialchars($_POST["token"]);
        $mdp = htmlspecialchars($_POST["mdp"]);
        $mdpConf = htmlspecialchars($_POST["mdpConf"]);

        if ($mdp == "") {
            echo "Veuillez renseigner votre mot de passe";
        } else if (!preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})#", $mdp)) {
            echo "Votre mot de passe doit contenir au minimum une lettre minuscule, une lettre majuscule, un chiffre et 6 caractères.";
        } else if ($mdpConf == "") {
            echo "Vous devez confirmer votre mot de passe";
        } else if ($mdp != $mdpConf) {
            echo "Les mots de passe ne sont pas identiques";
        } else {
            $user = self::getManagerFactory()->getUserManager()->checkUser($nom, $token);
            if ($user) {
                $response = self::getManagerFactory()->getUserManager()->changePswd($user, $mdp);
            } else {
                $response = "Erreur!";
            }
            echo $response;
        }

    }
}
?>