<div class="row">
	<div class="col-md-12">
    	<div class="card">
        	<div class="card-header">
                <i class="fa fa-shopping-cart"></i>
                <strong>Détail reservation</strong>
            </div>

            <div class="card-body">
            	<div class="row">
        			<div class="col-md-8">
        				<div class="col-md-12">
        					<h4>Contenu de la reservation</h4>
        					<hr><br>

        					<table class="table table-striped">

										<tr>
											<td colspan="4" class="text-left">Date</td>
											<td class="text-right"><strong><?= $reservation->date; ?></strong></td>
										</tr>

										<tr>
											<td colspan="4" class="text-left">Time</td>
											<td class="text-right"><strong><?= $reservation->time; ?></strong></td>
										</tr>

										<tr>
											<td colspan="4" class="text-left">Quantity</td>
											<td class="text-right"><strong><?= $reservation->quantity; ?></strong></td>
										</tr>
										<tr>
											<td colspan="4" class="text-left">Numéro de table</td>
											<td class="text-right"><strong><?= $reservation->tbnumber; ?></strong></td>
										</tr>
										<tr>
											<td colspan="4" class="text-left">Paiement</td>
											<td class="text-right"><strong><?= $reservation->payment; ?></strong></td>
										</tr>
								</tbody>
        					</table>
        				</div>
        			</div>


        			<div class="col-md-4">
        				<h4>Informations supplémentaires</h4>
        				<hr>

        				<p>
        					<a href="<?= site_url('admin/client/detail/'.$reservation->c_id); ?>">
        						<?= $reservation->prenom; ?> <?= $reservation->nom; ?>
							</a><br><br>
							
							
        					Statut :
                            	<?php
                            	   switch($reservation->status)
                            	   {
                            	       case '0':
                            	           echo '<span class="badge badge-pill badge-danger">Annulée</span>';
                            	           break;

                            	       case '1':
                            	           echo '<span class="badge badge-pill badge-success">Confirmed</span>';
                            	           break;
                            	   }
                            	?>
							Client Statut:
                            	<?php
                            	   switch($reservation->c_status)
                            	   {
							   			case 0:
                            	           echo '<span class="badge badge-pill badge-warning">Out</span>';
                            	           break;

                            	       case 1:
                            	           echo '<span class="badge badge-pill badge-success">In</span>';
										   break;
										
										case 2:
										echo '<span class="badge badge-pill badge-danger">Terminée</span>';
										break;
									 }
								?>

        					
                        	<br><br>
        					<!-- Valide : <?= $reservation->valide != '0' ? '<span class="badge badge-pill badge-success">Valide</span>' : '<span class="badge badge-pill badge-danger">Invalide</span>'; ?><br>
        					Date création : <?= date('d/m/Y H:i:s', strtotime($reservation->date_creation)); ?><br>
        					Date modification : <?= date('d/m/Y H:i:s', strtotime($reservation->date_modification)); ?><br><br> -->

        					<a href="<?= site_url('admin/reservation/modifier/'.$reservation->reservation_id); ?>" class="btn btn-outline-primary">Modifier</a>
        					<a href="<?= site_url('admin/reservation/supprimer/'.$reservation->reservation_id); ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette reservation ?');" class="btn btn-outline-danger">Supprimer</a>
    					</p>
    				</div>
    			</div>

            </div>
		</div>
    </div>
</div>
