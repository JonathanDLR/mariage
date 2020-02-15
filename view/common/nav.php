<nav id="navDesk">
    <a href="accueil">Accueil</a>
    <?php if ($_SESSION) { ?>
        <a href="informations">Informations</a>
        <?php if (($_SESSION['type'] != "civil") && (!$_SESSION['loge'])) { ?>
            <a href="hebergements">Hébergements</a>
        <?php } ?>
        <a href="inscription">Inscription</a>
        <a href="deco">Déconnexion</a>
    <?php } ?>
    
</nav>

<nav id="navMobile">
    <a href="accueil">Accueil</a>
    <?php if ($_SESSION) { ?>
        <div id="BUTmenu"><img src="web/img/menu.png" alt="menu" id="menu" /></div>
    <?php } ?>
</nav>

<?php if ($_SESSION) { ?>
    <div id="DIVpopMenu">
        <div>
            <a href="informations">Informations</a>
        </div>
        <div>
            <?php if (($_SESSION['type'] != "civil") && (!$_SESSION['loge'])) { ?>
                <a href="hebergements">Hébergements</a>
            <?php } ?>      
        </div>
        <div>
            <a href="inscription">Inscription</a>
        </div>  
        <div>
            <a href="deco">Deconnexion</a>
        </div> 
    </div>
<?php } ?>
    