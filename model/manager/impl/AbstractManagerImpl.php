<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/dao/contract/DaoFactory.php');

/**
 * Abstract class getting acces to the dao Factory
 */
abstract class AbstractManagerImpl {
  private static $_daoFactory;

  public function __construct(DaoFactory $daoFactory) {
    self::$_daoFactory = $daoFactory;
  }

  protected static function getDaoFactory() {
      return self::$_daoFactory;
  }
}

?>