<?php
require_once('Bdd.php');

/**
 * CONNEXION A LA BDD
 */
abstract class Manager {
  protected $_connexion;

  public function __construct() {
    $this->_connexion = new Bdd();
    $this->_connexion->setDns('mysql:host=localhost; dbname=mariage; charset=utf8');
    $this->_connexion->setUser('root');
    $this->_connexion->setMdp('marie89');
    $this->_connexion->connect();
    $this->_connexion->setAttribute();
  }
}
