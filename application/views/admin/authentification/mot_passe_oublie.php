<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card-group mb-0">
            <div class="card p-4">
                <div class="card-body">
                	<?= form_open(); ?>
                	
                        <h1>Administration</h1>
                        <p class="text-muted">Vous avez perdu votre mot de passe ?</p>
                        <div class="input-group mb-3">
                            <span class="input-group-addon"><i class="icon-user"></i>
                            </span>
                            <input type="text" name="email" class="form-control" placeholder="Adresse e-mail">
                        </div>
             
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" name="submit" class="btn btn-primary px-4" value="Valider" />
                            </div>
                            <div class="col-6 text-right">
                                <a href="<?= site_url('/admin/connexion'); ?>" class="btn btn-link px-0">Se connecter ?</a>
                            </div>
                        </div>
                        
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>