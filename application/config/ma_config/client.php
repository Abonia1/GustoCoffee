<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//Parametrage pour le le coté administateur-----------------------------------------------------------------------------

$config['admin']= array(
	'champs_client'=> array(
		'civilite' 				=> 	'civilite',
		'nom' 					=> 	'nom',
		'prenom' 				=> 	'prenom',
		'email' 				=> 	'email',
		'telephone' 			=>	'telephone',
		'mobile' 				=>	'mobile',
		'mot_de_passe' 			=>	'mot_de_passe',
		'adresse'				=>	'adresse',
		'adresse_autre'			=>	'adresse_autre',
	),

  'champs_client_modifier'=> array(
      'civilite' 		=> 	'civilite',
      'nom' 			=> 	'nom',
      'prenom' 		=> 	'prenom',
      'email' 		=> 	'email',
      'telephone' 	=>	'telephone',
      'mobile' 		=>	'mobile',
      'adresse'		=>	'adresse',
      'adresse_autre'	=>	'adresse_autre',
			'mot_de_passe' 			=>	'mot_de_passe',
			'adresse'				=>	'adresse',
			'adresse_autre'			=>	'adresse_autre',
  ),

	'champs_adresse'=> array(
		'adresse' 		=> 	'adresse',
		'complement'	=>	'complement',
		'code_postal'	=> 	'code_postal',
		'ville' 		=> 	'ville',
		'pays' 			=> 	'pays',
	),

  'champs_adresse_autre'=> array(
      'adresse' 	=> 	'adresse_autre',
			'complement'	=>	'complement_autre',
      'code_postal'	=> 	'code_postal_autre',
      'ville' 		=> 	'ville_autre',
      'pays' 		=> 	'pays_autre',
  ),

	'champs_personne_commande'=> array(
		'nom' 			=> 	'nom',
		'email' 		=> 	'email',
		'mot_de_passe' 	=>	'mot_de_passe',
		'adresse'		=>	'adresse',
		'adresse_autre'	=>	'adresse_autre',
		'secteur'		=>	'secteur',
	),

	'success' => 'Le client à bien été enregistrer'

);



//Parametrage pour le le coté client-----------------------------------------------------------------------------

$config['client']= array(
	'champs_client'=> array(

		'prenom' 				=> 	'prenom',
		'nom' 					=> 	'nom',
		'civilite' 				=> 	'civilite',
		'adresse'				=>	'adresse',
		'telephone' 			=>	'telephone',
		'mobile' 				=>	'mobile',
		'email' 				=> 	'email',
		'mot_de_passe' 			=>	'mot_de_passe'
	),

  'champs_client_modifier'=> array(
      'civilite' 		=> 	'civilite',
      'nom' 			=> 	'nom',
      'prenom' 		=> 	'prenom',
      'email' 		=> 	'email',
      'telephone' 	=>	'telephone',
      'mobile' 		=>	'mobile',
      'adresse'		=>	'adresse',
      'adresse_autre'	=>	'adresse_autre',
  ),

	'champs_adresse'=> array(
		'adresse' 		=> 	'adresse',
		'complement' 	=> 	'adresse_complement',
		'code_postal'	=> 	'code_postal',
		'ville' 		=> 	'ville',
		'pays' 			=> 	'pays'
	),

    'champs_adresse_autre'=> array(
        'adresse' 		=> 	'adresse_autre',
        'code_postal'	=> 	'code_postal_autre',
        'ville' 		=> 	'ville_autre',
        'pays' 			=> 	'pays_autre',
    ),

	'champs_personne_commande'=> array(
		'nom' 			=> 	'nom',
		'email' 		=> 	'email',
		'mot_de_passe' 	=>	'mot_de_passe',
		'adresse'		=>	'adresse',
		'adresse_autre'	=>	'adresse_autre',
		'secteur'		=>	'secteur',
	),

	'success' => 'Votre Requete a bien été prise en compte'

);
