<div class="row">
	<div class="col-md-12">
    	<div class="card">
        	<div class="card-header">
                <i class="fa fa-shopping-cart"></i>
                <strong>Détail commande</strong>
            </div>

            <div class="card-body">
            	<div class="row">
        			<div class="col-md-8">
        				<div class="col-md-12">
        					<h4>Contenu de la commande</h4>
        					<hr><br>

        					<table class="table table-striped">
        						<thead>
        							<tr>
        								<th class="text-left">Produit</th>
        								<th class="text-right">Prix HT</th>
        								<th class="text-right">Qté</th>
        								<th class="text-right">Remise</th>
        								<th class="text-right">Prix Total</th>
    								</tr>
								</thead>

								<tbody>
									<?php foreach($produits AS $key => $val) : ?>
    									<tr>
    										<td class="text-left align-middle"><a href="<?= site_url('admin/produit/detail/'.$val->produit_id); ?>" class="btn btn-link"><?= $val->produit_name; ?></a></td>
    										<td class="text-right align-middle"><?= $val->prix_ht; ?>€</td>
    										<td class="text-right align-middle"><?= $val->quantite; ?></td>
    										<td class="text-right align-middle"><?= $val->remise; ?>%</td>
    										<td class="text-right align-middle"><strong><?= $val->total_ht; ?>€</strong></td>
    									</tr>
									<?php endforeach; ?>
										<tr>
											<td colspan="4" class="text-right">Total HT</td>
											<td class="text-right"><strong><?= $commande->prix_ht_final; ?>€</strong></td>
										</tr>

										<tr>
											<td colspan="4" class="text-right">Total HT après remise</td>
											<td class="text-right"><strong><?= $commande->prix_ht_remise; ?>€</strong></td>
										</tr>

										<tr>
											<td colspan="4" class="text-right">Total TTC</td>
											<td class="text-right"><strong><?= $commande->prix_ttc_final; ?>€</strong></td>
										</tr>
								</tbody>
        					</table>
        				</div>
        			</div>


        			<div class="col-md-4">
        				<h4>Informations supplémentaires</h4>
        				<hr>

        				<p>
        					<a href="<?= site_url('admin/client/detail/'.$commande->client); ?>">
        						<?= $commande->prenom; ?> <?= $commande->nom; ?>
    						</a><br><br>

        					Référence : <?= $commande->reference; ?><br>
        					Statut :

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
                        	<br>
        					Valide : <?= $commande->valide != '0' ? '<span class="badge badge-pill badge-success">Valide</span>' : '<span class="badge badge-pill badge-danger">Invalide</span>'; ?><br>
        					Date création : <?= date('d/m/Y H:i:s', strtotime($commande->date_creation)); ?><br>
        					Date modification : <?= date('d/m/Y H:i:s', strtotime($commande->date_modification)); ?><br><br>

        					<a href="<?= site_url('web/document/bon-livraison/'.$commande->bon_livraison); ?>" class="btn btn-outline-primary">Bon livraison</a>
        					<a href="<?= site_url('admin/commande/modifier/'.$commande->id); ?>" class="btn btn-outline-primary">Modifier</a>
        					<a href="<?= site_url('admin/commande/supprimer/'.$commande->id); ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette commande ?');" class="btn btn-outline-danger">Supprimer</a>
    					</p>
    				</div>
    			</div>

            </div>
		</div>
    </div>
</div>
