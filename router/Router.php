<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/dao/impl/DaoFactoryImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/manager/impl/ManagerFactoryImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/controller/ConnexionController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/controller/AccueilController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/controller/InfosController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/controller/HebergementsController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/controller/InscriptionController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/controller/ForgotpswdController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/controller/ReinitialisationController.php');

class Router {
    private $_daoFactory;
    private $_managerFactory;
    private $_connexionController;
    private $_accueilController;
    private $_infosController;
    private $_hebergementsController;
    private $_inscriptionController;
    private $_forgotpswdController;
    private $_reinitialisationController;

    public function __construct() {
        $this->_daoFactory = new DaoFactoryImpl();
        $this->_managerFactory = new ManagerFactoryImpl($this->_daoFactory);
        $this->_connexionController = new ConnexionController($this->_managerFactory);
        $this->_accueilController = new AccueilController();
        $this->_infosController = new InfosController();
        $this->_hebergementsController = new HebergementsController();
        $this->_inscriptionController = new InscriptionController($this->_managerFactory);
        $this->_forgotpswdController = new ForgotpswdController($this->_managerFactory);
        $this->_reinitialisationController = new ReinitialisationController($this->_managerFactory);
    }

    public function route() {
        if (isset($_POST["login"])) {
            $this->_connexionController->connect();
        } else if (isset($_POST["inscription"])) {
            $this->_inscriptionController->sendInscription();
        } else if (isset($_POST["callreinit"])) {
            $this->_forgotpswdController->sendMail();
        } else if (isset($_POST["reinit"])) {
            $this->_reinitialisationController->change();
        } else if (isset($_POST["changepswd"])) {
            $this->_inscriptionController->changePswd();
        }
        else if (isset($_GET["action"])) {
            switch($_GET["action"]) {
                case "accueil":
                    $this->_accueilController->getAccueil();
                    break;  
                case "informations":
                    $this->_infosController->getInfos();
                    break;
                case "hebergements":
                    $this->_hebergementsController->getHebergements();
                    break;
                case "inscription":
                    $this->_inscriptionController->getInscription();
                    break;
                case "forgotpswd":
                    $this->_forgotpswdController->getPswd();
                    break;
                case "reinit":
                    $this->_reinitialisationController->getReinit();
                    break;
                case "deco":                
                    $this->_connexionController->deconnexion();
                    break;
            }
        } else {
            $this->_connexionController->getConnexion();
        }      
    }
}

?>