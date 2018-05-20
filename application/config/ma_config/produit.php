<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['produit']= array(

    'liste'=> array(
    'id'                              => 'id',
		'nom'                             => 'nom',
		'reference'                       => 'reference',
		'image'                           => 'image',
		'bidon'														=> 'bidon',
		'video'														=> 'video',
		'fiche_tech'											=>	'fiche_tech',
		'slug'														=> 'slug',
		'description_courte'              => 'description_courte',
		'description_longue'              => 'description_longue',
		'prix_ht'                         => 'prix_ht',
		'tva'                             => 'tva',
		'remise'                          => 'remise',
		'stock'														=>	'stock',
		'date_creation'										=>	'date_creation',
		'date_modification'								=>'date_modification'
	),

    'ajouter'=> array(

		'nom'                             => 'nom',
		'reference'                       => 'reference',
		'image'                           => 'image',
		'bidon'														=> 'bidon',
		'video'														=> 'video',
		'description_courte'              => 'description_courte',
		'description_longue'              => 'description_longue',
		'prix_ht'                         => 'prix_ht',
		'tva'                             => 'tva',
		'remise'                          => 'remise',
		'stock'														=> 'stock',
		'date_creation'										=> 'date_creation',
		'date_modification'								=>'date_modification',
	),


	'modifier'=>array(

		'nom'                             => 'nom',
		'reference'                       => 'reference',
		'image'                           => 'image',
		'bidon'														=> 'bidon',
		'video'														=> 'video',
		'description_courte'              => 'description_courte',
		'description_longue'              => 'description_longue',
		'prix_ht'                         => 'prix_ht',
		'tva'                             => 'tva',
		'remise'                          => 'remise',
		'stock'														=> 'stock',
		'date_modification'								=>'date_modification',
	),

    'supprimer'=>array(

		'id'				=> 'id'
	),



    'supprimer'=>array(
		'ancienne_image'	=> 'ancienne_image',
		'id'				=> 'id'
	)










);
