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
            <i class="fa fa-users"></i> Liste des Stock
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                    	<th class="text-center">Code de Produit</th>
                        <th class="text-left">Nom</th>
												
                        <th class="text-center">Quantity</th>
                        <th class="text-center">TransDate</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($stocks AS $key => $val) : ?>
                        <tr>
                             <td class="text-center align-middle"><?= $val->id; ?></td>
                            <td class="text-center align-middle"><?= $val->product_code; ?></td>

                            <td class="text-left align-middle"><strong><?= $val->product_name; ?></strong></td>
                            <td class="text-center align-middle"><?= $val->quantity; ?></td>

                            <td class="text-center align-middle"><strong><?= $val->trans_date; ?></strong></td>


														

                           
                            <td class="text-center align-middle">
                            	<div class="btn-group">
                            		<button type="button" class="btn btn-primary active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            			<i class="icon-settings"></i>
                        			</button>

                        			<div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="<?= site_url('admin/stock/modifier/'.$val->id); ?>"><i class="icon-pencil"></i> Modifier</a>
                                        <a class="dropdown-item" onclick="return confirm('Voulez-vous vraiment supprimer cette priorite ?');" href="<?= site_url('admin/stock/supprimer/'.$val->id); ?>"><i class="icon-trash"></i> Supprimer</a>
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
