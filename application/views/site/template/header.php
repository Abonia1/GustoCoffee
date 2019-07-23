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
				<!-- Icons -->
				<link href="<?= site_url('web/css/admin/font-awesome.min.css'); ?>" rel="stylesheet">
		

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js"></script>
		<!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script>   -->
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

					<div class="col-sm-4 col-xs-12 rechercheservice">
					<!-- <?= $attributes = array('id' => 'my_form');?> -->
					   <?= form_open_multipart("serviceresult",array('id' => 'my_form')); ?>
					   <div class="input-group mb-4 ">	
					   <?= form_input(array('name' => 'recherche', 'placeholder' => ' Rechercher un service', 'id' => 'recherche')); ?>
						   <!-- <?= form_input(array('name' => 'recherche', 'placeholder' => '&#xF002; Rechercher un service', 'id' => 'recherche')); ?> -->
						   <div class="validrecherche"><a onclick="document.getElementById('my_form').submit();" class="icon-block">
						   <span class="input-group-addon"><i aria-hidden="true" class="fa fa-search"></i>
							</span>
							</a></div>
							<?= form_close(); ?>
					   </div>
				   </div>

					<div class="col-xs-12 col-sm-5 menu-profil text-right">
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
				<div class="row">
					<nav class="row">
		                <ul class="col-xs-12">
		                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		                        <a href="<?= site_url('/'); ?>">Accueil</a>
		                    </li>

		                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		                        <a href="<?= site_url('/services'); ?>">Services</a>
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
			        <p>Un renseignement ?</p>
			        <button type="button" name="button">CONTACTEZ-NOUS</button>

			        <address class="row">
			            <p><strong>Gustocoffee</strong></p>
			            <p>1 rue de Condorcet</p>
			            <p>75520 Paris</p>
			            <p>01 50 51 52 00</p>
			            <p>contact@Gustocoffee.fr</p>
			        </address>
			    </article>
			</section>

			<script type="text/javascript" src="<?= site_url('assets/js/recherche.js'); ?>"></script>
