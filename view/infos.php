<?php $title="Jonathan & Marie: Informations";
ob_start(); 
?>
    <section>

        <?php if ($_SESSION['type'] !== "civil") { ?>
            <article id="prieure">
                <h2>Informations Prieuré</h2>
                <div>
                    <div><img src="web/img/prieure.jpg" alt="prieure" /></div>

                    <p>Nous vous donnons rendez-vous le samedi 19 septembre 2020 à partir de 14H au Prieuré de
                     Saint-Ellier à Charcé-Saint-Ellier-sur-Aubance, 49320 Brissac-Loire-Aubance.</p>

                    <p>Pour venir plusieurs moyens s'offrent à vous:
                        <ul>	
                            <li>En voiture: 3h depuis Paris, à 20mn d'Angers et 1h15 de Nantes</li>

                            <li>En train TGV: Gare TGV d'Angers</li>

                            <li>En avion: Angers Loire aéroport ou Nantes Atlantique</li>
                        </ul>
                    </p>

                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d411018.88176925457!2d-0.3714271192563251!3d47.40823745583819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4807dc0b257a2895%3A0x40d37521e0d97d0!2sCharc%C3%A9-Saint-Ellier-sur-Aubance%2C%2049320%20Brissac-Loire-Aubance!5e0!3m2!1sfr!2sfr!4v1576871364546!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>                    </div>
                    <div>

                <div>
                    <h3>Programme de la Journée</h3>
                </div>
            </article>
        <?php } ?>

        <article id="mairie">
            <h2>Informations Mairie</h2>
        <article>
    </section>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/mariage/view/common/template.php'); ?>