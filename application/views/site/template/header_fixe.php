<!doctype html>
<html class="no-js" lang="fr">
	<head>
    	<meta charset="UTF-8">
    	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    	<title>EnzyMarine - Pour un résultat clean</title>

    	<link rel="stylesheet" href="<?= site_url('assets/css/bootstrap-grid.css'); ?>" media="all">
    	<link rel="stylesheet" href="<?= site_url('assets/css/styles.css'); ?>" media="all">

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>

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
					<p>Besoin d'un renseignement ? <a href="mailto:contact@enzymarine.fr">contact@enzymarine.fr</a></p>
				</div>

				<!--<div class="col-sm-6 renseignement-telephone">
					<p>Pour toute question <a href="tel:01 02 03 04 05">01 02 03 04 05</a></p>
				</div>-->
			</div>
		</div>

		<header class="container-fluid">
			<div class="container">
	            <div class="row">
	                <div class="col-sm-3 col-xs-8">
	                    <a href="<?= site_url(); ?>">
							<img src="http://via.placeholder.com/167x73" alt="Logo EnzyMarine">
						</a>
	                </div>



	                <div id="telephone" class="col-sm-offset-5 col-sm-4 col-xs-4">
	                    <p>Pour toute question<br><strong>01 02 03 04 05</strong></p>
	                </div>
	            </div>

				<div class="row">
					<nav class="row">
		                <ul class="col-xs-12">
		                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		                        <a href="<?= site_url('/'); ?>">Accueil</a>
		                    </li>

		                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		                        <a href="<?= site_url('/produits'); ?>">Produits</a>
		                    </li>

		                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		                        <a href="<?= site_url('/contact'); ?>">Contact</a>
		                    </li>
		                </ul>
		            </nav>
				</div>
			</div>
        </header>
	
		<div class="<?= $slide['class']; ?>" id="slider-container">
	          <div class="container slider-titre">
                  <h1><?= $slide['produit']; ?></h1>
                  <h2><?= $slide['description']; ?></h2>
	          </div>
        </div>

		<div class="slide-shadow">
			<img src="<?= site_url('assets/images/slide_shadow.png'); ?>">
		</div>

	    <main>

			<section class="col-xs-offset-8 col-xs-4 col-sm-offset-9 col-sm-3 col-md-offset-10 col-md-2 col-lg-offset-10 col-lg-2 style7">
			    <article>
			        <h1>Un renseignement ?</h1>
			        <button type="button" name="button">CONTACTEZ-NOUS</button>

			        <address class="row">
			            <p><strong>EnzyMarine</strong></p>
			            <p>25 Avenur du Gros Murger</p>
			            <p>95520 Herblay</p>
			            <p>01 50 51 52 53</p>
			            <p>contact@enzymarine.fr</p>
			        </address>
			    </article>
			</section>
