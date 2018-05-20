<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Modifier une utilisation</strong>
                les champs marqués d'une * sont obligatoires
            </div>

            <div class="card-body">
            <?= form_open_multipart( 'admin/utilisation/modifier/'.$utilisation->id); ?>

    				<?= validation_errors('<div class="col-md-12"><div class="alert alert-danger">', '</div></div>'); ?>

    				<?php if( null !== ( $this->session->flashdata('error') ) ) : ?>
            	<div class="col-md-12">
            		<div class="alert alert-danger">
            			<?= $this->session->flashdata('error'); ?>
            		</div>
            	</div>
            <?php endif; ?>

    				<h3>Informations utilisation</h3>
    				<hr>


    				<div class="row">

              <div class="form-group col-md-6">
    						<?= form_label('Nom *', 'utilisation', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_input(array('name' => 'utilisation', 'placeholder' => 'utilisation', 'id' => 'utilisation', 'class' => (empty(form_error('utilisation')) ? "" : "is-invalid") . " form-control", 'value' => set_value('utilisation', $utilisation->utilisation))); ?>
                  <?= form_error('utilisation', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-6">
    						<?= form_label('Alt *', 'alt', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_input(array('name' => 'alt', 'placeholder' => 'Alt', 'id' => 'alt', 'class' => (empty(form_error('alt')) ? "" : "is-invalid") . " form-control", 'value' => set_value('alt', $utilisation->alt))); ?>
                  <?= form_error('alt', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="form-group col-md-12">
    						<?= form_label('Description *', 'description', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_textarea(array('name' => 'description', 'id' => 'description', 'class' => (empty(form_error('description')) ? "" : "has-error") . " form-control", 'value' => set_value('description', $utilisation->description))); ?>
                  <?= form_error('description', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="form-group col-md-8">
				        <?= form_label('Image', 'image', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_upload(array('name' => 'image', 'id' => 'image')); ?>
                  <?= form_error('image', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-4">
			          <?= form_label('Image actuelle', 'image_actuelle', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?php if( $utilisation->image != null) : ?>
                    	<img src="<?= site_url('assets/images/utilisation/'.$utilisation->image); ?>" width="150" height="150" />
                	<?php endif; ?>
                	<?= form_input(array('type' => 'hidden', 'name' => 'ancienne_image', 'value' => $utilisation->image)); ?>
                </div>
              </div>

            </div>
			</div>

			<div class="card-footer">
                <?= form_input(array('type' => 'hidden', 'name' => 'id', 'value' => $utilisation->id)); ?>
				<?= form_submit('submitBtn', 'Enregistrer', array('class' => 'btn btn-sm btn-primary pull-right')); ?>
			</div>

			<?= form_close(); ?>
		</div>
	</div>
</div>
