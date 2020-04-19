<?php
/**
 * Hebergements Controller
 */
class HebergementsController {
    /**
     * send the view
     */
    public function getHebergements() {
        if (isset($_SESSION['nom'])) {
            include("view/hebergements.php");
        } else {
            include('view/connexion.php');
        }
    }
}

?>