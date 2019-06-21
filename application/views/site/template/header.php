<!doctype html>
<html class="no-js" lang="fr">
	<head>
    	<meta charset="UTF-8">
    	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    	<title>Gustocoffee - Pour un résultat clean</title>

    	<link rel="stylesheet" href="<?= site_url('assets/css/bootstrap-grid.css'); ?>" media="all">
    	<link rel="stylesheet" href="<?= site_url('assets/css/styles.css'); ?>" media="all">
		<link rel="stylesheet" href="<?= site_url('assets/css/jquery.toast.css'); ?>" media="all">

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
        <script type="text/javascript" src="<?= site_url('assets/js/jquery.themepunch.plugins.min.js'); ?>"></script>
		<script type="text/javascript" src="<?= site_url('assets/js/jquery.themepunch.revolution.min.js'); ?>"></script>
		<script type="text/javascript" src="<?= site_url('assets/js/jquery.toast.js'); ?>"></script>

        <link rel="stylesheet" type="text/css" href="<?= site_url('assets/css/settings.css'); ?>" media="screen" />

		<script>
    		$(document).ready(function() {
        		$('.refreshCaptcha').on('click', function() {
            		$.get('<?php echo base_url().'captcha/refresh'; ?>', function(data) {
                		$('#captcha-image').html(data);
            		});
        		});
    		});
    	</script>
  	</head>

  	<body>
		<div class="container-fluid top-header">
			<div class="container">
				<div class="col-xs-12 renseignement-email">
					<p>Besoin d'un renseignement ? <a href="mailto:contact@Gustocoffee.fr">contact@Gustocoffee.fr</a></p>
				</div>

				<div class="col-sm-6 renseignement-telephone">
					<p>Pour toute question <a href="tel:01 02 03 04 05">01 02 03 04 05</a></p>
				</div>
			</div>
		</div>

		<header class="container-fluid">
			<div class="container">
	            <div class="row">
	                <div class="col-sm-3 col-xs-12">
	                    <a href="<?= site_url(); ?>">
							<img src="http://via.placeholder.com/167x73" alt="Logo Gustocoffee">
						</a>
	                </div>

					<div class="col-sm-3 col-xs-12">
					   <?= form_open(); ?>
					       <?= form_input(array('name' => 'recherche', 'placeholder' => 'Rechercher un produit', 'id' => 'recherche')); ?>
					   <?= form_close(); ?>
				   </div>

					<div class="col-xs-12 col-sm-6 menu-profil text-right">
						<ul>
							<li>
								<?php if( isset($this->session->userdata['client']) && !empty($this->session->userdata['client']->prenom) ) : ?>
									<a href="<?= site_url('profil'); ?>">
										<img src="<?= site_url('assets/images/profil_icon.png'); ?>">
										<br><?= $this->session->userdata['client']->prenom; ?>
									</a>
								<?php else : ?>
									<a href="<?= site_url('connexion'); ?>">
										<img src="<?= site_url('assets/images/profil_icon.png'); ?>">
										<br>Invité
									</a>
								<?php endif; ?>
							</li>

							<li id="monPanier">
								<a href="<?= site_url('panier'); ?>">
									<img src="<?= site_url('assets/images/panier_icon.png'); ?>">
									<br>Mon Reservation
								</a>
							</li>

							<li>
								<?php if( isset($this->session->userdata['client']) ) : ?>
									<a href="<?= site_url('deconnexion'); ?>">
										<img src="<?= site_url('assets/images/logout_icon.png'); ?>">
										<br>Déconnexion
									</a>
								<?php else : ?>
									<a href="<?= site_url('connexion'); ?>">
										<img src="<?= site_url('assets/images/login_icon.png'); ?>">
										<br>Connexion
									</a>
								<?php endif; ?>
							</li>
						</ul>
					</div>
	            </div>
				<div id="panierBox" class="col-lg-3 col-md-3 col-sm-3 col-xs-4 panier panierEtat">
					<h2>VOTRE RESERVATION</h2>
					<div id="panier">
					</div>
					<hr>
					<div class="row">
						<button type="button" name="button"><a href="<?= site_url('panier'); ?>">VOIR MON RESERVATION</a></button>
					</div>
				</div>
				<div class="row">
					<nav class="row">
		                <ul class="col-xs-12">
		                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		                        <a href="<?= site_url('/'); ?>">Accueil</a>
		                    </li>

		                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		                        <a href="<?= site_url('/produits'); ?>">Services</a>
		                    </li>

		                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		                        <a href="<?= site_url('/contact'); ?>">Contact</a>
		                    </li>
		                </ul>
		            </nav>
				</div>
			</div>
        </header>

		<div class="" id="slider-container-home">
            <div class="tp-banner-container">
		        <div class="tp-banner" >
        			<ul>
        				<li id="Gustocoffee-slide" data-transition="slidehorizontal" data-masterspeed="300" data-delay="7000">
        					<img src="<?= site_url('assets/images/slide_gustocoffee4.png'); ?>" alt="Gustocoffee Cap sur la propreté !" data-bgrepeat="no-repeat" data-bgfit="cover" data-bgfitend="100" data-bgposition="right bottom">

        					<div class="caption fade" data-x="0" data-y="70" data-speed="1000" data-start="2000" data-easing="easeOutBack">
                                <span class="titre">Decouvrir nos Services !</span>
        					</div>

                            <div class="caption lfb" data-x="800" data-y="40" data-speed="1000" data-start="1000" data-easing="easeOutBack">
                                <span class="marque">Gustocoffee</span>
        					</div>

                            <div class="caption lfr" data-x="790" data-y="75" data-speed="1000" data-start="3000" data-easing="easeOutBack">
                                <span class="formule">Welcome You!</span>
        					</div>

                            <div class="caption lfb" data-x="840" data-y="100" data-speed="1000" data-start="1000" data-easing="easeOutBack">
                                 
        					</div>
        				</li>


						<li id="Gustocoffee-slide-2" data-transition="slidehorizontal" data-masterspeed="300" data-delay="7000">
        					<img src="<?= site_url('assets/images/slide/slide_gustocoffee2.png'); ?>" alt="Gustocoffee Cap sur la propreté !" data-bgrepeat="no-repeat" data-bgfit="cover" data-bgfitend="100" data-bgposition="right bottom">
        				</li>

						<li id="Gustocoffee-slide-3" data-transition="slidehorizontal" data-masterspeed="300" data-delay="7000">
        					<img src="<?= site_url('assets/images/slide/slide_gustocoffee4.png'); ?>" alt="Gustocoffee Cap sur la propreté !" data-bgrepeat="no-repeat" data-bgfit="cover" data-bgfitend="100" data-bgposition="right bottom">
        				</li>

						<li id="Gustocoffee-slide-4" data-transition="slidehorizontal" data-masterspeed="300" data-delay="7000">
        					<img src="<?= site_url('assets/images/slide/slide_gustocoffee2.png'); ?>" alt="Gustocoffee Cap sur la propreté !" data-bgrepeat="no-repeat" data-bgfit="cover" data-bgfitend="100" data-bgposition="right bottom">
        				</li>

						<li id="Gustocoffee-slide-5" data-transition="slidehorizontal" data-masterspeed="300" data-delay="7000">
        					<img src="<?= site_url('assets/images/slide/slide_gustocoffee4.png'); ?>" alt="Gustocoffee Cap sur la propreté !" data-bgrepeat="no-repeat" data-bgfit="cover" data-bgfitend="100" data-bgposition="right bottom">
        				</li>
                    </ul>
                </div>
            </div>
        </div>



	    <main>

			<section class="col-xs-offset-8 col-xs-4 col-sm-offset-9 col-sm-3 col-md-offset-10 col-md-2 col-lg-offset-10 col-lg-2 style7">
			    <article>
			        <h1>Un renseignement ?</h1>
			        <button type="button" name="button">CONTACTEZ-NOUS</button>

			        <address class="row">
			            <p><strong>Gustocoffee</strong></p>
			            <p>1 Rue de Paris</p>
			            <p>75520 Paris</p>
			            <p>01 50 51 52 00</p>
			            <p>contact@Gustocoffee.fr</p>
			        </address>
			    </article>
			</section>