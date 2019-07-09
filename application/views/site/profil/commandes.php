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
            <li><a href="<?= site_url('panier'); ?>">Mon Panier Reservation</a></li>
            <li><a href="<?= site_url('deconnexion'); ?>">Me déconnecter</a></li>
        </ul>
    </section>

    <section class="col-xs-12 col-sm-9 profil-table">
        <h2>Mes commandes</h2>
        <div class="table-responsive">
            <table class="col-xs-12 commande">
                <thead>
                    <tr>
                        <th class="text-left">Reservation Reference</th>
                        <th class="text-left">Date</th>
                        <th class="text-left">Time</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Table Number</th>
                        <th class="text-right">Status</th>
                        <th class="text-left">Paiment</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if($reservations != NULL) : ?>
                        <?php foreach($reservations AS $reservation) : ?>
                            <tr>
                                <td class="text-left"><?= $reservation->reservation_id; ?></td>
                                <td class="text-left"><?= $reservation->date; ?></td>
                                <td class="text-left"><?= $reservation->time; ?></td>
                                <td class="text-center"><?= $reservation->quantity; ?></td>
                                <td class="text-center"><?= $reservation->tbnumber; ?></td>
                                <td class="text-center"><?= $reservation->status; ?></td>
                                <td class="text-right"><?= $reservation->quantity*50; ?> €</td>
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
