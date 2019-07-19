<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Ajouter une Service</strong>
                les champs marqués d'une * sont obligatoires
            </div>

            <div class="card-body">
            	<?= form_open_multipart( 'admin/stock/ajouter' ); ?>

    				<?= validation_errors('<div class="col-md-12"><div class="alert alert-danger">', '</div></div>'); ?>

    				<h3>Informations service</h3>
    				<hr>


    				<div class="row">
                        <div class="form-group col-md-4">
                            <?= form_label('Nom de Produit *', 'product', array('class' => 'form-control-label')); ?>
                    <div class="input-prepend input-group">
                        <?= form_input(array('name' => 'product', 'placeholder' => 'Nom de Produit', 'id' => 'product', 'class' => (empty(form_error('product')) ? "" : "is-invalid") . " form-control", 'value' => set_value('product'))); ?>
                      
                    </div>
                    <?= form_error('product', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                  </div>
                    

    					<!-- <div class="form-group col-md-4">
                                <?= form_label('Reference de Produit *', 'product_id', array('class' => 'form-control-label')); ?>
                        <?= form_input(array('name' => 'product_id', 'placeholder' => 'Reference de Produit', 'id' => 'product_id', 'class' => (empty(form_error('product_id')) ? "" : "is-invalid") . " form-control", 'value' => set_value('product_id'))); ?>
                      <?= form_error('product_id', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                    </div> -->
                </div>


                       
                    <br>
                    <div class="row">
                      


                       <div class="form-group col-md-4">
                            <?= form_label('Type de Service *', 'menu', array('class' => 'form-control-label')); ?>
                    <div class="input-prepend input-group">
                        <!-- <?= form_input(array('name' => 'menu', 'placeholder' => 'Type de Service', 'id' => 'menu', 'class' => (empty(form_error('menu')) ? "" : "is-invalid") . " form-control", 'value' => set_value('menu'))); ?> -->
                            <?= form_dropdown('menu', array('1' => 'Nouriture', '2' => 'Boisson','3' => 'Menus', '4' => 'Bureautique'), set_value('menu'), array('id' =>'menu', 'class' =>'form-control')); ?>

                    </div>
                    <?= form_error('quantity', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                                <?= form_label('Prix *', 'price', array('class' => 'form-control-label')); ?>
                        <?= form_input(array('name' => 'price', 'placeholder' => 'Prix', 'id' => 'price', 'class' => (empty(form_error('trans_date')) ? "" : "is-invalid") . " form-control", 'value' => set_value('price'))); ?>
                      <?= form_error('price', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-6">
                    <div class="card">
                    <div class="card-header">
                    <strong>Joindre une image de Produit</strong>
                    <!-- <img width="50" height="50" src="<?= site_url('assets/images/services/services/'); ?>"> -->
	            </div>
                
	            <div class="card-body">
	            	<div class="form-group col-md-12">
									<?= form_label('Image * <small>(JPG, PNG, 1024px, 2Mo maximum)</small>', 'Image', array('class' => 'form-control-label')); ?>
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
                </div>
</div>
</div>
</div>

                    <br>

            <div class="">
			<?= form_submit('submitBtn', 'Enregistrer', array('class' => 'btn btn-sm btn-primary pull-right')); ?>
			</div>

			<?= form_close(); ?>
		</div>
	</div>
</div>
