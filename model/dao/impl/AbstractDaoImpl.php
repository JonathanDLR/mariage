<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/dao/contract/DaoFactory.php');

/**
 * Abstract class creating DaoFactory instance and getting acces to DaoFactory
 */
abstract class AbstractDaoImpl {
  private static $_daoFactory;

  public function __construct(DaoFactory $pDaoFactory) {
    self::$_daoFactory = $pDaoFactory;
  }

  protected static function getDaoFactory() {
      return self::$_daoFactory;
  }
}

?>