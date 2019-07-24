<div class="container">
    <section class="contact">
        <h1>Créer un compte</h1>
    </section>

    <section class="col-xs-12 contact-form">
        <?= form_open( 'inscriptionform' ); ?>

        <?= validation_errors('<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="alert alert-danger">', '</div></div></div>'); ?>

        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <?= form_label('Prénom *', 'prenom'); ?>
                <?= form_input(array('name' => 'prenom', 'id' => 'prenom', 'class' => (empty(form_error('prenom')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12 ", 'value' => set_value('prenom'))); ?>
            </div>

            <div class="col-xs-12 col-sm-6">
    	       <?= form_label('Nom *', 'nom'); ?>
               <?= form_input(array('name' => 'nom', 'id' => 'nom', 'class' => (empty(form_error('nom')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('nom'))); ?>
           </div>
       </div>

       <div class="row">
           <div class="col-xs-12">
        	   <?= form_label('Civilité *', 'civilite'); ?>
           </div>

           <div class="col-xs-12">
               <?= form_radio(array('name' => 'civilite', 'id' => 'mr', 'value' => 'Mr', 'checked' => TRUE)); ?>
               <?= form_label('Mr', 'Mr'); ?>

               <?= form_radio(array('name' => 'civilite', 'id' => 'mme', 'value' => 'Mme', 'checked' => FALSE)); ?>
               <?= form_label('Mme', 'Mme'); ?>

               <?= form_radio(array('name' => 'civilite', 'id' => 'mlle', 'value' => 'Mlle', 'checked' => FALSE)); ?>
               <?= form_label('Mlle', 'Mlle'); ?>

           </div>
       </div>


       <div class="row">
           <div class="col-xs-12">
        	   <?= form_label('Adresse *', 'adresse'); ?>
               <?= form_input(array('name' => 'adresse', 'placeholder' => 'Numéro de voie et nom de la rue', 'id' => 'adresse', 'class' => (empty(form_error('adresse')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('adresse'))); ?>
           </div>
       </div>

       <div class="row">
           <div class="col-xs-12">
        	   <?= form_label('Complément d\'adresse', 'adresse_complement'); ?>
               <?= form_input(array('name' => 'adresse_complement', 'placeholder' => 'Appartemment, bureau, etc', 'id' => 'adresse_complement', 'class' => (empty(form_error('adresse_complement')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('adresse_complement'))); ?>
           </div>
       </div>

       <div class="row">
           <div class="col-xs-12 col-sm-3">
        	   <?= form_label('Code Postal *', 'code_postal'); ?>
               <?= form_input(array('name' => 'code_postal', 'id' => 'code_postal', 'class' => (empty(form_error('code_postal')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('code_postal'))); ?>
           </div>

           <div class="col-xs-12  col-sm-4">
        	   <?= form_label('Ville *', 'ville'); ?>
               <?= form_input(array('name' => 'ville', 'id' => 'ville', 'class' => (empty(form_error('ville')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('ville'))); ?>
           </div>

           <div class="col-xs-12  col-sm-5">
        	   <?= form_label('Pays *', 'pays'); ?>
               <?= form_dropdown('pays', $pays, $pays['France'], array('id' =>'pays', 'class' =>'form-control')); ?>
           </div>
       </div>

       <div class="row">
           <div class="col-xs-12 col-sm-6">
    	       <?= form_label('Téléphone', 'telephone'); ?>
               <?= form_input(array('name' => 'telephone', 'id' => 'telephone', 'class' => (empty(form_error('telephone')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('telephone'))); ?>
           </div>

           <div class="col-xs-12 col-sm-6">
    	       <?= form_label('Mobile', 'mobile'); ?>
               <?= form_input(array('name' => 'mobile', 'id' => 'mobile', 'class' => (empty(form_error('mobile')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('mobile'))); ?>
           </div>
       </div>

       <div class="row">
           <div class="col-xs-12">
               <?= form_label('Adresse e-mail *', 'email'); ?>
               <?= form_input(array('name' => 'email', 'id' => 'email', 'class' => (empty(form_error('email')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('email', $email))); ?>
           </div>
       </div>

       <div class="row">
           <div class="col-xs-6">
               <?= form_label('Mot de passe *', 'mot_de_passe'); ?>
               <?= form_input(array('type' => 'password', 'name' => 'mot_de_passe', 'id' => 'mot_de_passe', 'class' => (empty(form_error('mot_de_passe')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('mot_de_passe'))); ?>
           </div>

           <div class="col-xs-6">
               <?= form_label('Confirmation mot de passe *', 'mot_de_passe_check'); ?>
               <?= form_input(array('type' => 'password', 'name' => 'mot_de_passe_check', 'id' => 'mot_de_passe_check', 'class' => (empty(form_error('mot_de_passe_check')) ? "" : "has-error") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('mot_de_passe_check'))); ?>
           </div>
       </div><br>
       <div class="col-xl-12">
<!-- <?= form_input(array('name' => 'accept','id' => 'accept', 'type'=>'checkbox')); ?>                 -->
<label style='font-size:12px;'>En vous inscrivant, vous acceptez la politique de confidentialité, les conditions d'utilisation et les directives de la communauté

</label> 
</div>   


       <?= form_submit('envoyer', 'Créer mon compte', array('class' => 'col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6 contact-button')); ?>
       <?= form_close(); ?>
    </section>



</div>
