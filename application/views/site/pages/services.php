
				
<div class="container">
    <h1>Nos services disponible sur place et dès la réservation pour 10% de réduction</h1>
    <?php foreach($services_type AS $service_type) : ?>
        <article class="col-xs-12 col-sm-6 produit">
            <a href="<?= site_url('/services'); ?>/<?= $service_type->s_type_id; ?>">
                <div>
                    <img src="<?= site_url('assets/images/services/services_type/'.$service_type->s_image); ?>" alt="<?= $service_type->s_nom; ?>" />

                    <div class="produit-nom">
                        <h2><?= $service_type->s_nom; ?></h2>
                    </div>
                </div>

                <img src="<?= site_url('assets/images/ombre_produit.png'); ?>" />
            </a>
        </article>
    <?php endforeach; ?>
</div>



<link rel="stylesheet" type="text/css" href="<?= site_url('assets/css/services.css'); ?>"/>