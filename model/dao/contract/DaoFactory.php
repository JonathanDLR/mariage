<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/dao/contract/UserDao.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/dao/contract/InscriptionDao.php');

Interface DaoFactory {
    // public static function getInstance();
    public static function getConnection();
    public function getUserDao();
    public function getInscriptionDao();
}

?>