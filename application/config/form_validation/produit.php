<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Ajouter ---------------------------------------------------
$config['ajouter']= array(
    array(
	   'field'     =>          'nom',
	   'label'     =>          'Nom',
	   'rules'     =>          'trim|required|max_length[255]',
       'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length'    => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
      )
	),
    array(
	   'field'     =>          'reference',
	   'label'     =>          'Référence',
	   'rules'     =>          'required|max_length[20]|is_unique[produit.reference]|trim',
       'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'is_unique'     => 'Le champ <strong>{field}</strong> doit être unique',
            'max_length'    => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
      )
	),
    array(
	   'field'     =>          'prix_ht',
	   'label'     =>          'Prix HT',
	   'rules'     =>          'required|numeric|trim',
       'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'numeric'     => 'Le champ <strong>{field}</strong> doit contenir un nombre'
      )
	),
    array(
	   'field'     =>          'remise',
	   'label'     =>          'Remise',
	   'rules'     =>          'required|integer|trim',
       'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'integer'     => 'Le champ <strong>{field}</strong> doit contenir un nombre entier'
      )
	),
    array(
	   'field'     =>          'stock',
	   'label'     =>          'Stock',
	   'rules'     =>          'required|integer|trim',
       'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'integer'     => 'Le champ <strong>{field}</strong> doit contenir un nombre entier'
      )
	),
    array(
	   'field'     =>          'description_courte',
	   'label'     =>          'Description courte',
	   'rules'     =>          'max_length[255]|trim',
       'errors'	   =>	array(
            'max_length'    => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
      )
	),
    array(
	   'field'     =>          'description_longue',
	   'label'     =>          'Description longue',
	   'rules'     =>          'trim',
       'errors'	   =>	array(

      )
    )

);

// Modifier ---------------------------------------------------
$config['modifier']= array(
    array(
	   'field'     =>          'nom',
	   'label'     =>          'Nom',
	   'rules'     =>          'trim|required|max_length[255]',
       'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length'    => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
      )
	),
    array(
	   'field'     =>          'reference',
	   'label'     =>          'Référence',
	   'rules'     =>          'required|max_length[20]|trim',
       'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length'    => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
      )
	),
    array(
	   'field'     =>          'prix_ht',
	   'label'     =>          'Prix HT',
	   'rules'     =>          'required|numeric|trim',
       'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'numeric'     => 'Le champ <strong>{field}</strong> doit contenir un nombre'
      )
	),
    array(
	   'field'     =>          'remise',
	   'label'     =>          'Remise',
	   'rules'     =>          'required|integer|trim',
       'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'integer'     => 'Le champ <strong>{field}</strong> doit contenir un nombre entier'
      )
	),
    array(
	   'field'     =>          'stock',
	   'label'     =>          'Stock',
	   'rules'     =>          'required|integer|trim',
       'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'integer'     => 'Le champ <strong>{field}</strong> doit contenir un nombre entier'
      )
	),
    array(
	   'field'     =>          'description_courte',
	   'label'     =>          'Description courte',
	   'rules'     =>          'max_length[255]|trim',
       'errors'	   =>	array(
            'max_length'    => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
      )
	),
    array(
	   'field'     =>          'description_longue',
	   'label'     =>          'Description longue',
	   'rules'     =>          'trim',
       'errors'	   =>	array(

      )
    )

);
