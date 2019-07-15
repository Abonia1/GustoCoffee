<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Ajouter ---------------------------------------------------
$config['ajouter']= array(
      array(
            'field'     =>          'product',
            'label'     =>          'Nom de Produit',
            'rules'     =>          'trim|required|max_length[255]',
          'errors'	   =>	array(
               'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
               'max_length'    => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
         )
         ),
       array(
            'field'     =>          'desc',
            'label'     =>          'Description courte',
            'rules'     =>          'max_length[255]|trim',
          'errors'	   =>	array(
               'max_length'    => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères',
               'required'      => 'Le champ <strong>{field}</strong> est obligatoire'
          )
         ),
       array(
            'field'     =>          'desl',
            'label'     =>          'Description longue',
            'rules'     =>          'trim',
          'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire'

         )
       )

);

// Modifier ---------------------------------------------------
$config['modifier']= array(
    array(
	   'field'     =>          'product',
	   'label'     =>          'Nom de Produit',
	   'rules'     =>          'trim|required|max_length[255]',
       'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length'    => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
      )
	),
    array(
	   'field'     =>          'desc',
	   'label'     =>          'Description courte',
	   'rules'     =>          'max_length[255]|trim',
       'errors'	   =>	array(
            'max_length'    => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères',
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire'

      )
	),
    array(
	   'field'     =>          'desl',
	   'label'     =>          'Description longue',
	   'rules'     =>          'trim',
       'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire'

      )
    )

);
