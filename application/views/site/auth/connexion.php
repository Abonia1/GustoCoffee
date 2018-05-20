<div class="container">
    <section class="contact">
        <h1>Se connecter / S'inscrire</h1>
    </section>

    <section class="col-xs-12 col-sm-6 contact-form">
    	<?= form_open(); ?>
            <h2>Déjà client EnzyMarine ?</h2>

            <div class="row">
                <div class="col-xs-12">
                    <?= form_label('Adresse e-mail *', 'identifiant'); ?>
                    <?= form_input(array('name' => 'identifiant', 'id' => 'identifiant', 'class' => (empty(form_error('identifiant')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('identifiant'))); ?>
                </div>

                <div class="col-xs-12">
        	       <?= form_label('Mot de passe *', 'mot_de_passe'); ?>
                   <?= form_input(array('type' => 'password', 'name' => 'mot_de_passe', 'id' => 'mot_de_passe', 'class' => (empty(form_error('mot_de_passe')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('mot_de_passe'))); ?>
               </div>
           </div>

           <?= form_submit('envoyer', 'Me connecter', array('class' => 'contact-button')); ?>
        <?= form_close(); ?>
    </section>

    <section class="col-xs-12 col-sm-6 contact-form">
    	<?= form_open('inscription'); ?>
            <h2>Nouveau client EnzyMarine ?</h2>

            <p>Indiquez votre adresse e-mail pour créer votre compte en quelques secondes et profitez de nos produits de nettoyage</p>

            <div class="row">
                <div class="col-xs-12">
                    <?= form_label('Adresse e-mail *', 'identifiant'); ?>
                    <?= form_input(array('name' => 'identifiant', 'id' => 'identifiant', 'class' => (empty(form_error('identifiant')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('identifiant'))); ?>
                </div>
           </div>

           <?= form_submit('envoyer', 'Créer mon compte', array('class' => 'contact-button')); ?>
        <?= form_close(); ?>
    </section>
</div>
