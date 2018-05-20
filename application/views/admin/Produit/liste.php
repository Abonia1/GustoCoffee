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
            <i class="fa fa-eyedropper"></i> Liste des produits
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                    	<th class="text-center">ID</th>
                        <th class="text-left">Produit</th>
                        <th class="text-left">Référence</th>
                        <th class="text-right">Prix HT</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($produits AS $key => $val) : ?>
                        <tr>
                            <td class="text-center align-middle"><?= $val->id; ?></td>

                            <td class="text-left align-middle"><strong><?= ucfirst($val->nom); ?></strong></td>

                            <td class="text-left align-middle"><?= $val->reference; ?></td>

                            <td class="text-right align-middle"><?= $val->prix_ht; ?>€</td>

                            <td class="text-center align-middle">
                            	<?php if($val->bidon != NULL) : ?>
                            		<img src="<?= site_url('assets/images/produit/'.$val->bidon); ?>" width="100" height="100" class="rounded" />
                        		<?php endif; ?>
                            </td>

                            <td class="text-center align-middle">
                            	<div class="btn-group">
                            		<button type="button" class="btn btn-primary active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            			<i class="icon-settings"></i>
                        			</button>

                        			<div class="dropdown-menu dropdown-menu-right">
                        				<a class="dropdown-item" href="<?= site_url('admin/produit/detail/'.$val->id); ?>"><i class="icon-pencil"></i> Détail</a>
                                        <a class="dropdown-item" href="<?= site_url('admin/produit/modifier/'.$val->id); ?>"><i class="icon-pencil"></i> Modifier</a>
                                        <a class="dropdown-item" onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?');" href="<?= site_url('admin/produit/supprimer/'.$val->id); ?>"><i class="icon-trash"></i> Supprimer</a>
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
