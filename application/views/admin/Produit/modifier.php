<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Modifier une produit d'accueil</strong>
                les champs marqués d'une * sont obligatoires
            </div>

            <div class="card-body">
            <?= form_open_multipart( 'admin/produit/modifier/'.$produit->id); ?>

    				<?= validation_errors('<div class="col-md-12"><div class="alert alert-danger">', '</div></div>'); ?>

    				<?php if( null !== ( $this->session->flashdata('error') ) ) : ?>
            	<div class="col-md-12">
            		<div class="alert alert-danger">
            			<?= $this->session->flashdata('error'); ?>
            		</div>
            	</div>
            <?php endif; ?>

    				<h3>Informations de Produit d'accueil</h3>
    				<hr>


    				<div class="row">
               <div class="form-group col-md-6 <?php if(form_error('product')) { echo 'has-error'; } ?>">
                <?= form_label('Nom de Produit *', 'product', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'product', 'placeholder' => 'Nom de Produit', 'id' => 'product_code', 'class' => 'form-control', 'value' => set_value('product', $produit->nom))); ?>
                  <?= form_error('product', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-6 <?php if(form_error('procuct_id')) { echo 'has-error'; } ?>">
                <?= form_label('Reference', 'procuct_id', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'product_id',  'readonly' => true,'placeholder' => 'Reference', 'id' => 'procuct_id', 'class' => 'form-control', 'value' => set_value('procuct_id', $produit->id))); ?>
                  <?= form_error('reference', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>
              </div>

              <div class="row">
			  <div class="form-group col-md-6 <?php if(form_error('desc')) { echo 'has-error'; } ?>">
                <?= form_label('Description Courte *', 'desc', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'desc', 'placeholder' => 'Description Courte', 'id' => 'desc', 'class' => 'form-control', 'value' => set_value('desc', $produit->description_courte))); ?>
                  <?= form_error('desc', '<small><span class="help-block text-danger">', '</span></small>'); ?>
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
								<img width="50" height="50" src="<?= site_url('assets/images/produit/accueil/'.$produit->image); ?>">
              				</div>
				</div>
</div>

<div class="form-group col-md-6 <?php if(form_error('desl')) { echo 'has-error'; } ?>">
                <?= form_label('Description Longue *', 'desl', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_textarea(array('name' => 'desl', 'placeholder' => 'Description Longue', 'id' => 'desl', 'class' => 'form-control', 'value' => set_value('desl', $produit->description_longue))); ?>
                  <?= form_error('desl', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>
			</div>
</div>

			<div class="card-footer">
                <?= form_input(array('type' => 'hidden', 'name' => 'id', 'value' => $produit->id)); ?>
				<?= form_submit('submitBtn', 'Enregistrer', array('class' => 'btn btn-sm btn-primary pull-right')); ?>
			</div>
			

			<?= form_close(); ?>

		</div>
	</div>
</div>
