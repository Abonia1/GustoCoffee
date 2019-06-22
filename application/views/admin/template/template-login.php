<!doctype html>
<html class="no-js" lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>GustoCoffee - Administration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Icons -->
        <link href="<?= site_url('web/css/admin/font-awesome.min.css'); ?>" rel="stylesheet">

        <!-- Main styles for this application -->
        <link href="<?= site_url('web/css/admin/style.css'); ?>" rel="stylesheet">
	</head>
	
	<body class="app flex-row align-items-center">
        <div class="container">
        
        	<?php if( null !== ( $this->session->flashdata('success') ) ) : ?>
            	<div class="row justify-content-center">
                    <div class="col-md-6">
        				<div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        			</div>
        		</div>
    		<?php endif; ?>
    		
    		<?php if( null !== ( $this->session->flashdata('error') ) ) : ?>
        		<div class="row justify-content-center">
                    <div class="col-md-6">
        				<div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        			</div>
        		</div>
    		<?php endif; ?>
    		
        	<?= $content; ?>

        </div>	
	</body>
</html>