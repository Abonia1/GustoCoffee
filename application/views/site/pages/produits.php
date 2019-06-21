<div class="container produit-liste">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
        <div class="produit-titre">
            <h1>Notre gamme de produits</h1>
        </div>
    </div>
</div>

<?php foreach($produits AS $produit) : ?>
    <div class="container-fluid blue-product list-product">
        <div class="container">
            <section class="col-xs-12 product">
                <aside class="col-xs-12 col-sm-3 product-img">
                    <img src="<?= site_url('assets/images/'.$produit->bidon); ?>" alt="<?= $produit->nom; ?>" width="50%">
                </aside>

                <article class="col-xs-12 col-sm-6">
                    <h1><?= $produit->nom; ?></h1>
                    <h2><?= $produit->description_courte; ?></h2>

                    <p>
                        <?= $produit->description_longue; ?>
                    </p>

                    <a href="<?= site_url('produit/'.$produit->nom); ?>">En savoir plus</a>
                </article>

                <aside class="col-xs-12 col-sm-3 list blue-list">
                    <ul>
                        <li>Fabriqué en France</li>
                        <li>Respecte l'environnement</li>
                        <li>Sans danger</li>
                    </ul>
                </aside>
            </section>
        </div>
    </div>
<?php endforeach; ?>


<!--<div class="container-fluid grey-product list-product-two">
    <div class="container">
        <section class="col-xs-12 product">
            <aside class="col-xs-12 col-sm-3 product-img">
                <img src="<?= site_url('assets/images/bidon.png'); ?>" alt="Produit" width="50%">
            </aside>

            <article class="col-xs-12 col-sm-6">
                <h1>Vapowax</h1>
                <h2>Entretien coques bâteaux</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>

                <a href="<?= site_url('produit/vapowax'); ?>">En savoir plus</a>
            </article>

            <aside class="col-xs-12 col-sm-3 list grey-list">
                <ul>
                    <li>Fabriqué en France</li>
                    <li>Respecte l'environnement</li>
                    <li>Sans danger</li>
                </ul>
            </aside>
        </section>
    </div>
</div>-->
