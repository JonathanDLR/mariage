<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/manager/impl/AbstractManagerImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/manager/contract/InscriptionManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/entity/Inscription.php');

Interface InscriptionManager {
    public function getInscription($login);
    public function createInscription($loginId, $nbreParticipant, $invit, $vegan = NULL, $nbreVegan = NULL, 
        $allergie = NULL, $logement = NULL);
    public function sendInscription($inscription);
    public function updateInscription($inscription);
    public function deleteInscription($login);
}

?>