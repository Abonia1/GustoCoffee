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
            <li><a href="<?= site_url('panier'); ?>">Mon panier</a></li>
            <li><a href="<?= site_url('deconnexion'); ?>">Me déconnecter</a></li>
        </ul>
    </section>

    <section class="col-xs-12 col-sm-9 profil-form">
        <?= form_open( '' , array('autocomplete' => 'off')); ?>
        <legend>Modifier mes informations personnelles</legend>

        <?= validation_errors('<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="alert alert-danger">', '</div></div></div>'); ?>

        <fieldset>
            <legend>Mes identifiants</legend>

            <div class="">
                <?= form_label('Adresse e-mail *', 'email', array('class' => 'col-xs-12 col-sm-4')); ?>

                <div class="col-xs-12 col-sm-8">
                    <?= form_input(array('name' => 'email', 'id' => 'email', 'class' => (empty(form_error('email')) ? "" : "has-error") . " col-xs-12 col-sm-8", 'value' => set_value('email', $client->email))); ?>
                </div>
            </div>

            <div class="">
                <?= form_label('Mot de passe *', 'mot_de_passe', array('class' => 'col-xs-12 col-sm-4')); ?>

                <div class="col-xs-12 col-sm-8">
                    <?= form_input(array('type' => 'password', 'name' => 'mot_de_passe', 'id' => 'mot_de_passe', 'class' => (empty(form_error('mot_de_passe')) ? "" : "has-error") . " col-xs-12 col-sm-8")); ?>
                </div>
            </div>

            <div class="">
                <?= form_label('Confirmation mot de passe *', 'mot_de_passe_check', array('class' => 'col-xs-12 col-sm-4')); ?>

                <div class="col-xs-12 col-sm-8">
                    <?= form_input(array('type' => 'password', 'name' => 'mot_de_passe_check', 'id' => 'mot_de_passe_check', 'class' => (empty(form_error('mot_de_passe_check')) ? "" : "has-error") . " col-xs-12 col-sm-8")); ?>
                </div>
            </div>
        </fieldset>


        <fieldset>
            <legend>Mes coordonnées</legend>

            <div class="">
         	   <?= form_label('Civilité *', 'civilite', array('class' => 'col-xs-12 col-sm-4')); ?>
            </div>

            <div class="col-xs-12 col-sm-8">
                <?= form_radio(array('name' => 'civilite', 'id' => 'mr', 'value' => 'Mr', 'checked' => TRUE)); ?>
                <?= form_label('Mr', 'Mr'); ?>

                <?= form_radio(array('name' => 'civilite', 'id' => 'mme', 'value' => 'Mme', 'checked' => FALSE)); ?>
                <?= form_label('Mme', 'Mme'); ?>

                <?= form_radio(array('name' => 'civilite', 'id' => 'mlle', 'value' => 'Mlle', 'checked' => FALSE)); ?>
                <?= form_label('Mlle', 'Mlle'); ?>

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



       <?= form_submit('envoyer', 'Valider', array('class' => 'col-xs-12 col-sm-4 col-sm-offset-8 contact-button')); ?>
       <?= form_close( '' ); ?>

       <p>* Ces champs sont obligatoires<br><br>

           Les informations demandées, signalées par un astérisque, sont obligatoires et sont destinées à Gustocoffee, responsable du traitement,
           aux fins de traitement de vos commandes, de gestion de votre compte client, d'études marketing et statistiques dans le but de vous fournir
           les offres les plus adaptées, de suivi de qualité de nos services et de prospection commerciale.
           Conformément à la Loi Informatique et Libertés du 06/01/1978, vous disposez d'un droit d'accès, de rectification et de suppression des
           données vous concernant et d'opposition à leur traitement.
           Si vous souhaitez l'exercer, vous pouvez écrire à Gustocoffee - 1 Rue de Paris, 75220 Paris, en indiquant vos nom, prénom, adresse,
           email afin d'accélérer la prise en compte de votre demande.
       </p>
    </section>



</div>
