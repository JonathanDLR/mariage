<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/controller/ConnexionController.php');

class Router {
    private $_connexionController;

    public function __construct() {
        $this->_connexionController = new ConnexionController();
    }

    public function route() {
        if (isset($_POST["login"])) {
            $this->_connexionController->connect();
        } else if (isset($_GET["action"])) {
            switch($_GET["action"]) {
                case "accueil":
                    if (isset($_SESSION['nom'])) {
                        include("view/accueil.php");
                        break;
                    } else {
                        echo "Vous n'etes pas connecté!";
                        include('view/connexion.php');
                        break;
                    }
                case "informations":
                    if (isset($_SESSION['nom'])) {
                        include("view/infos.php");
                        break;
                    } else {
                        echo "Vous n'etes pas connecté!";
                        include('view/connexion.php');
                        break;
                    }
                case "inscription":
                    if (isset($_SESSION['nom'])) {
                        include("view/inscription.php");
                        break;
                    } else {
                        echo "Vous n'etes pas connecté!";
                        include('view/connexion.php');
                        break;
                    }
                case "deco":
                    if (isset($_SESSION['nom'])) {
                        $this->_connexionController->deconnexion();
                        break;
                    } else {
                        echo "Vous n'etes pas connecté!";
                        include('view/connexion.php');
                        break;
                    }
            }
        } else {
            include("view/connexion.php");
        }      
    }
}

?>