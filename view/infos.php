<?php $title="Jonathan & Marie: Cérémonies";
ob_start(); 
?>
    <section>

        <?php if (($_SESSION['type'] == "both") || ($_SESSION['type'] == "laique")) { ?>
            <article id="prieure">
                <h2 class="date" id="dateP">Samedi 19 Septembre 2020</h2>
                <h2 class="cere">Cérémonie Laïque et Réception</h2>

                <div>
                    <p class="pGene">C’est au cœur de l’Anjou, que nous vous donnons rendez-vous pour y célébrer notre union et
                    faire la fête!<br/> Les familles des mariés vous accueilleront à partir de 13h30 au domaine du
                    Prieuré de Saint-Ellier,<br/> où se dérouleront la cérémonie d’engagement et la réception.<br/>
                    à Charcé-Saint-Ellier-sur-Aubance, 49320 Brissac-Loire-Aubance.</p>

                    <p>Pour venir plusieurs moyens s'offrent à vous:
                        <ul>	
                            <li>En voiture: 3h depuis Paris, à 20mn d'Angers et 1h15 de Nantes</li>

                            <li>En train TGV: Gare TGV d'Angers</li>

                            <li>En avion: Angers Loire aéroport ou Nantes Atlantique</li>
                        </ul>
                    </p>
                    <div><img src="web/img/prieure.jpg" alt="prieure" /></div>                   
                </div>
                
                <div>
                    <h3 id="hLend">Le lendemain</h3>
                    
                    <p class="pGene" id="pLend">
                    Nous nous retrouverons dimanche 20 septembre au domaine afin de profiter de la douceur angevine
                    autour de spécialités locales.<br/>
                    Amateurs de sports, pensez à vos équipements afin de profiter du terrain de tennis, de la
                    piscine ou vous balader dans le parc du prieuré.<br/> Vous pourrez également partir à la
                    découverte des environs grâce aux vélos mis à disposition par le domaine.</p>

                    <br/><br/>

                    <div><img src="web/img/prieure_exterieur.png" alt="prieure_exterieur" id="priext" /></div>

                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d411018.88176925457!2d-0.3714271192563251!3d47.40823745583819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4807dc0b257a2895%3A0x40d37521e0d97d0!2sCharc%C3%A9-Saint-Ellier-sur-Aubance%2C%2049320%20Brissac-Loire-Aubance!5e0!3m2!1sfr!2sfr!4v1576871364546!5m2!1sfr!2sfr" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </article>
        <?php } ?>

        <?php if (($_SESSION['type'] == "both") || ($_SESSION['type'] == "civil")) { ?>
            <article id="mairie">
                <div><img src="web/img/ornement1.png" id="ornement" alt="ornement"/></div>
                
                <h2 class="date" id="dateM">22 Août 2020</h2>
                <h2 class="cere">La Cérémonie Civile</h2>
                <div>
                    <p class="pGene">Vous êtes également invités à la cérémonie civile qui précédera notre joli week-end à la
                    mairie de Cruas à 11h.<br/> Un vin d’honneur convivial vous sera ensuite offert chez M. Paul
                    Mesclon à partir de 12h30.</p>

                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d90824.51505412822!2d4.71365361723687!3d44.65291480155687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b540e09afbdfcd%3A0xd35ee713f7f5287d!2sPlace%20Ren%C3%A9%20Cassin%2C%2007350%20Cruas!5e0!3m2!1sfr!2sfr!4v1577037564229!5m2!1sfr!2sfr" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
            </div>
            
            <article>
        <?php } ?>
    </section>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/view/common/template.php'); ?>