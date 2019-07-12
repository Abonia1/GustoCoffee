<div class="row">
	<div class="col-md-12">
    	<div class="card">
        	<div class="card-header">
                <i class="fa fa-user"></i>
                <strong>Détail client</strong>
            </div>


            <div class="card-body">
            	<div class="row">
        			<div class="col-md-8">

        				<div class="col-md-12">
        					<h4>Statistiques des achats</h4>

        					<div class="chart-wrapper">
                                <canvas id="canvas-1"></canvas>
                            </div>
        				</div>

        				<br><br>

        				<div class="col-md-12 table-responsive">
        					<h4>Liste des commandes</h4>

        					<table class="table table-striped">
                    			<thead>
                        			<tr>
                                <th class="text-center">Date</th>
                        				<th class="text-center">Référence</th>
        		                    <th class="text-right">Montant</th>
                            		<th class="text-center">Statut</th>
                            		<th class="text-center">Valide</th>
                            		<th class="text-center">Action</th>
        		                  </tr>
        		                </thead>

        		                <tbody>
        		                	<?php if(is_array($commandes)) : ?>
            		                	<?php foreach($commandes AS $key => $val) : ?>
            	                        	<tr>
                                            <td class="text-center"><?= date('d/m/Y H:i:s', strtotime($val->date_creation)); ?></td>
                		                        <td class="text-center"><?= $val->reference; ?></td>
                		                        <td class="text-right"><?= $val->prix_ttc_final; ?> €</td>
                		                        <td class="text-center">
                                        			<?php
                                		               switch($val->statut)
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

                	                            <td class="text-center">
                	                            	<?php if($val->valide != 0) : ?>
                	                            		<span class="badge badge-pill badge-success">Validée</span>
                	                        		<?php else : ?>
                	                        			<span class="badge badge-pill badge-danger">Non validée</span>
                	                    			<?php endif; ?>
                	                            </td>

                	                            <td class="text-center">
                	                            	<div class="btn-group">
                	                            		<button type="button" class="btn btn-primary active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                	                            			<i class="icon-settings"></i>
                	                        			</button>

                	                        			<div class="dropdown-menu dropdown-menu-right">
                	                        				<a class="dropdown-item" href="<?= site_url('web/document/bon-livraison/'.$val->bon_livraison); ?>"><i class="icon-doc"></i> Bon livraison</a>
        	                                        <a class="dropdown-item" href="<?= site_url('admin/reservation/modifier/'.$val->id); ?>"><i class="icon-pencil"></i> Modifier</a>
        	                                        <a class="dropdown-item" href="<?= site_url('admin/reservation/supprimer/'.$val->id); ?>"><i class="icon-trash"></i> Supprimer</a>
        	                                        <a class="dropdown-item" href="<?= site_url('admin/reservation/detail/'.$val->id); ?>"><i class="icon-magnifier-add"></i> Détail</a>
        	                                    </div>
                									</div>
                	                            </td>
                                			</tr>
                            			<?php endforeach; ?>
                        			<?php else : ?>
                        				<tr>
                        					<td colspan="6" class="text-center">Aucune commande</td>
                    					</tr>
                        			<?php endif; ?>
                    			</tbody>
               				</table>
        				</div>
        			</div>


        			<div class="col-md-4">
        				<h4><i class="fa fa-address-card-o"></i> Informations personnelles</h4>

        				<p>
        					<?= $client->civilite; ?> <?= $client->prenom; ?> <?= $client->nom; ?><br>

                			Statut : <?= $client->statut != '0' ? '<span class="badge badge-pill badge-success">Actif</span>' : '<span class="badge badge-pill badge-danger">Inactif</span>'; ?><br>
                			Date création : <?= date('d/m/Y H:i:s', strtotime($client->date_creation)); ?><br>
                			Date modification : <?= date('d/m/Y H:i:s', strtotime($client->date_modification)); ?><br><br>

                			<a href="<?= site_url('admin/client/modifier/'.$client->id); ?>" class="btn btn-outline-primary">Modifier</a> <a href="<?= site_url('admin/reservation/ajouter/'.$client->id); ?>" class="btn btn-outline-primary">Ajouter commande</a>
            			</p>

                		<h5>Coordonnées</h5>
                		<hr>
        				<p>
        					<?php if($client->telephone != NULL) : ?>
            					<i class="fa fa-phone"></i> <a href="tel:<?=$client->telephone; ?>"><?=$client->telephone; ?></a><br>
        					<?php endif; ?>

        					<?php if($client->mobile != NULL) : ?>
            					<i class="fa fa-phone"></i> <a href="tel:<?=$client->mobile; ?>"><?=$client->mobile; ?></a><br>
        					<?php endif; ?>

        					<?php if($client->email != NULL) : ?>
            					<i class="fa fa-envelope"></i> <a href="mailto:<?=$client->email; ?>"><?=$client->email; ?></a>
        					<?php endif; ?>
        				</p>

        				<h5>Adresses</h5>
        				<hr>
        				<h6>Adresse principale</h6>
        				<p>
        					<?php if($client->adresse != NULL) : ?>
            					<?= $client->adresse; ?><br>
                    			<?= $client->code_postal." ".$client->ville; ?><br>
                    			<?= $client->pays; ?><br><br>
                			<?php else : ?>
                				Aucune adresse
            				<?php endif; ?>
        				</p>

        				<h6>Adresse autre</h6>
        				<p>
        					<?php if($client->adresse_autre != NULL) : ?>
            					<?=$client->adresse_autre; ?><br>
                				<?=$client->code_postal_autre." ".$client->ville_autre; ?><br>
                				<?=$client->pays_autre; ?>
            				<?php else : ?>
            					Aucune adresse
            				<?php endif; ?>
        				</p>

        			</div>
    			</div>

            </div>
		</div>
    </div>

</div>
