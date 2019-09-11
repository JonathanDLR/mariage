<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/contract/UserManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/contract/InscriptionManager.php');

Interface ManagerFactory {
    public function getUserManager();
    public function getInscriptionManager();
}

?>