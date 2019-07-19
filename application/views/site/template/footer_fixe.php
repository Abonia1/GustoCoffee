</main>

<footer class="">
    <section class="livraison">
        <div class="container">
            <div class="livraison-container">
                <article class="col-xs-12 col-sm-6">
                    <h1>Commande expédiée sous 24 heures</h1>
                    <p>Découvrez la gamme de produits spécialisés EnzyMarine et recevez rapidement votre commande grâce à notre réactivité</p>
                </article>

                <aside class="col-xs-12 col-sm-6 livraison-icone">
                    <figure class="">
                        <img src="<?= site_url('assets/images/24_heure.png'); ?>" alt="Livraison en 24 heures">
                        <img src="<?= site_url('assets/images/livraison_rapide.png'); ?>" alt="Livraison rapide">
                    </figure>
                </aside>
            </div>
        </div>
    </section>

    <div class="separateur container-fluid"></div>

    <section class="container">
        <adress class="col-xs-12 col-sm-4 coordonnees">
            <h2>GustoCoffee</h2>
            <p>1 rue de Condorcet<br>75520, Paris</p>
        </adress>

        <div class="col-xs-12 col-sm-8 col-md-5 support">
            <h2>Besoin d'aide ?</h2>
            <p>Nous répondons à vos questions du lundi au vendredi de 8h à 20h </p>

            <h2>Pour toute question</h2>
            <p>01 50 51 52 00<br><a href="mailto:contact@enzymarine.fr">contact@gustocoffee.fr</a></p>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 social">
            <h2>Rejoignez la communauté GustoCoffee</h2>
            <a href="http://www.facebook.com">
                <img src="<?= site_url('assets/images/facebook.svg'); ?>" alt="Facebook" width="10%">
            </a>

            <a href="http://www.youtube.com">
                <img src="<?= site_url('assets/images/youtube.svg'); ?>" alt="Youtube" width="10%">
            </a>
        </div>

        <div class="col-xs-12 copyright">
            <p>
                Copyright <?= date('Y'); ?> GustoCoffee - <a href="<?= site_url('mentions-legales'); ?>">Mentions légales</a>
            </p>
        </div>
    </section>
</footer>

<script src="<?= site_url('assets/js/panier.js'); ?>"></script>
</body>
</html>
