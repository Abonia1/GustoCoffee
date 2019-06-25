<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// contact---------------------------------------------------



$config['contact'] = array(
    array(
        'field'  => 'nom',
        'label'  => 'Nom',
        'rules'  => 'required|trim',
        'errors' =>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
        )
    ),

    array(
        'field'   => 'prenom',
        'label'   => 'Prénom',
        'rules'   => 'required|trim',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
        )
    ),

    array(
		'field'   => 'email',
		'label'   => 'Adresse e-mail',
		'rules'   => 'required|valid_email|trim|max_length[255]',
		'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'valid_email' => 'Cette adresse e-mail n\'est pas valide',
	        'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
	),

    array(
        'field' => 'telephone',
        'label' => 'Téléphone',
        'rules' => 'is_natural|exact_length[10]|trim',
        'errors'	=>	array(
            'is_natural' => 'Le champ <strong>{field}</strong> doit contenir uniquement des chiffres',
            'exact_length' => 'Le champ <strong>{field}</strong> doit contenir {param} chiffres'
        )
    ),

    array(
        'field'   => 'message',
        'label'   => 'Message',
        'rules'   => 'required|trim',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
        )
    )

);
