<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card-group mb-0">
            <div class="card p-4">
                <div class="card-body">
                	<?= form_open(); ?>
                	
                        <h1>Administration</h1>
                        <p class="text-muted">Connectez-vous a votre compte</p>
                        <div class="input-group mb-3">
                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="identifiant" class="form-control" placeholder="Identifiant">
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                            <input type="password" name="mot_de_passe" class="form-control" placeholder="Mot de passe">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" name="submit" class="btn btn-primary px-4" value="Se connecter" />
                            </div>
                            <div class="col-6 text-right">
                                <a href="<?= site_url('/admin/mot-passe-oublie'); ?>" class="btn btn-link px-0">Mot de passe oublie ?</a>
                            </div>
                        </div>
                        
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>