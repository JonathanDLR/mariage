<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/dao/impl/AbstractDaoImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/dao/contract/UserDao.php');

/**
 * Interact with user table
 */
class UserDaoImpl extends AbstractDaoImpl implements UserDao {

  /**
   * Getting the DB user with login
   */
  public function getDbUser($login) {
    try {
      $connection = self::getDaoFactory()->getConnection();
      $req = $connection->prepare('SELECT invite.id, nom, loginn, mdp, invitation.typee as type_invit FROM
        invite JOIN invitation ON invite.type_invit = invitation.id WHERE loginn = :loginn');
      $req->bindParam(':loginn', $login, PDO::PARAM_STR);
      $req->execute();
  
      $response = $req->fetch(PDO::FETCH_ASSOC);
  
    } catch (PDOException $e) {
      $response = "Erreur: " . $e->getMessage();
    }
    return $response;
  }
}
?>