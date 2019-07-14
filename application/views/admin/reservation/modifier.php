<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Modifier une reservation</strong>
                les champs marqués d'une * sont obligatoires
            </div>

            <div class="card-body">
            	<?= form_open_multipart( 'admin/reservation/modifier/'.$reservation->reservation_id ); ?>

    				<?= validation_errors('<div class="col-md-12"><div class="alert alert-danger">', '</div></div>'); ?>

    				<h3>Informations reservation</h3>
    				<hr>


    				<div class="row">
    					<div class="form-group col-md-7">
    						<?= form_label('Client *', 'client', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('name' => 'client', 'placeholder' => 'Client', 'id' => 'client', 'class' => 'form-control', 'value' => set_value('client', $reservation->prenom.' '.$reservation->nom))); ?>
                                <?= form_input(array('type' => 'hidden', 'name' => 'id_client', 'id' => 'id_client', 'value' => set_value('id_client', $reservation->c_id))); ?>
                                <?= form_error('client', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div>
<!-- 
                        <div class="form-group col-md-5">
    						<?= form_label('Reservation Id *', 'Reference Id', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('name' => 'Reference Id', 'placeholder' => 'Reservation Id', 'id' => 'referenceid', 'class' => 'form-control', 'value' => set_value('reference id', $reservation->c_id))); ?>
                                <?= form_error('reference id', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div> -->
					</div>
					<div class="row">
    					<div class="form-group col-md-7">
    						<?= form_label('Date *', 'date', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('name' => 'Date', 'placeholder' => 'Date', 'id' => 'date', 'class' => 'form-control', 'value' => set_value('date', $reservation->date))); ?>
                                <?= form_error('date', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-5">
    						<?= form_label('Heure *', 'Time', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('name' => 'Time', 'placeholder' => 'Heure', 'id' => 'time', 'class' => 'form-control', 'value' => set_value('time', $reservation->time))); ?>
                                <?= form_error('time', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
    						<?= form_label('Quantité *', 'Quantity', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('name' => 'quantity', 'placeholder' => 'Quantité', 'id' => 'reference', 'class' => 'form-control', 'value' => set_value('quantity', $reservation->quantity))); ?>
                                <?= form_error('quantity', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
						</div>
						<div class="form-group col-md-4">
    						<?= form_label('Numéro de Table *', 'tbnumber', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('name' => 'tbnumber', 'placeholder' => 'Numéro de Table', 'id' => 'tbnumber', 'class' => 'form-control', 'value' => set_value('Numéro de Table', $reservation->tbnumber))); ?>
                                <?= form_error('tbnumber', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
						</div>
						<div class="form-group col-md-4">
    						<?= form_label('Paiment *', 'payment', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('name' => 'payment', 'placeholder' => 'Paiement', 'id' => 'payment', 'class' => 'form-control', 'value' => set_value('Paiment', $reservation->payment))); ?>
                                <?= form_error('payment', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                    	<div class="form-group col-md-6">
                    		<?= form_label('Statut *', 'statut', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_dropdown('statut', array('0' => 'Annulée', '1' => 'Valide'), set_value('statut', $reservation->status), array('id' =>'statut', 'class' =>'form-control')); ?>
                                <?= form_error('statut', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                    	</div>

                    	<div class="form-group col-md-6">
                    		<?= form_label('Statut Client *', 'valide', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_dropdown('valide', array('0' => 'Out', '1' => 'In'), set_value('valide', $reservation->c_status), array('id' =>'valide', 'class' =>'form-control')); ?>
                                <?= form_error('valide', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                    	</div>
                    </div>

                    <br>

			</div>

			<div class="card-footer">
				<?= form_submit('submitBtn', 'Enregistrer', array('class' => 'btn btn-sm btn-primary pull-right')); ?>
			</div>

			<?= form_close(); ?>
		</div>
	</div>
</div>
