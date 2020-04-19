<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<base href="web" >
<?php switch($title) {
    case "Jonathan & Marie: Connexion": ?>
        <link rel="stylesheet" href="web/css/connexion.css">
        <?php break;
    case "Jonathan & Marie: Accueil": ?>
        <link rel="stylesheet" href="web/css/accueil.css">
        <?php break;
    case "Jonathan & Marie: Cérémonies": ?>
        <link rel="stylesheet" href="web/css/informations.css">
        <?php break;
    case "Jonathan & Marie: Hébergements": ?>
        <link rel="stylesheet" href="web/css/hebergements.css">
        <?php break;
    case "Jonathan & Marie: Inscription": 
        if ($_SESSION['type'] == "civil") { ?>
            <link rel="stylesheet" href="web/css/inscription_civil.css">
            <?php break;
        } else { ?>
            <link rel="stylesheet" href="web/css/inscription.css">
            <?php break;
        }
    case "Jonathan et Marie: Mot de Passe Oublié": ?>
        <link rel="stylesheet" href="web/css/forgotpswd.css">
        <?php break;
    case "Jonathan et Marie: Réinitialisation Mot de Passe" : ?>
        <link rel="stylesheet" href="web/css/reinitialisation.css">
        <?php break;
} ?>