<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/controller/AbstractController.php');

/**
 * Connexion Controller
 */

 class ConnexionController extends AbstractController {
   public function getConnexion() {
    include('view/connexion.php');
   }
   
   /**
    * kill session when disconnect
    */
    public function deconnexion() {
        if(isset($_SESSION["nom"])) {
          session_start();
          session_destroy();
          header('Location: /');
        } else {
            //echo "Vous n'etes pas connecté!";
            include('view/connexion.php');
        }    
    }
    
    /**
     * check data and connect
     */
    public function connect() {
        if (isset($_POST['login'])) {
            $login =  htmlspecialchars($_POST['login']); // HASH ET CONTROLE LOGIN MDP
            $password = htmlspecialchars($_POST['mdp']);
      
            $user = self::getManagerFactory()->getUserManager()->getUser($login); // RECUP LOGIN MDP DE LA BDD
            $loginBdd = $user->getLogin();
            $hashPassword = $user->getMdp();
      
            if (empty($login)) { // SI LOGIN VIDE ON RENVOI VERS LA PAGE ERREUR
              echo 'Veuillez renseigner votre login!';
              header("refresh:2; /");
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
              header("refresh:2; /");
              return;
            }
      
            else {
              if (!password_verify($password, $hashPassword)) { // SI MDP ERRONE ON RENVOI VERS LA PAGE ERREUR
                echo 'Mot de passe invalide!';
                header("refresh:2; /");
                return;
              }
            }

            echo 'OK';
      
            // session_cache_limiter('private'); // On passe le délai d'expiration de la session à 15 mn
            // session_cache_expire(15);
            session_start(); // ON CREE UNE SESSION AVEC LOGIN ET MDP
            $_SESSION['id'] = $user->getId();
            $_SESSION['nom'] = $user->getNom();
            $_SESSION['login'] = $user->getLogin();
            $_SESSION['type'] = $user->getTypeInvit();
            $_SESSION['loge'] = $user->getLoge();
            // header('Location: accueil');
            exit(); // RENVOI VERS LA PAGE INDEX
        }
    }
}

?>