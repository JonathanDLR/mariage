<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/Manager.php');

/**
 * RECUPERATION DU LOGIN ET DU MDP
 */
class ConnexionManager extends Manager {

  public function connect($login) {
    try {
      $req = $this->_connexion->getDb()->prepare('SELECT nom, loginn, mdp, invitation.typee as type_invit FROM
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