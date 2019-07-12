<?php if( null !== ( $this->session->flashdata('success') ) ) : ?>
	<div class="col-md-12">
		<div class="alert alert-success">
			<?= $this->session->flashdata('success'); ?>
		</div>
	</div>
<?php endif; ?>

<?php if( null !== ( $this->session->flashdata('error') ) ) : ?>
	<div class="col-md-12">
		<div class="alert alert-danger">
			<?= $this->session->flashdata('error'); ?>
		</div>
	</div>
<?php endif; ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-shopping-cart"></i> Liste des reservations
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
						<th class="text-center">ID</th>
						<th class="text-center">Client</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Time</th>
                        <th class="text-center">Quantité</th>
						<th class="text-center">Numéro de table</th>
						<th class="text-center">Statut</th>
						<th class="text-center">Client Statut</th>
						<th class="text-center">Paiement</th>
						<th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($reservations AS $key => $val) : ?>
                        <tr>
                            <td class="text-center align-middle"><?= $val->reservation_id; ?></td>

                            <td class="text-left align-middle">
                            	<a href="<?= site_url('admin/client/detail/'.$val->c_id); ?>">
                                <?= ucfirst($val->prenom); ?> <?= ucfirst($val->nom); ?>
                            	</a>
                        	</td>

                            <td class="text-center align-middle">
                            	<strong><?= $val->date; ?> </strong>
							</td>
							<td class="text-center align-middle">
                            	<strong><?= $val->time; ?> </strong>
							</td>
							<td class="text-center align-middle">
                            	<strong><?= $val->quantity; ?> </strong>
                        	</td>
							<td class="text-center align-middle">
                            	<strong><?= $val->tbnumber; ?> </strong>
                        	</td>
                            <td class="text-center align-middle">
                            	<?php
                            	   switch($val->status)
                            	   {
                            	       case '0':
                            	           echo '<span class="badge badge-pill badge-danger">Annulée</span>';
                            	           break;

                            	       case '1':
                            	           echo '<span class="badge badge-pill badge-success">Valide</span>';
                            	           break;
                            	   }
                            	?>
							   </td>
							   
							   <td class="text-center align-middle">
                            	<?php
                            	   switch($val->c_status)
                            	   {
							   			case 0:
                            	           echo '<span class="badge badge-pill badge-warning">Out</span>';
                            	           break;

                            	       case 1:
                            	           echo '<span class="badge badge-pill badge-success">In</span>';
										   break;
										
										// case 2:
										// echo '<span class="badge badge-pill badge-danger">Terminée</span>';
										// break;
									 }
								?>
								</td>
								<td class="text-center align-middle">
                            	<strong><?= $val->payment; ?>€ </strong>
                        	</td>

                            <td class="text-center align-middle">
                            	<div class="btn-group">
                            		<button type="button" class="btn btn-primary active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            			<i class="icon-settings"></i>
                        			</button>

                        			<div class="dropdown-menu dropdown-menu-right">
                        				<a class="dropdown-item" href="<?= site_url('admin/reservation/detail/'.$val->reservation_id); ?>"><i class="icon-magnifier-add"></i> Détail</a>
                                        <a class="dropdown-item" href="<?= site_url('admin/reservation/modifier/'.$val->reservation_id); ?>"><i class="icon-pencil"></i> Modifier</a>
                                        <a class="dropdown-item" onclick="return confirm('Voulez-vous vraiment supprimer cette reservation ?');" href="<?= site_url('admin/reservation/supprimer/'.$val->reservation_id); ?>"><i class="icon-trash"></i> Supprimer</a>
                                    </div>
								</div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
