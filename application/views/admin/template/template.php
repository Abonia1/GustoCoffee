<!doctype html>
<html class="no-js" lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>GustoCoffee - Administration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="<?= site_url("assets/images/gusto_coffee.ico"); ?>" />

		<!-- Icons -->
        <link href="<?= site_url('web/css/admin/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?= site_url('web/css/admin/simple-line-icons.css'); ?>" rel="stylesheet">
        <link href="<?= site_url('web/css/admin/jquery-ui.min.css'); ?>" rel="stylesheet">

        <!-- Main styles for this application -->
        <link href="<?= site_url('web/css/admin/style.css'); ?>" rel="stylesheet">

        <?php if(isset($css_files) && is_array($css_files)) : ?>
	    	<?php foreach($css_files AS $css) : ?>
	    		<link rel="stylesheet" href="<?= site_url('web/css/admin/'.$css.''); ?>" />
			<?php endforeach; ?>
		<?php endif; ?>
	</head>

	<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">

        <header class="app-header navbar">
            <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">☰</button>
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler sidebar-minimizer d-md-down-none" type="button">☰</button>

            <ul class="nav navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="" class="img-avatar" alt="admin@Gustocoffee.fr">
                        <span class="d-md-down-none">Admin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-center">
                            <strong>Compte</strong>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> Updates<span class="badge badge-info">42</span></a>
                        <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Messages<span class="badge badge-success">42</span></a>
                        <div class="dropdown-header text-center">
                            <strong>Préférences</strong>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                        <div class="divider"></div>
                        <a class="dropdown-item" href="#"><i class="fa fa-shield"></i> Lock Account</a>
                        <a class="dropdown-item" href="<?= site_url('admin/deconnexion'); ?>"><i class="fa fa-lock"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </header>


        <div class="app-body">
            <div class="sidebar">
                <nav class="sidebar-nav">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('admin/tableau-de-bord'); ?>"><i class="icon-home"></i> Tableau de bord</a>
                        </li>

                        <li class="nav-title">
                            Gestion plate-forme
                        </li>
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Clients</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('admin/client/liste'); ?>"><i class="icon-list"></i> Liste</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('admin/client/ajouter'); ?>"><i class="icon-plus"></i> Ajouter</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-basket-loaded"></i> Reservation</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('admin/reservation/liste'); ?>"><i class="icon-list"></i> Liste</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('admin/reservation/ajouter'); ?>"><i class="icon-plus"></i> Ajouter</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-chemistry"></i> Produits</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('admin/produit/liste'); ?>"><i class="icon-list"></i> Liste</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('admin/produit/ajouter'); ?>"><i class="icon-plus"></i> Ajouter</a>
                                </li>
                            </ul>
                        </li>





                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Mentions_Légales</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('admin/mention/liste'); ?>"><i class="icon-list"></i> Modifier</a>
                                </li>
                                

                            </ul>
                        </li>


                         <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-folder-alt"></i> Services</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('admin/stock/liste'); ?>"><i class="icon-list"></i> Liste</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('admin/stock/ajouter'); ?>"><i class="icon-plus"></i> Ajouter</a>
                                </li>
                            </ul>
                        </li>

                        <li class="divider"></li>
                        <li class="nav-title">
                            Gestion CRM
                        </li>
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Utilisateurs</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('admin/utilisateur/liste'); ?>"><i class="icon-list"></i> Liste</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('admin/utilisateur/ajouter'); ?>"><i class="icon-plus"></i> Ajouter</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
            <!-- Sidebar -->

        <!-- Main content -->
        <main class="main">

            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a>
                </li>
                <!-- <li class="breadcrumb-item active">Dashboard</li>

                <!-- Breadcrumb Menu-->
                <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group">
                        <a class="btn" href="#"><i class="icon-speech"></i></a>
                        <a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
                        <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
                    </div>
                </li> -->
            </ol>


            <div class="container-fluid">
                <div class="animated fadeIn">
					<?= $content; ?>
                </div>

            </div>
            <!-- /.conainer-fluid -->
        </main>
    </div>


    <script src="<?= site_url('web/js/admin/jquery.min.js'); ?>"></script>
    <script src="<?= site_url('web/js/admin/tether.min.js'); ?>"></script>
    <script src="<?= site_url('web/js/admin/bootstrap.min.js'); ?>"></script>
    <script src="<?= site_url('web/js/admin/chart.min.js'); ?>"></script>
    <script src="<?= site_url('web/js/admin/app.js'); ?>"></script>
    <script src="<?= site_url('web/js/admin/widgets.js'); ?>"></script>

    <script src="<?= site_url('web/js/admin/charts.js'); ?>"></script>


    <?php if(isset($js_files) && is_array($js_files)) : ?>
		<?php foreach($js_files AS $js) : ?>
    		<script src="<?= site_url('web/js/admin/'.$js.''); ?>"></script>
		<?php endforeach; ?>
	<?php endif; ?>

    <?php if(isset($js_scripts) && is_array($js_scripts)) : ?>
        <?php foreach($js_scripts AS $js_script) : ?>
            <script>
                $(document).ready(function() {
                    <?= $js_script; ?>
                });
            </script>
        <?php endforeach; ?>
    <?php endif; ?>
    </body>
</html>
