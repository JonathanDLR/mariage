<?php
/**
 * Infos Controller
 */
class InfosController {
    /**
     * send the view
     */
    public function getInfos() {
        if (isset($_SESSION['nom'])) {
            include("view/infos.php");
        } else {
            include('view/connexion.php');
        }
    }
}

?>