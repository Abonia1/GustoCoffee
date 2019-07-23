
		<div class="" id="slider-container-home">
            <div class="tp-banner-container">
		        <div class="tp-banner">
        			<ul>
        				<li id="Gustocoffee-slide" data-transition="slidehorizontal" data-masterspeed="300" data-delay="7000">
        					<img src="<?= site_url('assets/images/slide/slide_gustocoffee4.png'); ?>" alt="Gustocoffee" data-bgrepeat="no-repeat" data-bgfit="cover" data-bgfitend="100" data-bgposition="right bottom">

        					<div class="caption fade" data-x="40" data-y="140" data-speed="1000" data-start="2000" data-easing="easeOutBack">
                                <span class="titre">Decouvrir nos Services !</span>
        					</div>

                            <div class="caption lfb" data-x="800" data-y="20" data-speed="1000" data-start="1000" data-easing="easeOutBack">
                                <span class="marque">Gustocoffee</span>
        					</div>

                            <div class="caption lfr" data-x="800" data-y="50" data-speed="1000" data-start="3000" data-easing="easeOutBack">
                                <span class="formule">Welcome You!</span>
        					</div>

                            <div class="caption lfb" data-x="840" data-y="100" data-speed="1000" data-start="1000" data-easing="easeOutBack">
                                 
        					</div>
        				</li>


						<li id="Gustocoffee-slide" data-transition="slidehorizontal" data-masterspeed="300" data-delay="7000">
        					<img src="<?= site_url('assets/images/slide/slide_gustocoffee2.png'); ?>" alt="Gustocoffee" data-bgrepeat="no-repeat" data-bgfit="cover" data-bgfitend="100" data-bgposition="right bottom">
                        </li>

						<li id="Gustocoffee-slide" data-transition="slidehorizontal" data-masterspeed="300" data-delay="7000">
        					<img src="<?= site_url('assets/images/slide/slide_gustocoffee3.jpg'); ?>" alt="Gustocoffee" data-bgrepeat="no-repeat" data-bgfit="cover" data-bgfitend="100" data-bgposition="right bottom">
                            
                            <div class="caption lfb" data-x="40" data-y="50" data-speed="1000" data-start="1000" data-easing="easeOutBack">
                                <span class="marque2">Réservez à l'avance et recevez nos dernières offres</span>
        					</div><br>

                            <div class="caption lfr" data-x="380" data-y="90" data-speed="1000" data-start="3000" data-easing="easeOutBack">
                                <a class="buttonslide" href="<?= site_url('reservation'); ?>">Reservation</a>
        					</div>
                        </li>

						<!-- <li id="Gustocoffee-slide" data-transition="slidehorizontal" data-masterspeed="300" data-delay="7000">
        					<img src="<?= site_url('assets/images/slide/slide_gustocoffee2.png'); ?>" alt="Gustocoffee" data-bgrepeat="no-repeat" data-bgfit="cover" data-bgfitend="100" data-bgposition="right bottom">
        				</li>

						<li id="Gustocoffee-slide" data-transition="slidehorizontal" data-masterspeed="300" data-delay="7000">
        					<img src="<?= site_url('assets/images/slide/slide_gustocoffee4.png'); ?>" alt="Gustocoffee" data-bgrepeat="no-repeat" data-bgfit="cover" data-bgfitend="100" data-bgposition="right bottom">
        				</li> -->
                    </ul>
                </div>
            </div>
        </div>
        <section class="container">

    <article class="col-xs-12 col-sm-8 col-md-8 col-lg-8 presentation">
        <h1>Gusto Coffee, Le Coworking pour tous !</h1>

        <div>
            <p>Chez Gusto Coffee on offre une solution fr coworking bien « adapté ! Donc que tu sois seul ou accompagné, on a une offre sur-mesure adaptée à chaque cas de figure.
            </p>

            <a href="<?= site_url('contact'); ?>">NOUS CONTACTER</a>
        </div>
    </article>

    <aside class="col-xs-12 col-sm-4 col-md-4 col-lg-4 photo-presentation">
       <img src="assets/images/photo.png" /> 
    </aside>

</section>


<section class="container-fluid priorite">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2 style="color: white !important;">Profitez de votre temps</h2>

            <div class="ancre">
                <hr>
            </div>
        </div>

        <article class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <figure>
                <img src="<?= site_url('assets/images/picto1.png'); ?>" alt="Écologique">
            </figure>

            <div>
                <h3 style="color: white;">Coworking</h3>
                <p style="line-height: 1.5">un espace de travail partagé, et un réseau de travailleurs encourageant l'échange et l'ouverture aux autres.</p>
            </div>
        </article>

        <article class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <figure>
                <img src="<?= site_url('assets/images/picto2.png'); ?>" alt="Respect de l'environnement">
            </figure>

            <div>
                <h3 style="color: white;">Restauration</h3>
                <p style="line-height: 1.5">Nous servons des plats préparés et des boissons à consommer sur place, en échange de paiement.</p>
            </div>
        </article>

        <article class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <figure>
                <img src="<?= site_url('assets/images/picto3.png'); ?>" alt="Sans danger">
            </figure>

            <div>
                <h3 style="color: white;">Services bureautique</h3>
                <p style="line-height: 1.5">Il vous sera possible de reserver des services de bureautique tel que de l'impression, du stockage en ligne.</p>
            </div>
        </article>
    </div>
</section>


<section class="container produit-container">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
        <div class="produit-titre">
            <h2>Découvrez nos Services</h2>
            <p style="text-align: center;"><a href="<?= site_url('/services/'); ?>">Retrouvez tous nos services ici</a></p>
        </div>
    </div>
    <?php $i = 0; ?>
    <?php foreach($produits AS $produit) : ?>
        <article class="col-xs-12 col-sm-6 produit">
        <?php $i = $i + 1;?>
            <a href="<?= site_url('/services/'.$i); ?>">
                <div>
                    <img src="<?= site_url('assets/images/produit/accueil/'.$produit->image); ?>" alt="<?= $produit->nom; ?>" />

                    <div class="produit-nom">
                        <h3 style="color: white !important; text-align: center;"><?= $produit->nom; ?></h3>
                    </div>
                </div>

                <img src="<?= site_url('assets/images/ombre_produit.png'); ?>" />
            </a>
        </article>
    <?php endforeach; ?>
</section>
