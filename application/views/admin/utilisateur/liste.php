<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-users"></i> Liste des utilisateurs
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                    	<th class="text-left">Rôle</th>
                        <th class="text-left">Prénom</th>
                        <th class="text-left">Nom</th>
                        
                        <th class="text-left">Identifiant</th>
                        <th class="text-left">Email</th>
                        
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($utilisateur AS $key => $val) : ?>
                        <tr>
                            <td class="text-left"><?= ucfirst($val->role); ?></td>
                            
                            <td class="text-left"><?= ucfirst($val->prenom); ?></td>
                            
                            <td class="text-left"><?= ucfirst($val->nom); ?></td>
                            
                            <td class="text-left"><?= ucfirst($val->identifiant); ?></td>
                            
                            <td class="text-left"><?= $val->email; ?></td>
                            
                           	<td class="text-center">
                            	<div class="btn-group">
                            		<button type="button" class="btn btn-primary active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            			<i class="icon-settings"></i>
                        			</button>
                        			
                        			<div class="dropdown-menu dropdown-menu-right">
                        				<a class="dropdown-item" href="<?= site_url('admin/utilisateur/detail/'.$val->id); ?>"><i class="icon-pencil"></i> Détail</a>
                                        <a class="dropdown-item" href="<?= site_url('admin/utilisateur/modifier/'.$val->id); ?>"><i class="icon-pencil"></i> Modifier</a>
                                        <a class="dropdown-item" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');" href="<?= site_url('admin/utilisateur/supprimer/'.$val->id); ?>"><i class="icon-trash"></i> Supprimer</a>
                                    </div>
								</div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>