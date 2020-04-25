<?php

class Inscription {
    private $_id;
    private $_login;
    private $_nbre;
    private $_vegan;
    private $_nbreVegan;
    private $_allergie;
    private $_logement;
    private $_invit;
    private $_lendemain;
    private $_nuit;
    private $_gite;
    private $_logemari;

    // GETTERS
    
    public function getId() {
        return $this->_id;
    }

    public function getLogin() {
        return $this->_login;
    }

    public function getNbre() {
        return $this->_nbre;
    }

    public function getVegan() {
        return $this->_vegan;
    }

    public function getNbreVegan() {
        return $this->_nbreVegan;
    }

    public function getAllergie() {
        return $this->_allergie;
    }

    public function getLogement() {
        return $this->_logement;
    }

    public function getInvit() {
        return $this->_invit;
    }

    public function getLendemain() {
        return $this->_lendemain;
    }

    public function getNuit() {
        return $this->_nuit;
    }

    public function getGite() {
        return $this->_gite;
    }

    public function getLogemari() {
        return $this->_logemari;
    }

    // SETTERS

    public function setId($pId) {
        $this->_id = $pId;
    }

    public function setLogin($pLogin) {
        $this->_login = $pLogin;
    }

    public function setNbre($pNbre) {
        $this->_nbre = $pNbre;
    }

    public function setVegan($pVegan) {
        $this->_vegan = $pVegan;
    }

    public function setNbreVegan($pNbreVegan) {
        $this->_nbreVegan = $pNbreVegan;
    }

    public function setAllergie($pAllergie) {
        $this->_allergie = $pAllergie;
    }

    public function setLogement($pLogement) {
        $this->_logement = $pLogement;
    }

    public function setInvit($pInvit) {
        $this->_invit = $pInvit;
    }

    public function setLendemain($pLendemain) {
        $this->_lendemain = $pLendemain;
    }

    public function setNuit($pNuit) {
        $this->_nuit = $pNuit;
    }

    public function setGite($pGite) {
        $this->_gite = $pGite;
    }

    public function setLogemari($pLogemari) {
        $this->_logemari = $pLogemari;
    }
}

?>