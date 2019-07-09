<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.css"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.js"></script>
<div class="container profil-container">
    <div class="titre col-xs-12">
        <h1>Mon Reservation</h1>

        <div class="ancre">
            <hr>
        </div>
    </div>

    <section class="col-xs-12 col-sm-3 sidebar-left">
        <h2>Mon compte</h2>

        <ul>
            <li><a href="<?= site_url('profil'); ?>">Mes informations</a></li>
            <li><a href="<?= site_url('profil/commandes'); ?>">Mes commandes</a></li>
            <li><a href="<?= site_url('panier'); ?>">Mon Panier reservation</a></li>
            <li><a href="<?= site_url('deconnexion'); ?>">Me déconnecter</a></li>
        </ul>
    </section>

    <section class="col-xs-12 col-sm-9 profil-table">
        <h2>Mon Panier Reservation</h2>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Quantity</th>
                    <th>Table Number</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                <?php if(isset($this->session->userdata['panier']) && !empty($this->session->userdata['panier'])) : ?>
                    <?php foreach($this->session->userdata['panier'] AS $key => $val) : ?>
                        <tr>
                            <td>
                                <img src="<?= site_url('assets/images/delete-icon.png'); ?>" alt="Supprimer ce produit" class="delete-product" data-id="<?= $val['id']; ?>">
                            </td>

                            <td>
                                <img src="<?= site_url('assets/images/bidon.png'); ?>" alt="<?= $val['nom']; ?>" width="50%">
                            </td>

                            <td>
                                <?= $val['date']; ?>
                            </td>

                            <td>
                                <?= $val['time']; ?>€
                            </td>
                            <td>
                                <?= $val['quantity']; ?>
                            </td>

                            <td>
                                <?= $val['Table Number']; ?>
                            </td>
                            <td>
                                <?= $val['total']*50; ?>€
                            </td>

                            <td>
                                <input type="number" value="<?= $val['quantite']; ?>" class="update-product" data-id="<?= $val['id']; ?>">
                            </td>

                            <td>
                                1
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="col-xs-12">
            <a href="<?= site_url('panier/paiement'); ?>" class="contact-button">Passer la commande</a>
            <a href="<?= site_url('reservation'); ?>" class="contact-button">Continuer mes reservation</a>
        </div>
    </section>
</div>
