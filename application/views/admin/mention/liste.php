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
            <i class="fa fa-users"></i> Détails de Enzymarine
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                      <th class="text-center">ID</th>	
                      <th class="text-left">Sociéte</th>
                      <th class="text-left">responsable</th>
                      <th class="text-left">RCS</th>
                      <th class="text-left">Téléphone</th>
                      <th class="text-left">Adresse</th>
                      <th class="text-center">Code_Postal</th>
                      <th class="text-left">Ville</th>
                      <th class="text-center">Pays</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($mentions AS $key => $val) : ?>
                        <tr>
                            <td class="text-center align-middle"><?= $val->id; ?></td>

                            <td class="text-left align-middle"><strong><?= $val->sociéte; ?></strong></td>

							<td class="text-left align-middle"><strong><?= $val->responsable; ?></strong></td>

							<td class="text-left align-middle"><strong><?= $val->rcs; ?></strong></td>
                            <td class="text-left align-middle"><strong><?= $val->telephone; ?></strong></td>
                             <td class="text-left align-middle"><strong><?= $val->adresse; ?></strong></td>
                              <td class="text-left align-middle"><strong><?= $val->code_postal; ?></strong></td>
                               <td class="text-left align-middle"><strong><?= $val->ville; ?></strong></td>
                                <td class="text-left align-middle"><strong><?= $val->pays; ?></strong></td>

                            


                            <td class="text-center align-middle">
                            	<div class="btn-group">
                            		<button type="button" class="btn btn-primary active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            			<i class="icon-settings"></i>
                        			</button>

                        			<div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="<?= site_url('admin/mention/modifier/'.$val->id); ?>"><i class="icon-pencil"></i> Modifier</a>
                                        

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
