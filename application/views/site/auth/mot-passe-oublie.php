<div class="container">
    <section class="contact">
        <h1>Vous avez oublié votre mot de passe ?</h1>
        <p>Saisissez votre adresse e-mail et nous vous envoyons un nouveau mot de passe</p>
    </section>

    <section class="col-xs-12 contact-form">
    	<?= form_open(); ?>
            <div class="row">
                <div class="col-xs-12">
                    <?= form_label('Adresse e-mail *', 'identifiant'); ?>
                    <?= form_input(array('name' => 'identifiant', 'id' => 'identifiant', 'class' => (empty(form_error('identifiant')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('identifiant'))); ?>
                </div>
           </div>

           <?= form_submit('envoyer', 'Envoyer', array('class' => 'contact-button')); ?>
        <?= form_close(); ?>
    </section>
</div>
