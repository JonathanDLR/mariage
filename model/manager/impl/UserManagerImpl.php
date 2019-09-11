<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/impl/AbstractManagerImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/contract/UserManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/entity/User.php');

/**
 * Manager of the user entity
 */
class UserManagerImpl extends AbstractManagerImpl implements UserManager {
    /**
     * 
     */
    public function getUser($login) {
        $userDao = self::getDaoFactory()->getUserDao()->getDbUser($login);
        return new User(
            $userDao["id"],
            $userDao["nom"],
            $userDao["loginn"],
            $userDao["mdp"],
            $userDao["type_invit"]
        );
    }
}

?>