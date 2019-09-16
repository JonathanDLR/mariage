<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/entity/User.php');

Interface UserDao
{
    public function getDbUser($login);
    public function setTokenInvite(User $user);
    public function checkInviteDb($nom, $token);
    public function reinitPswd(User $user);
}

?>