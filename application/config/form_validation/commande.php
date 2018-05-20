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
    
    array(
        'field' => 'reference',
        'label' => 'Référence',
        'rules' => 'required|trim|is_unique[commande.reference]',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'is_unique' => 'Le champ <strong>{field}</strong> doit être unique'
        )
    )
);


$config['modifier'] = array(
    array(
        'field' => 'client',
        'label' => 'Client',
        'rules' => 'required|trim',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire'
        )
    ),
    
    array(
        'field' => 'reference',
        'label' => 'Référence',
        'rules' => 'required|trim',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire'
        )
    )
);