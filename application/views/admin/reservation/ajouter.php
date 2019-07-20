<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Ajouter une reservation</strong>
                les champs marqués d'une * sont obligatoires
            </div>

            <div class="card-body">
            	<?= form_open_multipart( 'admin/reservation/ajouter'); ?>

    				<?= validation_errors('<div class="col-md-12"><div class="alert alert-danger">', '</div></div>'); ?>

    				<h3>Informations reservation</h3>
    				<hr>


    				<div class="row">
    					<div class="form-group col-md-7 <?php if(form_error('client')) { echo 'has-error'; } ?>">
    						<?= form_label('Client *', 'client', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?php
                                if($data)
                                {
                                  echo form_input(array('name' => 'client', 'placeholder' => 'Client', 'id' => 'client', 'class' => 'form-control', 'value' => set_value('client', $data->prenom.' '.$data->nom)));
                                  echo form_input(array('type' => 'hidden', 'name' => 'id_client', 'id' => 'id_client', 'value' => set_value('id_client', $data->id)));
                                }
                                else
                                {
                                  echo form_input(array('name' => 'client', 'placeholder' => 'Client', 'id' => 'client', 'class' => 'form-control', 'value' => set_value('client')));
                                  echo form_input(array('type' => 'hidden', 'name' => 'id_client', 'id' => 'id_client', 'value' => set_value('id_client')));                                }
                                ?>
                                <?= form_error('client', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-5 <?php if(form_error('reference')) { echo 'has-error'; } ?>">
    						<?= form_label('Client Référence *', 'reference', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('name' => 'reference', 'placeholder' => 'Référence', 'id' => 'reference', 'class' => 'form-control', 'value' => set_value('reference'))); ?>
                                <?= form_error('reference', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- <br>
                    <h3>Informations produits <button type="button" id="addProduct" class="btn btn-primary pull-right">Ajouter un produit</button></h3>
    				<hr> -->

                    <div class="row">
        					<div class="form-group col-md-5 <?php if(form_error('Date')) { echo 'has-error'; } ?>">
        						<?= form_label('Date *', 'date', array('class' => 'form-control-label')); ?>
                                <div class="">
                                	<?= form_input(array('name' => 'Date','type'=>'date', 'placeholder' => 'Date', 'class' => 'form-control productName', 'value' => set_value('date'))); ?>
                                	<!-- <?= form_input(array('type' => 'hidden', 'name' => 'reservation_id[]', 'class' => 'reservation_id', 'value' => set_value('reservation_id[0]'))); ?> -->
                                    <?= form_error('date', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                                </div>
                            </div>

                            <div class="prix_ht form-group col-md-5 <?php if(form_error('Time')) { echo 'has-error'; } ?>">
        						<?= form_label('Heure *', 'Time', array('class' => 'form-control-label')); ?>
                                <div class="input-prepend input-group">
                                    <?= form_input(array('name' => 'Time','type'=>'time' ,'placeholder' => 'Heure', 'class' => 'form-control productName', 'value' => set_value('time'))); ?>
                                    <?= form_error('Time', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                                </div>
                            </div>
                               

                            <div class="quantite_produit form-group col-md-2 <?php if(form_error('quantite')) { echo 'has-error'; } ?>">
        						<?= form_label('Quantité *', 'quantity', array('class' => 'form-control-label')); ?>
                                <div class="">
                                	<?= form_input(array('name' => 'quantity', 'placeholder' => 'Quantité','type' => 'number', 'class' => 'form-control quantite', 'value' => set_value('quantity[]'))); ?>
                                    <?= form_error('quantity', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                                </div>
                            </div>
                                </div>
                            <div class="row">
                            <div class="prix_ht form-group col-md-6 <?php if(form_error('tbnumber')) { echo 'has-error'; } ?>">
        						<?= form_label('Numéro de Table *', 'tbnumber', array('class' => 'form-control-label')); ?>
                                <div class="input-prepend input-group">
                                    <?= form_input(array('name' => 'tbnumber', 'placeholder' => 'Numéro de Table', 'class' => 'form-control productName', 'value' => set_value('tbnumber[0]'))); ?>
                                    <?= form_error('tbnumber', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                                </div>
                            </div>
                             <div class="prix_ht form-group col-md-4 <?php if(form_error('payment')) { echo 'has-error'; } ?>">
        						<?= form_label('Paiement', 'Payment', array('class' => 'form-control-label')); ?>
                                <div class="input-prepend input-group">
                                    <?= form_input(array('name' => 'payment','placeholder' => 'Paiement', 'class' => 'form-control productName', 'value' => set_value('payment[0]'))); ?>
                                	<!-- <?= form_input(array('name' => 'Payment', 'class' => 'form-control productName', 'value' => set_value('Payment[0]'))); ?> -->
                                	<span class="input-group-addon">€</span>
                                    <?= form_error('Payment', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                                </div>
                            </div>
                                </div>
                            <div class="row">
                    	<div class="form-group col-md-4">
                    		<?= form_label('Statut *', 'statut', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_dropdown('statut', array('0' => 'Annulée', '1' => 'Valide'), set_value('statut'), array('id' =>'statut', 'class' =>'form-control')); ?>
                                <?= form_error('statut', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                    	</div>

                    	<div class="form-group col-md-4">
                    		<?= form_label('Statut Client *', 'valide', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_dropdown('valide', array('0' => 'Out', '1' => 'In'), set_value('valide'), array('id' =>'valide', 'class' =>'form-control')); ?>
                                <?= form_error('valide', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                    		<?= form_label('Statut Collaboration *', 'colab', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_dropdown('colab', array('0' => 'NON', '1' => 'OUI'), set_value('colab'), array('id' =>'colab', 'class' =>'form-control')); ?>
                                <?= form_error('colab', '<small><span class="help-block text-danger">', '</span></small>'); ?>
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
