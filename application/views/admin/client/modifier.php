<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Modifier un client</strong>
                les champs marqués d'une * sont obligatoires
            </div>

            <div class="card-body">
            	<?= form_open( 'admin/client/modifier/'.$client->client ); ?>

    				<?= validation_errors('<div class="col-md-12"><div class="alert alert-danger">', '</div></div>'); ?>


            <h3>Informations de connexion</h3>
            <hr>

            <div class="row">

              <div class="form-group col-md-4 <?php if(form_error('email')) { echo 'has-error'; } ?>">
                <?= form_label('Email*', 'email', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('name' => 'email', 'placeholder' => 'Adresse e-mail', 'id' => 'email', 'class' => 'form-control', 'value' => set_value('email',$client->email))); ?>
                  <?= form_error('email', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-4 <?php if(form_error('mot_de_passe')) { echo 'has-error'; } ?>">
                <?= form_label('Mot de passe *', 'mdp', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('type' => 'password', 'name' => 'mot_de_passe', 'placeholder' => 'Mot de passe', 'id' => 'mdp', 'class' => 'form-control')); ?>
                  <?= form_error('mot_de_passe', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-4 <?php if(form_error('mot_de_passe_check')) { echo 'has-error'; } ?>">
                <?= form_label('Vérification mot de passe *', 'mdpcheck', array('class' => 'form-control-label')); ?>
                <div class="">
                  <?= form_input(array('type' => 'password', 'name' => 'mot_de_passe_check', 'placeholder' => 'Vérification mot de passe', 'id' => 'mdpcheck', 'class' => 'form-control')); ?>
                  <?= form_error('mot_de_passe_check', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

            </div>
        		<br>

            <h3>Informations client</h3>
            <hr>


            <div class="row">

              <div class="form-group col-md-2 <?php if(form_error('civilite')) { echo 'has-error'; } ?>">
             		<?= form_label('Civilité *', 'civilite', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_dropdown('civilite', array('Mr' => 'Mr', 'Mme' => 'Mme', 'Mlle' => 'Mlle'), $client->civilite, array('id' =>'civilite', 'class' =>'form-control')); ?>
                	<?= form_error('civilite', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

    					<div class="form-group col-md-5 <?php if(form_error('nom')) { echo 'has-error'; } ?>">
    						<?= form_label('Nom *', 'nom', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_input(array('name' => 'nom', 'placeholder' => 'Nom', 'id' => 'nom', 'class' => 'form-control', 'value' => set_value('nom', $client->nom))); ?>
                  <?= form_error('nom', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-5 <?php if(form_error('prenom')) { echo 'has-error'; } ?>">
              	<?= form_label('Prénom *', 'prenom', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_input(array('name' => 'prenom', 'placeholder' => 'Prénom', 'id' => 'prenom', 'class' => 'form-control', 'value' => set_value('prenom', $client->prenom))); ?>
                  <?= form_error('prenom', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

            </div>


            <div class="row">

              <div class="form-group col-md-6 <?php if(form_error('telephone')) { echo 'has-error'; } ?>">
                <?= form_label('Téléphone', 'telephone', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_input(array('name' => 'telephone', 'placeholder' => 'Téléphone', 'id' => 'telephone', 'class' => 'form-control', 'value' => set_value('telephone', $client->telephone))); ?>
                  <?= form_error('telephone', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

    					<div class="form-group col-md-6 <?php if(form_error('mobile')) { echo 'has-error'; } ?>">
    						<?= form_label('Mobile', 'mobile', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_input(array('name' => 'mobile', 'placeholder' => 'Mobile', 'id' => 'mobile', 'class' => 'form-control', 'value' => set_value('mobile', $client->mobile))); ?>
                  <?= form_error('mobile', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

            </div>


            <div class="row">

              <div class="form-group col-md-8 <?php if(form_error('adresse')) { echo 'has-error'; } ?>">
              	<?= form_label('Adresse *', 'adresse', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_input(array('name' => 'adresse', 'placeholder' => 'Adresse', 'id' => 'adresse', 'class' => 'form-control', 'value' => set_value('adresse', $client->adresse))); ?>
                  <?= form_error('adresse', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-4 <?php if(form_error('code_postal')) { echo 'has-error'; } ?>">
    	          <?= form_label('Code postal *', 'postal', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_input(array('name' => 'code_postal', 'placeholder' => 'Code postal', 'id' => 'postal', 'class' => 'form-control', 'value' => set_value('code_postal', $client->code_postal))); ?>
                  <?= form_error('code_postal', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

            </div>


            <div class="row">

              <div class="form-group col-md-6 <?php if(form_error('ville')) { echo 'has-error'; } ?>">
              	<?= form_label('Ville *', 'ville', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_input(array('name' => 'ville', 'placeholder' => 'Ville', 'id' => 'ville', 'class' => 'form-control', 'value' => set_value('ville', $client->ville))); ?>
                  <?= form_error('ville', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-6 <?php if(form_error('pays')) { echo 'has-error'; } ?>">
           		  <?= form_label('Pays *', 'pays', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_dropdown('pays', $pays, $client->pays, array('id' =>'pays', 'class' =>'form-control')); ?>
                	<?= form_error('pays', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

            </div>
            <br>

            <h3>Autre Adresse de livraison</h3>
            <hr>


            <div class="row">
            	<div class="form-group col-md-8 <?php if(form_error('adresse_autre')) { echo 'has-error'; } ?>">
              	<?= form_label('Adresse', 'adresse_autre', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_input(array('name' => 'adresse_autre', 'placeholder' => 'Adresse', 'id' => 'adresse_autre', 'class' => 'form-control', 'value' => !is_null($this->input->post('adresse_autre')) ? set_value('adresse_autre') : $client->adresse_autre)); ?>
                  <?= form_error('adresse_autre', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-4 <?php if(form_error('code_postal_autre')) { echo 'has-error'; } ?>">
    					  <?= form_label('Code postal', 'code_postal_autre', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_input(array('name' => 'code_postal_autre', 'placeholder' => 'Code postal', 'id' => 'code_postal_autre', 'class' => 'form-control', 'value' => !is_null($this->input->post('code_postal_autre')) ? set_value('code_postal_autre') : $client->code_postal_autre)); ?>
                  <?= form_error('code_postal_autre', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="form-group col-md-6 <?php if(form_error('ville_autre')) { echo 'has-error'; } ?>">
                <?= form_label('Ville', 'ville_autre', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_input(array('name' => 'ville_autre', 'placeholder' => 'Ville', 'id' => 'ville_autre', 'class' => 'form-control', 'value' => !is_null($this->input->post('ville_autre')) ? set_value('ville_autre') : $client->ville_autre)); ?>
                  <?= form_error('ville_autre', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                </div>
              </div>

              <div class="form-group col-md-6 <?php if(form_error('pays_autre')) { echo 'has-error'; } ?>">
           		  <?= form_label('Pays', 'pays_autre', array('class' => 'form-control-label')); ?>
                <div class="">
                	<?= form_dropdown( array('name' => 'pays_autre', 'options' => $pays, 'selected' => !is_null($this->input->post('pays_autre')) ? $this->input->post('pays_autre') : array_search($client->pays_autre, $pays), 'id' =>'pays_autre', 'class' =>'form-control') ); ?>
                	<?= form_error('pays_autre', '<small><span class="help-block text-danger">', '</span></small>'); ?>
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
