<section class="container">
    <?php foreach ($text['text'] as $t): ?>
    <article class="col-xs-12 col-sm-8 col-md-8 col-lg-8 presentation">
        <h1><?php echo $t->title; ?></h1>

        <div>
            <p><?php echo $t->description; ?>
            </p>

            <a href="<?= site_url('contact'); ?>">NOUS CONTACTER</a>
        </div>
    </article>

    <aside class="col-xs-12 col-sm-4 col-md-4 col-lg-4 photo-presentation">
       <img src="<?php echo base_url('assets/images/') .$t->image?>" /> 
    </aside>
    <?php endforeach; ?>
</section>


<section class="container-fluid priorite">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1>La priorité à l'environnement</h1>

            <div class="ancre">
                <hr>
            </div>
        </div>

        <article class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <figure class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <img src="<?= site_url('assets/images/ecologie.svg'); ?>" alt="Écologique">
            </figure>

            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <h2>Écologique</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus rem atque mollitia nulla, laboriosam dicta. Animi cumque expedita vero modi voluptas doloribus harum, esse fugit suscipit!</p>
            </div>
        </article>

        <article class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <figure class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <img src="<?= site_url('assets/images/respect_environnement.svg'); ?>" alt="Respect de l'environnement">
            </figure>

            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <h2>Respect de l'environnement</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus rem atque mollitia nulla, laboriosam dicta. Animi cumque expedita vero modi voluptas doloribus harum, esse fugit suscipit! Alias illo quia voluptatibus.</p>
            </div>
        </article>

        <article class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <figure class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <img src="<?= site_url('assets/images/sans_danger.svg'); ?>" alt="Sans danger">
            </figure>

            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <h2>Sans danger</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus rem atque mollitia nulla, laboriosam dicta. Animi cumque expedita vero modi voluptas doloribus harum, esse fugit suscipit! Alias illo quia voluptatibus.</p>
            </div>
        </article>
    </div>
</section>


<section class="container produit-container">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
        <div class="produit-titre">
            <h1>Découvrez nos Services</h1>
        </div>
    </div>

    <?php foreach($produits AS $produit) : ?>
        <article class="col-xs-12 col-sm-6 produit">
            <a href="<?= site_url('produit/'.$produit->nom); ?>">
                <div>
                    <img src="<?= site_url('assets/images/produit/accueil/'.$produit->image); ?>" alt="<?= $produit->nom; ?>" />

                    <div class="produit-nom">
                        <h1><?= $produit->nom; ?></h1>
                        <h2><?= $produit->description_courte; ?></h2>
                    </div>
                </div>

                <img src="<?= site_url('assets/images/ombre_produit.png'); ?>" />
            </a>
        </article>
    <?php endforeach; ?>
</section>
