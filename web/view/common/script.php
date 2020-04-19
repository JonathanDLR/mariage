<?php
    switch($title) {
        case "Jonathan & Marie: Connexion": ?>
            <script src="web/js/connexion.js"></script>
            <?php break;
        case "Jonathan & Marie: Accueil": ?>
            <script src="web/js/popupmenu.js"></script>
            <?php break;
        case "Jonathan & Marie: Cérémonies": ?>
            <script src="web/js/popupmenu.js"></script>
            <?php break;
        case "Jonathan & Marie: Hébergements": ?>
            <script src="web/js/popupmenu.js"></script>
            <?php break;
        case "Jonathan & Marie: Inscription": ?>
            <script src="web/js/popupmenu.js"></script>
        <?php if ($_SESSION['type'] == "civil") { ?>
            <script src="web/js/inscription_civil.js"></script>
            <?php break;
        } else { ?>
            <script src="web/js/inscription.js"></script>
            <script src="web/js/vegan.js"></script>
            <script src="web/js/changepswd.js"></script>
            <?php break;
        }
        case "Jonathan et Marie: Mot de Passe Oublié": ?>
            <script src="web/js/forgotpswd.js"></script>
            <?php break;
        case "Jonathan et Marie: Réinitialisation Mot de Passe": ?>
            <script src="web/js/reinitialisation.js"></script>
            <?php break;
    }
?>