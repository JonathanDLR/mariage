<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/manager/contract/ManagerFactory.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/manager/impl/UserManagerImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/manager/impl/InscriptionManagerImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/dao/impl/DaoFactoryImpl.php');

/**
 * Factory of the managers entity
 */
class ManagerFactoryImpl implements ManagerFactory {
    private $_daoFactory;
    private $_userManager;
    private $_inscriptionManager;

    public function __construct(DaoFactory $pDaoFactory) {
        $this->_daoFactory = $pDaoFactory;
        $this->_userManager = new UserManagerImpl($this->_daoFactory);
        $this->_inscriptionManager = new InscriptionManagerImpl($this->_daoFactory);
    }

    public function getUserManager() {
        return $this->_userManager;
    }

    public function getInscriptionManager() {
        return $this->_inscriptionManager;
    }
}