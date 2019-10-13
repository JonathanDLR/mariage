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
            echo "Vous n'etes pas connecté!";
            include('view/connexion.php');
        }
    }
}

?>