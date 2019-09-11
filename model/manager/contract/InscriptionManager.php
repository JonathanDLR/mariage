<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/impl/AbstractManagerImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/contract/InscriptionManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/entity/Inscription.php');

Interface InscriptionManager {
    public function getInscription($login);
    public function createInscription($loginId, $nbreParticipant, $invit, $vegan = NULL, $allergie = NULL,
        $logement = NULL);
    public function sendInscription($inscription);
    public function updateInscription($inscription);
    public function deleteInscription($login);
}

?>