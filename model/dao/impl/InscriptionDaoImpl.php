<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/dao/impl/AbstractDaoImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/dao/contract/InscriptionDao.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/entity/Inscription.php');

/**
 * Interact with inscription table
 */
class InscriptionDaoImpl extends AbstractDaoImpl implements InscriptionDao {

  /**
   * Getting the DB inscription with login
   */
  public function getInscriptionDb($loginId) {
    try {
      $connection = self::getDaoFactory()->getConnection();
      $req = $connection->prepare('SELECT inscription.id, login_id, nbre_participant, vegan, allergie,type_logement,
        type_invit FROM inscription WHERE login_id = :loginId');
      $req->bindParam(':loginId', $loginId, PDO::PARAM_INT);
      $req->execute();
  
      $response = $req->fetch(PDO::FETCH_ASSOC);
  
    } catch (PDOException $e) {
      $response = "Erreur: " . $e->getMessage();
    }
    return $response;
  }

  /**
   * Creating new inscription in table
   */
  public function createInscriptionDb(Inscription $pInscription) {
      try {
        $connection = self::getDaoFactory()->getConnection();
        $req = $connection->prepare('INSERT into inscription (login_id, nbre_participant, vegan, allergie,
            type_logement, type_invit) VALUES (:loginId, :nbreParticipant, :vegan, :allergie, :typeLogement, :typeInvit)');
        $req->bindValue(':loginId', $pInscription->getLogin(), PDO::PARAM_INT);
        $req->bindValue(':nbreParticipant', $pInscription->getNbre(), PDO::PARAM_INT);
        $req->bindValue(':vegan', $pInscription->getVegan(), PDO::PARAM_BOOL);
        $req->bindValue(':allergie', $pInscription->getAllergie(), PDO::PARAM_STR);
        $req->bindValue(':typeLogement', $pInscription->getLogement(), PDO::PARAM_INT);
        $req->bindValue(':typeInvit', $pInscription->getInvit(), PDO::PARAM_INT);
        $req->execute();

        $response = "Votre inscription est bien prise en compte!";
      } catch (PDOException $e) {
          $response = "Erreur: " . $e->getMessage();
      }

      return $response;
  }

  /**
   * Update inscription in table
   */
  public function updateInscriptionDb(Inscription $pInscription) {
    try {
        $connection = self::getDaoFactory()->getConnection();
        $req = $connection->prepare('UPDATE inscription SET nbre_participant = :nbreParticipant, vegan = :vegan,
          allergie = :allergie, type_logement = :typeLogement, type_invit = :typeInvit WHERE login_id = :loginId');
        $req->bindValue(':nbreParticipant', $pInscription->getNbre(), PDO::PARAM_INT);
        $req->bindValue(':vegan', $pInscription->getVegan(), PDO::PARAM_BOOL);
        $req->bindValue(':allergie', $pInscription->getAllergie(), PDO::PARAM_STR);
        $req->bindValue(':typeLogement', $pInscription->getLogement(), PDO::PARAM_INT);
        $req->bindValue(':typeInvit', $pInscription->getInvit(), PDO::PARAM_INT);
        $req->bindValue(':loginId', $pInscription->getLogin(), PDO::PARAM_INT);
        $req->execute();

        $response = "Votre inscription a bien été modifiée!";
      } catch (PDOException $e) {
          $response = "Erreur: " . $e->getMessage();
      }

      return $response;
  }

  /**
   * Delete inscription from the table
   */
  public function deleteInscriptionDb($loginId) {
    try {
        $connection = self::getDaoFactory()->getConnection();
        $req = $connection->prepare('DELETE from inscription WHERE login_id = :loginId');
        $req->bindParam(':loginId', $loginId, PDO::PARAM_INT);
        $req->execute();

        $response = "Votre inscription a été supprimée!";
    } catch (PDOException $e) {
        $response = "Erreur: " . $e->getMessage();
    }

    return $response;
  }
}
?>