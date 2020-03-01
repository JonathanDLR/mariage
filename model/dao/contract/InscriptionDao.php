<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/entity/Inscription.php');

interface InscriptionDao {
    public function getInscriptionDb($loginId);
    public function createInscriptionDb(Inscription $pInscription);
    public function updateInscriptionDb(Inscription $pInscription);
    public function deleteInscriptionDb($loginId);
}