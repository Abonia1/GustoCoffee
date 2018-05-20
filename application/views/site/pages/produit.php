<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <section class="row produit-container">
                <figure class="col-xs-12 col-sm-4 col-md-4 col-lg-4 produit-image">
                    <img src="<?= site_url("assets/images/produit/").$produit->bidon; ?>" class="" itemprop="image" alt="<?= $produit->nom; ?>">
                </figure>

                <article class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                    <div itemprop="name">
                        <h1><?= $produit->nom; ?></h1>
                        <h2><?= $produit->description_courte; ?></h2>
                    </div>

                    <p itemprop="description">
                        <?= $produit->description_longue; ?>
                    </p>
                </article>

                <aside class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pictogramme-container">
                        <?php if($priorites != NULL) : ?>
                            <?php foreach($priorites AS $key => $value) : ?>
                              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pictogramme-item">
                                <img class="" src="<?= site_url("assets/images/priorite/$value->image"); ?>" alt="<?= $value->alt; ?>">
                                <p class="style10"><?= $value->priorite; ?></p>
                              </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                </aside>
            </section>

            <section class="row video-container">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                    <div class="produit-titre">
                        <h1>Démonstration vidéo</h1>
                    </div>
                </div>

                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <img src="" alt="" itemprop="video" class="video">
                </article>
            </section>
        </div>


        <section class="col-xs-12 col-sm-12 col-md-offset-1 col-md-3 col-lg-offset-1 col-lg-3 sidebar">
            <div class="col-xs-12 col-sm-6 col-sm-push-6 col-md-12 col-md-push-0">
                <h1><?= $produit->prix_ht; ?> €</h1>
                <h2>Prix de vente conseillé</h2>

                <a class="panier-button" href="<?= site_url('produit/ajouter-panier'); ?>" id="add-product" data-id="<?= $produit->id; ?>">Ajouter au panier</a>

                <p>Commandez dès à présent ce produit sur la plate-forme sécurisée Amazon.<br>Chaque produit est vendu et expédié par nos soins.</p>

                <p>
                    <img src="<?= site_url('assets/images/made_in_france.png'); ?>">
                    Produit fabriqué en France
                </p>
            </div>

            <div class="col-xs-12 col-sm-6 col-sm-pull-6 col-md-12 col-md-pull-0">
                <div class="separateur-sidebar"></div>


                <article class="technique">
                    <h2>Caractéristiques techniques</h2>

                    <ul>
                        <?php if($caracteristiques != NULL) : ?>
                            <?php foreach($caracteristiques AS $key => $value) : ?>
                                <li><?= $value->caracteristique; ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </article>


                <div class="separateur-sidebar"></div>

                <article class="utilisation">
                    <h2>Utilisation</h2>

                    <ul>
                        <?php if($caracteristiques != NULL) : ?>
                            <?php foreach($utilisations AS $key => $value) : ?>
                                <li class="row">
                                    <img class="col-xs-4 col-sm-4 col-md-4 col-lg-4" src="<?= site_url("assets/images/utilisation/$value->image"); ?>" alt="<?= $value->description; ?>">
                                    <p class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><?= $value->description ?></p>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </article>

                <div class="fiche">
                    <a href="<?= site_url("assets/fiche_technique/").$produit->fiche_tech; ?>" target="_blank">Fiche technique</a>
                </div>
            </div>
        </section>
    </div>
</div>
