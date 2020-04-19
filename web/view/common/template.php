<!doctype html>
<html lang="fr" dir="ltr">
    <head>
        <?php include('view/common/head.php'); ?>
        <title><?php echo $title; ?></title>
    </head>
    <body>

        <?php include('view/common/header.php'); ?>

        <?php if (($title !== "Jonathan & Marie: Connexion")) {
            include('view/common/nav.php');
        } ?>

        <div class="container">
            <?php echo $contain; ?>
        </div>

        <?php include('view/common/footer.php'); ?>
        
        <?php include('view/common/script.php'); ?>
    </body>
</html>