<?php

class User {
    private $_id;
    private $_nom;
    private $_login;
    private $_mdp;
    private $_typeInvit;

    public function __construct($pId, $pNom, $pLogin, $pMdp, $pTypeInvit) {
        $this->_id = $pId;
        $this->_nom = $pNom;
        $this->_login = $pLogin;
        $this->_mdp = $pMdp;
        $this->_typeInvit = $pTypeInvit;
    }

    // GETTERS
    
    public function getId() {
        return $this->_id;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function getLogin() {
        return $this->_login;
    }

    public function getMdp() {
        return $this->_mdp;
    }

    public function getTypeInvit() {
        return $this->_typeInvit;
    }
}