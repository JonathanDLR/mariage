<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/impl/AbstractManagerImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/contract/UserManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/entity/User.php');

Interface UserManager {
    public function getUser($login);
}

?>