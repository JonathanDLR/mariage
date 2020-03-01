<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/dao/impl/DbPdo.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/dao/contract/DaoFactory.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/dao/impl/UserDaoImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/dao/impl/InscriptionDaoImpl.php');

/**
 * Factory of Dao Elements
 * Getting BDD Instance
 */
class DaoFactoryImpl implements DaoFactory {
    private $_userDao;
    private $_inscriptionDao;

    public function __construct() {   
        $this->_userDao = new UserDaoImpl($this);
        $this->_inscriptionDao = new InscriptionDaoImpl($this);
    }

    /**
     * Create the db connection
     */
    public static function getConnection() {
        return DbPdo::getInstance();
    }

    public function getUserDao() {
        return $this->_userDao;
    }

    public function getInscriptionDao() {
        return $this->_inscriptionDao;
    }
}

?>