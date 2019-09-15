<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/impl/AbstractManagerImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/contract/UserManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/entity/User.php');

Interface UserManager {
    public function getUser($login);
    public function checkUser($nom, $token);
    public function sendMail($user);
    public function changePswd($user, $pswd);
}

?>