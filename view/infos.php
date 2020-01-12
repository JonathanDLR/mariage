<?php $title="Jonathan & Marie: Informations";
ob_start(); 
?>
    <section>

        <?php if (($_SESSION['type'] == "both") || ($_SESSION['type'] == "laique")) { ?>
            <article id="prieure">
                <h2>Lieu de la Cérémonie Laique</h2>
                <div>
                    <div><img src="web/img/prieure.jpg" alt="prieure" /></div>

                    <p>Nous vous donnons rendez-vous le samedi 19 septembre 2020 à partir de 14H au Prieuré de
                     Saint-Ellier<br/> à Charcé-Saint-Ellier-sur-Aubance, 49320 Brissac-Loire-Aubance.</p>

                    <p>Pour venir plusieurs moyens s'offrent à vous:
                        <ul>	
                            <li>En voiture: 3h depuis Paris, à 20mn d'Angers et 1h15 de Nantes</li>

                            <li>En train TGV: Gare TGV d'Angers</li>

                            <li>En avion: Angers Loire aéroport ou Nantes Atlantique</li>
                        </ul>
                    </p>

                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d411018.88176925457!2d-0.3714271192563251!3d47.40823745583819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4807dc0b257a2895%3A0x40d37521e0d97d0!2sCharc%C3%A9-Saint-Ellier-sur-Aubance%2C%2049320%20Brissac-Loire-Aubance!5e0!3m2!1sfr!2sfr!4v1576871364546!5m2!1sfr!2sfr" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div>
                    <h3>Programme de la Journée</h3>
                    <div><img src="web/img/timeline2.png" alt="timeline prieuré" class="timeline" /></div>
                </div>
                <div>
                    <h3>Le lendemain</h3>
                    <p>
                        A partir de 11h, venez prolonger la fête autour de spécialités angevines.<br/>
                        Amateurs de sport, n'oubliez pas vos affaires: terrains de tennis, vélos et piscine à disposition.
                    </p>
                </div>
            </article>
        <?php } ?>
        <?php if (($_SESSION['type'] == "both") || ($_SESSION['type'] == "civil")) { ?>
            <article id="mairie">
                <h2>Lieu de la Cérémonie Civile</h2>
                <div>
                    <p>Vous êtes conviés le samedi 22 août 2020 à partir de 10h30 à la mairie de Cruas <br/>
                    Place René Cassin, 07350 Cruas.</p>

                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d90824.51505412822!2d4.71365361723687!3d44.65291480155687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b540e09afbdfcd%3A0xd35ee713f7f5287d!2sPlace%20Ren%C3%A9%20Cassin%2C%2007350%20Cruas!5e0!3m2!1sfr!2sfr!4v1577037564229!5m2!1sfr!2sfr" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
            </div>
            <div>
                <h3>Programme de la Journée</h3>
                <div><img src="web/img/timeline1.png" alt="timeline mairie" class="timeline" /></div>
            </div>
            <article>
        <?php } ?>
    </section>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/mariage/view/common/template.php'); ?>