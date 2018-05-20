<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Ajouter une Stock</strong>
                les champs marqués d'une * sont obligatoires
            </div>

            <div class="card-body">
            	<?= form_open_multipart( 'admin/stock/ajouter' ); ?>

    				<?= validation_errors('<div class="col-md-12"><div class="alert alert-danger">', '</div></div>'); ?>

    				<h3>Informations stock</h3>
    				<hr>


    				<div class="row">
                        <div class="form-group col-md-4">
                            <?= form_label('Code de Produit *', 'product_code', array('class' => 'form-control-label')); ?>
                    <div class="input-prepend input-group">
                        <?= form_input(array('name' => 'product_code', 'placeholder' => 'Code de Produit', 'id' => 'product_code', 'class' => (empty(form_error('product_code')) ? "" : "is-invalid") . " form-control", 'value' => set_value('product_code'))); ?>
                      
                    </div>
                    <?= form_error('product_code', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                  </div>
                    

    					<div class="form-group col-md-4">
                                <?= form_label('Nom *', 'nom', array('class' => 'form-control-label')); ?>
                        <?= form_input(array('name' => 'nom', 'placeholder' => 'Nom', 'id' => 'nom', 'class' => (empty(form_error('nom')) ? "" : "is-invalid") . " form-control", 'value' => set_value('nom'))); ?>
                      <?= form_error('nom', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                    </div>
                </div>


                       
                    <br>
                    <div class="row">
                      


                       <div class="form-group col-md-4">
                            <?= form_label('Quantity *', 'quantity', array('class' => 'form-control-label')); ?>
                    <div class="input-prepend input-group">
                        <?= form_input(array('name' => 'quantity', 'placeholder' => 'Quantity', 'id' => 'quantity', 'class' => (empty(form_error('quantity')) ? "" : "is-invalid") . " form-control", 'value' => set_value('quantity'))); ?>
                      
                    </div>
                    <?= form_error('quantity', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                                <?= form_label('TransDate *', 'trans_date', array('class' => 'form-control-label')); ?>
                        <?= form_input(array('name' => 'trans_date', 'placeholder' => 'TransDate', 'id' => 'nom', 'class' => (empty(form_error('trans_date')) ? "" : "is-invalid") . " form-control", 'value' => set_value('trans_date'))); ?>
                      <?= form_error('trans_date', '<small><span class="help-block text-danger">', '</span></small>'); ?>
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
