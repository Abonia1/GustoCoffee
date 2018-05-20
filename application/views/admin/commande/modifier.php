<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Modifier une commande</strong>
                les champs marqués d'une * sont obligatoires
            </div>

            <div class="card-body">
            	<?= form_open_multipart( 'admin/commande/modifier/'.$commande->id ); ?>

    				<?= validation_errors('<div class="col-md-12"><div class="alert alert-danger">', '</div></div>'); ?>

    				<h3>Informations commande</h3>
    				<hr>


    				<div class="row">
    					<div class="form-group col-md-7">
    						<?= form_label('Client *', 'client', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('name' => 'client', 'placeholder' => 'Client', 'id' => 'client', 'class' => 'form-control', 'value' => set_value('client', $commande->prenom.' '.$commande->nom))); ?>
                                <?= form_input(array('type' => 'hidden', 'name' => 'id_client', 'id' => 'id_client', 'value' => set_value('id_client', $commande->client))); ?>
                                <?= form_error('client', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-5">
    						<?= form_label('Référence *', 'reference', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_input(array('name' => 'reference', 'placeholder' => 'Référence', 'id' => 'reference', 'class' => 'form-control', 'value' => set_value('reference', $commande->reference))); ?>
                                <?= form_error('reference', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                    	<div class="form-group col-md-6">
                    		<?= form_label('Statut *', 'statut', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_dropdown('statut', array('0' => 'Annulée', '1' => 'En cours', '2' => 'En attente', '3' => 'Terminée'), set_value('statut', $commande->statut), array('id' =>'statut', 'class' =>'form-control')); ?>
                                <?= form_error('statut', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                    	</div>

                    	<div class="form-group col-md-6">
                    		<?= form_label('Valide *', 'valide', array('class' => 'form-control-label')); ?>
                            <div class="">
                            	<?= form_dropdown('valide', array('0' => 'Invalide', '1' => 'Valide'), set_value('valide', $commande->valide), array('id' =>'valide', 'class' =>'form-control')); ?>
                                <?= form_error('valide', '<small><span class="help-block text-danger">', '</span></small>'); ?>
                            </div>
                    	</div>
                    </div>

                    <br>
                    <h3>Informations produits <button type="button" id="addProduct" class="btn btn-primary pull-right">Ajouter un produit</button></h3>
    				<hr>


                    <div id="p_scents">
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
        						<td class="text-right"><span id="prix_ht_final"><?= $commande->prix_ht_final; ?></span> €</td>
        					</tr>

        					<tr>
        						<td class="text-right">Total HT après remise :</td>
        						<td class="text-right"><span id="prix_ht_remise"><?= $commande->prix_ht_remise; ?></span> €</td>
        					</tr>

        					<tr>
        						<td class="text-right">TVA :</td>
        						<td class="text-right"><span id="tva_final">20</span> %</td>
        					</tr>

        					<tr>
        						<td class="text-right">Total TTC :</td>
        						<td class="text-right"><span id="prix_ttc_final"><?= $commande->prix_ttc_final; ?></span> €</td>
        					</tr>
                    	</table>
                    </div>




			</div>

			<div class="card-footer">
				<?= form_input(array('type' => 'hidden', 'name' => 'prix_ht_final', 'id' => 'prix_ht_final_cmd', 'value' => set_value('prix_ht_final', $commande->prix_ht_final))); ?>
				<?= form_input(array('type' => 'hidden', 'name' => 'prix_ht_remise', 'id' => 'prix_ht_remise_cmd', 'value' => set_value('prix_ht_remise, $commande->prix_ht_remise'))); ?>
				<?= form_input(array('type' => 'hidden', 'name' => 'prix_ttc_final', 'id' => 'prix_ttc_final_cmd', 'value' => set_value('prix_ttc_final', $commande->prix_ttc_final))); ?>

				<?= form_submit('submitBtn', 'Enregistrer', array('class' => 'btn btn-sm btn-primary pull-right')); ?>
			</div>

			<?= form_close(); ?>
		</div>
	</div>
</div>
