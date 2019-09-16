<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/impl/AbstractManagerImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/contract/UserManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/entity/User.php');

/**
 * Manager of the user entity
 */
class UserManagerImpl extends AbstractManagerImpl implements UserManager {
    /**
     * Get User By Login
     */
    public function getUser($login) {
        $userDao = self::getDaoFactory()->getUserDao()->getDbUser($login);
        $newUser = new User();
        $newUser->setId($userDao["id"]);
        $newUser->setNom($userDao["nom"]);
        $newUser->setLogin($userDao["loginn"]);
        $newUser->setMdp($userDao["mdp"]);
        $newUser->setTypeInvit($userDao["type_invit"]);

        return $newUser;
    }

    /**
     * Get User by Nom and Token
     */
    public function checkUser($nom, $token) {
        $userDao = self::getDaoFactory()->getUserDao()->checkInviteDb($nom, $token);
 
        if (sizeof($userDao) != 0) {
            $response = new User();
            $response->setId($userDao[0]["id"]);
            $response->setNom($userDao[0]["nom"]);
            $response->setLogin($userDao[0]["loginn"]);
            $response->setMdp($userDao[0]["mdp"]);
            $response->setTypeInvit($userDao[0]["type_invit"]);
        } else {
            $response = "KO";
        }

        return $response;
    }

    /**
     * Create Token and send mail
     */
    public function sendMail($user) {
        $token = md5(microtime(TRUE)*100000);
        $user->setToken($token);
        $response = self::getDaoFactory()->getUserDao()->setTokenInvite($user);

        // Formatage Mail
        $dest = $user->getLogin();

        $objet = "Mariage Jonathan Marie: Réinitialisation du mot de passe";

        $message = "Bonjour " . $user->getNom() ."\r\n"."\r\n".
                "Cet email vous est envoyé car vous avez demandé à réinitialiser votre mot de passe"."\r\n"."\r\n".
                "Pour effectuer cette action veuillez cliquer sur le lien ci dessous ou copier/coller dans votre navigateur internet."."\r\n"."\r\n".
                "localhost/mariage/index.php?action=reinit&nom=".urlencode($user->getNom())."&token=".urlencode($user->getToken())."\r\n"."\r\n".
                "Si vous n'etes pas à l'origine de cette demande, veuillez ne pas tenir compte de ce mail."."\r\n"."\r\n".
                "Jonathan et Marie";

        $headers = 'Reply-To:'."Mariage Jonathan et Marie"."\r\n".
                'Content-Type: text/plain; charset="UTF-8"; DelSp="Yes"; format=flowed'."\r\n".
                'Contet-Disposition: inline'."\r\n".
                'Content-Transfert-Encoding: quoted-printable'."\r\n".
                'MIME-VERSION: 1.0'."\r\n"; 

        mail($dest, $objet, $message, $headers);  

        return $response;
    }

    /**
     * Change password of user
     */
    public function changePswd($user, $pswd) {
        $mdp = password_hash($pswd, PASSWORD_BCRYPT);
        $user->setMdp($mdp);
        $response = self::getDaoFactory()->getUserDao()->reinitPswd($user);

        return $response;
    }
}

?>