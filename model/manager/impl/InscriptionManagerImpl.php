<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/manager/impl/AbstractManagerImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/manager/contract/InscriptionManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/entity/Inscription.php');

/**
 * Manager of the inscription entity
 */
class InscriptionManagerImpl extends AbstractManagerImpl implements InscriptionManager {
    /**
     * Getting inscription if exist
     */
    public function getInscription($login) {
        $inscriptionDao = self::getDaoFactory()->getInscriptionDao()->getInscriptionDb($login);

        if (is_array($inscriptionDao)) {
            $inscription = new Inscription();
            $inscription->setId($inscriptionDao["id"]);
            $inscription->setLogin($inscriptionDao["login_id"]);
            $inscription->setNbre($inscriptionDao["nbre_participant"]);
            if ($inscriptionDao["vegan"] != null) {
                $inscription->setVegan($inscriptionDao["vegan"]);
            }
            if ($inscriptionDao["nbre_repas_vegan"] != null) {
                $inscription->setNbreVegan($inscriptionDao["nbre_repas_vegan"]);
            }
            if ($inscriptionDao["allergie"] != null) {
                $inscription->setAllergie($inscriptionDao["allergie"]);
            }
            if ($inscriptionDao["type_logement"] != null) {
                $inscription->setLogement($inscriptionDao["type_logement"]);
            }
            if ($inscriptionDao["type_invit"] != null) {
                $inscription->setInvit($inscriptionDao["type_invit"]);
            }
            if ($inscriptionDao["repas_lendemain"] != null) {
                $inscription->setLendemain($inscriptionDao["repas_lendemain"]);
            }
            if ($inscriptionDao["nuit"] != null) {
                $inscription->setNuit($inscriptionDao["nuit"]);
            }
            if ($inscriptionDao["type_gite"] != null) {
                $inscription->setGite($inscriptionDao["type_gite"]);
            }
            if ($inscriptionDao["logemari"] != null) {
                $inscription->setLogemari($inscriptionDao["logemari"]);
            }

            $response = $inscription;
        } else {
            $response = "KO";
        }

        return $response;
    }

    /**
     * Creating inscription
     */
    public function createInscription($loginId, $nbreParticipant, $invit, $vegan = NULL, $nbreVegan = NULL, 
        $allergie = NULL, $logement = NULL, $lendemain = NULL, $nuit = NULL, $gite = NULL, $logemari = NULL) {
            $inscription = new Inscription();
            $inscription->setLogin($loginId);
            $inscription->setNbre($nbreParticipant);
            $inscription->setInvit($invit);
            $inscription->setVegan($vegan);
            $inscription->setNbreVegan($nbreVegan);
            $inscription->setAllergie($allergie);
            $inscription->setLogement($logement);
            $inscription->setLendemain($lendemain);
            $inscription->setNuit($nuit);
            $inscription->setGite($gite);
            $inscription->setLogemari($logemari);

            return $inscription;
    }

    /**
     * Send inscription in db
     */
    public function sendInscription($inscription) {
        $response = self::getDaoFactory()->getInscriptionDao()->createInscriptionDb($inscription);
        return $response;
    }

    public function updateInscription($inscription) {
        $response = self::getDaoFactory()->getInscriptionDao()->updateInscriptionDb($inscription);
        return $response;
    }

    /**
     * Deleting inscription
     */
    public function deleteInscription($login) {
        $response = self::getDaoFactory()->getInscriptionDao()->deleteInscriptionDb($login);
        return $response;
    }
}

?>