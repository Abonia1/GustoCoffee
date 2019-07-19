<div class="container profil-container">
    <div class="titre col-xs-12">
        <h1>Mon espace client</h1>

        <div class="ancre">
            <hr>
        </div>
    </div>

    <section class="col-xs-12 col-sm-3 sidebar-left">
        <h2>Mon compte</h2>

        <ul>
            <li><a href="<?= site_url('profil'); ?>">Mes informations</a></li>
            <li><a href="<?= site_url('profil/commandes'); ?>">Mes commandes</a></li>
            <!-- <li><a href="<?= site_url('panier'); ?>">Mon Panier Reservation</a></li> -->
            <li><a href="<?= site_url('deconnexion'); ?>">Me déconnecter</a></li>
        </ul>
    </section>

    <section class="col-xs-12 col-sm-9 profil-table">
        <h2>Mes commandes</h2>
        <div class="table-responsive">
            <table class="col-xs-12 commande">
                <thead>
                    <tr>
                        <th class="text-left">Reference de Reservation</th>
                        <th class="text-left">Date</th>
                        <th class="text-left">Heure</th>
                        <th class="text-left">Durée</th>
                        <th class="text-center">Places</th>
                        <th class="text-center">Table</th>
                        <th class="text-right">Statut</th>
                        <th class="text-right">Statut de Client</th>
                        <th class="text-left">Paiement</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if($reservations != NULL) : ?>
                        <?php foreach($reservations AS $reservation) : ?>
                            <tr>
                                <td class="text-left"><?= $reservation->reservation_id; ?></td>
                                <td class="text-left"><?= $reservation->date; ?></td>
                                <td class="text-left"><?= $reservation->time; ?></td>
                                <td class="text-left"><?= $reservation->duree; ?>h</td>
                                <td class="text-center"><?= $reservation->quantity; ?></td>
                                <td class="text-center"><?= $reservation->tbnumber; ?></td>
                                <!-- <td class="text-center"><?= $reservation->status; ?></td> -->
                                <td class="text-center">
                                        			<?php
                                		               switch($reservation->status)
                                    	   	           {
														case '0':
														echo '<span class="badge badge-pill badge-danger">Annulée</span>';
														break;
			 
													case '1':
														echo '<span class="badge badge-pill badge-success">Confirmed</span>';
														break;
                                            	       }
                                            	   ?>
                                </td>
                                <td class="text-center">
												<?php
                            	   switch($reservation->c_status)
                            	   {
							   			case 0:
                            	           echo '<span class="badge badge-pill badge-warning">Out</span>';
                            	           break;

                            	       case 1:
                            	           echo '<span class="badge badge-pill badge-success">In</span>';
										   break;
										
										case 2:
										echo '<span class="badge badge-pill badge-danger">Terminée</span>';
										break;
									 }
								?>
                	                            </td>
                                <!-- <td class="text-center"><?= $reservation->c_status; ?></td> -->
                                <td class="text-right"><?= $reservation->duree*$reservation->quantity*2.5; ?> €</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                            <tr>
                              <td class="text-left" colspan="7">Abscence de commande</td>
                            </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>



</div>
