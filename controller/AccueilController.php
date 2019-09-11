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
            echo "Vous n'etes pas connecté!";
            include('view/connexion.php');
        }
    }
}

?>