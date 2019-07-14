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
                    <!-- <h3>Informations reservation <button type="button" id="addProduct" class="btn btn-primary pull-right">Enregistrer</button></h3>
    				<hr> -->


                    <!-- <div id="p_scents">
                    	<?php $i = 1; ?>
                    	<?php foreach($produits AS $key => $val) : ?>
                    		<div class="row p_scents_container productRow">
                            	<div class="form-group col-md-1">
                            		<?= $i != 1 ? '' : form_label('Supprimer', 'supprimer', array('class' => 'form-control-label')); ?>
            						<button type="button" class="btn btn-danger deleteProduct"><i class="fa fa-minus-square"></i></button>
                                </div>

            					<div class="form-group col-md-4">
            						<?= $i != 1 ? '' : form_label('Produit *', 'produit', array('class' => 'form-control-label')); ?>
                                    <div class="">
                                    	<?= form_input(array('name' => 'produit[]', 'placeholder' => 'Produit', 'class' => 'form-control productName', 'value' => set_value('produit[0]', $val->produit_name))); ?>
                                    	<?= form_input(array('type' => 'hidden', 'name' => 'id_produit[]', 'class' => 'id_produit', 'value' => set_value('id_produit[0]', $val->produit_id))); ?>
                                        <?= form_error('produit', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                                    </div>
                                </div>

                                <div class="prix_ht form-group col-md-2">
            						<?= $i != 1 ? '' : form_label('Prix HT', 'prix_ht', array('class' => 'form-control-label')); ?>
                                    <div class="input-prepend input-group">
                                    	<?= form_input(array('name' => 'prix_ht[]', 'readonly' => true, 'class' => 'form-control prix_ht_produit', 'value' => set_value('prix_ht[0]', $val->prix_ht))); ?>
                                    	<span class="input-group-addon">€</span>
                                        <?= form_error('prix_ht', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                                    </div>
                                </div>

                                <div class="quantite_produit form-group col-md-1">
            						<?= $i != 1 ? '' : form_label('Qté', 'quantite', array('class' => 'form-control-label')); ?>
                                    <div class="">
                                    	<?= form_input(array('name' => 'quantite[]', 'type' => 'number', 'class' => 'form-control quantite', 'value' => set_value('quantite[0]', $val->quantite))); ?>
                                        <?= form_error('quantite', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                                    </div>
                                </div>

                                <div class="remise form-group col-md-2">
            						<?= $i != 1 ? '' : form_label('Remise', 'remise', array('class' => 'form-control-label')); ?>
                                    <div class="input-prepend input-group">
                                    	<?= form_input(array('name' => 'remise[]', 'class' => 'form-control remise_produit', 'value' => set_value('remise[0]', $val->remise))); ?>
                                        <span class="input-group-addon">%</span>
                                        <?= form_error('remise', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                                    </div>
                                </div>

                                <div class="total_ht form-group col-md-2">
            						<?= $i != 1 ? '' : form_label('Total HT', 'total_ht', array('class' => 'form-control-label')); ?>
                                    <div class="input-prepend input-group">
                                    	<?= form_input(array('name' => 'total_ht[]', 'readonly' => true, 'class' => 'form-control prix_total_ht', 'value' => set_value('total_ht[0]', $val->total_ht))); ?>
                                        <span class="input-group-addon">€</span>
                                        <?= form_error('total', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                                    </div>
                                </div>
                            </div>

                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </div> 




                    <div class="row">
                    	<table class="table">
                    		<tr>
        						<td class="text-right">Total HT :</td>
        						<td class="text-right"><span id="prix_ht_final"><?= $reservation->prix_ht_final; ?></span> €</td>
        					</tr>

        					<tr>
        						<td class="text-right">Total HT après remise :</td>
        						<td class="text-right"><span id="prix_ht_remise"><?= $reservation->prix_ht_remise; ?></span> €</td>
        					</tr>

        					<tr>
        						<td class="text-right">TVA :</td>
        						<td class="text-right"><span id="tva_final">20</span> %</td>
        					</tr>

        					<tr>
        						<td class="text-right">Total TTC :</td>
        						<td class="text-right"><span id="prix_ttc_final"><?= $reservation->prix_ttc_final; ?></span> €</td>
        					</tr>
                    	</table>
                    </div>-->




			</div>

			<div class="card-footer">
				<!-- <?= form_input(array('type' => 'hidden', 'name' => 'prix_ht_final', 'id' => 'prix_ht_final_cmd', 'value' => set_value('prix_ht_final', $reservation->prix_ht_final))); ?>
				<?= form_input(array('type' => 'hidden', 'name' => 'prix_ht_remise', 'id' => 'prix_ht_remise_cmd', 'value' => set_value('prix_ht_remise, $reservation->prix_ht_remise'))); ?>
				<?= form_input(array('type' => 'hidden', 'name' => 'prix_ttc_final', 'id' => 'prix_ttc_final_cmd', 'value' => set_value('prix_ttc_final', $reservation->prix_ttc_final))); ?> -->

				<?= form_submit('submitBtn', 'Enregistrer', array('class' => 'btn btn-sm btn-primary pull-right')); ?>
			</div>

			<?= form_close(); ?>
		</div>
	</div>
</div>
