<?php
    switch($title) {
        case "Jonathan & Marie: Connexion": ?>
            <script src="web/js/connexion.js"></script>
            <?php break;
        case "Jonathan & Marie: Inscription":
        if ($_SESSION['type'] == "civil") { ?>
            <script src="web/js/inscription_civil.js"></script>
            <?php break;
        } else { ?>
            <script src="web/js/inscription.js"></script>
            <?php break;
        }
    }
?>