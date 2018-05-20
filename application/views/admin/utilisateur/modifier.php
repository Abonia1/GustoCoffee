<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Modifier un utilisateur</strong>
                les champs marqués d'une * sont obligatoires
            </div>

            <div class="card-body">
            	<?= form_open( 'admin/utilisateur/modifier/'.$utilisateur->id ); ?>

    				<?= validation_errors('<div class="col-md-12"><div class="alert alert-danger">', '</div></div>'); ?>
    				
    				<h3>Informations utilisateur</h3>
    				<hr>
    				<div class="row">
    					<div class="form-group col-md-6 <?php if(form_error('prenom')) { echo 'has-error'; } ?>">
    						<?= form_label('Prénom *', 'prenom', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('name' => 'prenom', 'placeholder' => 'Prénom', 'id' => 'prenom', 'class' => 'form-control', 'value' => set_value('prenom', $utilisateur->prenom))); ?>
                                <?= form_error('prenom', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-6 <?php if(form_error('nom')) { echo 'has-error'; } ?>">
                        	<?= form_label('Nom *', 'nom', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('name' => 'nom', 'placeholder' => 'Nom', 'id' => 'nom', 'class' => 'form-control', 'value' => set_value('nom', $utilisateur->nom))); ?>
                                <?= form_error('nom', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    	<div class="form-group col-md-8 <?php if(form_error('email')) { echo 'has-error'; } ?>">
                        	<?= form_label('Adresse e-mail', 'email', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('name' => 'email', 'placeholder' => 'Adresse e-mail', 'id' => 'email', 'class' => 'form-control', 'value' => set_value('email', $utilisateur->email))); ?>
                                <?= form_error('email', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div>
                        
                    	<div class="form-group col-md-4 <?php if(form_error('role')) { echo 'has-error'; } ?>">
    						<?= form_label('Rôle *', 'role', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_dropdown('role', $roles, $utilisateur->role, array('id' =>'role', 'class' =>'form-control')); ?>
                                <?= form_error('role', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div>
                    </div>
                    
                    <h3>Informations de connexion</h3>
    				<hr>
    				
    				<div class="row">
    					<div class="form-group col-md-6 <?php if(form_error('identifiant')) { echo 'has-error'; } ?>">
    						<?= form_label('Identifiant *', 'identifiant', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('name' => 'identifiant', 'placeholder' => 'Identifiant', 'id' => 'identifiant', 'class' => 'form-control', 'value' => set_value('identifiant', $utilisateur->identifiant))); ?>
                                <?= form_error('identifiant', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-3 <?php if(form_error('mot_de_passe')) { echo 'has-error'; } ?>">
                        	<?= form_label('Mot de passe *', 'mot_de_passe', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('type' => 'password', 'name' => 'mot_de_passe', 'placeholder' => 'Mot de passe', 'id' => 'mot_de_passe', 'class' => 'form-control')); ?>
                                <?= form_error('mot_de_passe', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-3 <?php if(form_error('mot_de_passe_check')) { echo 'has-error'; } ?>">
                        	<?= form_label('Vérification mot de passe *', 'mot_de_passe_check', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('type' => 'password', 'name' => 'mot_de_passe_check', 'placeholder' => 'Mot de passe', 'id' => 'mot_de_passe_check', 'class' => 'form-control')); ?>
                                <?= form_error('mot_de_passe_check', '<small><span class="help-block text-danger">', '</span></small>'); ?>
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