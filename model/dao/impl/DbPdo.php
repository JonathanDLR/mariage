<?php
/**
 * Singleton to create db instance
 */
class DbPdo {
    private static $_instance;
    private $_dns;
    private $_login;
    private $_mdp;

    public function construct($pDns, $pLogin, $pMdp) {
        $this->_dns = $pDns;
        $this->_login = $pLogin;
        $this->_mdp = $pMdp;
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof PDO)) {
            self::$_instance = new PDO('mysql:host=localhost; dbname=mariage; charset=utf8', 'root', 'marie89');
            self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$_instance;
    }
}
?>