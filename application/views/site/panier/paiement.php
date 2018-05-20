<div class="container profil-container">
    <div class="titre col-xs-12">
        <h1>Paiement</h1>

        <div class="ancre">
            <hr>
        </div>
    </div>

    <section class="col-xs-12 col-sm-9 profil-form">
        <?= form_open( '' , array('autocomplete' => 'off')); ?>
        <legend>Choisir votre type de paiement</legend>

        <?= validation_errors('<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="alert alert-danger">', '</div></div></div>'); ?>

        <fieldset>
            <legend>Type de paiement</legend>

            <div class="">
                <?= form_label('Sélectionnez un mode paiement', 'paiement', array('class' => 'col-xs-12 col-sm-4')); ?>
            </div>

            <div class="col-xs-12 col-sm-8">
                <?= form_radio(array('name' => 'paiement', 'id' => 'paiement', 'value' => 'cb', 'checked' => TRUE)); ?>
                <?= form_label('Carte Bancaire', 'cb'); ?>

                <?= form_radio(array('name' => 'paiement', 'id' => 'paiement', 'value' => 'cheque', 'checked' => FALSE)); ?>
                <?= form_label('Chèque', 'cheque'); ?>

                <?= form_radio(array('name' => 'paiement', 'id' => 'paiement', 'value' => 'virement', 'checked' => FALSE)); ?>
                <?= form_label('Virement', 'virement'); ?>
            </div>
        </fieldset>

        <a href="<?= site_url('panier/livraison'); ?>" class="contact-button">Retour</a> - <input type="submit" value="Valider votre commande" class="contact-button">
        <?= form_close( '' ); ?>


    </section>


    <section class="col-xs-12 col-sm-3 profil-table">
        <h2>Ma commande</h2>

        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                <?php if(isset($this->session->userdata['panier']) && !empty($this->session->userdata['panier'])) : ?>
                    <?php foreach($this->session->userdata['panier'] AS $key => $val) : ?>
                        <tr>
                            <td>
                                <?= $val['nom']; ?>
                            </td>

                            <td>
                                <?= $val['prix']; ?>€
                            </td>

                            <td>
                                <?= $val['quantite']; ?>
                            </td>

                            <td>
                                <?= ($val['prix'] * $val['quantite']); ?>€
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
</div>
