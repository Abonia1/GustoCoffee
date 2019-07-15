<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Ajouter ---------------------------------------------------
$config['ajouter'] = array(
    array(
        'field' => 'client',
        'label' => 'Client',
        'rules' => 'required|trim',
        'errors'	=>	array(
             'required' => 'Le champ <strong>{field}</strong> est obligatoire'
         )
     ),
     
    //  array(
    //      'field' => 'reference',
    //      'label' => 'Référence',
    //      'rules' => 'required|trim|is_unique[reservation.c_id]',
    //      'errors'	=>	array(
    //          'required' => 'Le champ <strong>{field}</strong> est obligatoire',
    //          'is_unique' => 'Le champ <strong>{field}</strong> doit être unique'
    //      )
    //      ),
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
        ),
    array(
            'field' => 'tbnumber',
            'label' => 'tbnumber',
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
        ),
        array(
            'field' => 'Numéro de Table',
            'label' => 'Numéro de Table',
            'rules' => 'required|trim',
            'errors'	=>	array(
                'required' => 'Le champ <strong>{field}</strong> est obligatoire'
            )
        )
    
);