<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/ConnexionManager.php');

/**
 * CONTROLLER CONNEXION ESPACE MEMBRE
 */

 class ConnexionController {
    private $_connexionManager;

    public function __construct() {
        $this->_connexionManager = new ConnexionManager();
    }

    public function deconnexion() {
        session_start();
        session_destroy();
        header('Location: /mariage');
    }
    
    public function connect() {
        if (isset($_POST['login'])) {
            $login =  htmlspecialchars($_POST['login']); // HASH ET CONTROLE LOGIN MDP
            $password = htmlspecialchars($_POST['mdp']);
      
            $response = $this->_connexionManager->connect($login); // RECUP LOGIN MDP DE LA BDD
            $loginBdd = $response['loginn'];
            $hashPassword = $response['mdp'];
      
            if (empty($login)) { // SI LOGIN VIDE ON RENVOI VERS LA PAGE ERREUR
              echo 'Veuillez renseigner votre login!';
              header("refresh:2; /mariage");
              return;
            }
      
            else {
              if ($login != $loginBdd) { // SI LOGIN ERRONE ON RENVOI VERS LA PAGE ERREUR
                echo 'login invalide!';
                // header("refresh:2; /mariage");
                return;
              }
            }
      
            if (empty($password)) { // SI MDP VIDE ON RENVOI VERS LA PAGE ERREUR
              echo 'Veuillez renseigner votre mot de passe!';
              header("refresh:2; /mariage");
              return;
            }
      
            else {
              if (!password_verify($password, $hashPassword)) { // SI MDP ERRONE ON RENVOI VERS LA PAGE ERREUR
                echo 'Mot de passe invalide!';
                header("refresh:2; /mariage");
                return;
              }
            }
      
            // session_cache_limiter('private'); // On passe le délai d'expiration de la session à 15 mn
            // session_cache_expire(15);
            session_start(); // ON CREE UNE SESSION AVEC LOGIN ET MDP
            $_SESSION['nom'] = $response['nom'];
            $_SESSION['login'] = $response['loginn'];
            $_SESSION['type'] = $response['type_invit'];
            header('Location: accueil');
            exit(); // RENVOI VERS LA PAGE INDEX
        }
    }
}

?>