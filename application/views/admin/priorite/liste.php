<?php if( null !== ( $this->session->flashdata('success') ) ) : ?>
	<div class="col-md-12">
		<div class="alert alert-success">
			<?= $this->session->flashdata('success'); ?>
		</div>
	</div>
<?php endif; ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-users"></i> Liste des priorites
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                    	<th class="text-center">ID</th>
                        <th class="text-left">Priorite</th>
												<th class="text-left">Description</th>
												<th class="text-left">Alt</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($priorites AS $key => $val) : ?>
                        <tr>
                            <td class="text-center align-middle"><?= $val->id; ?></td>

                            <td class="text-left align-middle"><strong><?= $val->priorite; ?></strong></td>

														<td class="text-left align-middle"><strong><?= $val->description; ?></strong></td>

														<td class="text-left align-middle"><strong><?= $val->alt; ?></strong></td>

                            <td class="text-center align-middle">
                            	<?php if($val->image != NULL) : ?>
                            		<img src="<?= site_url('assets/images/priorite/'.$val->image); ?>" width="70" height="70" class="rounded" />
                        		<?php endif; ?>
                        	</td>

                            <td class="text-center align-middle">
                            	<div class="btn-group">
                            		<button type="button" class="btn btn-primary active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            			<i class="icon-settings"></i>
                        			</button>

                        			<div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="<?= site_url('admin/priorite/modifier/'.$val->id); ?>"><i class="icon-pencil"></i> Modifier</a>
                                        <a class="dropdown-item" onclick="return confirm('Voulez-vous vraiment supprimer cette priorite ?');" href="<?= site_url('admin/priorite/supprimer/'.$val->id); ?>"><i class="icon-trash"></i> Supprimer</a>
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
