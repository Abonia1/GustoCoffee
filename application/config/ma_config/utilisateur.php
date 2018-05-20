<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['utilisateur']= array(
	'champs'=> array(
		'nom'         		=> 'nom',
		'prenom'      		=> 'prenom',
		'email' 			=> 'email',
		'identifiant'		=> 'identifiant',
		'mot_de_passe'		=> 'mot_de_passe',
		'date_modification'	=> 'date_modification',
		'role'				=> 'role'
	),

	'role'=>array(
		'8' => 'Comptabilité',
		'9' => 'Administrateur'
	)
);