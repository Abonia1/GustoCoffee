<div class="container profil-container">
    <div class="titre col-xs-12">
        <h1>Livraison</h1>

        <div class="ancre">
            <hr>
        </div>
    </div>

    <section class="col-xs-12 col-sm-9 profil-form">
        <?= form_open( '' , array('autocomplete' => 'off')); ?>
        <legend>Choisir vos informations de livraison</legend>

        <?= validation_errors('<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="alert alert-danger">', '</div></div></div>'); ?>

        <fieldset id="adresse_fieldset">
            <legend>Adresse de livraison</legend>

           <div class="">
               <?= form_label('Adresse *', 'adresse', array('class' => 'col-xs-12 col-sm-4')); ?>

               <div class="col-xs-12 col-sm-8">
               <?= form_input(array('name' => 'adresse', 'placeholder' => 'Numéro de voie et nom de la rue', 'id' => 'adresse', 'class' => (empty(form_error('adresse')) ? "" : "has-error") . " col-xs-12 col-sm-8", 'value' => set_value('adresse', $adresses->adresse))); ?>
               </div>
           </div>

           <div class="">
               <?= form_label('Complément d\'adresse', 'adresse_complement', array('class' => 'col-xs-12 col-sm-4')); ?>

               <div class="col-xs-12 col-sm-8">
                   <?= form_input(array('name' => 'adresse_complement', 'placeholder' => 'Appartemment, bureau, etc', 'id' => 'adresse_complement', 'class' => (empty(form_error('adresse_complement')) ? "" : "has-error") . " col-xs-12 col-sm-8", 'value' => set_value('adresse_complement', $adresses->complement))); ?>
               </div>
           </div>

           <div class="">
               <?= form_label('Code Postal *', 'code_postal', array('class' => 'col-xs-12 col-sm-4')); ?>

               <div class="col-xs-12 col-sm-8">
                   <?= form_input(array('name' => 'code_postal', 'id' => 'code_postal', 'class' => (empty(form_error('code_postal')) ? "" : "has-error") . " col-xs-12 col-sm-4", 'value' => set_value('code_postal', $adresses->code_postal))); ?>
               </div>
           </div>

           <div class="">
               <?= form_label('Ville *', 'ville', array('class' => 'col-xs-12 col-sm-4')); ?>

               <div class="col-xs-12 col-sm-8">
                   <?= form_input(array('name' => 'ville', 'id' => 'ville', 'class' => (empty(form_error('ville')) ? "" : "has-error") . " col-xs-12 col-sm-8", 'value' => set_value('ville', $adresses->ville))); ?>
               </div>
           </div>

           <div class="">
               <?= form_label('Pays *', 'pays', array('class' => 'col-xs-12 col-sm-4')); ?>

               <div class="col-xs-12 col-sm-8">
                   <?= form_dropdown('pays', $pays, $pays[$adresses->pays], array('id' =>'pays', 'class' =>'form-control col-xs-12 col-sm-8')); ?>
               </div>
           </div>

           <div class="">
               <?= form_label('Adresse de facturation différente ?', 'adresse_autre', array('class' => 'col-xs-12 col-sm-4')); ?>

               <div class="col-xs-12 col-sm-8">
                   <input type="checkbox" id="adresse_autre">
               </div>
           </div>
        </fieldset>



        <fieldset>
            <legend>Type de livraison</legend>

            <div class="">
                <?= form_label('Sélectionnez un transporteur', 'livraison', array('class' => 'col-xs-12 col-sm-4')); ?>
            </div>

            <div class="col-xs-12 col-sm-8">
                <?= form_radio(array('name' => 'livraison', 'id' => 'poste', 'value' => 'poste', 'checked' => TRUE)); ?>
                <?= form_label('La Poste', 'poste'); ?>

                <?= form_radio(array('name' => 'livraison', 'id' => 'dhl', 'value' => 'dhl', 'checked' => FALSE)); ?>
                <?= form_label('DHL', 'dhl'); ?>

                <?= form_radio(array('name' => 'livraison', 'id' => 'ups', 'value' => 'ups', 'checked' => FALSE)); ?>
                <?= form_label('UPS', 'ups'); ?>
            </div>
        </fieldset>

        <a href="<?= site_url('panier/informations'); ?>" class="contact-button ">Retour</a> - <input type="submit" class="contact-button" value="Poursuivre">
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
