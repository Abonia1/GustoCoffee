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
            <i class="fa fa-users"></i> Liste des clients et prospects
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                    	<th class="text-center">ID</th>
                      <th class="text-left">Prénom</th>
                      <th class="text-left">Nom</th>
                      <th class="text-left">E-mail</th>
                      <th class="text-center">Téléphone</th>
                      <th class="text-center">Mobile</th>
                      <th class="text-center">Statut</th>
                      <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($clients AS $key => $val) : ?>
                        <tr>
                            <td class="text-center"><?= $val->id; ?></td>

                            <td class="text-left"><?= ucfirst($val->prenom); ?></td>

                            <td class="text-left"><?= ucfirst($val->nom); ?></td>

                            <td class="text-left">
                            	<a href="mailto:<?= $val->email; ?>"><?= $val->email; ?></a>
                            </td>

                            <td class="text-center"><?= $val->telephone; ?></td>

                            <td class="text-center"><?= $val->mobile; ?></td>

                            <td class="text-center align-middle">
                            	<?php if( $val->statut != 0 ) : ?>
                            		<span class="badge badge-pill badge-success">Actif</span>
                        		<?php else : ?>
                        			<span class="badge badge-pill badge-danger">Inactif</span>
                    			<?php endif; ?>
                            </td>

                            <td class="text-center">
                            	<div class="btn-group">
                            		<button type="button" class="btn btn-primary active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            			<i class="icon-settings"></i>
                        			</button>

                        			<div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="<?= site_url('admin/client/detail/'.$val->id); ?>"><i class="icon-magnifier-add"></i> Détails</a>
                                        <a class="dropdown-item" href="<?= site_url('admin/client/modifier/'.$val->id); ?>"><i class="icon-pencil"></i> Modifier</a>
                                        <!-- <a class="dropdown-item" onclick="return confirm('Voulez-vous vraiment supprimer ce client ?');" href="<?= site_url('admin/client/supprimer/'.$val->id); ?>"><i class="icon-trash"></i> Supprimer</a> -->
                                        <a class="dropdown-item" href="<?= site_url('admin/reservation/ajouter/'.$val->id); ?>"><i class="icon-pencil"></i> Ajouter une commande</a>
                                        <a class="dropdown-item" href="<?= site_url('admin/reservation/liste/'.$val->id); ?>"><i class="icon-trash"></i> Voir les commandes</a>
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
