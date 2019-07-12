<!doctype html>
<html class="no-js" lang="fr">
	<head>
    	<meta charset="UTF-8">
    	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/gusto_coffee.ico" />
    	<title>Gustocoffee - Meilleurs Espaces de Coworking</title>

    	<link rel="stylesheet" href="<?= site_url('assets/css/bootstrap-grid.css'); ?>" media="all">
    	<link rel="stylesheet" href="<?= site_url('assets/css/styles.css'); ?>" media="all">
		<link rel="stylesheet" href="<?= site_url('assets/css/jquery.toast.css'); ?>" media="all">

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
        <script type="text/javascript" src="<?= site_url('assets/js/jquery.themepunch.plugins.min.js'); ?>"></script>
		<script type="text/javascript" src="<?= site_url('assets/js/jquery.themepunch.revolution.min.js'); ?>"></script>
		<script type="text/javascript" src="<?= site_url('assets/js/jquery.toast.js'); ?>"></script>
		
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  		<link rel="stylesheet" href="/resources/demos/style.css">
  		
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script type='text/javascript' src="<?= site_url('assets/css/jquery.svg.min.js'); ?>"></script>
		<link rel="stylesheet" href="<?= site_url('assets/css/reservation.css'); ?>" media="all">
		  
		
		
		
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

				<div class="col-xs-12 renseignement-telephone">
					<p>Pour toute question <a href="tel:01 02 03 04 05">01 02 03 04 05</a></p>
				</div>
			</div>
		</div>

		<header class="container-fluid">
			<div class="container">
	            <div class="row">
	                <div class="col-sm-3 col-xs-12">
	                    <a href="<?= site_url(); ?>">
							<img src="<?= site_url("assets/images/gusto_coffee.png"); ?>" alt="Logo Gustocoffee">
						</a>
	                </div>

					<div class="col-sm-3 col-xs-12">
					   <?= form_open(); ?>
					       <?= form_input(array('name' => 'recherche', 'placeholder' => 'Rechercher un service', 'id' => 'recherche')); ?>
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
										<br>Se connecter
									</a>
								<?php endif; ?>
							</li>

							<li id="monPanier">
								<a href="<?= site_url('reservation'); ?>">
									<img src="<?= site_url('assets/images/panier_icon.png'); ?>">
									<br>Reservation
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
						<button type="button" name="button"><a href="<?= site_url('profil/commandes'); ?>">VOIR MON RESERVATION</a></button>
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
