<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Modifier une Service</strong>
                les champs marqués d'une * sont obligatoires
            </div>

            <div class="card-body">
            <?= form_open_multipart( 'admin/stock/modifier/'.$stock->id); ?>

    				<?= validation_errors('<div class="col-md-12"><div class="alert alert-danger">', '</div></div>'); ?>

    				<?php if( null !== ( $this->session->flashdata('error') ) ) : ?>
            	<div class="col-md-12">
            		<div class="alert alert-danger">
            			<?= $this->session->flashdata('error'); ?>
            		</div>
            	</div>
            <?php endif; ?>

    				<h3>Informations service</h3>
    				<hr>


    				<div class="row">
               <div class="form-group col-md-6 <?php if(form_error('product')) { echo 'has-error'; } ?>">
                <?= form_label('Nom de Produit *', 'product', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'product', 'placeholder' => 'Nom de Produit', 'id' => 'product_code', 'class' => 'form-control', 'value' => set_value('product', $stock->product))); ?>
                  <?= form_error('product', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-6 <?php if(form_error('procuct_id')) { echo 'has-error'; } ?>">
                <?= form_label('Reference de Produit', 'procuct_id', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'product_id',  'readonly' => true,'placeholder' => 'Reference de Produit', 'id' => 'procuct_id', 'class' => 'form-control', 'value' => set_value('procuct_id', $stock->id))); ?>
                  <?= form_error('product_id', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>
              </div>

              <div class="row">
              <div class="form-group col-md-6">
                    		<?= form_label('Type de Menu *', 'statut', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_dropdown('menu', array('1' => 'Nouriture', '2' => 'Sandwich','3' => 'Glace', '4' => 'Gâteau','5' => 'Shot', '6' => 'Boisson Chaude','7' => 'Boisson Glacée', '8' => 'Boisson'), set_value('menu', $stock->menu_type), array('id' =>'menu', 'class' =>'form-control')); ?>
                                <?= form_error('menu', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                      </div>
                      
               <div class="form-group col-md-6 <?php if(form_error('quantity')) { echo 'has-error'; } ?>">
                <?= form_label('Prix *', 'price', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'price', 'placeholder' => 'Prix', 'id' => 'price', 'class' => 'form-control', 'value' => set_value('price', $stock->price))); ?>
                  <?= form_error('price', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>


              <div class="form-group col-md-6">
              <div class="card">
              <div class="card-header">
								<strong>Joindre une image de Produit</strong>
							</div>

							<div class="card-body">
								<div class="form-group col-md-12">
									<?= form_label('Image de Produit * <small>(JPG, PNG, 1024px, 2Mo maximum)</small>', 'image', array('class' => 'form-control-label')); ?>
									<div class="">
										<?= form_upload(array('name' => 'image', 'id' => 'image')); ?>
										<p>
											<small><span class="help-block text-danger">
											<?php if( null !== ( $this->session->flashdata('error_image') ) ) : ?>
											<?= $this->session->flashdata('error_image'); ?>
											<?php endif; ?>
											</span></small>
										</p>
									</div>
								</div>
								<label>Image actuel</label>
								<img width="50" height="50" src="<?= site_url('assets/images/produit/'.$stock->image); ?>">
              </div>
</div>
</div>



              

            </div>

            <div class="row">

            

            </div>
			</div>

			<div class="card-footer">
                <?= form_input(array('type' => 'hidden', 'name' => 'id', 'value' => $stock->id)); ?>
				<?= form_submit('submitBtn', 'Enregistrer', array('class' => 'btn btn-sm btn-primary pull-right')); ?>
			</div>

			<?= form_close(); ?>
		</div>
	</div>
</div>
