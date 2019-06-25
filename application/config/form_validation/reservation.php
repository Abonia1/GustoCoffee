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
        'rules' => 'required|trim|is_unique[reservation.time]',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'is_unique' => 'Le champ <strong>{field}</strong> doit être unique'
        )
    ),
   
    array(
        'field' => 'quantity',
        'label' => 'Quantity',
        'rules' => 'required|trim',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'is_unique' => 'Le champ <strong>{field}</strong> doit être unique'
        )
    )
    
);

// Modifier---------------------------------------------------
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
        'rules' => 'required|trim|is_unique[reservation.time]',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'is_unique' => 'Le champ <strong>{field}</strong> doit être unique'
        )
    ),
   
    array(
        'field' => 'quantity',
        'label' => 'Quantity',
        'rules' => 'required|trim',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'is_unique' => 'Le champ <strong>{field}</strong> doit être unique'
        )
    )
    
);