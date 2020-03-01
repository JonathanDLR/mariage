<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/dao/impl/AbstractDaoImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/dao/contract/UserDao.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/entity/User.php');

/**
 * Interact with user table
 */
class UserDaoImpl extends AbstractDaoImpl implements UserDao {

  /**
   * Getting the DB user with login
   */
  public function getDbUser($login) {
    try {
      $sql = "SELECT invite.id, nom, loginn, mdp, invitation.typee as type_invit, loge FROM
      invite JOIN invitation ON invite.type_invit = invitation.id WHERE loginn = :loginn";
      $connection = self::getDaoFactory()->getConnection();
      $req = $connection->prepare(''. $sql .'');
      $req->bindParam(':loginn', $login, PDO::PARAM_STR);

      $req->execute();
  
      $response = $req->fetch(PDO::FETCH_ASSOC);
  
    } catch (PDOException $e) {
      $response = "Erreur: " . $e->getMessage();
    }
    return $response;
  }

  /**
     * Set token in db
     */
    public function setTokenInvite(User $user) {
      try {
          $connection = self::getDaoFactory()->getConnection();
          $req = $connection->prepare('UPDATE invite SET token_val = :token WHERE loginn = :loginn');
          $req->bindValue(':token', $user->getToken(), PDO::PARAM_STR);
          $req->bindValue(':loginn', $user->getLogin(), PDO::PARAM_STR);
          $req->execute();

          $response = "Token OK";

      } catch (PDOException $e) {
          $response = "Erreur: " . $e->getMessage();
      }

      return $response;
  }

  /**
   * CHECK USER BY TOKEN
   */
  public function checkInviteDb($nom, $token) {
      try {
          $connection = self::getDaoFactory()->getConnection();
          $req = $connection->prepare('SELECT * FROM invite WHERE nom = :nom AND token_val = :token');
          $req->bindParam(':nom', $nom, PDO::PARAM_STR);
          $req->bindParam(':token', $token, PDO::PARAM_STR);
          $req->execute();
          $response = $req->fetchALL(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          $response = "Erreur: " . $e->getMessage();
      }
      return $response;
  }

  /**
   * UPDATE PSWD: FORGOT
   */
  public function reinitPswd(User $user) {
      try {
        $sql = "UPDATE invite SET mdp = :mdp WHERE nom = :nom ";
        if ($user->getToken() != NULL) {
          $sql .= "AND token_val = :token";
        }
        $connection = self::getDaoFactory()->getConnection();
        $req = $connection->prepare(''. $sql .'');
        $req->bindValue(':mdp', $user->getMdp(), PDO::PARAM_STR);
        $req->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
        if ($user->getToken() != NULL) {
          $req->bindValue(':token', $user->getToken(), PDO::PARAM_STR);
        }
          
        $req->execute();
          
        $response = "Votre mot de passe a été modifié";
      } catch (PDOException $e) {
          $response = "Erreur:" . $e->getMessage();
      }

    return $response;
  }
}
?>