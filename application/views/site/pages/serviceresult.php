
				
<div class="container">
        <h1>Résultat de la recherche:</h1>
        <h2><a href="<?= site_url('services')?>">Retour vers tous les services</a></h2>
    <?php if (!empty($service)): ?> 
    <?php foreach($service AS $serv) : ?>
        <div class="service col-xs-12 col-md-3 col-sm-3">
            <div class="rightdiv1a"><img src="<?= site_url('assets/images/services/services/'.$serv->service_image); ?>" style="width: 100%; height: 280px "></div>
            <div class="rightdiv1b"><center><p><?= $serv->service_nom ?> ( <?= $serv->service_prix ?>€ )</p></center></div>
        </div>
    <?php endforeach; ?>
    <?php else: ?>

        <h3>Aucun résultat trouvé</h3>

    <?php endif; ?>
</div>



<link rel="stylesheet" type="text/css" href="<?= site_url('assets/css/services.css'); ?>"/>