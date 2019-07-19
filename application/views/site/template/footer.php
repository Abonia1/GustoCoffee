</main>

<footer class="">
    <section class="livraison">
        <div class="container">
            <div class="livraison-container">
                <article class="col-xs-12 col-sm-6">
                    <h1>Reserver Vos Places en avance</h1>
                    <p>Reserver en avance et profiter nos offres</p>
                </article>

                <aside class="col-xs-12 col-sm-6 livraison-icone">
                    <figure class="">

                    </figure>
                </aside>
            </div>
        </div>
    </section>

    <div class="separateur container-fluid"></div>

    <section class="container">
        <adress class="col-xs-12 col-sm-4 coordonnees">
            <h2>Gustocoffee</h2>
            <p>1 Rue de Paris<br>95520, Paris</p>
        </adress>

        <div class="col-xs-12 col-sm-8 col-md-4 support">
            <h2>Besoin d'aide ?</h2>
            <p>Nous répondons à vos questions du lundi au vendredi de 8h à 20h</p>

            <h2>Pour toute question</h2>
            <p>01 50 51 52 53<br><a href="mailto:contact@Gustocoffee.fr">contact@Gustocoffee.fr</a></p>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 social">
            <h2>Rejoignez la communauté Gustocoffee</h2>
            <a href="http://www.facebook.com">
                <img src="<?= site_url('assets/images/facebook.svg'); ?>" alt="Facebook" width="10%">
            </a>

            <a href="http://www.youtube.com">
                <img src="<?= site_url('assets/images/youtube.svg'); ?>" alt="Youtube" width="10%">
            </a>
        </div>

        <div class="col-xs-12 copyright">
            <p>
                Copyright <?= date('Y'); ?> Gustocoffee - <a href="<?= site_url('mentions-legales'); ?>">Mentions légales</a>
            </p>
        </div>
    </section>
</footer>

<script type="text/javascript">
    jQuery(document).ready(function() {
           jQuery('.tp-banner').revolution(
            {
                delay:4000,
                startwidth:1200,
                startheight:340,
                autoHeight:"off",
                fullWidth:"off",
                forceFullWidth:"off",
                fullScreen:"off",
                shadow:3,
                navigationType: "none",
                hideThumbs:0
            });
    });
</script>

<script src="<?= site_url('assets/js/panier.js'); ?>"></script>
</body>
</html>
