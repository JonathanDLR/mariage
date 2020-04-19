<?php $title="Jonathan & Marie: Hébergements";
ob_start(); 
?>
    <section>
        <article>
            <h1>Hébergements</h1>
        </article>

        <?php if (($_SESSION['type'] != "civil") && (!$_SESSION['loge'])) { ?>
            <article>
                <div id="DIVchateau">
                    <p>Afin de vous permettre de profiter du week-end en toute sérénité, nous avons fait le choix de mettre à
                    votre disposition un ensemble de logements aux tarifs préférentiels.<br/>
                    Les réservations sont valables du vendredi 18 septembre au dimanche 20 septembre.<br/></p>

                    Situés à Brissac-Loire-Aubance (5minutes en voiture de Charcé-St-Ellier), ces logements ont été sélectionnés
                    pour leur rapport trajet/qualité/prix.<br/>
                    Bien sûr, vous pouvez aussi choisir de vous loger par vos propres moyens.
                    <br/>

                    <h3>Je veux réserver mais comment faire?</h3>
                    <br/>

                    Si vous souhaitez bénéficier de ces réservations, merci de nous indiquer vos préférences dans le
                    formulaire d’inscription.<br/>
                    Grâce à notre super témoin professionnelle de l’hôtellerie, nous ferons en
                    sorte de vous proposer le logement qui vous convient.
                    
                    <h4>Notes importantes:</h4>

                    <p>
                        <p>Les gîtes de 10 personnes seront prioritairement attribués aux groupes qui souhaitent
                            ou peuvent partager l’espace.<br/>
                            Il s’agit de logements communs avec plusieurs chambres et salles de bain partagées.<br/>
                            Les mariés et leur super témoin professionnelle de l’hôtellerie, se chargeront de leur
                            attribution.</p>
                        <p>Pour les réservations à l’hôtel Le Castel, merci de contacter directement
                            l’établissement.<br/>
                            Ne tardez pas… premiers arrivés, premiers servis!</p>
                        <p>Les tarifs proposés resteront les mêmes que vous restiez 1 ou 2 nuitées. Si vous restez
                            une nuit, vous bénéficierez du tarif préférentiel. Si vous restez 2 nuits, vous
                            bénéficierez du tarif préférentiel et d’une nuit offerte. Classe non?</p>
                        <p>Si vous n’avez pas accès au formulaire d’hébergement, c’est que des forces supérieures
                            (les mariés en toute modestie) ont déjà fait ce choix pour vous. Mais comme ce sont de
                            gentilles forces supérieures, ces derniers valideront ce choix avec vous.</p>
                        <p>Les réservations étant à la charge des mariés, vous n’aurez rien à régler sur place
                            (sauf suppléments et taxes de séjours).<br/>
                            Vous aurez simplement à vous acquitter préalablement du montant de votre réservation
                            auprès des dîtes forces supérieures (toujours avec beaucoup de modestie).</p>
                    </p>
                    <br/><br/>
                    <img src="web/img/brissac_chateau.png" id="chateau" alt="chateau"/>
                </div>
            </article>
            <article> 
                <div><img src="web/img/ornement1.png" id="ornement" alt="ornement"/></div> 

                <h3>Les Gîtes</h3>
                <h4 class="h4notMarg">Le Domaine de l’Étang, camping 4 étoiles (à 5 minutes en voiture du prieuré)</h4>
                <p>
                    <p>3 gîtes haut de gamme, (Chardonnay; Layon et Aubance… ça ne s’invente pas!), peuvent
                    accueillir jusqu’à 10 personnes chacun.<br/>
                    Il conviendra de prendre vos propres draps, non compris dans la location (pas de draps, pas de
                    chocolat).

                    Vous pouvez consulter le détail grâce au lien ci-dessous.<br/>

                    <a href="https://www.campingetang.com/location-camping-angers#en-famille">https://www.campingetang.com/location-camping-angers#en-famille</a>

                    Vous bénéficierez d’un tarif unique à 28€/personne pour l’ensemble du week-end.
                    </p>
                
                    <ul>
                        <li>Adresse et contact:</li>
                        <li>Camping Etang</li>
                        <li>Route de St-Mathurin</li>
                        <li>49320 Brissac-Quincé</li>
                        <li>02 41 91 70 61</li>
                    </ul>
                </p>

                <img src="web/img/gites_letang.png" alt="gite étang" />
                
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21621.875004649828!2d-0.4384754638964128!3d47.35858368121843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4807dbc4987ef445%3A0x1d43d0c43de1bf22!2sGites%20%26%20Domaine%20de%20l&#39;Etang!5e0!3m2!1sfr!2sfr!4v1578773747430!5m2!1sfr!2sfr" frameborder="0" style="border:0;" allowfullscreen=""></iframe> 
            
                <h4 id="Hreg">Le Régisseur</h4>
                <p>
                    <p>Situé dans le village de Brissac-Quincé (à 5 minutes en voiture du prieuré).<br/>
                    La résidence comprend:
                    <ul>
                        <li>1 appartement de 4 personnes (2 chambres)</li>
                        <li>1 studio de 2 personnes (canapé-lit).</li>
                    </ul>

                    L’emplacement est idéal pour ceux qui souhaitent visiter le village et le château.

                    Vous pouvez consulter le détail grâce au lien ci-dessous.

                    <a href="https://www.gites.fr/gites_le-regisseur_brissac-quince_h2312336.htm">https://www.gites.fr/gites_le-regisseur_brissac-quince_h2312336.htm</a>
                    
                    Vous bénéficierez d’un tarif unique à 28€/personne pour l’ensemble du week-end.
                    </p>
                                    
                    <ul>
                        <li>Adresse et contact:</li>
                        <li>17 Rue Louis Moron</li>
                        <li>49320 Brissac-Loire-Aubance</li>
                    </ul>
                </p>

                <img src="web/img/le_regisseur.png" alt="appartement" />
                
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10811.611250240125!2d-0.45669837252216183!3d47.355295375284946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4807da34b52fb5d5%3A0x486907aa0e70bbd2!2s1%20Rue%20Louis%20Moron%2C%2049320%20Brissac-Loire-Aubance!5e0!3m2!1sfr!2sfr!4v1578774887230!5m2!1sfr!2sfr" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </article>

            <article>
                <div><img src="web/img/ornement1.png" id="ornement" alt="ornement"/></div> 
                <h3>Hôtel</h3>
                <h4 class="h4notMarg">Le Castel, hôtel 3 étoiles (5 minutes du prieuré).</h4>

                <p>
                    <p>Au centre de village et à proximité immédiate du château de Brissac, cet hôtel peut
                    accueillir 25 personnes.<br/>
                    Lors de votre réservation, précisez que qu’il s’agit du mariage Mesclon-De La Rosa.<br/>
                    
                    11 chambres sont disponibles:
                    
                    <ul>
                        <li>1 Chambre familiale 4 personnes.</li>
                        <li>1 Chambre triple.</li>
                        <li>1 Chambre double supérieure.</li>
                        <li>7 Chambres double.</li>
                        <li>1 Chambre twin.</li>
                    </ul>

                    Vous pouvez consulter le détail grâce au lien ci-dessous.

                    <a href="http://www.hotel-lecastel.com/">http://www.hotel-lecastel.com/</a>

                    Vous bénéficierez d’un tarif unique à 67€/chambre pour l’ensemble du week-end. (Taxe de séjour
                    non comprise 1,40€ pour 2 nuitées). Buffet de petits déjeuners en supplément (9€/personne).
                    </p>
                
                    <ul>
                        <li>Adresse et contact:</li>
                        <li>1 Rue Louis Moron</li>
                        <li>49320 Brissac-Loire-Aubance</li>
                        <li>+33 (0)2 41 91 24 74</li>
                    </ul>
                </p>
                <img src="web/img/hotel_le_castel.png" alt="le castel" />               
            </article>

        <?php } else { ?>
            <article>
                <h3>Vous n'avez rien à faire ici! Ouste!</h3>
            </article>
        <?php } ?>
    </section>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/view/common/template.php'); ?>