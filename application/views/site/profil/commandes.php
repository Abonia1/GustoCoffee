<div class="container profil-container">
    <div class="titre col-xs-12">
        <h1>Mon espace client</h1>

        <div class="ancre">
            <hr>
        </div>
    </div>

    <section class="col-xs-12 col-sm-3 sidebar-left">
        <h2>Mon compte</h2>

        <ul>
            <li><a href="<?= site_url('profil'); ?>">Mes informations</a></li>
            <li><a href="<?= site_url('profil/commandes'); ?>">Mes commandes</a></li>
            <li><a href="<?= site_url('panier'); ?>">Mon panier</a></li>
            <li><a href="<?= site_url('deconnexion'); ?>">Me déconnecter</a></li>
        </ul>
    </section>

    <section class="col-xs-12 col-sm-9 profil-table">
        <h2>Mes commandes</h2>
        <div class="table-responsive">
            <table class="col-xs-12 commande">
                <thead>
                    <tr>
                        <th class="text-left">N°</th>
                        <th class="text-left">Résumé</th>
                        <th class="text-left">Date</th>
                        <th class="text-center">Paiement</th>
                        <th class="text-center">Statut</th>
                        <th class="text-right">Total</th>
                        <th class="text-left">Facture</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if($commandes != NULL) : ?>
                        <?php foreach($commandes AS $commande) : ?>
                            <tr>
                                <td class="text-left"><?= $commande->reference; ?></td>
                                <td class="text-left">produits</td>
                                <td class="text-left"><?= date('d/m/Y H:i:s', strtotime($commande->date_creation)); ?></td>
                                <td class="text-center">paiement</td>
                                <td class="text-center">
                                  <?php
                                	   switch($commande->statut)
                                	   {
                                	       case 0:
                                	           echo '<span class="badge badge-pill badge-danger">Annulée</span>';
                                	           break;

                                	       case 1:
                                	           echo '<span class="badge badge-pill badge-info">En cours</span>';
                                	           break;

                                	       case 2:
                                	           echo '<span class="badge badge-pill badge-warning">En attente</span>';
                                	           break;

                                	       case 3:
                                	           echo '<span class="badge badge-pill badge-success">Terminée</span>';
                                	           break;
                                	   }
                                	?>
                                </td>
                                <td class="text-right"><?= $commande->prix_ttc_final; ?>€</td>
                                <td class="text-left"><?= $commande->bon_livraison; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                            <tr>
                              <td class="text-left" colspan="7">Abscence de commande</td>
                            </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>



</div>
