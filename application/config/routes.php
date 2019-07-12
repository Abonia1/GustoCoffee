<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Authentification */
$route['inscription'] = 'auth/inscription';
$route['connexion'] = 'auth/connexion';
$route['deconnexion'] = 'auth/deconnexion';
$route['mot-passe-oublie'] = 'auth/mot_passe_oublie';

/* Site */
$route[''] = 'site';
$route['afficher-panier'] = 'site/afficher_panier';
$route['produits'] = 'site/produits';
$route['produit/ajouter-panier'] = 'site/ajouter_panier';
$route['produit/afficher-panier'] = 'site/afficher_panier';
$route['produit/supprimer-panier'] = 'site/supprimer_panier';
$route['produit/update-panier'] = 'site/update_panier';
$route['panier/get-adresse'] = 'site/get_adresse';
$route['produit/(:any)'] = 'site/produit/$1';
$route['profil/afficher-panier'] = 'site/afficher_panier';


$route['reservationsuccess'] = 'site/reservationsuccess';

$route['contact'] = 'site/contact';
$route['compare'] = 'site/compare';
$route['paiement'] = 'site/paiement';
$route['contactresult'] = 'site/contactresult';
$route['mentions-legales'] = 'site/mentions_legales';
$route['reservation'] = 'site/reservation';
/* Autre */
$route['captcha/refresh'] = 'site/refresh';

/* Admin */
$route['admin'] = 'admin/auth/connexion';
$route['admin/connexion'] = 'admin/auth/connexion';
$route['admin/deconnexion'] = 'admin/auth/deconnexion';
$route['admin/tableau-de-bord'] = 'admin/auth/tableau_de_bord';
$route['admin/mot-passe-oublie'] = 'admin/auth/mot_passe_oublie';
