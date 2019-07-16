<div class="row">
	<div class="col-sm-6 col-md-3">
    	<div class="card">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="icon-user"></i>
                </div>
                <div class="h4 mb-0"><?= $clients->nombre; ?></div>
                <small class="text-muted text-uppercase font-weight-bold">Clients inscrits</small>
                <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-md-3">
    	<div class="card">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="icon-calendar"></i>
                </div>
                <div class="h4 mb-0"><?= $commandes->nombre; ?></div>
                <small class="text-muted text-uppercase font-weight-bold">Reservation effectuées</small>
                <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <div class="col-sm-6 col-md-3">
    	<div class="card">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="icon-drop"></i>
                </div>
                <div class="h4 mb-0">3268</div>
                <small class="text-muted text-uppercase font-weight-bold">Nombre de Reserveration</small>
                <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div> -->
    
    <div class="col-sm-6 col-md-3">
    	<div class="card">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="icon-wallet"></i>
                </div>
                <div class="h4 mb-0">12 580€</div>
                <small class="text-muted text-uppercase font-weight-bold">Revenus ce mois-ci</small>
                <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    
   
</div>