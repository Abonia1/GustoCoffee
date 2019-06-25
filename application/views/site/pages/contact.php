<div class="container">
    <section class="contact">
        <h1>Obtenez un conseil</h1>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </section>

    <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 contact-form">
        <?= form_open( 'contact' ); ?>

        <?= validation_errors('<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="alert alert-danger">', '</div></div></div>'); ?>



        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    	       <?= form_label('Nom *', 'nom'); ?>
               <?= form_input(array('name' => 'nom', 'placeholder' => 'Votre nom', 'id' => 'nom', 'class' => (empty(form_error('nom')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('nom'))); ?>
           </div>

           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <?= form_label('Prénom *', 'prenom'); ?>
               <?= form_input(array('name' => 'prenom', 'placeholder' => 'Votre prénom', 'id' => 'prenom', 'class' => (empty(form_error('prenom')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('prenom'))); ?>
           </div>
       </div>

       <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	   <?= form_label('Adresse e-mail *', 'email'); ?>
               <?= form_input(array('name' => 'email', 'placeholder' => 'Votre adresse e-mail', 'id' => 'email', 'class' => (empty(form_error('email')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('email'))); ?>
           </div>
       </div>

       <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	       <?= form_label('Téléphone', 'telephone'); ?>
               <?= form_input(array('name' => 'telephone', 'placeholder' => 'Votre numéro de téléphone', 'id' => 'telephone', 'class' => (empty(form_error('telephone')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('telephone'))); ?>
           </div>
       </div>

       <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <?= form_label('Message *', 'message'); ?>
               <?= form_textarea(array('name' => 'message', 'id' => 'message', 'class' => (empty(form_error('message')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('message'))); ?>
           </div>
       </div>

      <?= form_submit('envoyer', 'Envoyer', array('class' => 'col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6 contact-button')); ?>
       <?= form_close( '' ); ?>
    </section>


    <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 contact-information">
        <address>
            <h2>Gustocoffee</h2>
            <p>1 Rue de Paris<br>
            75220 - Paris</p>

            <p>Téléphone : 01 23 45 67 89<br>
            Mail: contact@Gustocoffee.fr</p>


        </address>

        <article>
            <h2>Du lundi au vendredi</h2>
            <p>Nous sommes à votre disposition du lundi au vendredi de 08h00 à 18h00. N'hésitez pas à nous poser vos questions !</p>
        </article>
    </section>
</div>
