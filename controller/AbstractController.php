<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mariage/model/manager/contract/ManagerFactory.php');

/**
 * Abstract class getting acces to the Manager Factory
 */
abstract class AbstractController {
  private static $_managerFactory;

  public function __construct(ManagerFactory $pManagerFactory) {
    self::$_managerFactory = $pManagerFactory;
  }

  protected static function getManagerFactory() {
      return self::$_managerFactory;
  }
}

?>