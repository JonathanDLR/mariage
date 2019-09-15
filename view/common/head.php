<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<base href="http://localhost/mariage/" >
<?php switch($title) {
    case "Jonathan & Marie: Connexion": ?>
        <link rel="stylesheet" href="web/css/connexion.css">
        <?php break;
    case "Jonathan & Marie: Accueil": ?>
        <link rel="stylesheet" href="web/css/accueil.css">
        <?php break;
    case "Jonathan & Marie: Informations": ?>
        <link rel="stylesheet" href="web/css/informations.css">
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
} ?>