<?php $title="Jonathan & Marie: Hébergements";
ob_start(); 
?>
    <section>
        <article>
            <h1>Hébergements</h1>
        </article>

        <?php if (($_SESSION['type'] != "civil") && (!$_SESSION['loge'])) { ?>
            <span>Pour votre confort, voici quelques informations sur les hébergements à votre disposition<br/>
            du vendredi 18 au dimanche 20 septembre.</span>
            <article>  
                <h3>Infos Gites</h3>
                <h4>Le domaine de l'étang, camping 4 étoiles</h4>
                <img src="web/img/gite_etang.jpg" alt="gite étang" />
                <p>
                    <span>3 gites de 10 personnes chacun</span>
                <p>
                    <ul>
                        <li>Route de St-Mathurin, 49320 Brissac-Quincé</li>
                        <li>02 41 91 70 61</li>
                        <li>A 5 minutes du prieuré</li>
                        <li>Pas de draps, pas de chocolat</li>
                    </ul>
                </p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21621.875004649828!2d-0.4384754638964128!3d47.35858368121843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4807dbc4987ef445%3A0x1d43d0c43de1bf22!2sGites%20%26%20Domaine%20de%20l&#39;Etang!5e0!3m2!1sfr!2sfr!4v1578773747430!5m2!1sfr!2sfr" frameborder="0" style="border:0;" allowfullscreen=""></iframe> 
            </article>

            <article>
                <h3>Infos Hotel</h3>
                <h4>Hotel Le Castel, 3 étoiles</h4>
                <img src="web/img/hotellecastel.jpg" alt="le castel" />
                <p>
                    <span>9 chambres doubles, 1 chambre triple, 1 chambre de 4 personnes</span>
                <p>
                    <ul>
                        <li>1 Rue Louis Moron, 49320 Brissac-Loire-Aubance</li>
                        <li>06 69 20 15 16, 02 41 91 24 74</li>
                        <li>A environ 10 minutes du prieuré</li>
                        <li>Buffet de petits déjeuners en option (9€)</li>
                    </ul>
                </p>
            </article>

            <article>
                <h3>Infos Appartements</h3>
                <h4>Le régisseur</h4>
                <img src="web/img/apt.jpg" alt="appartement" />
                <p>
                    <span>1 appartement de 2 chambres / 4 personnes<br/>
                    1 studio de 2 personnes</span>
                <p>
                    <ul>
                        <li>17 Rue Louis Moron, 49320 Brissac-Loire-Aubance</li>
                        <li>A environ 10 minutes du prieuré</li>
                    </ul>
                </p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10811.611250240125!2d-0.45669837252216183!3d47.355295375284946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4807da34b52fb5d5%3A0x486907aa0e70bbd2!2s1%20Rue%20Louis%20Moron%2C%2049320%20Brissac-Loire-Aubance!5e0!3m2!1sfr!2sfr!4v1578774887230!5m2!1sfr!2sfr" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </article>
        <?php } else { ?>
            <article>
                <h3>Vous n'avez rien à faire ici! Ouste!</h3>
            </article>
        <?php } ?>
    </section>
<?php $contain = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT'].'/mariage/view/common/template.php'); ?>