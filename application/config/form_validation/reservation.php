<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Ajouter ---------------------------------------------------
$config['ajouter'] = array(
    array(
	   'field' => 'Date',
	   'label' => 'Date',
	   'rules' => 'required|trim',
       'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire'
        )
	),
    
    array(
        'field' => 'Time',
        'label' => 'Time',
        'rules' => 'required|trim',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire'
            
        )
    ),
   
    array(
        'field' => 'quantity',
        'label' => 'Quantity',
        'rules' => 'required|trim',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire'
        )
    )
    
);

// Modifier---------------------------------------------------
$config['modifier'] = array(

    array(
	   'field' => 'Date',
	   'label' => 'Date',
	   'rules' => 'required|trim',
       'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire'
        )
	),
    
    array(
        'field' => 'Time',
        'label' => 'Time',
        'rules' => 'required|trim',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire'
        )
    ),
   
    array(
        'field' => 'quantity',
        'label' => 'Quantity',
        'rules' => 'required|trim',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire'
       )
    )
    
);