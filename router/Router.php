<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/dao/impl/DaoFactoryImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/impl/ManagerFactoryImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/controller/ConnexionController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/controller/AccueilController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/controller/InfosController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/controller/InscriptionController.php');

class Router {
    private $_daoFactory;
    private $_managerFactory;
    private $_connexionController;
    private $_accueilController;
    private $_infosController;
    private $_inscriptionController;

    public function __construct() {
        $this->_daoFactory = new DaoFactoryImpl();
        $this->_managerFactory = new ManagerFactoryImpl($this->_daoFactory);
        $this->_connexionController = new ConnexionController($this->_managerFactory);
        $this->_accueilController = new AccueilController();
        $this->_infosController = new InfosController();
        $this->_inscriptionController = new InscriptionController($this->_managerFactory);
    }

    public function route() {
        if (isset($_POST["login"])) {
            $this->_connexionController->connect();
        } else if (isset($_GET["action"])) {
            switch($_GET["action"]) {
                case "accueil":
                    $this->_accueilController->getAccueil();
                    break;  
                case "informations":
                    $this->_infosController->getInfos();
                    break;
                case "inscription":
                    $this->_inscriptionController->getInscription();
                    break;
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