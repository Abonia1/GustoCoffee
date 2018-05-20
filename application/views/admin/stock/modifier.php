<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Modifier une stock</strong>
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

    				<h3>Informations stock</h3>
    				<hr>


    				<div class="row">
               <div class="form-group col-md-6 <?php if(form_error('product_code')) { echo 'has-error'; } ?>">
                <?= form_label('Code de Produit *', 'product_code', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'product_code', 'placeholder' => 'Code de Produit', 'id' => 'product_code', 'class' => 'form-control', 'value' => set_value('product_code', $stock->product_code))); ?>
                  <?= form_error('product_name', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>
              
                <div class="form-group col-md-6 <?php if(form_error('product_name')) { echo 'has-error'; } ?>">
                <?= form_label('Nom *', 'product_name', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'product_name', 'placeholder' => 'Nom', 'id' => 'product_name', 'class' => 'form-control', 'value' => set_value('product_name', $stock->product_name))); ?>
                  <?= form_error('product_name', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>
              
              
            </div>

            <div class="row">

               <div class="form-group col-md-6 <?php if(form_error('quantity')) { echo 'has-error'; } ?>">
                <?= form_label('Quantity *', 'quantity', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'quantity', 'placeholder' => 'Quantity', 'id' => 'quantity', 'class' => 'form-control', 'value' => set_value('quantity', $stock->quantity))); ?>
                  <?= form_error('quantity', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>
              <div class="form-group col-md-6 <?php if(form_error('trans_date')) { echo 'has-error'; } ?>">
                <?= form_label('TransDate *', 'trans_date', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'trans_date', 'placeholder' => 'TransDate', 'id' => 'trans_date', 'class' => 'form-control', 'value' => set_value('trans_date', $stock->trans_date))); ?>
                  <?= form_error('trans_date', '<small><span class="help-block text-danger">', '</span></small>'); ?>
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
