<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['produit']= array(

    'liste'=> array(
    'id'                              => 'id',
		'nom'                             => 'nom',
		'image'                           => 'image',
		'description_courte'              => 'description_courte',
		'description_longue'              => 'description_longue',

	),

    'ajouter'=> array(

		'nom'                             => 'nom',
		'image'                           => 'image',
		'description_courte'              => 'description_courte',
		'description_longue'              => 'description_longue',
	),


	'modifier'=>array(

		'nom'                             => 'nom',
		'image'                           => 'image',
		'description_courte'              => 'description_courte',
		'description_longue'              => 'description_longue',
	),

    'supprimer'=>array(

		'id'				=> 'id'
	),



    'supprimer'=>array(
		'ancienne_image'	=> 'ancienne_image',
		'id'				=> 'id'
	)










);
