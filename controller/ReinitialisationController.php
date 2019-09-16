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
}
?>