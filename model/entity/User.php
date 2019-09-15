<?php

class User {
    private $_id;
    private $_nom;
    private $_login;
    private $_mdp;
    private $_typeInvit;
    private $_token;

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

    public function getToken() {
        return $this->_token;
    }

    // SETTERS
    public function setId($pId) {
        $this->_id = $pId;
    }

    public function setNom($pNom) {
        $this->_nom = $pNom;
    }

    public function setLogin($pLogin) {
        $this->_login = $pLogin;
    }
    public function setMdp($pMdp) {
        $this->_mdp = $pMdp;
    }
    
    public function setTypeInvit($pTypeInvit) {
        $this->_typeInvit = $pTypeInvit;
    }

    public function setToken($pToken) {
        $this->_token = $pToken;
    }
}