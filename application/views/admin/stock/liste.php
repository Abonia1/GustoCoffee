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
                    	<th class="text-center">Produit</th>
                        <th class="text-center">Type de Menu</th>
												
                        <th class="text-center">Prix</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($stocks AS $key => $val) : ?>
                        <tr>
                             <td class="text-center align-middle"><?= $val->id; ?></td>
                            <td class="text-center align-middle"><?= $val->product; ?></td>
                            <td class="text-center">
                            <?php
                                		               switch($val->menu_type)
                                    	   	           {
                                                           case 1:
                                                	           echo '<span class="badge badge-pill badge-danger">Nouriture</span>';
                                                	           break;

                                                	       case 2:
                                                	           echo '<span class="badge badge-pill badge-info">Sandwich</span>';
                                                	           break;

                                                	       case 3:
                                                	           echo '<span class="badge badge-pill badge-warning">Glace</span>';
                                                	           break;

                                                	       case 4:
                                                	           echo '<span class="badge badge-pill badge-success">Gâteau</span>';
                                                               break;

                                                            case 5:
                                                	           echo '<span class="badge badge-pill badge-danger">Shot</span>';
                                                	           break;

                                                	       case 6:
                                                	           echo '<span class="badge badge-pill badge-info">Boisson Chaude</span>';
                                                	           break;

                                                	       case 7:
                                                	           echo '<span class="badge badge-pill badge-warning">Boisson Glacée</span>';
                                                	           break;

                                                	       case 8:
                                                	           echo '<span class="badge badge-pill badge-success">Boisson</span>';
                                                	           break;
                                            	       }
                                                   ?>
                                                   </td>
                            <!-- <td class="text-left align-middle"><strong><?= $val->menu_type; ?></strong></td> -->
                            <td class="text-center align-middle"><?= $val->price; ?></td>

                            <td class="text-center align-middle"><strong><?= $val->image; ?></strong></td>


														

                           
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
