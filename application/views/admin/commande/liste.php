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
            <i class="fa fa-shopping-cart"></i> Liste des commandes
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                    	<th class="text-center">ID</th>
                        <th class="text-left">Référence</th>
                        <th class="text-left">Client</th>
                        <th class="text-right">Montant TTC</th>
                        <th class="text-center">Statut</th>
                        <th class="text-center">Valide</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($commandes AS $key => $val) : ?>
                        <tr>
                            <td class="text-center align-middle"><?= $val->id; ?></td>

                            <td class="text-left align-middle">
                            	<a href="<?= site_url('admin/commande/detail/'.$val->id); ?>">
                        			<?= $val->reference; ?>
                    			</a>
                			</td>

                            <td class="text-left align-middle">
                            	<a href="<?= site_url('admin/client/detail/'.$val->client); ?>">
                                <?= ucfirst($val->prenom); ?> <?= ucfirst($val->nom); ?>
                            	</a>
                        	</td>

                            <td class="text-right align-middle">
                            	<strong><?= $val->prix_ttc_final; ?> €</strong>
                        	</td>

                            <td class="text-center align-middle">
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

                            <td class="text-center align-middle">
                            	<?php if($val->valide != 0) : ?>
                            		<span class="badge badge-pill badge-success">Validée</span>
                        		<?php else : ?>
                        			<span class="badge badge-pill badge-danger">Non validée</span>
                    			<?php endif; ?>
                            </td>

                            <td class="text-center align-middle">
                            	<div class="btn-group">
                            		<button type="button" class="btn btn-primary active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            			<i class="icon-settings"></i>
                        			</button>

                        			<div class="dropdown-menu dropdown-menu-right">
                        				<a class="dropdown-item" href="<?= site_url('admin/commande/detail/'.$val->id); ?>"><i class="icon-magnifier-add"></i> Détail</a>
                                        <a class="dropdown-item" href="<?= site_url('admin/commande/modifier/'.$val->id); ?>"><i class="icon-pencil"></i> Modifier</a>
                                        <a class="dropdown-item" onclick="return confirm('Voulez-vous vraiment supprimer cette commande ?');" href="<?= site_url('admin/commande/supprimer/'.$val->id); ?>"><i class="icon-trash"></i> Supprimer</a>
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
