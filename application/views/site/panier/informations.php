<div class="container profil-container">
    <div class="titre col-xs-12">
        <h1>Vos informations personnelles</h1>

        <div class="ancre">
            <hr>
        </div>
    </div>

    <section class="col-xs-12 col-sm-9 profil-form">
        <?= form_open( '' , array('autocomplete' => 'off')); ?>
        <legend>Confirmer mes informations</legend>

        <?= validation_errors('<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="alert alert-danger">', '</div></div></div>'); ?>

        <fieldset>
            <legend>Mes coordonnées</legend>

            <div class="">
               <?= form_label('Civilité *', 'civilite', array('class' => 'col-xs-12 col-sm-4')); ?>
            </div>

            <div class="col-xs-12 col-sm-8">
                <?= form_radio(array('name' => 'civilite', 'id' => 'mr', 'value' => 'mr', 'checked' => TRUE)); ?>
                <?= form_label('Mr', 'mr'); ?>

                <?= form_radio(array('name' => 'civilite', 'id' => 'mme', 'value' => 'mme', 'checked' => FALSE)); ?>
                <?= form_label('Mme', 'mme'); ?>

                <?= form_radio(array('name' => 'civilite', 'id' => 'mlle', 'value' => 'mlle', 'checked' => FALSE)); ?>
                <?= form_label('Mlle', 'mlle'); ?>

                <?= form_radio(array('name' => 'civilite', 'id' => 'societe', 'value' => 'societe', 'checked' => FALSE)); ?>
                <?= form_label('Société', 'societe'); ?>
            </div>

            <div class="">
                <?= form_label('Prénom *', 'prenom', array('class' => 'col-xs-12 col-sm-4')); ?>

                <div class="col-xs-12 col-sm-8">
                    <?= form_input(array('name' => 'prenom', 'id' => 'prenom', 'class' => (empty(form_error('prenom')) ? "" : "has-error") . " col-xs-12 col-sm-8", 'value' => set_value('prenom', $client->prenom))); ?>
                </div>
            </div>

            <div class="">
               <?= form_label('Nom *', 'nom', array('class' => 'col-xs-12 col-sm-4')); ?>

               <div class="col-xs-12 col-sm-8">
                   <?= form_input(array('name' => 'nom', 'id' => 'nom', 'class' => (empty(form_error('nom')) ? "" : "has-error") . " col-xs-12 col-sm-8", 'value' => set_value('nom', $client->nom))); ?>
               </div>
           </div>

           <div class="">
               <?= form_label('Adresse *', 'adresse', array('class' => 'col-xs-12 col-sm-4')); ?>

               <div class="col-xs-12 col-sm-8">
               <?= form_input(array('name' => 'adresse', 'placeholder' => 'Numéro de voie et nom de la rue', 'id' => 'adresse', 'class' => (empty(form_error('adresse')) ? "" : "has-error") . " col-xs-12 col-sm-8", 'value' => set_value('adresse', $client->adresse))); ?>
               </div>
           </div>

           <div class="">
               <?= form_label('Complément d\'adresse', 'adresse_complement', array('class' => 'col-xs-12 col-sm-4')); ?>

               <div class="col-xs-12 col-sm-8">
                   <?= form_input(array('name' => 'adresse_complement', 'placeholder' => 'Appartemment, bureau, etc', 'id' => 'adresse_complement', 'class' => (empty(form_error('adresse_complement')) ? "" : "has-error") . " col-xs-12 col-sm-8", 'value' => set_value('adresse_complement', $client->complement))); ?>
               </div>
           </div>

           <div class="">
               <?= form_label('Code Postal *', 'code_postal', array('class' => 'col-xs-12 col-sm-4')); ?>

               <div class="col-xs-12 col-sm-8">
                   <?= form_input(array('name' => 'code_postal', 'id' => 'code_postal', 'class' => (empty(form_error('code_postal')) ? "" : "has-error") . " col-xs-12 col-sm-4", 'value' => set_value('code_postal', $client->code_postal))); ?>
               </div>
           </div>

           <div class="">
               <?= form_label('Ville *', 'ville', array('class' => 'col-xs-12 col-sm-4')); ?>

               <div class="col-xs-12 col-sm-8">
                   <?= form_input(array('name' => 'ville', 'id' => 'ville', 'class' => (empty(form_error('ville')) ? "" : "has-error") . " col-xs-12 col-sm-8", 'value' => set_value('ville', $client->ville))); ?>
               </div>
           </div>

           <div class="">
               <?= form_label('Pays *', 'pays', array('class' => 'col-xs-12 col-sm-4')); ?>

               <div class="col-xs-12 col-sm-8">
                   <?= form_dropdown('pays', $pays, $pays[$client->pays], array('id' =>'pays', 'class' =>'form-control col-xs-12 col-sm-8')); ?>
               </div>
           </div>

           <div class="">
               <?= form_label('Téléphone', 'telephone', array('class' => 'col-xs-12 col-sm-4')); ?>

               <div class="col-xs-12 col-sm-8">
                   <?= form_input(array('name' => 'telephone', 'id' => 'telephone', 'class' => (empty(form_error('telephone')) ? "" : "has-error") . " col-xs-12 col-sm-8", 'value' => set_value('telephone', $client->telephone))); ?>
               </div>
           </div>

           <div class="">
               <?= form_label('Mobile', 'mobile', array('class' => 'col-xs-12 col-sm-4')); ?>

               <div class="col-xs-12 col-sm-8">
                   <?= form_input(array('name' => 'mobile', 'id' => 'mobile', 'class' => (empty(form_error('mobile')) ? "" : "has-error") . " col-xs-12 col-sm-8", 'value' => set_value('mobile', $client->mobile))); ?>
               </div>
           </div>
        </fieldset>

        <?= form_close( '' ); ?>

        <a href="<?= site_url('panier'); ?>" class="contact-button ">Retour</a> - <a href="<?= site_url('panier/livraison'); ?>" class="contact-button">Poursuivre</a>
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
