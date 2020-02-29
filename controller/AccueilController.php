<?php

/**
 * Accueil Controller
 */
class AccueilController {
    /**
     * send the view
     */
    public function getAccueil() {
        if (isset($_SESSION['nom'])) {
            include("view/accueil.php");
        } else {
            include('view/connexion.php');
        }
    }
}

?>