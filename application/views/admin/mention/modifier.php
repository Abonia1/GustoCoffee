<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Modifier les Détail de Gustocoffee</strong>
                les champs marqués d'une * sont obligatoires
            </div>

            <div class="card-body">
            <?= form_open_multipart( 'admin/mention/modifier/'.$mention->id); ?>

    				<?= validation_errors('<div class="col-md-12"><div class="alert alert-danger">', '</div></div>'); ?>

    				<?php if( null !== ( $this->session->flashdata('error') ) ) : ?>
            	<div class="col-md-12">
            		<div class="alert alert-danger">
            			<?= $this->session->flashdata('error'); ?>
            		</div>
            	</div>
            <?php endif; ?>

    				<h3>Informations Mentions Légales</h3>
    				<hr>


    				<div class="row">

             <div class="form-group col-md-6 <?php if(form_error('sociéte')) { echo 'has-error'; } ?>">
                <?= form_label('Sociéte*', 'sociéte', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'sociéte', 'placeholder' => 'Sociéte', 'id' => 'sociéte', 'class' => 'form-control', 'value' => set_value('sociéte', $mention->sociéte))); ?>
                  <?= form_error('sociéte', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>


              <div class="form-group col-md-6 <?php if(form_error('responsable')) { echo 'has-error'; } ?>">
                <?= form_label('Responsable *', 'responsable', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'responsable', 'placeholder' => 'Responsable', 'id' => 'responsable', 'class' => 'form-control', 'value' => set_value('responsable', $mention->responsable))); ?>
                  <?= form_error('responsable', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

            </div>

            

            <div class="row">

              <div class="form-group col-md-6 <?php if(form_error('rcs')) { echo 'has-error'; } ?>">
                <?= form_label('RCS *', 'rcs', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'rcs', 'placeholder' => 'RCS', 'id' => 'rcs', 'class' => 'form-control', 'value' => set_value('rcs', $mention->rcs))); ?>
                  <?= form_error('rcs', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-6 <?php if(form_error('telephone')) { echo 'has-error'; } ?>">
                <?= form_label('Télephone *', 'telephone', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'telephone', 'placeholder' => 'Télephone', 'id' => 'telephone', 'class' => 'form-control', 'value' => set_value('telephone', $mention->telephone))); ?>
                  <?= form_error('telephone', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>
              </div>
             
              <div class="row">

              <div class="form-group col-md-6 <?php if(form_error('adresse')) { echo 'has-error'; } ?>">
                <?= form_label('Adresse *', 'adresse', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'adresse', 'placeholder' => 'Adresse', 'id' => 'adresse', 'class' => 'form-control', 'value' => set_value('adresse', $mention->adresse))); ?>
                  <?= form_error('adresse', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-6 <?php if(form_error('code_postal')) { echo 'has-error'; } ?>">
                <?= form_label('Code_Postal *', 'code_postal', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'code_postal', 'placeholder' => 'Code_Postal', 'id' => 'code_postal', 'class' => 'form-control', 'value' => set_value('code_postal', $mention->code_postal))); ?>
                  <?= form_error('code_postal', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>
              </div>

              <div class="row">

              <div class="form-group col-md-6 <?php if(form_error('ville')) { echo 'has-error'; } ?>">
                <?= form_label('Ville *', 'ville', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'ville', 'placeholder' => 'Ville', 'id' => 'ville', 'class' => 'form-control', 'value' => set_value('ville', $mention->ville))); ?>
                  <?= form_error('ville', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-6 <?php if(form_error('pays')) { echo 'has-error'; } ?>">
                <?= form_label('Pays *', 'pays', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'pays', 'placeholder' => 'Pays', 'id' => 'pays', 'class' => 'form-control', 'value' => set_value('pays', $mention->pays))); ?>
                  <?= form_error('pays', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>
              </div>

              


            </div>
			

			<div class="card-footer">
             
              <?= form_input(array('type' => 'hidden', 'name' => 'id', 'value' => $mention->id)); ?>
               <?= form_submit('submitBtn', 'Enregistrer', array('class' => 'btn btn-sm btn-primary pull-right')); ?>
				

			</div>

			<?= form_close(); ?>
		</div>
	</div>
</div>
