<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Ajouter une priorité</strong>
                les champs marqués d'une * sont obligatoires
            </div>

            <div class="card-body">
            	<?= form_open_multipart( 'admin/priorite/ajouter' ); ?>

    				<?= validation_errors('<div class="col-md-12"><div class="alert alert-danger">', '</div></div>'); ?>

    				<?php if( null !== ( $this->session->flashdata('error') ) ) : ?>
                    	<div class="col-md-12">
                    		<div class="alert alert-danger">
                    			<?= $this->session->flashdata('error'); ?>
                    		</div>
                    	</div>
                    <?php endif; ?>

    				<h3>Informations priorité</h3>
    				<hr>


    				<div class="row">

              <div class="form-group col-md-6">
    						<?= form_label('Nom *', 'priorite', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_input(array('name' => 'priorite', 'placeholder' => 'priorité', 'id' => 'priorite', 'class' => (empty(form_error('priorite')) ? "" : "is-invalid") . " form-control", 'value' => set_value('priorite'))); ?>
                  <?= form_error('priorite', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-6">
    						<?= form_label('Alt *', 'alt', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_input(array('name' => 'alt', 'placeholder' => 'Balise alt', 'id' => 'alt', 'class' => (empty(form_error('alt')) ? "" : "is-invalid") . " form-control", 'value' => set_value('alt'))); ?>
                  <?= form_error('alt', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="form-group col-md-12">
    						<?= form_label('Description *', 'description', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_textarea(array('name' => 'description', 'id' => 'description', 'class' => (empty(form_error('description')) ? "" : "has-error") . " form-control", 'value' => set_value('description'))); ?>
                  <?= form_error('description', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

            </div>

            <div class="row">
            	<div class="form-group col-md-12">
    			      <?= form_label('Image', 'image', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_upload(array('name' => 'image', 'id' => 'image')); ?>
                  <?= form_error('image', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>
            </div>
			</div>

			<div class="card-footer">
				<?= form_submit('submitBtn', 'Enregistrer', array('class' => 'btn btn-sm btn-primary pull-right')); ?>
			</div>

			<?= form_close(); ?>
		</div>
	</div>
</div>
