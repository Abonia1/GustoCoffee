<?= form_open_multipart( 'admin/produit/modifier/'.$produit->id ); ?>
	<div class="row">
		<?= validation_errors('<div class="col-md-12"><div class="alert alert-danger">', '</div></div>'); ?>

    	<?php if( null !== ( $this->session->flashdata('error_img') ) ) : ?>
    		<div class="col-md-12">
    			<div class="alert alert-danger">
    				<?= $this->session->flashdata('error_img'); ?>
    			</div>
    		</div>
    	<?php endif; ?>

    	<?php if( null !== ( $this->session->flashdata('error') ) ) : ?>
    		<div class="col-md-12">
    			<div class="alert alert-danger">
    				<?= $this->session->flashdata('error'); ?>
    			</div>
    		</div>
    	<?php endif; ?>

    	<section class="col-md-8">
        	<div class="card">
            	<div class="card-header">
                	<strong>Modifier un produit</strong>
            	</div>

            	<div class="card-body">
            		<div class="col-md-12">
    					<h3>Informations produit</h3>
    					<hr>


    					<div class="row">
        					<div class="form-group col-md-8">
        						<?= form_label('Nom *', 'nom', array('class' => 'form-control-label')); ?>

                            	<?= form_input(array('name' => 'nom', 'placeholder' => 'Nom', 'id' => 'nom', 'class' => (empty(form_error('nom')) ? "" : "is-invalid") . " form-control", 'value' => set_value('nom', $produit->nom))); ?>
                                <?= form_error('nom', '<small><span class="help-block text-danger">', '</span></small>'); ?>

                            </div>

                            <div class="form-group col-md-4">
        						<?= form_label('Référence *', 'reference', array('class' => 'form-control-label')); ?>
                                <div class="">
                                	<?= form_input(array('name' => 'reference', 'placeholder' => 'Référence', 'id' => 'reference', 'class' => (empty(form_error('reference')) ? "" : "is-invalid") . " form-control", 'value' => set_value('reference', $produit->reference))); ?>
                                    <?= form_error('reference', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        	<div class="form-group col-md-12">
        						<?= form_label('Description courte', 'description_courte', array('class' => 'form-control-label')); ?>
                                <div class="">
                                	<?= form_input(array('name' => 'description_courte', 'placeholder' => 'Description courte', 'id' => 'description_courte', 'class' => (empty(form_error('description_courte')) ? "" : "is-invalid") . " form-control", 'value' => set_value('description_courte', $produit->description_courte))); ?>
                                    <?= form_error('description_courte', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        	<div class="form-group col-md-12">
        						<?= form_label('Description longue', 'description_longue', array('class' => 'form-control-label')); ?>
                                <div class="">
                                	<?= form_textarea(array('name' => 'description_longue', 'id' => 'description_longue', 'class' => (empty(form_error('description_longue')) ? "" : "is-invalid") . " form-control", 'value' => set_value('description_longue', $produit->description_longue))); ?>
                                    <?= form_error('description_longue', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                                </div>
                            </div>
                        </div>
    				</div>


    				<div class="col-md-12">
    					<br>
    					<h3>Informations prix</h3>
    					<hr>

    					<div class="row">
                            <div class="form-group col-md-4">
        						<?= form_label('Prix HT *', 'prix_ht', array('class' => 'form-control-label')); ?>
                                <div class="input-prepend input-group">
                                	<?= form_input(array('name' => 'prix_ht', 'placeholder' => 'Prix HT', 'id' => 'prix_ht', 'class' => (empty(form_error('prix_ht')) ? "" : "is-invalid") . " form-control", 'value' => set_value('prix_ht', $produit->prix_ht))); ?>
                                    <span class="input-group-addon">€</span>
                                </div>
                                <?= form_error('prix_ht', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>

                            <div class="form-group col-md-4">
        						<?= form_label('Remise *', 'remise', array('class' => 'form-control-label')); ?>
                                <div class="input-prepend input-group">
                                	<?= form_input(array('name' => 'remise', 'placeholder' => 'Remise', 'id' => 'remise', 'class' => (empty(form_error('remise')) ? "" : "is-invalid") . " form-control", 'value' => set_value('remise', $produit->remise))); ?>
                                    <span class="input-group-addon">%</span>
                                </div>
                                <?= form_error('remise', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>

                            <div class="form-group col-md-4">
        						<?= form_label('Stock *', 'stock', array('class' => 'form-control-label')); ?>
                                <div class="">
                                	<?= form_input(array('name' => 'stock', 'placeholder' => 'Stock', 'id' => 'stock', 'class' => (empty(form_error('stock')) ? "" : "is-invalid") . " form-control", 'value' => set_value('stock', $produit->stock))); ?>
                                    <?= form_error('stock', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                                </div>
                            </div>
                        </div>
    				</div>


    				<br>
    				<hr>
    				<br>

						<div class="col-md-12">
	  					<br>
	  					<h3>Priorié environnemental</h3>
	  					<hr>

							<div class="col-md-12">
	    					<?= form_label('Priorité 1', 'priorite1', array('class' => 'form-control-label')); ?>
	              <select name="priorite[]" class="form-control col-md-12">
									<option value="0">Aucune</option>
									<?php foreach($priorites AS $key => $priorite) : ?>
										<?php if ($priorite->id == $priorites_produit[0]->priorite): ?>
											<option selected value="<?= $priorite->id; ?>"><?= $priorite->priorite; ?></option>
										<?php else : ?>
											<option value="<?= $priorite->id; ?>"><?= $priorite->priorite; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="col-md-12">
	    					<?= form_label('Priorité 1', 'priorite1', array('class' => 'form-control-label')); ?>
	              <select name="priorite[]" class="form-control col-md-12">
									<option value="0">Aucune</option>
									<?php foreach($priorites AS $key => $priorite) : ?>
										<?php if ($priorite->id == $priorites_produit[1]->priorite): ?>
											<option selected value="<?= $priorite->id; ?>"><?= $priorite->priorite; ?></option>
										<?php else : ?>
											<option value="<?= $priorite->id; ?>"><?= $priorite->priorite; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="col-md-12">
	    					<?= form_label('Priorité 1', 'priorite1', array('class' => 'form-control-label')); ?>
	              <select name="priorite[]" class="form-control col-md-12">
									<option value="0">Aucune</option>
									<?php foreach($priorites AS $key => $priorite) : ?>
										<?php if ($priorite->id == $priorites_produit[2]->priorite): ?>
											<option selected value="<?= $priorite->id; ?>"><?= $priorite->priorite; ?></option>
										<?php else : ?>
											<option value="<?= $priorite->id; ?>"><?= $priorite->priorite; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>

						</div>

						<br>
						<hr>
						<br>

						<div class="col-md-12">
							<br>
							<h3>Utilisation <button type="button" id="addUtilisation_modifier" class="btn btn-outline-primary pull-right">Ajouter une utilisation</button></h3>
							<hr>

    					<div id="p_scents_utilisation">
            		<div class="row">

									<div class="form-group col-md-4 text-center">
            				<?= form_label('Supprimer', 'supprimer', array('class' => 'form-control-label')); ?>
                	</div>

              		<div class="form-group col-md-8 text-center">
										<?= form_label('Utilisation', 'utilisation', array('class' => 'form-control-label')); ?>
									</div>
									<?php foreach($utilisations_produit AS $util_p) : ?>
										<div class="row col-md-12 p_scents_utilisation">
											<div class="form-group col-md-4 text-center">
												<button type="button" class="btn btn-danger deleteUtilisation">
													<i class="fa fa-minus-square"></i>
												</button>
											</div>
											<div class="form-group col-md-8 text-center">
												<select name="utilisation[]" class="form-control utilisation">
		                  		<option value="0">Aucune</option>
		                    	<?php foreach($utilisations AS $utilisation) : ?>
														<?php if ($utilisation->id == $util_p->utilisation): ?>
															<option selected value="<?= $utilisation->id; ?>"><?= $utilisation->utilisation; ?></option>
														<?php else : ?>
															<option value="<?= $utilisation->id; ?>"><?= $utilisation->utilisation; ?></option>
														<?php endif; ?>
													<?php endforeach; ?>
		                    </select>
											</div>
										</div>
									<?php endforeach; ?>
                  </div>

            		</div>

							</div>

						</div>

	  				<br>
	  				<hr>
	  				<br>

						<div class="col-md-12">
							<br>
							<h3>Caractéristique <button type="button" id="addCaracters" class="btn btn-outline-primary pull-right">Modifier une Caractéristique</button></h3>
							<hr>

    					<div id="p_scents_caractere">
            		<div class="row">

									<div class="form-group col-md-4 text-center">
            				<?= form_label('Supprimer', 'supprimer', array('class' => 'form-control-label')); ?>
                	</div>

              		<div class="form-group col-md-8 text-center">
										<?= form_label('Caractéristique', 'caractéristique', array('class' => 'form-control-label')); ?>
									</div>
									<?php foreach($caracteristiques_produit AS $caracte_p) : ?>
										<div class="row col-md-12 p_scents_container">
											<div class="form-group col-md-4 text-center">
												<button type="button" class="btn btn-danger deleteCaractere">
													<i class="fa fa-minus-square"></i>
												</button>
											</div>
											<div class="form-group col-md-8 text-center">
												<input type="text" name="caracteristique[]" class="form-control caracteristique" value="<?= set_value('caracteristique', $caracte_p->caracteristique);?>">
											</div>
										</div>
									<?php endforeach; ?>

								</div>

            	</div>

						</div>

						<br>
	  				<hr>
	  				<br>

					</div>

				</section>

				<section class="col-md-4">

					<div class="col-md-12">

						<div class="card">

							<div class="card-header">
								<strong>Joindre une image de bidon</strong>
							</div>

							<div class="card-body">
								<div class="form-group col-md-12">
									<?= form_label('Bidon * <small>(JPG, PNG, 1024px, 2Mo maximum)</small>', 'bidon', array('class' => 'form-control-label')); ?>
									<div class="">
										<?= form_upload(array('name' => 'bidon', 'id' => 'bidon')); ?>
										<p>
											<small><span class="help-block text-danger">
											<?php if( null !== ( $this->session->flashdata('error_bidon') ) ) : ?>
											<?= $this->session->flashdata('error_bidon'); ?>
											<?php endif; ?>
											</span></small>
										</p>
									</div>
								</div>
								<label>Bidon actuel</label>
								<img width="50" height="50" src="<?= site_url('assets/images/produit/'.$produit->bidon); ?>">
							</div>

						</div>

						<div class="card">

							<div class="card-header">
								<strong>Joindre une video</strong>
							</div>

							<div class="card-body">
								<div class="form-group col-md-12">
									<?= form_label('Video * <small>(URL)</small>', 'image', array('class' => 'form-control-label')); ?>
	              	<div class="">
										<?= form_input(array('name' => 'video', 'placeholder' => 'lien youtube', 'id' => 'video', 'class' => (empty(form_error('video')) ? "" : "is-invalid") . " form-control", 'value' => set_value('video'))); ?>
	                	<?= form_error('video', '<small><span class="help-block text-danger">', '</span></small>'); ?>
	              	</div>
	              </div>
							</div>

						</div>

						<div class="card">

							<div class="card-header">
	            	<strong>Joindre une image de fond (accueil)</strong>
	            </div>

	            <div class="card-body">
	            	<div class="form-group col-md-12">
									<?= form_label('Image (accueil) * <small>(PDF, 2Mo maximum)</small>', 'image', array('class' => 'form-control-label')); ?>
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

						<div class="card">

							<div class="card-header">
	            	<strong>Joindre une image de fond (header)</strong>
	            </div>

	            <div class="card-body">
	            	<div class="form-group col-md-12">
									<?= form_label('Image (produit) * <small>(JPG, PNG, 1024px, 2Mo maximum)</small>', 'Image', array('class' => 'form-control-label')); ?>
	              	<div class="">
	                  <?= form_upload(array('name' => 'image_header', 'id' => 'image_header')); ?>
	                  <p>
											<small><span class="help-block text-danger">
	                    <?php if( null !== ( $this->session->flashdata('error_image_header') ) ) : ?>
	                    <?= $this->session->flashdata('error_image_header'); ?>
	                    <?php endif; ?>
	                    </span></small>
	                  </p>
	              	</div>
	              </div>
								<label>Image actuel</label>
								<img width="50" height="50" src="<?= site_url('assets/images/produit/header/'.$produit->image_header); ?>">
	            </div>

						</div>

						<div class="card">

							<div class="card-header">
	            	<strong>Joindre une fiche technique</strong>
	            </div>

	            <div class="card-body">
	            	<div class="form-group col-md-12">
									<?= form_label('Fiche technique * <small>(PDF, 2Mo maximum)</small>', 'fiche_tech', array('class' => 'form-control-label')); ?>
	              	<div class="">
	                  <?= form_upload(array('name' => 'fiche_tech', 'id' => 'fiche_tech')); ?>
	                  <p>
											<small><span class="help-block text-danger">
	                    <?php if( null !== ( $this->session->flashdata('error_fiche_tech') ) ) : ?>
	                    <?= $this->session->flashdata('error_fiche_tech'); ?>
	                    <?php endif; ?>
	                    </span></small>
	                  </p>
	              	</div>
									<label>Fiche technique actuel</label>
									<a href="<?= site_url("assets/fiche_technique/").$produit->fiche_tech;?>" target="_blank">Ici</a>
	              </div>
	            </div>

						</div>

					</div>

					</div>

				</section>


				<section class="col-md-12">
					<div class="card">
						<div class="card-body">
							<input type="hidden" name="ancienne_image_header" value="<?= $produit->image_header; ?>">
							<input type="hidden" name="ancienne_image" value="<?= $produit->image; ?>">
							<input type="hidden" name="ancien_bidon" value="<?= $produit->bidon; ?>">
							<input type="hidden" name="ancienne_fiche_tech" value="<?= $produit->fiche_tech; ?>">
							<?= form_submit('submitBtn', 'Enregistrer', array('class' => 'btn btn-sm btn-primary pull-right')); ?>
						</div>
					</div>
				</section>

			</div>
		</section>
	</div>
<?= form_close(); ?>
