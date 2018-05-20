<div class="row">
	<div class="col-md-12">
    	<div class="card">
        	<div class="card-header">
                <i class="fa fa-eyedropper"></i>
                <strong>Détail produit</strong>
            </div>


            <div class="card-body">
            	<div class="row">
        			<div class="col-md-12">

								<div class="row">
	        				<div class="col-md-6">
	        					<h5>Informations produit</h5>
	        					<hr>

	        					<h4><?= $produit->nom; ?></h4>
	        					<h5><?= $produit->description_courte; ?></h5>

	        					<p><?= $produit->description_longue; ?></p>
									</div>

									<div class="col-md-6">
										<h5>Prix et stock</h5>
										<hr>

										<p>
											Prix HT : <?= $produit->prix_ht; ?> €<br>
											TVA : <?= $produit->tva; ?> %<br>
											Remise : <?= $produit->remise; ?> %<br>

											Stock :
											<?php if($produit->stock <= 0) : ?>
												<span class="badge badge-pill badge-danger"><?= $produit->stock; ?></span>
											<?php elseif($produit->stock <= 10) : ?>
												<span class="badge badge-pill badge-warning"><?= $produit->stock; ?></span>
											<?php else : ?>
												<span class="badge badge-pill badge-success"><?= $produit->stock; ?></span>
											<?php endif; ?>
											<br>
										</p>
									</div>
								</div>


      					<br>
								<div class="row">
									<div class="col-md-6">
											<h5>Paramètres</h5>
											<hr>

											<p>
												Référence : <?= $produit->reference; ?><br>
												Date création : <?= date('d/m/Y H:i:s', strtotime($produit->date_creation)); ?><br>
												Date modification : <?= date('d/m/Y H:i:s', strtotime($produit->date_modification)); ?><br>
									</p>
								</div>

									<div class="col-md-6">
										<h5>Image du produit</h5>
										<hr>
										<?php if($produit->bidon != NULL) : ?>
              				<img class="img-fluid" src="<?= site_url('assets/images/produit/'.$produit->bidon); ?>">
          					<?php endif; ?>
									</div>

								</div>



        					<br>

        					<div class="row">

										<div class="col-md-6">
            					<h5>Image de fond de l'accueil</h5>
            					<hr>
            					<img src="<?= site_url('assets/images/produit/accueil/'.$produit->image); ?>" width="100" height="100" class="rounded" />
  									</div>

										<div class="col-md-6">
            					<h5>Image de fond du header</h5>
            					<hr>
            					<img src="<?= site_url('assets/images/produit/header/'.$produit->image_header); ?>" width="100" height="100" class="rounded" />
  									</div>

									</div>
        				</div>

        				<br><br>

        				<div class="col-md-12">
        					<h4>Statistiques de vente</h4>

        					<div class="chart-wrapper">
                                <canvas id="canvas-1"></canvas>
                            </div>
        				</div>
        			</div>




        			<div class="col-md-4">

            		    <br>

                		<h5>Priorité</h5>
                		<hr>

                		<p>
                			<?php if(is_object($priorites)) : ?>
                    			<ul>
                            		<?php foreach($priorites AS $key => $val) : ?>
                            			<li><img src="<?= site_url('assets/images/priorite/'.$val->image); ?>" width="20" class="rounded"> <?= $val->priorite; ?></li>
                        			<?php endforeach; ?>
                    			</ul>
                			<?php else : ?>
                				Aucun priorite
                			<?php endif; ?>
                		</p>


                		<br>

										<h5>Utilisation</h5>
                		<hr>

                		<p>
                			<?php if(is_object($utilisations)) : ?>
                    			<ul>
                            		<?php foreach($utilisations AS $key => $val) : ?>
                            			<li><img src="<?= site_url('assets/images/utilisation/'.$val->image); ?>" width="20" class="rounded"> <?= $val->utilisation; ?></li>
                        			<?php endforeach; ?>
                    			</ul>
                			<?php else : ?>
                				Aucun Utilisation
                			<?php endif; ?>
                		</p>


                		<br>

										<h5>Caracteristiques</h5>
                		<hr>

                		<p>
                			<?php if(is_object($caracteristiques)) : ?>
                    			<ul>
                            		<?php foreach($caracteristiques AS $key => $val) : ?>
                            			<li> <?= $val->caracteristique; ?></li>
                        			<?php endforeach; ?>
                    			</ul>
                			<?php else : ?>
                				Aucun Utilisation
                			<?php endif; ?>
                		</p>

										<br>

										<h5>Fiche technique</h5>
                		<hr>

                		<p>Voir<a href="<?= site_url("assets/fiche_technique/").$produit->fiche_tech;?>" target="_blank"> Ici</a></p>
        			</div>
    			</div>

            </div>
		</div>
    </div>

</div>
