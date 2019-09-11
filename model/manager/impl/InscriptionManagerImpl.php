<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/impl/AbstractManagerImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/contract/InscriptionManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/entity/Inscription.php');

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
            if ($inscriptionDao["allergie"] != null) {
                $inscription->setAllergie($inscriptionDao["allergie"]);
            }
            if ($inscriptionDao["type_logement"] != null) {
                $inscription->setLogement($inscriptionDao["type_logement"]);
            }
            if ($inscriptionDao["type_invit"] != null) {
                $inscription->setInvit($inscriptionDao["type_invit"]);
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
    public function createInscription($loginId, $nbreParticipant, $invit, $vegan = NULL, $allergie = NULL,
        $logement = NULL) {
            $inscription = new Inscription();
            $inscription->setLogin($loginId);
            $inscription->setNbre($nbreParticipant);
            $inscription>setInvit($invit);
            $inscription->setVegan($vegan);
            $inscription->setAllergie($allergie);
            $inscription->setLogement($logement);
    }

    /**
     * Send inscription in db
     */
    public function sendInscription($inscription) {
        self::getDaoFactory()->getInscriptionDao()->createInscriptionDb($inscription);
    }

    public function updateInscription($inscription) {
        self::getDaoFactory()->getInscriptionDao()->updateInscriptionDb($inscription);
    }

    /**
     * Deleting inscription
     */
    public function deleteInscription($login) {
        self::getDaoFactory()->getInscriptionDao()->deleteInscriptionDb($login);
    }
}

?>