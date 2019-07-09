
				
<div class="container">
        <?php if($type == 1) {?>
        <h1>Découvrez nos patisserie et sandwish</h1>
        <?php } ?>
        <?php if($type == 2) {?>
        <h1>Rafraichissez vous avec des boissons bien fraîches</h1>
        <?php } ?>
        <?php if($type == 3) {?>
        <h1>Découvrez des menus qui vous permettrons de vous restaurez sur place</h1>
        <?php } ?>
        <?php if($type == 4) {?>
        <h1>Un service bureautique vous permettra de sauvegarder et d'imprimer vos projets</h1>
        <?php } ?>
        <h2><a href="<?= site_url('services')?>">Retour vers tous les services</a></h2>
    <?php foreach($service AS $serv) : ?>
        <div class="col-xs-12 col-sm-3">
            <div class="rightdiv1a"><img src="<?= site_url('assets/images/services/services/'.$serv->service_image); ?>" style="width: 100%; height: 280px "></div>
            <div class="rightdiv1b"><center><p><?= $serv->service_nom ?> ( <?= $serv->service_prix ?>€ )</p></center></div>
        </div>
    <?php endforeach; ?>
</div>



<link rel="stylesheet" type="text/css" href="<?= site_url('assets/css/services.css'); ?>"/>